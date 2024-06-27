<!doctype html>
<html lang="pl">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="{$page_description|default:"LibApp"}">
      <title>{$page_title|default:"LibApp"}</title>
      <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css">
   </head>
   <body class="is-preload">
       
{*   obsługa usuwania rekordów - podwójna weryfikacja    *}
       <script type="text/javascript">
   function confirmLink(event, url) {
       if (confirm("Czy na pewno chcesz usunąć ten rekord?")) {
           window.location.href = url;
       } else {
           event.preventDefault();
       }
   }
</script>
      <div id="page-wrapper">
         <div id="header">
            <h1><a href="index.html" id="logo">LibApp <em>by Kromoliński</em></a></h1>
            <section id="banner">LIBRARY PHOTO
            </section>
            <!----------------- MENU ----------------->
            {block name=menu} 
            <nav id="nav">
               <ul>
               <li class="current"><a href="{$conf->action_root}startPage">Strona Główna</a></li>
               {if count($conf->roles)>0}
      {if \core\RoleUtils::inRole('admin')}
      <li class=""><a href="{$conf->action_root}library">Zarządzaj</a></li>
      {else}
      <li class=""><a href="{$conf->action_root}library">Wypożycz</a></li>
      {/if}
               <li class=""><a href="{$conf->action_root}profile">Profil</a></li>

               <li class=""><a href="{$conf->action_root}logout">Wyloguj</a></li>
               {else}	
               <li class=""><a href="{$conf->action_root}login">Logowanie</a></li>
               {/if}
            </nav>
            {/block}
         </div>
         <section class="wrapper style1">
            <div class="container">
                <!----------------- TEXT1 ----------------->
               {block name = big_text}{/block}
               
                              <!----------------- MESSAGES ----------------->
               {block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg_{if $msg->isError()}error{/if}{if $msg->isWarning()}warning{/if}{if $msg->isInfo()}info{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

               {/block}
               
               <!----------------- TEXT2 ----------------->
               {block name = top}{/block}
               
               <!----------------- FOOTER ----------------->
               
               {block name=stopka}
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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
   </body>
</html>
{/block}