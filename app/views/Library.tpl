{extends file="main.tpl"}

{block name=menu} 
    <nav id="nav">
        <ul>
            <li class=""><a href="{$conf->action_root}startPage">Strona Główna</a></li>
            {if count($conf->roles)>0}
                <li class="current"><a href="{$conf->action_root}library">Wypożycz</a></li>
                <li class=""><a href="{$conf->action_root}profile">Profil</a></li>
                {if \core\RoleUtils::inRole('admin')}
                    <li class=""><a href="{$conf->action_root}manage">Zarządzaj</a></li>
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
<div class="row gtr-100">
    <div class="col-12 col-12-narrower imp-narrower">
        <div id="content">
            <!-- Content -->
            <article>
                <header></header>
                <table cellpadding="5">
                    <thead>
                        <tr>
                            <th>Tytuł</th>
                            <th>Imię autora</th>
                            <th>Nazwisko</th>
                            <th>Rok Wydania</th>
                            {if \core\RoleUtils::inRole('user')}
                                <th>Akcje</th>
                            {/if}
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $lista as $wiersz}
                        <tr>
                            <td>{$wiersz["title"]}</td>
                            <td>{$wiersz["author_name"]}</td>
                            <td>{$wiersz["author_surname"]}</td>
                            <td>{$wiersz["year"]}</td>
                            {if \core\RoleUtils::inRole('user')}
                                <td>
                                    <form action="{$conf->action_root}borrow" method="post">
                                        <input type="hidden" name="book_id" value="{$wiersz['book_id']}">
                                        <input type="submit" value="Wypożycz">
                                    </form>
                                </td>
                            {/if}
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </article>
        </div>
    </div>
</div>
{/block}

{if \core\RoleUtils::inRole('admin')}
    ADMIN SUPER
{/if}

{include file='messages.tpl'}
