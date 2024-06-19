{extends file="main.tpl"}
{block name=menu} 
    <nav id="nav">
        <ul>
            <li class=""><a href="{$conf->action_root}startPage">Strona Główna</a></li>
            {if count($conf->roles)>0}
                <li class=""><a href="{$conf->action_root}library">Wypożycz</a></li>
                <li class=""><a href="{$conf->action_root}profile">Profil</a></li>
                {if \core\RoleUtils::inRole('user')}
                    <li class="current"><a href="{$conf->action_root}manage">Zarządzaj</a></li>
                {/if}
                <li class=""><a href="{$conf->action_root}logout">Wyloguj</a></li>
            {else}   
                <li class=""><a href="{$conf->action_root}login">Logowanie</a></li>
            {/if}
        </ul>
    </nav>
{/block}

{block name=top}
<header>
	<h2>Zasoby biblioteki oferują poniższe pozycje...</h2>
</header>
<div class="col-6 col-12-narrower imp-narrower">
	<div id="content">
		<!-- Content -->
		<article>
			<header>
				<table cellpadding="5">
					<thead>
						<tr>
							<th>Tytuł</th>
							<th>Imię autora</th>
							<th>Nazwisko</th>
							<th>Rok Wydania</th>
						</tr>
					<thead>
					<tbody>
						{foreach $lista as $wiersz}
						<td>{$wiersz["title"]}</td>
						<td>{$wiersz["author_name"]}</td>
						<td>{$wiersz["author_surname"]}</td>
						<td>{$wiersz["year"]}</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
			</header>
		</article>
	</div>
</div>
</div>
</div>
{if \core\RoleUtils::inRole('admin')}
ADMIN SUPER
{/if}
{include file='messages.tpl'}
{/block}