<?php /* Template Name: development */ ?>
<?php get_header(); ?>
	<main class="layout development section">
		<h2 class="dev__title"><?= __('Mes projets', 'dw'); ?></h2>
            <div class="module__container dev__container">
				<?php
				if(($modules = dw_get_modules(4))->have_posts()): while($modules->have_posts()): $modules->the_post();
					dw_include('module');
				endwhile; else: ?>
                    <p class="module__empty"><?= __('Aucun module pour l’instant...', 'dw'); ?></p>
				<?php endif; ?>
            </div>
	</main>

<?php get_footer(); ?>
