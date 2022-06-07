<article class="actuality__card news__card">
	<?php

	$image = get_field('img');

	if( !empty($image) ):

		// vars
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];

		// thumbnail
		$size = 'thumbnail';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];

		if( $caption ): ?>

            <div class="wp-caption">

		<?php endif; ?>
        <a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
            <img class="actuality__img" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
        </a>
		<?php if( $caption ): ?>
        </div>
	<?php endif; ?>

	<?php endif; ?>
    <a href="<?= get_field( 'link' ); ?>" class="actuality__link">
    <div class="actuality__box">
    <h3 class="actuality__title"> <?= get_field( 'title' ); ?></h3>
    <p class="actuality__content"><?= get_field( 'presentation' ); ?></p>
    <p class="actuality__hidden">Lire l’article</p>
    </div>
    </a>
</article>