<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


?>
<section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12">
                    <div class="blog-posts-area">
                        <div class="row">
                           
                             <!-- Section Heading -->
                            <div class="col-12">
                                <div class="section-heading">
                                    <h2>Новостной Блог</h2>
                                    
                                </div>
                            </div>

                            

                                     

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?$SmalImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>540, 'height'=>390), BX_RESIZE_IMAGE_EXACT, true);
    $time = strstr($arItem["TIMESTAMP_X"], ' ', true); ?>
	<!-- Single Blog Post -->
                            <div class="col-12 col-sm-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$SmalImage["src"]?>"></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date"><?echo $time?></p>
                                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="post-title">
                                            <h4><?echo $arItem["NAME"]?></h4>
                                        </a>
                                        <p class="post-excerpt"><?echo $arItem["PREVIEW_TEXT"]?></p>
                                    </div>
                                </div>
                            </div>
	
<?endforeach;?>

 						</div>
                    </div>

                    <!-- Pager -->
                    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
						<?=$arResult["NAV_STRING"]?>
					<?endif;?>
                    
                </div>

                <!-- Blog Sidebar Area -->
               
            </div>
        </div>
</section>              
