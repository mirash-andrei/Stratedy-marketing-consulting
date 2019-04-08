<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?$APPLICATION->ShowLink("canonical", null, false);?>
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico">
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->ShowHead()?>

    <!-- Core Stylesheet -->
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/style.css');
    /*auth style*/
   
   // $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH .'/css/auth.css');

    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/js/auth.js');
  
    /*end auth style*/
    $APPLICATION->ShowMeta("keywords");      // Вывод мета - тега keywords
    $APPLICATION->ShowMeta("description");      // Вывод мета - тега description
    $APPLICATION->ShowCSS();         // Подключение файлов стилей CSS
    $APPLICATION->ShowHeadStrings();    
    ?>
   </head>

<body>
    <?$APPLICATION->ShowPanel();?>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="nikki-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="nikkiNav">

                        <!-- Nav brand -->
                        <a href="/" class="nav-brand"><img src="<?=SITE_TEMPLATE_PATH?>/img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <?
									global $USER;
									if ($USER->IsAuthorized()){
									?>
									<li><a href="/personal/">Личный кабинет</a></li>
                                    <?$page = $APPLICATION->GetCurPage(true);?>
                                    <li><a href="<? echo $page ?>/?logout=yes">Выйти</a></li>
									<?
									} else{
									?>
                                    <li><a href="/auth/">Авторизация</a></li>
                                    <li><a href="/auth/registration.php">Регистрация</a></li>
                                    <?}?>
                                </ul>

                               

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
   
    <!-- ##### Breadcrumb Area End ##### -->
