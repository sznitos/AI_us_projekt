<?php
/* Smarty version 4.3.4, created on 2024-06-17 22:38:23
  from 'F:\Programy\xampp\htdocs\Projekt\app\views\Library.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66709ebf74a3d4_83898068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '383fab966ba0503f70ce3009b225c6624cb8bca9' => 
    array (
      0 => 'F:\\Programy\\xampp\\htdocs\\Projekt\\app\\views\\Library.tpl',
      1 => 1718656690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_66709ebf74a3d4_83898068 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_24649276266709ebf740bb9_16997398', 'top');
?>




<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_24649276266709ebf740bb9_16997398 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_24649276266709ebf740bb9_16997398',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'wiersz');
$_smarty_tpl->tpl_vars['wiersz']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wiersz']->value) {
$_smarty_tpl->tpl_vars['wiersz']->do_else = false;
?>
  <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["title"];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["author_name"];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["author_surname"];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["year"];?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
    </table>
         </header>
  
      </article>
   </div>
</div>
</div>
</div>

<?php if (\core\RoleUtils::inRole('admin')) {?>

ADMIN SUPER

<?php }?>

<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php
}
}
/* {/block 'top'} */
}
