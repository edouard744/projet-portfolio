<article class="value__card splitLayout__box">
    <div class=" value__box value__contentBox">
        <h3 class="value__title"> <?= get_field( 'title' ); ?></h3>
        <p class="value__content"><?= get_field( 'content' ); ?></p>
    </div>
    <div class=" value__box value__imageBox">
	    <?php

	    $image = get_field('img');

	    if( !empty($image) ): ?>

            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

	    <?php endif; ?>
    </div>

</article>