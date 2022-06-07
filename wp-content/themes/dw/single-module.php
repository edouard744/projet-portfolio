<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <main class="layout">

        <section class="singleModule section">
                <div class="singleModule__content">
                    <svg class="red" xmlns="http://www.w3.org/2000/svg" width="808" height="808" viewBox="0 0 808 808">
                        <circle id="Ellipse_3" data-name="Ellipse 3" cx="404" cy="404" r="404" fill="#a25959"/>
                    </svg>
                <h2 class="singleModule__title title"><?= get_field( 'title' ); ?></h2> <?php
                    $terms = get_field('tag');
                    if( $terms ): ?>
                        <ul class="module__list">
                            <?php foreach( $terms as $term ): ?>
                                <li class="module__item">
                                    <p class="module__tag"><?php echo esc_html( $term->name ); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                <p class="singleModule__info"> <?= get_field( 'presentation' ); ?></p>
                </div>
                <div class="singleModule__image splitLayout">
                    <div class="splitLayout__box">

                    <?php
                    $image = get_field('short_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                    ?>
                    </div>
                    <div class="splitLayout__box">
                    <?php
                    $image = get_field('short_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                    ?>
                        <svg class="brown" xmlns="http://www.w3.org/2000/svg" width="881" height="881" viewBox="0 0 881 881">
                            <circle id="Ellipse_4" data-name="Ellipse 4" cx="440.5" cy="440.5" r="440.5" fill="#a27b59"/>
                        </svg>
                    </div>

                </div>

                 <a href="<?= get_field("link")?>" class="singleModule__link"></a>
        </section>

    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>