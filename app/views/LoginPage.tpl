{extends file="main.tpl"}
{block name=content}
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>Nowa akcja | Amelia framework</title>
</head>

<body>

<h3>Generowanie adresów (z użyciem obiektu konfiguracji)</h3>
 
Link bezwzględny do strony akcji hello: <a href="{$conf->action_url}hello"> link </a>
<br/>
Link względny do strony akcji hello: <a href="{$conf->action_root}hello"> link </a>
<br/>

<h3>Adresy można również generować w Amelii za pomocą dedykowanych funkcji url oraz rel_url:</h3>

Link bezwzględny do strony akcji hello: <a href="{url action='hello'}"> link </a>
<br/>
Link względny do strony akcji hello: <a href="{rel_url action='hello'}"> link </a>
<br/>

Wyświetlenie listy komunikatów:

{if $msgs->isInfo()}
<ul>
  {foreach $msgs->getMessages() as $msg}
  <li>{$msg->text}</li>
  {/foreach}
</ul>
{/if}


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

</body>

</html>
{/block}