<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <main class="layout">
        <?php
        $terms = get_field('tag');
        if( $terms ): ?>
            <ul>
                <?php foreach( $terms as $term ): ?>
                    <li>
                        <p><?php echo esc_html( $term->name ); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <section class="singleModule">
                <div class="singleModule__content">
                <h2 class="singleModule__title title"><?= get_field( 'title' ); ?></h2>
                <p class="singleModule__info"> <?= get_field( 'presentation' ); ?></p>
                </div>
                <div class="singleModule__image">
                    <?php
                    $image = get_field('short_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                    ?>
                    <?php
                    $image = get_field('short_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                    ?>
                </div>
                 <a href="<?= get_field("link")?>" class="singleModule__link"></a>
        </section>

    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>