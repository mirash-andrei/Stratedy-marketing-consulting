<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<div class="col-12">
        <div class="contact-content mb-100">

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<?if($arResult["FORM_TYPE"] == "login"):?>
<div class="contact-form-area">
	<h4>АВТОРИЗАЦИЯ</h4>
	<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
	<?if($arResult["BACKURL"] <> ''):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<?endif?>
	<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
	<?endforeach?>
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
			
			<div class="form-group">
                <input type="text" class="form-control" name="USER_LOGIN" maxlength="50" value="" size="17" placeholder="<?echo GetMessage("AUTH_LOGIN")?>">
                <script>
					BX.ready(function() {
						var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
						if (loginCookie)
						{
							var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
							var loginInput = form.elements["USER_LOGIN"];
							loginInput.value = loginCookie;
						}
					});
				</script>
            </div>

			 <div class="form-group">
                <input type="password" class="form-control" name="USER_PASSWORD" maxlength="50" size="17" autocomplete="off" placeholder="<?echo GetMessage("AUTH_PASSWORD")?>">
                <?if($arResult["SECURE_AUTH"]):?>
					<span class="bx-auth-secure" id="bx_auth_secure<?=$arResult["RND"]?>" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
						<div class="bx-auth-secure-icon"></div>
					</span>
					<noscript>
					<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
						<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
					</span>
					</noscript>
					<script type="text/javascript">
					document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
					</script>
					<?endif?>
            </div>
				

	<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
			<div class="form-group">
				<input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" />
				<label for="USER_REMEMBER_frm" title="<?=GetMessage("AUTH_REMEMBER_ME")?>"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
			</div>
	<?endif?>
	<?if ($arResult["CAPTCHA_CODE"]):?>
			<div class="form-group">
				
				<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
				<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
				<input type="text" class="form-control" name="captcha_word" maxlength="50" value="" />
			</div>
	<?endif?>
			<div class="form-group">
				<input type="submit" class="btn nikki-btn mt-15" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
			</div>
	<?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
			<div class="form-group">
				<noindex><a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a></noindex><br />
			</div>
	<?endif?>

			<div class="form-group">
			<noindex><a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></noindex>
			</div>
	<?if($arResult["AUTH_SERVICES"]):?>
			<div class="form-group">
				
					<div class="bx-auth-lbl"><?=GetMessage("socserv_as_user_form")?></div>
	<?
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons", 
		array(
			"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
			"SUFFIX"=>"form",
		), 
		$component, 
		array("HIDE_ICONS"=>"Y")
	);
	?>
				
			</div>
	<?endif?>
		
	</form>
</div>
<?if($arResult["AUTH_SERVICES"]):?>
<?
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "", 
	array(
		"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
		"AUTH_URL"=>$arResult["AUTH_URL"],
		"POST"=>$arResult["POST"],
		"POPUP"=>"Y",
		"SUFFIX"=>"form",
	), 
	$component, 
	array("HIDE_ICONS"=>"Y")
);
?>
<?endif?>

<?
elseif($arResult["FORM_TYPE"] == "otp"):
?>
<div class="contact-form-area">
<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="OTP" />
	
		
			<div class="form-group">
                <input type="text" class="form-control" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off"   placeholder="<?echo GetMessage("auth_form_comp_otp")?>">

            </div>
			
		
<?if ($arResult["CAPTCHA_CODE"]):?>
		<div class="form-group">
			
			<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
			<input type="text"  class="form-control" name="captcha_word" maxlength="50" value="" placeholder="<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>"/>
		</div>
<?endif?>
<?if ($arResult["REMEMBER_OTP"] == "Y"):?>
		<div class="form-group">
			<input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y" />
			<label for="OTP_REMEMBER_frm" title="<?echo GetMessage("auth_form_comp_otp_remember_title")?>"><?echo GetMessage("auth_form_comp_otp_remember")?></label>
		</div>
<?endif?>
		<div class="form-group">
			<input type="submit" class="btn nikki-btn mt-15" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
		</div>
		<div class="form-group">
			<noindex><a href="<?=$arResult["AUTH_LOGIN_URL"]?>" rel="nofollow"><?echo GetMessage("auth_form_comp_auth")?></a></noindex><br />
		</div>
	
</form>
</div>
<?
else:
?>
<div class="contact-form-area">
<form action="<?=$arResult["AUTH_URL"]?>">
	
		
		<div class="form-group">	
				<?=$arResult["USER_NAME"]?><br />
				[<?=$arResult["USER_LOGIN"]?>]<br />
				<a href="<?=$arResult["PROFILE_URL"]?>" title="<?=GetMessage("AUTH_PROFILE")?>"><?=GetMessage("AUTH_PROFILE")?></a><br />
		</div>	
		
		<div class="form-group">
			
			<?foreach ($arResult["GET"] as $key => $value):?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?endforeach?>
			<input type="hidden" name="logout" value="yes" />
			<input type="submit" class="btn nikki-btn mt-15" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" />
			
		</div>
	
</form>
</div>
<?endif?>
</div>
</div>