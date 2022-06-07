<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio Contact</title>
</head>
<body>
<h1 class="document__title">Portfolio Contact</h1>
<header class="header">
    <nav class="nav">
        <h2 class="nav__title">Navigation principal</h2>
        <a class="nav__link" href="index.php">Accueil</a>
        <a class="nav__link" href="projet.php">Projets</a>
        <a class="nav__link" href="contact.php">Contact</a>
    </nav>
</header>
<main class="main">
    <section class="intro">
        <h2 class="intro__title">Contactez-moi</h2>
        <p class="intro__tagline">Besoin d'une information? Vous êtes intéressez pour une collaboration? Alors Contactez-moi !</p>
    </section>
    <section class="form">
        <h2 class="form__titl">Formulaire de contact</h2>
        <form action="contact.php" method="get" class="contact__form form" id="contact">
            <div class="form__field">
                <label for="firstname" class="form__label">Votre prénom</label>
                <input type="text" name="firstname" id="firstname" class="form__input" placeholder="insérer ici votre prénom">
            </div>
            <div class="form__field">
                <label for="lastname" class="form__label">Votre nom</label>
                <input type="text" name="lastname" id="lastname" class="form__input" placeholder=" insérer ici votre prénom">
            </div>
            <div class="form__field">
                <label for="email" class="form__label">Votre adresse e-mail</label>
                <input type="email" name="email" id="email" class="form__input" placeholder="insérer ici votre adress mail">
            </div>
            <div class="form__field">
                <label for="phone" class="form__label">Votre numéro de téléphone</label>
                <input type="tel" name="phone" id="phone" class="form__input" placeholder="insérer ici votre numéro de téléphone">
            </div>
            <div class="form__field">
                <label for="message" class="form__label">Votre message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form__input"> </textarea>
            </div>
            <div class="form__field">
                <label for="rules" class="form__checkbox">
                   <!-- <input type="checkbox" name="rules" id="rules" value="1" />-->
                  <!--  <span class="form__checklabel">J'accepte les <a href="#">conditions générales d'utilisation</a>.</span>-->
                </label>
            </div>
            <div class="form__actions">
                <!-- <input type="hidden" name="action" value="submit_contact_form"/>-->
                <button class="form__button" type="submit">Envoyer</button>
            </div>
        </form>
    </section>
</main>
<footer class="footer">
    <section class="footer__container">
        <h2 class="footer__title">zone de contact et d'informations</h2>
        <ul class="footer__links">
            <li class="footer__link"><a href="contact.php">contact</a></li>
            <li class="footer__link"><a href="https://cv.willems-edouard.be">Mon CV</a></li>
            <li class="footer__link"><a href="https://www.linkedin.com/in/edouard-willems-9a8b17226/">linkedIn</a></li>
        </ul>
    </section>

</footer>

</body>
</html>