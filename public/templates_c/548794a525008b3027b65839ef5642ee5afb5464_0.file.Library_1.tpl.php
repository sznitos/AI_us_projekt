<?php
/* Smarty version 4.3.4, created on 2024-06-17 22:21:34
  from 'F:\Programy\xampp\htdocs\Projekt\app\views\Library_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66709ace9e0a09_73348265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '548794a525008b3027b65839ef5642ee5afb5464' => 
    array (
      0 => 'F:\\Programy\\xampp\\htdocs\\Projekt\\app\\views\\Library_1.tpl',
      1 => 1718650530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_66709ace9e0a09_73348265 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_119263898266709ace9dab57_07562166', 'content');
?>




<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_119263898266709ace9dab57_07562166 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_119263898266709ace9dab57_07562166',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="splash-container">
    <p>
    <div class="splash">
            <section class="col-4 col-12-narrower">
			<div class="box highlight">
				<i class="icon solid major fa-pencil-alt"></i>
				<h3>O aplikacji LibApp...</h3>
				<p>Idea która przyświecała stworzeniu aplikacji LibApp było usprawnienie pracy biblioteki, umożliwiając łatwą ewidencję i zarządzanie systemem wypożyczeń książek przez czytelników. </p>
			</div>
		</section>   
    </div>

</div>
    
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post"  class="pure-form pure-form-aligned bottom-margin">
    <div class="row gtr-uniform gtr-50">
        <div class="col-6 col-12-xsmall">
            <div class="col-12">
            <legend>Logowanie do systemu</legend>
            	<fieldset>
            </div>
            <div class="container">
                
                    <div class="col-6 col-12-xsmall">
			<label for="id_login">ldddddddogin: </label>
			<input id="id_login" type="text" name="login"/>
                    </div>
                    <div class="col-6 col-12-xsmall">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
                    </div>
		<div class="col-12">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
                	
	<div class="container">
        </div></div>
        </fieldset>
</form>	

<?php if (\core\RoleUtils::inRole('admin')) {?>

ADMIN SUPER

<?php }?>

<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php
}
}
/* {/block 'content'} */
}
