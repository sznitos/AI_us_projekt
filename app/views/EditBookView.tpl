{extends file="main.tpl"}

{block name=top}
<header>
    <h2>Edytuj książkę</h2>
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
                        
                        <input type="submit" class="button small" value="Zapisz"/>
                        <a class="pure-button button-secondary" href="{$conf->action_root}manage">Powrót</a>
                    </fieldset>
                    <input type="hidden" name="id" value="{$form->id}">
                </form>
            </header>
        </article>
    </div>
</div>
{/block}
