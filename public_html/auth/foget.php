<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Восстановление пароля");
$APPLICATION->SetTitle("Забыли пароль");
?><?$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", "forgot", Array(
	"COMPONENT_TEMPLATE" => "flat"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>