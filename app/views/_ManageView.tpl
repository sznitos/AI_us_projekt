{extends file="main.tpl"}
{block name=menu} 
    <nav id="nav">
        <ul>
            <li class=""><a href="{$conf->action_root}startPage">Strona Główna</a></li>
            {if count($conf->roles)>0}
                <li class=""><a href="{$conf->action_root}library">Wypożycz</a></li>
                <li class=""><a href="{$conf->action_root}profile">Profil</a></li>
                {if \core\RoleUtils::inRole('admin')}
                    <li class="current"><a href="{$conf->action_root}manage">Zarządzaj</a></li>
                {/if}
                <li class=""><a href="{$conf->action_root}logout">Wyloguj</a></li>
            {else}   
                <li class=""><a href="{$conf->action_root}login">Logowanie</a></li>
            {/if}
        </ul>
    </nav>
{/block}

{*

            RACZEJ OUT

*}


{block name=top}
<header>
	<h2>Panel administratorski</h2>
</header>
<div class="col-6 col-12-narrower imp-narrower">
	<div id="content">
		<!-- Content -->
		<article>
			<header>
				<table cellpadding="5">
					<thead>
						<tr>
                                                    <th><b>-id-</b></th>	
                                                    <th>Tytuł</th>
							<th>Imię autora</th>
							<th>Nazwisko</th>
							<th>Rok Wydania</th>
                            <th>Akcje</th>
						</tr>
					</thead>
					<tbody>
						{foreach $lista as $wiersz}
						<tr>
						    <td>{$wiersz["book_id"]}.</td>
                                                    <td>"{$wiersz["title"]}"</td>
						    <td>{$wiersz["author_name"]}</td>
						    <td>{$wiersz["author_surname"]}</td>
						    <td>{$wiersz["year"]}</td>
						    <td>
                                <a href="{$conf->action_root}bookEdit&id={$wiersz.book_id}" class="pure-button pure-button-primary">Edytuj</a>
                                <a href="{$conf->action_root}bookDelete&id={$wiersz.book_id}" class="pure-button pure-button-primary">Usuń</a>
                            </td>
						</tr>
						{/foreach}
					</tbody>
				</table>
			</header>
		</article>
	</div>
</div>
                                        
                                        <div class="container">
                                        <div class="row gtr-200">

    <div class="box highlight">

    <button onclick="window.location.href='{$conf->action_root}bookNew'" class="pure-button pure-button-primary">Dodaj</button>
</div>
    <div class="box highlight">
    <button onclick="window.location.href='{$conf->action_root}bookNew'" class="pure-button pure-button-primary">Edytuj</button>
</div>
    <div class="box highlight">
    <button onclick="window.location.href='{$conf->action_root}bookNew'" class="button-error pure-button">Usuń</button>

</div>
</div>


{if \core\RoleUtils::inRole('admin')}
    <i>Detected role 'ADMIN'</i>
{/if}
{include file='messages.tpl'}
{/block}
