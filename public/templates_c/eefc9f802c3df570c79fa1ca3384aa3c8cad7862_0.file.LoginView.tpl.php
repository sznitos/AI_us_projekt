<?php
/* Smarty version 4.3.4, created on 2024-06-17 22:13:43
  from 'F:\Programy\xampp\htdocs\Projekt\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667098f7726b97_87321131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eefc9f802c3df570c79fa1ca3384aa3c8cad7862' => 
    array (
      0 => 'F:\\Programy\\xampp\\htdocs\\Projekt\\app\\views\\LoginView.tpl',
      1 => 1718655221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667098f7726b97_87321131 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1297071851667098f7723747_73227483', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1297071851667098f7723747_73227483 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1297071851667098f7723747_73227483',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<header>
												<h2>O aplikacji</h2>
												<p>Aplikacja obsługująca bibliotekę w Szczebrzeszynie. Dzięki tej aplikacji praca biblioteki została usprawniona o 60 %!</p>
											</header>
   <div class="col-6 col-12-narrower imp-narrower">
      <div id="content">
         <!-- Content -->
         <article>
            <header>
               <h2>Zaloguj się</h2>
               <p>Wymagane wprowadzenie poświadczeń aby uzyskać dostęp do zasobów aplikacji.</p>
            </header>
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
               <fieldset>
                  <div class="pure-control-group">
                     <label for="id_login">Login</label>
                     <input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
                  </div>
                  <div class="pure-control-group">
                     <label for="id_pass">Hasło</label>
                     <input id="id_pass" type="password" name="pass" /><br />
                  </div>
                  <div class="pure-controls">
                     <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
                  </div>
               </fieldset>
            </form>
         </article>
      </div>
   </div>
</div>
</div>
<?php
}
}
/* {/block 'top'} */
}
