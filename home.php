<?php 
/*
Template Name: Главная страница
Template Post Type: page
*/

$hero = get_field('hero');
$reasons = get_field('reasons');
$services = get_field('services');
$feedback = get_field('feedback');
$story = get_field('story');
$how = get_field('how');
$quiz = get_field('quiz');
$team = get_field('team');
$partners = get_field('partners');
$cases = get_field('cases');
$faq = get_field('faq');
$forms = get_field('forms');
?>

<?php get_header();?>

    <main>

        <?php if(!$hero['hide']) { ?>
            <section class="hero">

                <div class="hero-text">
                    <h1><?php echo $hero['title'];?></h1> 
                    <?php 
                        if($hero['desc']) { 
                            echo $hero['desc']; 
                        };
                        if($hero['button']['text']) {
                            echo getButton($hero['button']['text'], 'popup-open', $hero['button']['action']);
                        }
                    ?>
                </div>

                <?php if($hero['img']['url']) { ?>
                    <div class="hero-img">
                        <img src="<?php echo $hero['img']['url']; ?>" alt="<?php echo $hero['img']['alt']; ?>">
                        <?php if($hero['img-bg']['url']) { ?> 
                            <img src="<?php echo $hero['img-bg']['url'];?>" alt="<?php echo $hero['img-bg']['alt'];?>" class="img-bg">    
                        <?php }?>
                    </div>
                <?php } ?>

                <?php if(!$hero['numbers']['hide']) { ?>
                    <div class="hero-numbers">
                        <?php foreach($hero['numbers']['items'] as $item) { ?>
                            <div class="hero-number">
                                <div class="number" data-num="<?php echo $item['number'];?>">
                                    <span class="value">0</span>+
                                </div>
                                <div class="desc"><?php echo $item['desc'];?></div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </section>
        <?php } ?>
        
        <?php if(!$reasons['hide']) { ?>
            <section class="reasons">
                <h2 class="animation animation-left"><?php echo $reasons['title'];?></h2>
                <div class="reasons-wrapper">
                    <?php if($reasons['img']) { 
                        echo imgBox($reasons['img']);
                    } 
                    
                    foreach($reasons['items'] as $item) { ?>
                        <div class="reasons-item animation animation-bottom">
                            <img src="<?php echo $item['icon']['url'];?>" alt="<?php echo $item['icon']['alt'];?>">
                            <?php echo $item['desc'];?>
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php } ?>

        <?php if(!$services['hide']) { ?>
            <section class="services">
                <h2 class="animation animation-left"><?php echo $services['title'];?></h2>
                <div class="services-wrapper">
                    <?php foreach($services['items'] as $item) { 
                        $activeClass = '';
                        if($item['accent']) {
                            $activeClass = 'services-item__accent';
                        } ?>

                        <div class="services-item <?php echo $activeClass;?> animation animation-bottom">
                            <h3><?php echo $item['title'];?></h3>
                            <?php echo $item['desc']; 
                            echo '<div class="services-item-price">Стоимость от ' . number_format($item['price'], 0, ' ', ' ') . ' руб./мес </div>';
                            echo getButton($item['button']['text'], 'popup-open', $item['button']['action']); 
                            if($item['accent']) { 
                                echo '<img class="img-bg" src="' . $services['img-bg']['url'] . '" alt="' . $services['img-bg']['alt'] . '">';
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php } ?>

        <?php if(!$feedback['hide']) { ?>
            <section class="feedback">
                <h2 class="animation animation-left"><?php echo $feedback['title'];?></h2>
                <div class="feedback-slider swiper animation animation-bottom">
                    <div class="swiper-wrapper">
                        <?php foreach($feedback['items'] as $item) { 
                            if($item['text']) { ?>
                                <div class="swiper-slide">
                                    <div class="feedback-item">
                                        <div class="feedback-top">
                                            <?php if($item['autor']['photo']['url']) { ?>
                                                <img src="<?php echo $item['autor']['photo']['url'];?>" alt="<?php echo $item['autor']['photo']['alt'];?>" class="feedback-photo">
                                            <?php } else { ?> 
                                                <div class="feedback-photo feedback-photo__default"></div>
                                            <?php } ?>
                                            <div class="feedback-info">
                                                <?php if($item['autor']['name']) { ?>
                                                    <h3><?php echo $item['autor']['name'];?></h3>
                                                <?php } else { ?>
                                                    <h3>Аноним</h3>
                                                <?php } ?>
                                                <?php echo check($item['autor']['city'], 'feedback-city', 'div'); ?>
                                                <?php if($item['money']) { ?>
                                                    <div class="feedback-money">Списано: <?php echo number_format($item['money'], 0, ' ', ' ');?>Р</div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="feedback-comment"><?php echo $item['text'];?></div>
                                        
                                        <div class="feedback-bottom">
                                            <div class="feedback-stars">
                                                <?php for($i = 0; $i < $item['stars']; $i++) { ?>
                                                    <div class="feedback-star"></div>
                                                <?php } ?>
                                            </div>

                                            <?php if($item['decision']) { 
                                                $urls = '';
                                                foreach($item['decision'] as $img) {
                                                    $urls = $urls . ',' . $img['url'];
                                                }
                                                ?>
                                                <button class="feedback-decision gallery-open" data-imgs="<?php echo $urls;?>">Решение суда</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } 
                        } ?>
                    </div>
                    <div class="feedback-buttons">
                        <?php echo getButton($feedback['button']['text'], 'popup-open animation animation-bottom', $feedback['button']['action']); ?>
                        <div class="slider-buttons animation animation-bottom">
                            <button class="slider-button slider-prev"></button>
                            <button class="slider-button slider-next"></button>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!$story['hide']) { ?>
            <section class="story">
                <div class="story-box animation animation-bottom">
                    <div class="story-title">
                        <h2><?php echo $story['title'];?></h2>
                        <?php echo the_custom_logo();?>
                    </div>
                    <div class="story-wrapper">
                        <div class="story-imgs">
                            <div class="story-slider swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach($story['imgs'] as $img) { ?>
                                        <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" class="story-img swiper-slide">
                                    <?php } ?>
                                </div>
                                <div class="slider-pagination"></div>
                            </div>
                        </div>
                        <div class="story-content">
                            <?php echo $story['desc'];?>
                            <?php echo getButton($story['button']['text'], 'popup-open', $story['button']['action']); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!$how['hide']) { ?>
            <section class="how">
                <h2 class="animation animation-left"><?php echo $how['title'];?></h2>
                <div class="how-wrapper">
                    <?php 
                    $how_index = 0;
                    foreach($how['items'] as $item) { 
                        $how_index++; ?>

                            <div class="how-item animation animation-bottom">
                                <div class="how-item-desc"><?php echo $item['desc'];?></div>
                                <div class="how-item-num"><?php echo '0' . $how_index;?></div>
                            </div>

                    <?php } ?>

                    <?php echo imgBox($how['img']);?>
                </div>
            </section>
        <?php } ?>

        <?php if(!$quiz['hide']) { ?>
            <section class="quiz">
                <div class="quiz-box animation animation-bottom">
                    <h2><?php echo $quiz['title'];?></h2>
                    <div class="quiz-wrapper">
                        <div class="quiz-slider-inner">
                            <div class="quiz-questions swiper">
                                <div class="swiper-wrapper">
                                    <?php $answer_index = 0; foreach($quiz['items'] as $item) { ?>
                                        <div class="quiz-item swiper-slide">
                                            <div class="question"><?php echo $item['question'];?></div>
                                            <div class="answers">
                                                <?php foreach($item['answers'] as $answer) { ?>
                                                    <?php if($answer['text-area']) { ?>
                                                        <input type="text" name="<?php echo $answer['answer'];?>" placeholder="<?php echo $answer['answer'];?>">
                                                    <?php } else if($answer['phone']) { ?>
                                                        <input type="tel" name="<?php echo $answer['answer'];?>" placeholder="<?php echo $answer['answer'];?>">
                                                    <?php } else { ?>
                                                        <div class="input">
                                                            <input type="radio" value="<?php echo $answer['answer'];?>" id="answer-<?php echo $answer_index;?>" name="<?php echo $item['question'];?>">
                                                            <label for="answer-<?php echo $answer_index;?>"><?php echo $answer['answer'];?></label>
                                                        </div>
                                                    <?php } ?>
                                                <?php $answer_index++; } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="quiz-buttons">
                            <button class="question-prev" data-action="prev">Предыдущий вопрос</button>
                            <?php echo getButton('Следующий вопрос', '', 'next'); ?>
                        </div>
                    </div>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="7d811e1" title="Квиз"]');?>
            </section>
        <?php } ?>

        <?php if(!$team['hide']) { ?>
            <section class="team swiper">
                <div class="team-title">
                    <h2 class="animation animation-left"><?php echo $team['title'];?></h2>
                    <div class="slider-buttons">
                        <button class="slider-button slider-prev"></button>
                        <button class="slider-button slider-next"></button>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <?php $team_index = 0; foreach($team['items'] as $item) { ?>
                        <?php if($team_index == 0) { ?>
                            <div class="swiper-slide team-col">
                                <div class="team-item animation animation-bottom">
                                    <img src="<?php echo $item['photo']['url'];?>" alt="<?php echo $item['photo']['alt'];?>">
                                    <div class="team-item-content">
                                        <div class="team-item-title"><?php echo $item['name'];?></div>
                                        <?php echo $item['desc'];?>
                                    </div>
                                </div>
                        <?php } else if($team_index == 1) { ?>
                                <div class="team-item animation animation-bottom">
                                    <img src="<?php echo $item['photo']['url'];?>" alt="<?php echo $item['photo']['alt'];?>">
                                    <div class="team-item-content">
                                        <div class="team-item-title"><?php echo $item['name'];?></div>
                                        <?php echo $item['desc'];?>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="team-item swiper-slide animation animation-bottom" >
                                <img src="<?php echo $item['photo']['url'];?>" alt="<?php echo $item['photo']['alt'];?>">
                                <div class="team-item-content">
                                    <div class="team-item-title"><?php echo $item['name'];?></div>
                                    <?php echo $item['desc'];?>
                                </div>
                            </div>
                        <?php } 
                    $team_index++; } ?> 
                </div>
            </section>
        <?php } ?>

        <?php if(!$partners['hide']) { ?>
            <section class="partners">
                <div class="partners-banner animation animation-left">
                    <?php echo $partners['desc'];?>
                    <?php echo getButton($partners['button']['text'], 'button__white popup-open', $partners['button']['action']); ?>
                    <img src="<?php echo $partners['img-bg']['url'];?>" alt="<?php echo $partners['img-bg']['alt'];?>">
                </div>
            </section>
        <?php } ?>

        <?php if(!$cases['hide']) { ?>
            <section class="cases swiper">
                <div class="cases-title">
                    <h2 class="animation animation-left"><?php echo $cases['title'];?></h2>
                    <div class="slider-buttons">
                        <button class="slider-button slider-prev"></button>
                        <button class="slider-button slider-next"></button>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <?php foreach($cases['items'] as $item) { 
                        $urls = '';
                        foreach($item['gallery'] as $img) {
                            $urls = $urls . ',' . $img['url'];
                        }
                        ?>
                        <div class="cases-item gallery-open swiper-slide animation animation-bottom" data-imgs="<?php echo $urls;?>">
                            <img src="<?php echo $item['gallery'][0]['url'];?>" alt="<?php echo $item['gallery'][0]['alt'];?>">
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php } ?>

        <?php if(!$faq['hide']) { ?>
            <section class="faq">
                <h2 class="animation animation-left"><?php echo $faq['title'];?></h2>
                <?php 
                    $items = $faq['items'];
                    $items_center = round(count($items) / 2);
                    $index = 1; ?>
                    <div class="faq-wrapper">
                        <div class="faq-items">
                            <?php foreach($items as $item) { ?>
                                <div class="faq-item animation animation-bottom">
                                    <div class="faq-question">
                                        <?php echo $item['question'];?>
                                        <div class="icon">
                                            <span></span><span></span>
                                        </div>
                                    </div>
                                    <div class="faq-answer"><?php echo $item['answer'];?></div>
                                </div>
                                <?php if($index == $items_center) { ?>
                                </div>
                                <div class="faq-items">
                                <?php } 
                            $index++; } ?>
                        </div>
                    </div>
            </section>
        <?php } ?>

    </main> 

<?php get_footer();?>