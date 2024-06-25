{extends file="main.tpl"}

{block name=top}
<header>
    <h2>{if isset($form.book_id)}Edytuj Książkę{else}Dodaj Nową Książkę{/if}</h2>
</header>

<form action="{$conf->action_root}bookSave" method="post" class="pure-form pure-form-aligned" onsubmit="return validateForm()">
    <fieldset>
        <div id="form-errors"></div> <!-- Tutaj będą wyświetlane błędy -->

        <div class="pure-control-group">
            <label for="book_id">ID</label>
            <input id="book_id" type="text" placeholder="ID" name="book_id" value="{$form.book_id|escape}" />
            {if isset($errors.book_id)}
                <p class="error">{$errors.book_id}</p>
            {/if}
        </div>
        <div class="pure-control-group">
            <label for="title">Tytuł</label>
            <input id="title" type="text" placeholder="Tytuł" name="title" value="{$form.title|escape}" />
            {if isset($errors.title)}
                <p class="error">{$errors.title}</p>
            {/if}
        </div>
        <div class="pure-control-group">
            <label for="author_name">Imię autora</label>
            <input id="author_name" type="text" placeholder="Imię autora" name="author_name" value="{$form.author_name|escape}" />
            {if isset($errors.author_name)}
                <p class="error">{$errors.author_name}</p>
            {/if}
        </div>
        <div class="pure-control-group">
            <label for="author_surname">Nazwisko autora</label>
            <input id="author_surname" type="text" placeholder="Nazwisko autora" name="author_surname" value="{$form.author_surname|escape}" />
            {if isset($errors.author_surname)}
                <p class="error">{$errors.author_surname}</p>
            {/if}
        </div>
        <div class="pure-control-group">
            <label for="year">Rok wydania</label>
            <input id="year" type="text" placeholder="Rok wydania" name="year" value="{$form.year|escape}" />
            {if isset($errors.year)}
                <p class="error">{$errors.year}</p>
            {/if}
        </div>
        <div class="pure-controls">
            <input type="submit" value="{if isset($form.book_id)}Zaktualizuj{else}Dodaj{/if}" class="pure-button pure-button-primary"/>
            {if isset($form.book_id)}
                <input type="hidden" name="book_id" value="{$form.book_id}" />
            {/if}
        </div>
    </fieldset>
</form>

{include file='messages.tpl'}
{/block}
