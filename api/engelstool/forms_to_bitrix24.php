<?php

/**
 * Обработчик заявок из Tilda для создания элементов Смарт-процесса в Битрикс24.
 */

// --- НАСТРОЙКИ ---
$b24Domain = 'e1-group.bitrix24.ru';  // Домен вашего портала без https://
$b24webhookOwnerID = 1;                   // ID пользователя, создавшего вебхук
$b24webhookToken = 'YOUR_WEBHOOK_TOKEN_HERE';    // Токен из входящего вебхука (B24_WEBHOOK_URL)
$b24method = 'crm.item.add';              // вызываемый метод REST API
$tildaSecret = '4f7c8d766e64fac4a00e';    // Секретный ключ Tilda (TILDA_SECRET_KEY)
$entityTypeId = 1038;                     // Смарт-процесс (Сайт "Энгельс")
$assignedById = 1;                        // ID пользователя-ответственного в Б24
$categoryId = 20;                         // Формы (заявки)
$stageId = 'DT1038_20:NEW';             // Первая стадия заявки

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

// --- ЛОГИРОВАНИЕ ---
$logFile = __DIR__ . '/debug.log';

function logDebug($logFile, $label, $data) {
  $timestamp = date('Y-m-d H:i:s');
  $entry = "\n[{$timestamp}] {$label}\n" . print_r($data, true) . "\n---\n";
  file_put_contents($logFile, $entry, FILE_APPEND);
}

// --- ПОЛУЧЕНИЕ И ПРОВЕРКА ДАННЫХ ОТ TILDA ---
$tildaDataRaw = file_get_contents('php://input');

// Тильда при подключении вебхука шлёт test=test — отвечаем 200 и выходим
if ($tildaDataRaw === 'test=test') {
  logDebug($logFile, 'TILDA WEBHOOK TEST', ['body' => $tildaDataRaw]);
  http_response_code(200);
  die('ok');
}

logDebug($logFile, 'RAW DATA FROM TILDA', [
  'body' => $tildaDataRaw,
  'parsed' => [],
]);

if (!$tildaDataRaw) {
  http_response_code(400);
  die('No data received from Tilda.');
}

// Тильда шлёт данные формы в формате application/x-www-form-urlencoded (key=value&key2=value2)
$data = [];
parse_str($tildaDataRaw, $data);

if (empty($data)) {
  http_response_code(400);
  die('Invalid form data.');
}

logDebug($logFile, 'PARSED DATA FROM TILDA', $data);

// Проверка секретного ключа Tilda (настоятельно рекомендуется!)
// Настройте его в параметрах экспорта форм в Tilda
if (empty($data['secret']) || $data['secret'] !== $tildaSecret) {
  logDebug($logFile, 'SECRET KEY MISMATCH', ['expected' => $tildaSecret, 'received' => $data['secret'] ?? null]);
  http_response_code(403);
  die('Access denied: Invalid secret key.');
}

// --- МАППИНГ ДАННЫХ ---
// Названия ключей массива зависят от того, как вы назвали переменные полей в настройках блока форм Tilda
$formTitle = trim((string)($data['title'] ?? 'Заявка с сайта "Энгельс"')); // Название формы
$orderType = trim((string)($data['order_type'] ?? 'Тип заявки не указан')); // Тип формы
$phone = preg_replace('/\D/', '', $data['phone'] ?? ''); // Очистка номера от мусора
$email = filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL) ?: null;
$comment = trim((string)($data['message'] ?? ($data['comments'] ?? '')));
$city = trim((string)($data['address_city'] ?? ''));
$name = trim((string)($data['name'] ?? ''));
$company = trim((string)($data['organization'] ?? ''));

// Получаем уникальный ID заявки из Тильды
$lead_id = $data['tranid'] ?? null;

// Формирование названия элемента смарт-процесса

// --- ПОДГОТОВКА ПАРАМЕТРОВ ДЛЯ API БИТРИКС24 ---
$fields = [
  'entityTypeId' => $entityTypeId,
  'fields' => [
    $fieldTitleCode => mb_substr($formTitle, 0, 255), // Ограничение длины заголовка
    'categoryId' => $categoryId,
    'stageId' => $stageId,
    'assignedById' => $assignedById,
    $fieldCityCode => $city,
    $fieldNameCode => $name,
    $fieldPhoneCode => $phone,
    $fieldEmailCode => $email,
    $fieldCompanyCode => $company,
    $fieldCommentCode => $comment,
    $fieldOrderSourceCode => 'Сайт Энгельс',
    $fieldOrderUrlCode => 'https://engelstool.ru/',
    $fieldOrderIdCode => $lead_id,
    $fieldOrderTypeCode => $orderType,
  ]
];

// Удаляем пустые значения, чтобы не засорять карточку сущности
$fields['fields'] = array_filter($fields['fields'], function ($value) {
  return $value !== null && $value !== '';
});

logDebug($logFile, 'PREPARED FIELDS FOR BITRIX24', $fields);

// --- ОТПРАВКА ЗАПРОСА В BITRIX24 ---
$url = "https://{$b24Domain}/rest/{$b24webhookOwnerID}/{$b24webhookToken}/{$b24method}.json";

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