<?php
function PR($ar) {
  global $USER;

  if (!$USER->IsAdmin() || !CSite::InGroup([1])) return null;

  if (is_array($ar) || is_object($ar)) {
    echo '<pre>';
    print_r($ar);
    echo '</pre>';
  } else {
    echo "Param is not array";
  }
}

function findSubstringsByArray($text, array $stringsArrayToFind): array {
  $results = [];

  foreach ($stringsArrayToFind as $substring) {
    $position = stripos($text, $substring);

    if ($position !== false) {
      $results[] = $substring;
    }
  }

  return $results;
}

function validatePhoneNumber($number): bool {
  $pattern = '/^[^a-zA-Zа-яА-Я]*$/u';
  return preg_match($pattern, $number);
}

function GetHeadline(): string {
  global $APPLICATION;

  if ($APPLICATION->GetProperty("NOT_SHOW_HEADLINE") == "Y")
  {
    return "";
  }

  ob_start();?>
  <div class="headline headline--delayed layout__headline">
    <h1 class="headline__title"><?=$APPLICATION->GetTitle()?></h1>
    <?php
    if ($APPLICATION->GetProperty("headline_text")) {
      ?>
      <div class="headline__text"><?=$APPLICATION->GetProperty("headline_text")?></div>
      <?php
    }
    ?>
  </div>
  <?php
  $str = ob_get_contents();
  ob_clean();
  ob_end_clean();
  return $str;
}

function ShowHeadline() {
  global $APPLICATION;
  $APPLICATION->AddBufferContent("GetHeadline");
}

/**
 * executeRest();
 *
 * Rest для Битрикс24
$params = array(
"id" => $deal["ID"],
"fields" => array(
"ASSIGNED_BY_ID" => $nextUser,
"UF_CRM_1625657146" => $nextUser,
),
executeB24Rest("crm.activity.update", $params);

 *
 *
 *
 */

function executeB24Rest($method, $array = array())
{
  $webhook = B24_WEBHOOK_URL;
  $queryUrl = $webhook . $method . ".json";
  $queryData = http_build_query(array_merge($array));

  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST => 1,
      CURLOPT_HEADER => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $queryUrl,
      CURLOPT_POSTFIELDS => $queryData,
  ));

  $result = curl_exec($curl);
  curl_close($curl);
  return json_decode($result, true);
}

function getCurrentURL(): string {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}