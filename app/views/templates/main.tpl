<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Opis domyślny"}">
    <title>{$page_title|default:"Kalkulator lokat"}</title>

<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css">
</head>
<body>

	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="index.html" id="logo">LibApp <em>by Kromoliński</em></a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.html">Strona domowa</a></li>
                                                                <li class=""><a href="index.html">Logowanie</a></li>
                                                                <li class=""><a href="index.html">Wypożycz</a></li>
                                                                <li class=""><a href="index.html">Profil</a></li>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
{*				<section id="banner">
					<header>
						<h2>Arcana: <em>A responsive site template freebie by <a href="http://html5up.net">HTML5 UP</a></em></h2>
						<a href="#" class="button">Learn More</a>
					</header>
				</section>*}


{*

<div class="content-wrapper">
    <div class="content">
        <h2 class="content-head is-center">Excepteur sint occaecat cupidatat.</h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

                <h3 class="content-subhead">
                    <i class="fa fa-rocket"></i>
                    Get Started Quickly
                </h3>
                <p>
                    Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-mobile"></i>
                    Responsive Layouts
                </h3>
                <p>
                    Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-th-large"></i>
                    Modular
                </h3>
                <p>
                    Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-check-square-o"></i>
                    Plays Nice
                </h3>
                <p>
                    Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                </p>
            </div>
        </div>
    </div>

    <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
            <img width="300" alt="File Icons" class="pure-img-responsive" src="/img/common/file-icons.png">
        </div>
        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

            <h2 class="content-head content-head-ribbon">Laboris nisi ut aliquip.</h2>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor.
            </p>
        </div>
    </div>

    <div class="content">
        <h2 class="content-head is-center">Dolore magna aliqua. Uis aute irure.</h2>

        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <form class="pure-form pure-form-stacked">
                    <fieldset>

                        <label for="name">Your Name</label>
                        <input id="name" type="text" placeholder="Your Name">


                        <label for="email">Your Email</label>
                        <input id="email" type="email" placeholder="Your Email">

                        <label for="password">Your Password</label>
                        <input id="password" type="password" placeholder="Your Password">

                        <button type="submit" class="pure-button">Sign Up</button>
                    </fieldset>
                </form>
            </div>

            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                <h4>Contact Us</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>

                <h4>More Information</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>

    </div>

    <div class="footer l-box is-center">
        View the source of this layout to learn more. Made with love by the Pure Team.
    </div>

</div>

<body class="is-preload">
<div id="page-wrapper">
    <div id="app_top">
<header id="header">
    <div id="app_top" class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <h1 id="logo"><a href="">{$page_title|default:"Tytuł domyślny"}</a></h1>
        <nav id="nav">
        <ul>
            <li class="pure-menu-selected"><a href="#app_top">Góra strony</a></li>
            
            <li><a href="#app_content">Idź do formularza</a></li>
            <li><a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">Wyloguj się</a></li>
{*	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
        </ul></nav>
    </div>
    </div></div>
<div id="main" class="wrapper style1">
    <div class="container">
    <section>
        <h1>{$page_title|default:"Tytuł domyślny"}</h1>
        <p>
             {$page_description|default:"Opis domyślny"}
        </p>
        <p><a href="#app_content" class="primary">Idź do formularza</a></p>
    </section>
    </div>
        <div class="content-wrapper">

    <div class="container">
*}
{block name=content} Domyślna treść zawartości .... {/block}
    </div>
        </div></div></div>


<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; Michał Kromoliński. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>