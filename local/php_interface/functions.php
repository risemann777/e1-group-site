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