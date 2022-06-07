<?php /* Template Name: development */ ?>
<?php get_header(); ?>
	<main class="layout development section">
        <div class="svgRed">
		<h2 class="dev__title"><?= __('Mes projets', 'dw'); ?></h2>
        <svg class="red" xmlns="http://www.w3.org/2000/svg" width="808" height="808" viewBox="0 0 808 808">
            <circle id="Ellipse_3" data-name="Ellipse 3" cx="404" cy="404" r="404" fill="#a25959"/>
        </svg>
        </div>
            <div class="dev__container">
				<?php
				if(($modules = dw_get_modules(4))->have_posts()): while($modules->have_posts()): $modules->the_post();
					dw_include('module');
				endwhile; else: ?>
                    <p class="module__empty"><?= __('Aucun module pour l’instant...', 'dw'); ?></p>
				<?php endif; ?>

                <svg class="brown" xmlns="http://www.w3.org/2000/svg" width="881" height="881" viewBox="0 0 881 881">
                    <circle id="Ellipse_4" data-name="Ellipse 4" cx="440.5" cy="440.5" r="440.5" fill="#a27b59"/>
                </svg>
            </div>
	</main>

<?php get_footer(); ?>
