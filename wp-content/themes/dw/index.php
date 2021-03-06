<?php /* Template Name: home */ ?>
<?php get_header(); ?>

    <main class="main" itemscope itemtype="https://schema.org/Person" >

        <section class="intro section">
            <div class="intro__card">
                <p class="intro__hello"><span class="intro__border">Bonjour</span>, je m'appelle</p>
                <h1 class="intro__main--title js" "><span itemprop="familyName">Willems</span> <span itemprop="givenName">Edouard</span></h1>
                <p class="intro__content js" itemprop="jobTitle">Web Développeur</p>
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

        <section class="presentation section ">
            <div class="presentation__box js">
            <h2 class="presentation__title  js "><?= __( 'A propos de moi', 'dw' ); ?></h2>
            <p class="presentation__article--content" itemprop="knowsAbout">Jeune diplômé d’un bachelier en techniques graphiques, finalité web. Passionné de graphisme et développement web, je suis curieux d'en savoir toujours plus dans le monde du web. J’aime pouvoir être fier d’un travail bien fait.</p>
                <a itemscope itemtype="https://schema.org/Product" href="https://cv.willems-edouard.be"><span itemprop="name">Mon CV</span></a>
            </div>
            <svg class="red" xmlns="http://www.w3.org/2000/svg" width="808" height="808" viewBox="0 0 808 808">
                <circle id="Ellipse_3" data-name="Ellipse 3" cx="404" cy="404" r="404" fill="#a25959"/>
            </svg>
        </section>


        <section class="layout__module module section">
            <h2 class="module__mainTitle module__title js"><?= __( 'Mes projets', 'dw' ); ?></h2>
            <div class="module__container js">
				<?php
				if ( ( $modules = dw_get_modules( 2 ) )->have_posts() ): while ( $modules->have_posts() ): $modules->the_post();
					dw_include( 'module' );
				endwhile;
				else: ?>
                    <p class="module__empty"><?= __( 'Aucun module pour l’instant...', 'dw' ); ?></p>
				<?php endif; ?>
            </div>
            <a class="module__other js" href="https://willems-edouard.be/galerie-projets/">Voir tous mes projets</a>
            <svg class="brown" xmlns="http://www.w3.org/2000/svg" width="881" height="881" viewBox="0 0 881 881">
                <circle id="Ellipse_4" data-name="Ellipse 4" cx="440.5" cy="440.5" r="440.5" fill="#a27b59"/>
            </svg>

        </section>

        <section class="contact section">
            <h2 class="contact__title">Contactez-<span class="thin">moi</span></h2>
            <p class="contact__content">Besoin d'une information ? Vous êtes intéressé par une <b>collaboration</b> ? Alors <b>Contactez-moi !</b></p>
            <?php echo apply_shortcodes( '[contact-form-7 id="64" title="Contact" html_class="form contact-form"]' ); ?>
        </section>
    </main>
<?php get_footer(); ?>