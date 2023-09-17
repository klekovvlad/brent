<?php 
/*
Template Name: Страница с квизом
Template Post Type: page
*/

get_header(); 

$manager = get_field('manager');
$gift = get_field('gift');

function get_img($array, $class) {
    if($array['img']) {
        return '<div class="' . $class . '"><img src="' . $array['img']['url'] . '" alt="' . $array['img']['alt'] . '"></div>';
    }else{
        return '';
    }
}
?>

<main class="survey">
    <section class="survey-wrapper">
        <div class="survey-content">
            <div class="survey-content-wrapper">
                <div class="loader"></div>
            </div>
            <div class="survey-content-bottom">
                <div class="survey-progress">
                    <div class="survey-progress-persent">Готово: <span class="value">0%</span></div>
                    <div class="survey-progress-track">
                        <div class="survey-progress-track-line"></div>
                    </div>
                </div>
                <div class="survey-buttons">
                    <button data-action="prev" class="survey-button-prev button-prev"></button>
                    <button data-action="next" class="survey-button-next button">Далее</button>
                </div>
            </div>
        </div>

        <div class="survey-aside">
            <?php if($manager['name']) { ?>
                <div class="survey-manager">
                    <?php echo get_img($manager, 'survey-manager-img'); ?>
                    <div class="survey-manager-name"><?php echo $manager['name'];?></div>
                    <div class="survey-manager-profession"><?php echo $manager['profession'];?></div>
                </div>
                <div class="survey-manager-message"><?php echo $manager['message'];?></div>
            <?php } ?>

            <?php if($gift['item']) { ?>
                <div class="survey-gift">
                    <div class="survey-gift-term"><?php echo $gift['term'];?></div>
                    <div class="survey-gift-item">
                        <?php echo get_img($gift, 'survey-gift-img');?>
                        <div class="survey-gift-text"><?php echo $gift['item'];?></div>
                    </div>
                </div>
            <?php } ?>
            
        </div>
    </section>
</main>

<?php echo do_shortcode('[contact-form-7 id="7d811e1" title="Квиз"]');?>

<?php get_footer(); ?>