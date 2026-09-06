<?php

/**
 * Обработчик заявок из Tilda для создания элементов Смарт-процесса в Битрикс24.
 */

// --- НАСТРОЙКИ ---
$webhookToken = 'YOUR_WEBHOOK_TOKEN_HERE'; // Токен из входящего вебхука
$bitrixDomain = 'e1-group.bitrix24.ru';    // Домен вашего портала без https://
$entityTypeId = 1038;                      // ENTITY_TYPE_ID вашего смарт-процесса
$assignedById = 1;                         // ID пользователя-ответственного в Б24
$categoryId = 20;                         // ID пользователя-ответственного в Б24

// Коды полей смарт-процесса (замените на свои)
// Стандартное поле "Название" элемента СП
$fieldTitleCode = 'title';
// Пользовательские поля (примеры)
$fieldCityCode = 'ufCrm8_1782916853452'; // Город
$fieldNameCode = 'ufCrm8_1782916860269'; // Имя
$fieldPhoneCode = 'ufCrm8_1782916870893'; // Телефон
$fieldEmailCode = 'ufCrm8_1782916876572'; // Email
$fieldCompanyCode = 'ufCrm8_1782916882532'; // Компания
$fieldOrderTypeCode = 'ufCrm8_1782916890508'; // Тип заявки
$fieldCommentCode = 'ufCrm8_1782916900685'; // Комментарий
$fieldOrderSourceCode = 'ufCrm8_1782916906428'; // Источник заявки
$fieldOrderUrlCode = 'ufCrm8_1782916911908'; // URL страницы отправки
$fieldOrderIdCode = 'ufCrm8_1782916920725'; // Уникальный ID заявки

// --- ПОЛУЧЕНИЕ И ПРОВЕРКА ДАННЫХ ОТ TILDA ---
$tildaDataRaw = file_get_contents('php://input');

if (!$tildaDataRaw) {
  http_response_code(400);
  die('No data received from Tilda.');
}

$data = json_decode($tildaDataRaw, true);

if (!is_array($data)) {
  http_response_code(400);
  die('Invalid JSON format.');
}

// Проверка секретного ключа Tilda (настоятельно рекомендуется!)
// Настройте его в параметрах экспорта форм в Tilda
if (empty($data['secret']) || $data['secret'] !== TILDA_SECRET_KEY) {
  http_response_code(403);
  die('Access denied: Invalid secret key.');
}

// --- МАППИНГ ДАННЫХ ---
// Названия ключей массива зависят от того, как вы назвали переменные полей в настройках блока форм Tilda
$title = trim((string)($data['form_name'] ?? 'Заявка с сайта')); // Название самого блока формы
$phone = preg_replace('/\D/', '', $data['phone'] ?? ''); // Очистка номера от мусора
$email = filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL);
$comment = trim((string)($data['message'] ?? ($data['comment'] ?? '')));

// Формирование названия элемента смарт-процесса
$crmItemTitle = "Заявка: {$title}";
if ($name = trim($data['name'] ?? '')) {
  $crmItemTitle .= " | {$name}";
}
if ($phone) {
  $crmItemTitle .= " | +7{$phone}";
}

// --- ПОДГОТОВКА ПАРАМЕТРОВ ДЛЯ API БИТРИКС24 ---
$fields = [
  'ENTITY_TYPE_ID' => $entityTypeId,
  'FIELDS' => [
    'TITLE' => mb_substr($crmItemTitle, 0, 255), // Ограничение длины заголовка
    'ASSIGNED_BY_ID' => $assignedById,
    $fieldPhoneCode => $phone,
    $fieldEmailCode => $email ?: '',
    $fieldCommentCode => $comment,

    // Пример передачи UTM-меток, если они передаются скрытыми полями из Tilda
    'UTM_SOURCE' => $data['utm_source'] ?? null,
    'UTM_MEDIUM' => $data['utm_medium'] ?? null,
    'UTM_CAMPAIGN' => $data['utm_campaign'] ?? null,
  ]
];

// Удаляем пустые значения, чтобы не засорять карточку сущности
$fields['FIELDS'] = array_filter($fields['FIELDS'], function ($value) {
  return $value !== null && $value !== '';
});

// --- ОТПРАВКА ЗАПРОСА В BITRIX24 ---
$url = "https://{$bitrixDomain}/rest/{$webhookToken}/crm.item.add.json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$responseBody = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// --- ОБРАБОТКА ОТВЕТА ---
$response = json_decode($responseBody, true);

if ($curlError) {
  error_log("cURL Error to Bitrix24: " . $curlError);
  // Важно отдать Tilda успешный статус, иначе она будет слать заявку повторно.
  // Ошибку логируем только у себя.
} elseif ($httpCode === 200 && isset($response['result'])) {
  // Успех
} else {
  // Если Битрикс вернул ошибку API (например, ошибка прав или неверный код поля)
  error_log("Bitrix24 API Error. Code: {$httpCode}. Response: " . $responseBody);
}

// Tilda ожидает любой ответ со статусом 200.
// Если вернуть 500, Tilda будет пытаться отправить данные каждые 5 минут.
http_response_code(200);
echo 'ok';