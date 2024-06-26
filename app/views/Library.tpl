{extends file="main.tpl"}
<script type="text/javascript">
   function confirmLink(event, url) {
       if (confirm("Czy na pewno chcesz usunąć ten rekord?")) {
           window.location.href = url;
       } else {
           event.preventDefault();
       }
   }
</script>
{block name=menu} 
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
<header>
   <h2>Zasoby biblioteki oferują poniższe pozycje...</h2>
</header>
<div class="row gtr-100">
   <div class="col-12 col-12-narrower imp-narrower">
      <div id="content">
         <!-- Content -->
         <article>
            <header></header>
            {include file='messages.tpl'}
            <table cellpadding="5">
               <thead>
                  <tr>
                     <th>Tytuł</th>
                     <th>Imię autora</th>
                     <th>Nazwisko</th>
                     <th>Rok wydania</th>
                     {if \core\RoleUtils::inRole('admin')}
                     <th>Akcje</th>
                     {/if}
                  </tr>
               </thead>
               <tbody>
                  {foreach $lista as $wiersz}
                  {strip}
                  <tr>
                     <td>{$wiersz["title"]}</td>
                     <td>{$wiersz["author_name"]}</td>
                     <td>{$wiersz["author_surname"]}</td>
                     <td>{$wiersz["year"]}</td>
                     {if \core\RoleUtils::inRole('admin')}
                     <td class="actions">
                        <a class="button" id="edit" href="{$conf->action_root}bookEdit/{$wiersz['book_id']}">Edytuj</a>
                        &nbsp;
                        <a class="button" id="delete"
                           onclick="confirmLink(event, '{$conf->action_root}bookDelete/{$wiersz['book_id']}')">Usuń</a>
                     </td>
                     {/if}
                  </tr>
                  {/strip}
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