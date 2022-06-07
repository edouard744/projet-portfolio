<article class="module__card dev__card">


    <a href="<?= get_the_permalink(); ?>" class="module__link">
        <?php
        $image = get_field('short_image');
        $attr= "alt";
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {
            echo wp_get_attachment_image( $image, $size, $attr );
        }
        ?>
        <div class="module__box">
        <h3 class="module__title"><?= get_field( 'title' ); ?></h3>
        <?php
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
        <p class="module__presentation"><?= get_field( 'short_presentation' ); ?></p>
        <p class="module__linkSite"><?= __( 'A propos du projet', 'dw' ); ?></p>
    </div>
    </a>
</article>