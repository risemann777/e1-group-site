<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Dev");
?>

<?php $APPLICATION->IncludeComponent(
	"ace.group:landing.feedback.form", 
	".default", 
	array(
		"EMAIL_TO" => "admin@e1group.ru",
		"EVENT_MESSAGE_ID" => array(
			0 => "24",
		),
		"FORM_NAME" => "Связаться с нами",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
		),
		"USE_CAPTCHA" => "Y",
		"USE_GOOGLE_RECAPTCHA" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"FORM_THEME" => "DARK"
	),
	false
);?>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>