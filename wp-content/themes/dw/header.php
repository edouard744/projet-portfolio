<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title( '·', false, 'right' ) . get_bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_mix( 'css/main.css' ); ?>"/>
    <meta name="keywords" content="HTML,CSS,JavaScript,CV,WordPress,Portfolio">
    <meta name="author" content="Willems Edouard">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
<header class="header">
    <a class="logo__hidden" href="https://willems-edouard.be/">Accueil
    <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="240.903" height="133.689" viewBox="0 0 240.903 133.689"><path d="M158.975,76.837l16.633-26.68,19.908,8.083-37.31,20.343ZM107.251,78.67,121.806,49.15l14.063,28.708L121.4,106.891ZM24.637,21.578H53.685L82.231,78.994,68.282,107.215ZM235.877,0,175.885.326l0,.005h-.671L148.406,51.745,134.457,23.524l-24.978-.649L94.558,53.368,68.234.331H16.943L0,20.987,56.144,132.355H80.812l14.07-28.383L108.9,132.355h.745l0,.005,106.528.326.815-22.983-70.976.225.907-3.36,69.655-37.887.724-19.707L183.646,34.557l5.216-11.41,50.858-.326Z" transform="translate(0.593 0.502)" stroke="#ededed" stroke-width="1"/></svg>
    </a>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="960" height="960" viewBox="0 0 960 960"><defs><linearGradient id="a" x1="0.888" y1="0.148" x2="0.21" y2="0.898" gradientUnits="objectBoundingBox"><stop offset="0" stop-color="#A2CC3EFF"/><stop offset="1" stop-color="#404f20"/></linearGradient></defs><circle cx="480" cy="480" r="480" fill="url(#a)"/></svg>

    <nav class="header__nav nav menu-wrap">
        <h2 class="nav__title hidden"><?= __( 'Navigation principale', 'dw' ); ?></h2>
        <input type="checkbox" class="toggler">
        <div class="hamburger"><div></div></div>
        <div class="menu">
            <div>
                <div>
        <ul class="nav__container">
			<?php foreach ( dw_get_menu_items( 'primary' ) as $link ): ?>
                <li class="<?= $link->getBemClasses( 'nav__item' ); ?>">
                    <a href="<?= $link->url; ?>"
						<?= $link->title ? ' title="' . $link->title . '"' : ''; ?>
                       class="nav__link"
                    >
						<?= $link->label; ?>
                    </a>
					<?php if ( $link->hasSubItems() ): ?>
                        <ul class="nav__subcontainer">
							<?php foreach ( $link->subitems as $sub ): ?>
                                <li class="<?= $sub->getBemClasses( 'nav__subitem' ); ?>">
                                    <a href="<?= $sub->url; ?>"
										<?= $sub->title ? ' title="' . $sub->title . '"' : ''; ?>
                                       class="nav__link"
                                    >
										<?= $sub->label; ?>
                                    </a>
                                </li>
							<?php endforeach; ?>
                        </ul>
					<?php endif; ?>
                </li>
			<?php endforeach; ?>
        </ul>
                </div>
            </div>
        </div>
    </nav>
</header>