<?php
/* Smarty version 4.3.4, created on 2024-06-10 22:06:58
  from 'F:\Programy\xampp\htdocs\Projekt\app\views\LoginPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66675ce27cf4e2_74784220',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e09d936a41178ee3234071df995a5323153dbe5' => 
    array (
      0 => 'F:\\Programy\\xampp\\htdocs\\Projekt\\app\\views\\LoginPage.tpl',
      1 => 1718050017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66675ce27cf4e2_74784220 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_453240366675ce27c2ea7_92049042', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_453240366675ce27c2ea7_92049042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_453240366675ce27c2ea7_92049042',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>Nowa akcja | Amelia framework</title>
</head>

<body>

<h3>Generowanie adresów (z użyciem obiektu konfiguracji)</h3>
 
Link bezwzględny do strony akcji hello: <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
hello"> link </a>
<br/>
Link względny do strony akcji hello: <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
hello"> link </a>
<br/>

<h3>Adresy można również generować w Amelii za pomocą dedykowanych funkcji url oraz rel_url:</h3>

Link bezwzględny do strony akcji hello: <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'hello'),$_smarty_tpl ) );?>
"> link </a>
<br/>
Link względny do strony akcji hello: <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>'hello'),$_smarty_tpl ) );?>
"> link </a>
<br/>

Wyświetlenie listy komunikatów:

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
<ul>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
  <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<?php }?>


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

</body>

</html>
<?php
}
}
/* {/block 'content'} */
}
