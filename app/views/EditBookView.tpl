{extends file="main.tpl"}
{block name=menu} 
    <body onload="window.location='#nav';">
<nav id="nav">
   <ul>
      <li class=""><a href="{$conf->action_root}startPage">Strona Główna</a></li>
      {if count($conf->roles)>0}
      {if \core\RoleUtils::inRole('admin')}
      <li class="current"><a href="{$conf->action_root}library">Zarządzaj</a></li>
      {else}
      <li class="current"><a href="{$conf->action_root}library">Wypożycz</a></li>
      {/if}
      <li class=""><a href="{$conf->action_root}profile">Profil</a></li>
      <li class=""><a href="{$conf->action_root}logout">Wyloguj</a></li>
      {else}   
      <li class=""><a href="{$conf->action_root}login">Logowanie</a></li>
      {/if}
   </ul>
</nav>
{/block}
{block name=top}
    <div id=scroll-to"></div>
<header id="scroll-to">
    <h2>Wprowadzanie nowej książki</h2>
</header>
<div class="col-6 col-12-narrower imp-narrower">
    <div id="content">
        <article>
            <header>
                <form action="{$conf->action_root}bookSave" method="post">
                    <fieldset>
                        <legend></legend>
                        <label for="title">Tytuł:</label>
                        <input type="text" name="title" value="{$form->title}" required>
                        
                        <label for="name">Imię autora:</label>
                        <input type="text" name="name" value="{$form->name}" required>
                        
                        <label for="surname">Nazwisko autora:</label>
                        <input type="text" name="surname" value="{$form->surname}" required>
                        
                        <label for="year">Rok Wydania:</label>
                        <input type="number" name="year" value="{$form->year}" required>
                        
                        <input type="submit" class="add" value="Zapisz"/>
                        <a class="button" id="return" href="{$conf->action_root}library">Powrót</a>
                    </fieldset>
                    <input type="hidden" name="id" value="{$form->id}">
                </form>
            </header>
        </article>
    </div>
</div>
{/block}
