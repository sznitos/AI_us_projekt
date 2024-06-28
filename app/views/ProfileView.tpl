{extends file="main.tpl"}
{block name=menu} 
<nav id="nav">
    <ul>
        <li class=""><a href="{$conf->action_root}startPage">Strona Główna</a></li>
        {if count($conf->roles)>0}
        {if \core\RoleUtils::inRole('admin')}
        <li class=""><a href="{$conf->action_root}library">Zarządzaj</a></li>
        {else}
        <li class=""><a href="{$conf->action_root}library">Wypożycz</a></li>
        {/if}
        <li class="current"><a href="{$conf->action_root}profile">Profil</a></li>
        <li class=""><a href="{$conf->action_root}logout">Wyloguj</a></li>
        {else}   
        <li class=""><a href="{$conf->action_root}login">Logowanie</a></li>
        {/if}
    </ul>
</nav>
{/block}

{block name=top}
<header>
    <h2>Dane czytelnika:</h2>
</header>
<div class="col-6 col-12-narrower imp-narrower">
    <p>
        <strong>ID: </strong>{$user.user_id}<br>
        <strong>Imię: </strong>{$user.name}<br>
        <strong>Nazwisko: </strong>{$user.surname}<br>
    </p>
    <div id="content">
        <!-- Treść -->
        <article>
            <div class="row gtr-190">
                <section class="col-6 col-12-narrower">    
                    {if isset($user.borrowed_books) && count($user.borrowed_books['current']) > 0}
                    <h3>Aktualnie wypożyczone:</h3>
                    {foreach $user.borrowed_books['current'] as $book}
                    <ul class="active">
                        <li class="active">
                            <strong>Tytuł: </strong>{$book.title}<br>
                            <strong>Autor: </strong>{$book.author_name} {$book.author_surname}<br>
                            <strong>Data wypożyczenia: </strong>{$book.borrow_start}<br>
                            <form action="{$conf->action_root}profileReturn" method="post">
                                <input type="hidden" name="borrow_id" value="{$book.borrow_id}">
                                <button type="submit" class="button">Zwróć</button>
                            </form>
                        </li>
                    </ul>
                    {/foreach}
                    {else}
                    <p>Brak obecnie wypożyczonych książek.</p>
                    {/if}
                </section>
                <section class="col-6 col-12-narrower">
                    <h3>Historia wypożyczeń:</h3>
                    {if isset($user.borrowed_books) && count($user.borrowed_books['history']) > 0}
                    {foreach $user.borrowed_books['history'] as $book}
                    <ul class="history">
                        <li>
                            <strong>Tytuł: </strong>{$book.title}<br>
                            <strong>Autor: </strong>{$book.author_name} {$book.author_surname}<br>
                            <strong>Data wypożyczenia: </strong>{$book.borrow_start}<br>
                            <strong>Data zwrotu: </strong>{$book.borrow_end}
                        </li>
                    </ul>
                    {/foreach}
                    {else}
                    <p>Brak historycznych wypożyczeń książek.</p>
                    {/if}
                </section>
            </div>
            <!-- Dodaj kolejne pola według potrzeb -->
        </article>
    </div>
</div>
{/block}
{if \core\RoleUtils::inRole('admin')}
ADMIN SUPER
{/if}

{include file='messages.tpl'}
