    <?php 
    $footer_logo = get_field('logo-footer', 7); 
    $footer_btn = get_field('footer-btn', 7);
    $map = get_field('map', 7);
    $forms = get_field('forms', 7);
    $id = get_the_ID();

    ?>

    <?php if(!$map['hide'] && $id !== 226) { ?>
        <section class="map">
            <h2 class="animation animation-left"><?php echo $map['title'];?></h2>
            <div class="map-wrapper">
                
                    <?php if($map['img']['url']) { ?>
                        <div class="map-inner animation animation-left" data-iframe="<?php echo $map['iframe'];?>">
                            <img src="<?php echo $map['img']['url'];?>" alt="<?php echo $map['img']['alt'];?>">
                        </div>
                    <?php } else { ?>
                        <div class="map-inner animation animation-left">
                            <iframe loading="lazy" src="<?php echo $map['iframe'];?>" frameborder="0"></iframe>
                        </div>
                    <?php } ?>
                
                <div class="form animation animation-right">
                    <div class="form-title"><?php echo $forms['consultation']['title'];?></div>
                    <div class="form-subtitle"><?php echo $forms['consultation']['subtitle'];?></div>
                    <?php echo do_shortcode('[contact-form-7 id="46d385a" title="Основная форма"]'); ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <footer class="footer">
        <div class="footer-wrapper">
            <div class="footer-top">
                <a href="/" class="logo">
                    <img src="<?php echo $footer_logo['url'];?>" alt="<?php echo $footer_logo['alt'];?>">
                    <?php the_field('logo', 7);?>
                </a>
                <div class="footer-inner">
                    <div class="footer-col">
                        <?php the_field('company', 7);?>
                    </div>
                    <div class="footer-col">
                        <div class="footer-adress"><?php echo getAdress(); ?></div>
                        <div class="footer-adress"><?php the_field('work-times', 7);?></div>
                    </div>
                    <div class="footer-col">
                        <a href="tel:<?php the_field('phone');?>" class="footer-contact"><?php the_field('phone', 7);?></a>
                        <a href="mailto:<?php the_field('email');?>" class="footer-contact"><?php the_field('email', 7);?></a>
                    </div>
                    <div class="footer-col">
                        <?php 
                            echo getButton($footer_btn['text'], 'button__white popup-open', $footer_btn['action']);
                            echo getSocialWebLinks();
                        ?>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <a href="/privacy">Пользовательское соглашение</a>
                <a href="/privacy-policy">Политика конфиденциальности</a>
            </div>
        </div>
    </footer>
    
    <div class="form-popup">
        <div class="form">
            <div class="form-close"></div>
            <div class="form-title"></div>
            <div class="form-subtitle"></div>
            <?php echo do_shortcode('[contact-form-7 id="46d385a" title="Основная форма"]');?>
        </div>
    </div>

    <a href="tel:<?php the_field('phone');?>" class="mobile-button"></a>

    <?php wp_footer();?>
</body>
</html>