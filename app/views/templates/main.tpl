{*require_once '{$conf->app_url}/core/App.php';*}
<!doctype html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="{$page_description|default:"Opis domyślny"}">
		<title>{$page_title|default:"LibApp"}</title>
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css">
	</head>
	<body class="is-preload">
	<div id="page-wrapper">
{*{block name= menu} *}
			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="index.html" id="logo">LibApp <em>by Kromoliński</em></a></h1>
			<!-- Banner -->
				<section id="banner">

				</section>
{block name=menu} 
<nav id="nav">
<ul>
<li class="current"><a href="{$conf->action_root}startPage">Strona Główna</a></li>
{if count($conf->roles)>0}
<li class=""><a href="{$conf->action_root}library">Wypożycz</a></li>
<li class=""><a href="{$conf->action_root}profile">Profil</a></li>
    {if \core\RoleUtils::inRole('user')}
        <li class=""><a href="{$conf->action_root}manage">Zarządzaj</a></li>
    {/if}
<li class=""><a href="{$conf->action_root}logout">Wyloguj</a></li>
{else}	
<li class=""><a href="{$conf->action_root}login">Logowanie</a></li>
{/if}
</nav>
{/block}
				</div>
{*artykol na cala szerokosc*}
				<section class="wrapper style2">
					<div class="container">
        {block name = big_text}{/block}
        {block name = top}{/block}
						</header>
					</div>
				</section>
			<!-- Footer -->
		<footer id="footer">
				<ul class="copyright">
					&copy; Michał Kromoliński. All rights reserved.
					Design: <a href="http://html5up.net">HTML5 UP</a>
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