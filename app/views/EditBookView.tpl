{extends file="main.tpl"}

{block name=top}
<header>
    <h2>Edytuj książkę</h2>
</header>
<div class="col-6 col-12-narrower imp-narrower">
    <div id="content">
        <article>
            <header>
                <form action="{$conf->action_root}saveBook/{$book.id}" method="post">
                    <label for="title">Tytuł:</label>
                    <input type="text" name="title" value="{$book.title}" required>
                    
                    <label for="author_name">Imię autora:</label>
                    <input type="text" name="author_name" value="{$book.author_name}" required>
                    
                    <label for="author_surname">Nazwisko autora:</label>
                    <input type="text" name="author_surname" value="{$book.author_surname}" required>
                    
                    <label for="year">Rok Wydania:</label>
                    <input type="number" name="year" value="{$book.year}" required>
                    
                    <input type="submit" class="button small" value="Zapisz zmiany">
                </form>
            </header>
        </article>
    </div>
</div>
{/block}
