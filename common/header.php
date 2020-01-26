<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>

<link rel="stylesheet" type="text/css" href="style.css">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { 
            $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>

    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        queue_css_file('lib/bootstrap.min');
        queue_css_file('style');
        echo head_css();

        echo theme_header_background();
    ?>

    <?php
        ($backgroundColor = get_theme_option('background_color')) || ($backgroundColor = "#FFFFFF");
        ($textColor = get_theme_option('text_color')) || ($textColor = "#444444");
        ($linkColor = get_theme_option('link_color')) || ($linkColor = "#888888");
        ($buttonColor = get_theme_option('button_color')) || ($buttonColor = "#000000");
        ($buttonTextColor = get_theme_option('button_text_color')) || ($buttonTextColor = "#FFFFFF");
        ($titleColor = get_theme_option('header_title_color')) || ($titleColor = "#000000");
    ?>

 <style>
        body {

            background-color: <?php echo $backgroundColor; ?>;
            color: <?php echo $textColor; ?>;
        }
        #site-title a:link, #site-title a:visited,
        #site-title a:active, #site-title a:hover {
            color: <?php echo $titleColor; ?>;
            <?php if (get_theme_option('header_background')): ?>
            text-shadow: 0px 0px 20px #000;
            <?php endif; ?>
        }

    </style>

    <!-- Need more JavaScript files? Include them here -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <div style="display:none"><a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a></div>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>


        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                    <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
                    <h1 class="site-title"><?php echo link_to_home_page(theme_logo()); ?></h1>
                    
            </div>

            <div class="col-md-9">
                <div id="searchbox" class="navbar-form navbar-right" role="search">
                            <?php echo search_form(array('show_advanced' => false)); ?>
                </div>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <nav role="navigation" class="navbar">
                    <ul class="nav nav-pills nav-stacked">   
                          <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="/exhibits/show/about">about <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="/exhibits/show/staff">staff</a></li>
                              <li><a href="/exhibits/show/infomercial">ics infomercial</a></li>
                              <li><a href="/exhibits/show/blog">ics logbooks</a></li>
                              <li><a href="/exhibits/show/blog">ics logbooks</a></li>
                            </ul>
                          </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="/exhibits/show/case-study">case studies <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="/exhibits/show/fcb">franklin crosby bearse</a></li>
                              <li><a href="/contact">stuart saunders</a></li>
                            <li><a href="/exhibits/show/lexington">ics office: lexington, va</a></li>
                            <li><a href="/exhibits/show/prattsville">ics office: prattsville, ny</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/exhibits/show/clew-registry">clew registry <span class="caret"></span></a>        
                           <ul class="dropdown-menu">
                            <li><a href="/exhibits/show/clew-registry/musings">more musings</a></li>
                            </ul>
                        </li>
                        <li><a href="/exhibits/show/clew-archives/archives">clew archives</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                 <main id="content" role="main">
                      
                        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
