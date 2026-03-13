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