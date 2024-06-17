<!doctype html>
<html lang="pl">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="{$page_description|default:"Opis domyślny"}">
      <title>{$page_title|default:"Twoja biblioteka | LibApp"}</title>
      <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css">
   </head>
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
                  <li class=""><a href="{$conf->action_root}personList">Logowanie</a></li>
                  <li class=""><a href="{$conf->action_root}Library">Wypożycz</a></li>
                  <li class=""><a href="{$conf->action_root}Library">Profil</a></li>
               </ul>
            </nav>
         </div>
         {*               ---------------------------------*}
         <section class="wrapper style1">
            <div class="container">
               <div class="row gtr-200">
                  <div class="col-8 col-12-narrower">
                     <div id="sidebar1">
                        <!-- Sidebar 1 -->
                        <div class="col-6 col-12-narrower imp-narrower">
                           <div id="content">
                              <!-- Content -->
                              <article>
                                 {block name=top} {/block}
                              </article>
                           </div>
                              <div id="content">
                                  <article><p>
                                 {block name=messages}
                                 {if $msgs->isMessage()}
                                 <div class="messages bottom-margin">
                                    <ul>
                                       {foreach $msgs->getMessages() as $msg}
                                       {strip}
                                       <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                                       {/strip}
                                       {/foreach}
                                    </ul>
                                 </div>
                                    </p></article>
                                 {/if}
                                 {/block}
                                 {block name=bottom} {/block}
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Footer -->
         <footer id="footer">
            <ul class="copyright">
               <li>&copy; Michał Kromoliński. All rights reserved.</li>
               <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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