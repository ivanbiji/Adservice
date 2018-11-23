<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

    <title>Home - OAS</title>

    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
</head>

<body>
    <header class="cd-main-header">
        <div class="cd-main-header__logo"><a href="#0"><img src="{{ asset('/img/cd-logo.svg') }}" alt="Logo"></a></div>

        <nav class="cd-main-nav js-main-nav">
            <ul class="cd-main-nav__list js-signin-modal-trigger">
                <!-- inser more links here -->
                <li><a class="cd-main-nav__item cd-main-nav__item--signin" href="#0" data-signin="login">Sign in</a></li>
                <li><a class="cd-main-nav__item cd-main-nav__item--signup" href="#0" data-signin="signup">Sign up</a></li>
            </ul>
        </nav>
    </header>



    <div class="cd-signin-modal js-signin-modal">
        <!-- this is the entire modal form, including the background -->
        <div class="cd-signin-modal__container">
            <!-- this is the container wrapper -->
            <ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
                <li><a href="#0" data-signin="login" data-type="login">Sign in</a></li>
                <li><a href="#0" data-signin="signup" data-type="signup">New account</a></li>
            </ul>

            <div class="cd-signin-modal__block js-signin-modal-block" data-type="login">
                <!-- log in form -->
                <form class="cd-signin-modal__form">
                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace"
                            for="signin-email">E-mail</label>
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
                            id="signin-email" type="email" placeholder="E-mail">
                        <span class="cd-signin-modal__error">Error message here!</span>
                    </p>

                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace"
                            for="signin-password">Password</label>
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
                            id="signin-password" type="text" placeholder="Password">
                        <a href="#0" class="cd-signin-modal__hide-password js-hide-password">Hide</a>
                        <span class="cd-signin-modal__error">Error message here!</span>
                    </p>

                    <p class="cd-signin-modal__fieldset">
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" value="Login">
                    </p>
                </form>

            </div> <!-- cd-signin-modal__block -->

            <div class="cd-signin-modal__block js-signin-modal-block" data-type="signup">
                <!-- sign up form -->
                <form class="cd-signin-modal__form">
                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace"
                            for="signup-username">Username</label>
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
                            id="signup-username" type="text" placeholder="Username">
                        <span class="cd-signin-modal__error">Error message here!</span>
                    </p>

                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace"
                            for="signup-email">E-mail</label>
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
                            id="signup-email" type="email" placeholder="E-mail">
                        <span class="cd-signin-modal__error">Error message here!</span>
                    </p>

                    <p class="cd-signin-modal__fieldset">
                        <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace"
                            for="signup-password">Password</label>
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
                            id="signup-password" type="text" placeholder="Password">
                        <a href="#0" class="cd-signin-modal__hide-password js-hide-password">Hide</a>
                        <span class="cd-signin-modal__error">Error message here!</span>
                    </p>

                    <p class="cd-signin-modal__fieldset">
                        <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding"
                            type="submit" value="Create account">
                    </p>
                </form>
            </div> <!-- cd-signin-modal__block -->

            <a href="#0" class="cd-signin-modal__close js-close">Close</a>
        </div> <!-- cd-signin-modal__container -->
    </div> <!-- cd-signin-modal -->

    @if ($errors->any())
    <div class="error_area_home container">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <script src="{{ asset('/js/placeholders.min.js') }}"></script>
    <!-- polyfill for the HTML5 placeholder attribute -->
    <script src="{{ asset('/js/main.js') }}"></script> <!-- Resource JavaScript -->
</body>

</html>
