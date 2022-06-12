<article class="module__card dev__card js" itemscope itemtype="https://schema.org/Product">


    <a href="<?= get_the_permalink(); ?>" class="module__link" itemprop="url">
        <span itemprop="image">
        <?php
        $image = get_field('short_image');
        $attr= "alt";
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {
            echo wp_get_attachment_image( $image, $size, $attr );
        }
        ?>
            </span>
        <div class="module__box">
        <h3 class="module__title js" itemprop="name"><?= get_field( 'title' ); ?></h3>
        <?php
        $terms = get_field('tag');
        if( $terms ): ?>
        <ul class="module__list">
            <?php foreach( $terms as $term ): ?>
                <li class="module__item js">
                    <p class="module__tag" itemprop="keywords"><?php echo esc_html( $term->name ); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <p class="module__presentation" itemprop="description"><?= get_field( 'short_presentation' ); ?></p>
        <p class="module__linkSite"><?= __( 'A propos du projet', 'dw' ); ?></p>
    </div>
    </a>
</article>