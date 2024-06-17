{extends file="main.tpl"}

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
    <th>Tytuł</th><th>Imię autora</th> <th>Nazwisko</th> <th>Rok Wydania</th>
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



