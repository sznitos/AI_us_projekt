{extends file="main.tpl"}
{block name=top}
<header>
   <h2>O aplikacji</h2>
   <p>Aplikacja obsługująca bibliotekę w Szczebrzeszynie. Dzięki tej aplikacji praca biblioteki została usprawniona o 60 %!</p>
</header>
<div class="col-6 col-12-narrower imp-narrower">
   <div id="content">
      <!-- Content -->
      <article>
         <header>
            <h2>Zaloguj się</h2>
            <p>Wymagane wprowadzenie poświadczeń aby uzyskać dostęp do zasobów aplikacji.</p>
         </header>
         <form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned bottom-margin">
            <fieldset>
               <div class="pure-control-group">
                  <label for="id_login">Login</label>
                  <input id="id_login" type="text" name="login" value="{$form->login}"/>
               </div>
               <div class="pure-control-group">
                  <label for="id_pass">Hasło</label>
                  <input id="id_pass" type="password" name="pass" /><br />
               </div>
               <div class="pure-controls">
                  <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
               </div>
            </fieldset>
         </form>
      </article>
   </div>
</div>
</div>
</div>
{/block}