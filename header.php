<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.png" type="image/png">
    <?php wp_head();?>
</head>
<body>
    
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