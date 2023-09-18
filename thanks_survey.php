<?php 
/*
Template Name: Страница спасибо | Квиз
Template Post Type: page
*/
$button = get_field('button', 251);

get_header();
?>

<main>
    <section class="thanks">
        <?php the_content();?>
        <a href="<?php echo $button['file'];?>" class="button"><?php echo $button['text'];?></a>
    </section>
</main>

<?php get_footer();?>