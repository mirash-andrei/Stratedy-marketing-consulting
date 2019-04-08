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
$APPLICATION->SetPageProperty("TITLE", $arResult["NAME"]);
?>
<? $SmalImage2 = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>968, 'height'=>498), BX_RESIZE_IMAGE_EXACT, true); 
$time = strstr($arResult["TIMESTAMP_X"], ' ', true); 
?>
 <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12">

                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <div class="post-content">

                            <div class="text-center mb-50">
                                <p class="post-date"><? echo $time?></p>
                                <h2 class="post-title"><? echo $arResult["NAME"]?></h2>
                                <!-- Post Meta -->
                               
                            </div>

                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <img src="<?=$SmalImage2["src"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
                            </div>

                            <!-- Post Text -->
                            <div class="post-text">
                            	<? echo $arResult["DETAIL_TEXT"]?>	
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->