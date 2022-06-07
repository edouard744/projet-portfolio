<?php /* Template Name: home */ ?>
<?php get_header(); ?>

    <main class="main">
        <section class="intro section">
            <div class="intro__card">
                <p><span>Bonjour</span>, je m'appelle</p>
                <h1 class="intro__main--title js">Willems Edouard</h1>
                <p class="intro__content js">Web Développeur</p>
            </div>
            <div class="intro__card">
                <?php
                $picture = get_field('profile_picture');
                $attr= "alt";
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $picture ) {
                    echo wp_get_attachment_image( $picture, $size, $attr );
                }
                ?>
            </div>
        </section>

        <section class="presentation section">
            <div class="presentation__box">
            <h2 class="presentation__title  js "><?= __( 'A propos de moi', 'dw' ); ?></h2>
            <p class="presentation__article--content">Jeune diplômé d’un bachelier en technique graphique finalité web, je suis un passionné de graphisme et développement web.Très curieux de toujours en savoir plus dans le monde du web et de ce qui l’entoure, j’aime pouvoir être fière d’un travail bien fait  </p>
            <a href="#">Mon CV</a>
            </div>
        </section>
        <section class="layout__module module section">
            <h2 class="module__mainTitle module__title"><?= __( 'Mes projets', 'dw' ); ?></h2>
            <div class="module__container">
				<?php
				if ( ( $modules = dw_get_modules( 2 ) )->have_posts() ): while ( $modules->have_posts() ): $modules->the_post();
					dw_include( 'module' );
				endwhile;
				else: ?>
                    <p class="module__empty"><?= __( 'Aucun module pour l’instant...', 'dw' ); ?></p>
				<?php endif; ?>
            </div>
            <a class="module__other" href="#">Voir tous mes projets</a>
        </section>

        <section class="contact section">
            <h2 class="contact__title">Contactez-<span class="thin">moi</span></h2>
            <p class="contact__content">Besoin d'une information ? Vous êtes intéressez pour une <b>collaboration</b> ? Alors <b>Contactez-moi !</b></p>
            <?php echo apply_shortcodes( '[contact-form-7 id="64" title="Contact" html_class="form contact-form"]' ); ?>
        </section>
    </main>
<?php get_footer(); ?>