{extends file="main.tpl"}

{block name=menu} 
<nav id="nav">
<ul>
<li class=""><a href="{$conf->action_root}startPage">Strona Główna</a></li>
{if count($conf->roles)>0}
<li class=""><a href="{$conf->action_root}library">Wypożycz</a></li>
<li class="current"><a href="{$conf->action_root}profile">Profil</a></li>
    {if \core\RoleUtils::inRole('user')}
        <li class=""><a href="{$conf->action_root}manage">Zarządzaj</a></li>
    {/if}
<li class=""><a href="{$conf->action_root}logout">Wyloguj</a></li>

{else}	
<li class=""><a href="{$conf->action_root}login">Logowanie</a></li>
{/if}
</nav>
{/block}

{block name=top}
    <header>
        <h2>Twoje dane</h2>
    </header>
    <div class="col-6 col-12-narrower imp-narrower">
        <div id="content">
            <!-- Treść -->
            <article>
                <header>
                    <!-- Nagłówek -->
                </header>
                    <p><strong>ID: </strong> {$user.user_id}</p>
                    <strong>Imię: </strong> {$user.name}</p>
                    <p><strong>Nazwisko: </strong> {$user.surname}
                    <!-- Dodaj kolejne pola według potrzeb -->
            </article>
        </div>
    </div>
{/block}

{if \core\RoleUtils::inRole('admin')}
    ADMIN SUPER
{/if}

{include file='messages.tpl'}
