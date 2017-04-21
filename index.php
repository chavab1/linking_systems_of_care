<?php

/*
-----------------------------------------
Linking Systems of Care Main Theme
-----------------------------------------
Site:      linkingsystemsofcare.org
Email:     info@linkingsystemsofcare.org
@license:  Copyrighted Commercial Software
@copyright (C) 2017 NCJFCJ

 */

defined( '_JEXEC' ) or die( 'Restricted access' );

// Remove Generator Line
$this->setGenerator('');

// determine if this is the home page
$isHome = false;
$app = JFactory::getApplication();
$menu = $app->getMenu();
$activeMenu = $menu->getActive();
if($activeMenu == $menu->getDefault()){
	$isHome = true;
};


$this->_scripts = array();
unset($this->_script['text/javascript']);


// Stylesheets
$templateUrl = $this->baseurl.'/templates/'.$this->template;


// Output as HTML5
$this->setHtml5(true);

// positions
$showContentBottom = $this->countModules('content-bottom');

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="apple-mobile-web-app-capable" content="YES" />
    <meta charset="utf-8" />
    <meta name="referrer" content="unsafe-url" />

    <?php

    // Generate Meta tags
    foreach($this->_metaTags as $type => $items){
        foreach($items as $name => $content){
            if($name != "content-type" && !empty($content)){
                echo '<meta name="' . $name . '" content="' . htmlspecialchars($content) . '" />';
            }
        }
    }

    // Generate Description tag
    $documentDescription = $this->getDescription();
    if($documentDescription){
        echo '<meta name="description" content="' . htmlspecialchars($documentDescription) . '" />';
    }
    ?>

    <!--Generate Title-->
    <title><?php echo trim(htmlspecialchars($this->getTitle(), ENT_COMPAT, 'UTF-8')); ?></title>



    <link href="/templates/linkingsystemsofcare/stylesheets/css/system_general.css" rel="stylesheet"/>
    <link href="/templates/linkingsystemsofcare/stylesheets/css/styles.min.css" rel="stylesheet" media="screen" />
    <script src="/templates/linkingsystemsofcare/js/build/vendors.min.js"></script>

    <base href="/" />
    <!--[if lte IE 8]><link href="<?php echo $templateUrl ?>/css/ie.css" rel="stylesheet" /><![endif]-->


    <!--Favicons-->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $templateUrl ?>/images/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $templateUrl ?>/images/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $templateUrl ?>/images/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $templateUrl ?>/images/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $templateUrl ?>/images/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $templateUrl ?>/images/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?php echo $templateUrl ?>/images/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo $templateUrl ?>/images/favicon/favicon-16x16.png" sizes="16x16" />
    <meta name="application-name" content="Linking Systems of Care" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo $templateUrl ?>/images/favicon/mstile-144x144.png" />


</head>
<body <?php echo ($isHome ? 'class="home"': "") ?>>


    <!--Skip Links-->
    <a href="#main" class="visually-hidden focusable">
        <?php echo JText::_('TPL_LINKINGSYSTEMSOFCARE_SKIP_TO_CONTENT'); ?>
    </a>

    <a href="#nav" class="visually-hidden focusable">
        <?php echo JText::_('TPL_LINKINGSYSTEMSOFCARE_JUMP_TO_NAV'); ?>
    </a>


    <header>
        <div class="container">
            <a class="site-branding" href="/" title="Go to Home Page">
                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 680 221" overflow="auto" role="presentation">
                    <title>Vision 21 OVC-Funded Project Logo</title>
                    <g fill="#7D868C">
                        <path d="M634.2 107.1l10-5.4S531.6-75.7 341.8 43.8c48-29 182.4-88.8 292.4 63.3z"></path>
                        <path d="M330.7 50.9c-.7-3.9-2-7.3-4.6-7.3-1.5 0-5.6 2.4-6.7 3.6v.6c1.7 1.5 2.8 5.1 2.8 12.9V93c0 20.4-.2 31.3-.6 35 1.9-.2 4.5 0 6.6-.4 2.6-.2 3.6-.7 3.6-4.7V67.2c4.5-6.6 14.2-15.2 26-15.2 12.7 0 20.4 8.1 20.2 25.8l-.1 30.6c-6.5-2.7-13-5.9-19.6-9.4 0 0 7.1 4.9 19.6 11l-.1 15.9c0 1.3.4 2.1 1.9 2.1 2.2 0 4.9-.8 8.6-1.5-.3-2.2-.5-5.8-.7-12 43.5 18.8 130 40.6 222-23.6l-16.9-23.2s-38 40.6-99.8 53.4c3.1-1.7 6.1-3.6 8.8-5.9h-.1c-3.5.3-8.9.4-10.5.4.1-5 .2-26 .2-45.2-2.3.7-9.2 2.4-12.1 2.7l-.2-.4 2.3-6.7c7.7-2.2 17.8-5.9 21.5-7.6l1 .5c0 6.3.3 46.2.3 53.9v.3c9.4-9 15.2-21.5 15.2-35.5 0-27.2-22-49.2-49.2-49.2s-49.2 22-49.2 49.2c0 22.5 15.2 41.5 35.9 47.3-21.3.1-44.5-3.5-69.2-12.7V77.1c0-20.8-7.5-33.7-26.8-33.7-11 0-22.3 7.3-29.4 15.4 0-2-.1-4.9-.6-7.7 3.7-2.5 7.4-5 11.1-7.3-4.6 2.7-8.3 5.1-11.2 7.1zm113.8 62.7l1.7-4.2c12.4-13.4 19-21.9 19-32.2 0-4.5-2.3-8.9-7.9-8.9-3.8 0-7.4 2.4-8.5 3.4-2 1.6-3 1.2-4-.6-.7-1.1-.9-2.6-1-3.7 4.1-6.1 11.2-8.9 18.2-8.9 11.1 0 16 8.4 16 16.6 0 5.5-1.5 9.1-4.2 13.7-2.6 4.4-7.2 10.2-14.5 17 3.2.5 14.5.2 23.2 0-.6 3.9-3.4 7.7-4.8 8.3-1 .7-3.9 1.2-8.9 1.2-10.9 0-19 0-23.9-.9l-.4-.8zM77.6 45.5c-2.2-1.5-4.5-2.1-6.2-2.1C65 61 49.1 100.3 43.7 114.2 35.8 92.1 21.4 54.5 18.2 47c-1.1-2.6-2.2-3.6-3.2-3.6h-.2c-1.9 0-6 2.2-7.9 3.7 1.9 3.6 4.5 9 12.5 29.8 13.9 36.3 18.2 46.6 20 52.3 2.2-.4 3.9-.9 5.6-1.9 1.7-.7 2.6-3 4.3-6.7C65.1 83.3 69 73 76.1 55.6c3.4-7.9 3.4-9.2 1.5-10.1zM100.1 6.3h-.2c-3 0-6.4 2.4-6.4 6.7 0 3.4 1.9 6.6 6.4 6.6 3.9 0 6.2-3.6 6.2-6.7 0-3.6-2.5-6.6-6-6.6zM102.7 44.5c-1.7 0-5.8.6-8.2 1.7.4 4.1.7 9.7.7 21.2v31.5c0 10.9-.4 21.7-.6 29.2 3.6-.2 6-.6 7.7-.9 1.7-.4 2.4-1.3 2.4-4.7V55.9c.1-10.4-.7-11.4-2-11.4zM161.3 87.2c-6.6-3.7-12-6-18.2-9.4-4.7-2.4-9-6.6-9-13.3 0-8.2 6.9-13.5 15.5-13.5 4.5 0 10.3 1.7 14.4 4.1 2.6-.2 4.5-3.6 4.3-5.4-3.2-4.1-11-6.4-17.6-6.4h-.2c-13.7 0-26 9.2-26 22.8 0 9.6 5.4 15.7 13.3 20 4.3 2.2 8.8 4.1 14 6.9 7.5 3.7 10.9 8.1 10.9 13.9 0 8.1-5.8 14.2-17.4 14.2-6.6 0-13.7-2.2-19.1-6.2-1.9-.2-2.6 1.1-3.2 2.6-.6 1.1-.6 3 .2 4.3 3.2 3.6 10.7 7.1 21.4 7.1 13.1 0 27.9-7.1 27.9-24.3 0-6.5-3.7-12.9-11.2-17.4zM195.9 6.3h-.2c-3 0-6.4 2.4-6.4 6.7 0 3.4 1.9 6.6 6.4 6.6 3.9 0 6.2-3.6 6.2-6.7 0-3.6-2.4-6.6-6-6.6zM198.6 44.5c-1.7 0-5.8.6-8.2 1.7.4 4.1.7 9.7.7 21.2v31.5c0 10.9-.4 21.7-.6 29.2 3.6-.2 6-.6 7.7-.9 1.7-.4 2.4-1.3 2.4-4.7V55.9c0-10.4-.7-11.4-2-11.4zM262.1 43.4h-.2c-24.5 0-40.6 19.9-40.6 43.8 0 18 9.5 42 39.9 42 24.7 0 39.7-19.7 39.7-43.4-.1-24.2-13.4-42.4-38.8-42.4zm.1 78.7c-16.5 0-30.3-12.5-30.3-36.5 0-24.2 15.2-35 28.7-35h.2c20.2 0 29.4 17.4 29.4 35.8-.1 28.2-17.1 35.7-28 35.7z"></path>
                    </g>
                    <g fill="#00567D">
                        <path d="M36.7 147.8c14.5 0 21.7 10.2 21.7 23.7 0 14.3-8.1 30.6-27.7 30.6-14.5 0-21.9-9.4-21.9-23.2 0-15.7 9.7-31.1 27.9-31.1zm-1.1 7.1c-8 0-15.2 9.6-15.2 24.4 0 7.9 2.8 15.9 11 15.9 10.2 0 15.4-12.9 15.4-24.3 0-7.2-2.2-16-11.2-16zM73.3 148.8c2 0 2.2 1.1 2.8 3.7 2.4 10.5 5 24.2 7.4 35.3 6.8-13.1 13.9-26.7 19.8-39 2.9.1 6.9.4 8.1.9.9.5.9 1.8-.3 4.1-8.1 15.3-16.4 30.1-24.2 44.2-.8 1.6-1.6 2.7-2.5 3.1-1.2.6-5.3.8-7.7.8-3.7-16.4-7.8-34.8-12.1-51.3 2.6-1 6.3-1.8 8.7-1.8zM151.9 192.9c0 2.7-.7 5.6-2.1 6.9-2.9 1.5-7.6 2.4-12.1 2.4-15.5 0-24.3-8.8-24.3-24.2 0-12.6 8.5-30.1 31.1-30.1 5.8 0 10.7 1.7 11.8 2.9-.1 2.7-1.3 6.5-5 5.5-1.7-.5-4.2-.9-6.4-.9-10.2 0-20 7.7-19.9 22.3 0 9.5 5.3 17.2 15.6 17.2 4.6 0 8.2-.9 11.3-2zM177 176c-.3 2.7-1.9 7.5-4.2 8.3-3.4 1.2-13.6 2.3-16.6 2.2l-.2-.3c.3-4.3 2.7-7.9 3.7-8.1 5.3-.5 13.8-1.7 16.9-2.5l.4.4zM214.3 172.4c-1.8 6.7-3.7 7.1-7.1 7.1h-10.4c-1 8.2-1.9 15.2-2.6 21.5-1.7.4-6.1.5-9.2.5-1.4 0-2-.2-1.8-1.5l5.9-40.8c.5-3.3.7-5.5 1-8.8 1.7-.6 6.4-1.1 10.5-1.2 2.2-.1 15.7 0 19.2 0-.6 4.1-2.2 5.8-3.6 6.7-1.3.3-3.2.3-7 .3h-9.1l-2.2 16.3h16.4zM241.6 192.7c-3.8 6.1-9.2 9.3-15.1 9.3-8 0-8.1-7.7-7.1-13.6.6-3.7 1.4-8 2-12 1.1-6.5 1.5-9.8 1.6-11 .9-.5 8.6-2.1 9.9-2.1.8 0 1.2 1 .7 3.2-.9 4.8-2.5 14.3-3.8 21.8-.6 3.6 0 5.1 2.1 5.1 3.7 0 10.8-7.1 13.5-25.4.3-1.8.7-2.7 1.8-3.1 1.8-.7 7.6-1.7 9.4-1.6-1.8 6.6-3.7 21.8-4.4 27.7-.3 2.2-.7 6.6-.6 9.5-2.7 1.2-8.3 1.5-9.7 1.5-.6 0-.7-3.2 0-9.3h-.3zM275 174.1c3.8-6.1 8.8-10.8 15.8-10.8 5.9 0 7.8 5.5 6.7 13.3-.6 3.7-1.6 8.9-2.2 13.7-.6 4.1-1 7.7-.9 10.2-2.2 1.1-8.5 1.5-9.9 1.5-.6 0-.7-4.6.1-9.4.7-4 2.1-11.2 2.7-15.4.4-2.4.3-5.3-2-5.3-3.1 0-10.4 4.9-14 25-.3 1.7-.9 2.7-1.8 3.2-1.2.7-3.9 1.4-9.3 1.5 1-5.1 2.6-15.4 3.7-23.1 1.1-7 1.5-11.5 1.2-13.2 1.4-.5 8.8-2.1 9.6-2.1.9 0 1.1 2.6.3 8.8-.1.6-.2 1.5-.3 2h.3zM311.7 202c-5.3 0-8.6-4.7-8.6-12.9 0-13.4 8.4-25.8 22.5-25.8 2.5 0 4.7.7 6.1 1.5.7-3.8 2.5-15.6 2.6-19.1 2.3-.4 7.3-1.2 9.5-1.2.9 0 1.2.9.8 3-2 12.5-5.6 36.4-6.2 41.7-.5 4.5-.6 8.9-.5 11.4-2.7 1.2-8.1 1.4-9.5 1.4-.6 0-.9-3.8-.7-7.2.1-1.1.3-2.7.3-2.9-4.2 6.7-9.9 10.1-16.3 10.1zm5.5-8.6c3.7 0 11-6.8 13.1-18.8.1-.7.3-1.9.5-2.7-1.1-1-2.5-1.7-4.7-1.7-8.4 0-12.1 10-12.1 17.3 0 3.9 1.3 5.9 3.2 5.9zM367.5 163.3c6.6 0 10.1 3.8 10.1 8.7 0 10.2-13.1 13.9-20.6 14.4v1.1c0 4.1 1.7 6.4 5.7 6.4 4.8 0 8.9-2.7 11.5-5 .7.5 1.1 1.7 1.1 3.2 0 1.8-.6 3.5-1.5 4.5-2.4 2.7-7.2 5.4-14.5 5.4-9.1 0-12.7-5.7-12.7-14.4 0-12.1 8-24.3 20.9-24.3zm-1.8 6.3c-3.1 0-6.9 3.3-8.2 10.3 7.6-.6 11.1-4.2 11.1-7.3 0-1.3-.7-3-2.9-3zM389.7 202c-5.3 0-8.6-4.7-8.6-12.9 0-13.4 8.4-25.8 22.5-25.8 2.5 0 4.7.7 6.1 1.5.7-3.8 2.5-15.6 2.6-19.1 2.3-.4 7.3-1.2 9.5-1.2.9 0 1.2.9.8 3-2 12.5-5.6 36.4-6.2 41.7-.5 4.5-.6 8.9-.5 11.4-2.7 1.2-8.1 1.4-9.5 1.4-.6 0-.9-3.8-.7-7.2.1-1.1.3-2.7.3-2.9-4.2 6.7-9.9 10.1-16.3 10.1zm5.5-8.6c3.7 0 11-6.8 13.1-18.8.1-.7.3-1.9.5-2.7-1.1-1-2.5-1.7-4.7-1.7-8.4 0-12.1 10-12.1 17.3-.1 3.9 1.3 5.9 3.2 5.9zM447.6 156.7c.1-1.7 1.1-4.7 2-5.7 3.9-1.2 11.3-2.3 16.1-2.3 11.2 0 19.5 4.2 19.5 16.6 0 10.6-8.5 17.2-17.4 17.2-1.1 0-2.7-.2-3.7-.6-1.6-.7-2.7-4.3-2.8-6.1l.1-.2c.5.1 2.1.2 2.8.2 6.1 0 9.8-4.2 9.8-10.3 0-5.6-2.7-9.9-8.8-9.9-.7 0-1.7 0-2.2.1-2.1 14.9-4.2 30.1-6.1 45.2-1.6.4-7 .7-9 .7-1.4 0-2.1-.2-1.9-1.7 2-13.3 4.4-30.3 6.2-43.6-1.9.2-3.9.6-4.5.7l-.1-.3zM501.9 175.2c4.4-9.8 9.6-12 13-12 1.1 0 2.7.7 3.5 1.5.3 2.7-1.8 8.2-3.7 10.3-1-.5-2.2-1-3.7-1-2.8 0-8.4 4.4-11.9 23.3-.2 1.6-.7 2.2-1.7 2.7-1.4.8-7 1.5-9.6 1.6 1.2-6.8 3.4-20.7 4.2-28.8.3-2.1.3-5.9.2-7.4 1.6-.7 7.8-2.2 9.2-2.2.7 0 1.3 4.6.2 12h.3zM539.6 163.3c9.9 0 14.3 6.3 14.3 14.8 0 13.5-8.6 23.9-21.8 23.9-9.3 0-14.1-4.7-14.1-14.5-.1-13.2 7.7-24.2 21.6-24.2zm-1.3 6.6c-5.5 0-9.1 9.1-9.1 18.5 0 3.7 1.2 6.8 4.3 6.8 5.3 0 9.1-8.6 9.1-18.8.1-3-.9-6.5-4.3-6.5zM573.6 163.3c.9 0 1.2 1.1.6 5.2-1.1 8.5-3.1 21.1-4.5 30.9-2.4 15.9-10.3 19.2-16.1 19.2-1.3 0-3-.2-3.8-.8-2-1.4-2.2-5.6-1.5-7.1 1.1.3 2.2.3 3.1.3 3.7 0 6.6-2.7 8-11.1 1.2-7.5 2.7-16.9 3.4-22.1.9-6.7 1.2-10.8 1.2-12.3 1.4-.8 7.9-2.2 9.6-2.2zm-2.9-17.5c2.7 0 5.1 1.2 5.2 5.5.1 4.4-3 6.6-6 6.6-2 0-4.8-1.2-5-5.4 0-5 3.9-6.7 5.8-6.7zM600.2 163.3c6.6 0 10.1 3.8 10.1 8.7 0 10.2-13.1 13.9-20.6 14.4v1.1c0 4.1 1.7 6.4 5.7 6.4 4.8 0 8.9-2.7 11.5-5 .7.5 1.1 1.7 1.1 3.2 0 1.8-.6 3.5-1.5 4.5-2.4 2.7-7.2 5.4-14.5 5.4-9.1 0-12.7-5.7-12.7-14.4 0-12.1 8-24.3 20.9-24.3zm-1.8 6.3c-3.1 0-6.9 3.3-8.2 10.3 7.6-.6 11.1-4.2 11.1-7.3 0-1.3-.7-3-2.9-3zM636.6 163.3c3.2 0 6.1.7 7.6 2.2.3 2.3-1.8 6.1-3.2 6.1-1.6-.6-3.1-.9-4.9-.9-7.6 0-11.3 7.8-11.3 15.5 0 4.8 1.7 7.7 5.5 7.7 4.1 0 8.2-2.7 10.5-4.8.6.4 1.3 1.7 1.3 3.2 0 1.7-.5 3.2-2 4.7-2.7 2.7-7.1 4.9-13.6 4.9-7.5 0-12.6-4.2-12.6-14.1.1-12.9 8.7-24.5 22.7-24.5zM669.2 190.3c.5 1.8-.3 6.2-1.9 7.6-2.7 2.7-6.4 4-10.8 4-5.2 0-8.2-3.7-6.8-12.8.9-5.9 2.2-12.9 2.8-17.3h-5.4c0-2.3 1.5-6.9 3.5-6.9h3c1.3-7 3.1-8.6 4.6-9.4 1.2-.6 5.1-1.5 7.6-1.5-.5 2.9-1.2 7.1-2 10.9 5.1 0 7.9-.1 9.3-.2-.4 2.7-1.2 5.2-3.1 6.4-1.4.8-4.2.7-7.4.7-.9 5.2-2.2 14.5-2.7 17.7-.5 2.8.3 4.2 1.7 4.2 2.1 0 5-1.5 7.5-3.6l.1.2z"></path>
                    </g>
                </svg>
                <!--[if lt IE 8]><img src="<?php echo $templateUrl ?>/images/logo_vision_21.png" alt="Vision 21 Logo"/><![endif]-->
            </a>

            <section class="header-search dropdown">
                <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                    Search
                </button>
                <jdoc:include type="modules" name="position-0" />
            </section>

            <button type="button" class="btn btn-primary navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                MENU
            </button>

        </div>
    </header>
    <!--Nav-->
    <div class="nav-outer">
        <div class="container">
            <nav id="navbar" class="container collapse navbar-collapse">
                <a href="/" class="icon-home">
                    <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 300.7 248" overflow="scroll" role="link" aria-labelledby="title">
                        <title>Home</title>
                        <path d="M232.1 75V21.2h-55v6.4L150.3 4.4 3.9 130.8h54.4v116h184v-116h54.4L232.1 75zm-4.8 40.8v116h-47v-83.2h-60v83.2h-47v-116H44.2l106.1-91.6 41.8 36v-24h25v45.7l39.3 34h-29.1z"></path>
                    </svg>
                </a>
                <jdoc:include type="modules" name="main-nav" />
            </nav>
        </div>
    </div>

    <!--Hero Image-->
    <?php if($isHome): ?>
    <section class="hero">
        <picture>
            <source media="(max-width: 767px)"
            srcset="<?php echo $templateUrl ?>/images/hero/row_of_kids_320.jpg 320w, <?php echo $templateUrl ?>/images/hero/row_of_kids_569.jpg 569w, <?php echo $templateUrl ?>/images/hero/row_of_kids_768.jpg 768w">
            <source media="(min-width: 768px) and (max-width: 991px)"
            srcset="<?php echo $templateUrl ?>/images/hero/row_of_kids_1747.jpg">
            <source media="(min-width: 992px) and (max-width: 1273px)"
            srcset="<?php echo $templateUrl ?>/images/hero/row_of_kids_2621.jpg">
            <source media="(min-width: 1274px)"
            srcset="<?php echo $templateUrl ?>/images/hero/row_of_kids_3494.jpg">
            <img srcset="<?php echo $templateUrl ?>/images/hero/row_of_kids_3494.jpg 3494w"
            src="<?php echo $templateUrl ?>/images/hero/row_of_kids_3494.jpg"
            alt="Row of kids laying on white floor"
            title="Happy Group of Kids" />
        </picture>

        <div class="hero-text-wrapper">
            <div class="hero-text hero-text-1 reveal">
                Healing Individuals,
                <br />Families & Communities
            </div>
            <div class="hero-text hero-text-2">Informed Decision Making</div>
            <div class="hero-text hero-text-3">Linked Systems of Care</div>
        </div>
    </section>
    <?php endif; ?>

    <!--Content-->
    <div class="container">
        <jdoc:include type="message" />
        <main>
            <jdoc:include type="component" />
        </main>
    </div>

    <?php if($showContentBottom): ?>
    <div class="bkgd-gray-light">
        <div class="container">
            <jdoc:include type="modules" name="content-bottom" />
        </div>
    </div>
    <?php endif; ?>

    <!--Footer-->
    <footer>
        <div class="footer-inner container">
            <div class="row">
                <section class="col-md-4 footer-1 clearfix">
                    <jdoc:include type="modules" name="footer-1" style="xhtml" />
                </section>
                <section class="col-md-4 footer-2 border-white">
                    <jdoc:include type="modules" name="footer-2" style="xhtml" />
                </section>
                <section class="col-md-4 footer-branding">
                    <a href="/" title="Go to Home Page">
                        <svg role="presentation">
                            <title>Vision 21 OVC-Funded Project Logo</title>
                            <use xlink:href="<?php echo $templateUrl ?>/images/svgs/sprite.svg#logo-vision-21"></use>
                        </svg>
                        <!--[if lt IE 8]><img src="<?php echo $templateUrl ?>/images/logo_vision_21.png" alt="Vision 21 Logo"/><![endif]-->
                    </a>
                </section>
            </div>
            <section class="row disclaimer">
                <div class="col-xs-12">
                    <jdoc:include type="modules" name="footer-3" />
                </div>
            </section>

        </div>
    </footer>


    <script src="<?php echo $templateUrl ?>/js/build/main.min.js"></script>
</body>
</html>
