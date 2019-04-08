<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div class="col-12">
        <div class="contact-content mb-100">
            <h4><?echo $arResult["MESSAGE_TEXT"]?></h4>
<?//here you can place your own messages
	switch($arResult["MESSAGE_CODE"])
	{
	case "E01":
		?><? //When user not found
		break;
	case "E02":
		?><? //User was successfully authorized after confirmation
		break;
	case "E03":
		?><? //User already confirm his registration
		break;
	case "E04":
		?><? //Missed confirmation code
		break;
	case "E05":
		?><? //Confirmation code provided does not match stored one
		break;
	case "E06":
		?><? //Confirmation was successfull
		break;
	case "E07":
		?><? //Some error occured during confirmation
		break;
	}
?>
<?if($arResult["SHOW_FORM"]):?>
	<!-- <form method="post" action="<?echo $arResult["FORM_ACTION"]?>">
		<table class="data-table bx-confirm-table">
			<tr>
				<td>
					<?echo GetMessage("CT_BSAC_LOGIN")?>:
				</td>
				<td>
					<input type="text" name="<?echo $arParams["LOGIN"]?>" maxlength="50" value="<?echo $arResult["LOGIN"]?>" size="17" />
				</td>
			</tr>
			<tr>
				<td>
					<?echo GetMessage("CT_BSAC_CONFIRM_CODE")?>:
				</td>
				<td>
					<input type="text" name="<?echo $arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?echo $arResult["CONFIRM_CODE"]?>" size="17" />
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>" /></td>
			</tr>
		</table>
		<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
	</form> -->


                        <!-- Contact Form Area -->
            <div class="contact-form-area">
                <form method="post" action="<?echo $arResult["FORM_ACTION"]?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="<?echo $arParams["LOGIN"]?>" maxlength="50" value="<?echo $arResult["LOGIN"]?>" size="17"  placeholder="<?echo GetMessage("CT_BSAC_LOGIN")?>">

                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="<?echo $arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?echo $arResult["CONFIRM_CODE"]?>" size="17" placeholder="<?echo GetMessage("CT_BSAC_CONFIRM_CODE")?>:">
                    </div>
                    <p></p>
                    <input type="submit" class="btn nikki-btn mt-15" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>"/>
                    <input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
                </form>
            </div>
    	</div>
	</div>
<?elseif(!$USER->IsAuthorized()):?>
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array());?>
<?endif?>