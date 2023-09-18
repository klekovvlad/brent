<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="/media/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/media/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/media/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/media/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/media/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/media/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/media/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/media/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/media/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/media/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/media/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/media/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/media/favicon-16x16.png">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/media/favicon.ico" type="image/x-icon">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head();?>
</head>
<body>
    
<?php $id = get_the_ID(); if($id !== 399 && $id !== 428) { ?>
    <header class="header">
        <div class="header-wrapper">
            <div class="header-logo">
                <?php echo the_custom_logo();?>
                <div class="header-logo-text">
                    <?php the_field('logo', 7);?>
                </div>
            </div>

            <div class="header-nav">
                <div class="header-nav-item">
                    <div class="header-nav-adress">
                        <?php echo getAdress(); ?>
                    </div>
                    <div class="header-nav-adress"><?php the_field('work-times', 7);?></div>
                </div>
                <div class="header-nav-item">
                    <a href="tel:<?php the_field('phone');?>" class="header-nav-contact"><?php the_field('phone', 7);?></a>
                    <a href="mailto:<?php the_field('email');?>" class="header-nav-contact"><?php the_field('email', 7);?></a>
                </div>

                <?php echo getSocialWebLinks();?>

                <?php 
                    $header_btn = get_field('header-btn', 7);

                    echo getButton($header_btn['text'], 'button__transparent popup-open', $header_btn['action']);
                ?>
            </div>

            <a href="tel:<?php the_field('phone');?>" class="header-phone-mobile"><?php the_field('phone', 7);?></a>

            <button class="mobile-nav">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>
<?php } ?>