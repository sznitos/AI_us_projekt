{extends file="main.tpl"}

{block name=content}

<div class="splash-container">
    <p>
    <div class="splash">
            <section class="col-4 col-12-narrower">
			<div class="box highlight">
				<i class="icon solid major fa-pencil-alt"></i>
				<h3>O aplikacji LibApp...</h3>
				<p>Idea która przyświecała stworzeniu aplikacji LibApp było usprawnienie pracy biblioteki, umożliwiając łatwą ewidencję i zarządzanie systemem wypożyczeń książek przez czytelników. </p>
			</div>
		</section>   
    </div>

</div>
    
<form action="{$conf->action_url}login" method="post"  class="pure-form pure-form-aligned bottom-margin">
    <div class="row gtr-uniform gtr-50">
        <div class="col-6 col-12-xsmall">
            <div class="col-12">
            <legend>Logowanie do systemu</legend>
            	<fieldset>
            </div>
            <div class="container">
                
                    <div class="col-6 col-12-xsmall">
			<label for="id_login">ldddddddogin: </label>
			<input id="id_login" type="text" name="login"/>
                    </div>
                    <div class="col-6 col-12-xsmall">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
                    </div>
		<div class="col-12">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
                	
	<div class="container">
        </div></div>
        </fieldset>
</form>	

{if \core\RoleUtils::inRole('admin')}

ADMIN SUPER

{/if}

{include file='messages.tpl'}

{/block}



