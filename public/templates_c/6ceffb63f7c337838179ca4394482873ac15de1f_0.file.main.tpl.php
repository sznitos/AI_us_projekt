<?php
/* Smarty version 4.3.4, created on 2024-06-17 22:20:14
  from 'F:\Programy\xampp\htdocs\Projekt\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66709a7eb06d10_99688142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ceffb63f7c337838179ca4394482873ac15de1f' => 
    array (
      0 => 'F:\\Programy\\xampp\\htdocs\\Projekt\\app\\views\\templates\\main.tpl',
      1 => 1718655613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66709a7eb06d10_99688142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
">
      <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Twoja biblioteka | LibApp" ?? null : $tmp);?>
</title>
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css">
   </head>
   <body class="is-preload">
      <div id="page-wrapper">
         <!-- Header -->
         <div id="header">
            <!-- Logo -->
            <h1><a href="index.html" id="logo">LibApp <em>by Kromoliński</em></a></h1>
            <!-- Nav -->
            <nav id="nav">
               <ul>
                  <li class="current"><a href="index.html">Strona domowa</a></li>
                  <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personList">Logowanie</a></li>
                  <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Library">Wypożycz</a></li>
                  <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Library">Profil</a></li>
               </ul>
            </nav>
         </div>
                  <section class="wrapper style1">
            <div class="container">
               <div class="row gtr-200">
                  <div class="col-8 col-12-narrower">
                     <div id="sidebar1">
                        <!-- Sidebar 1 -->
                        <div class="col-6 col-12-narrower imp-narrower">
                           <div id="content">
                              <!-- Content -->
                              <article>
                                 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_168155662866709a7eaffb28_60848706', 'top');
?>

                              </article>
                           </div>
                              <div id="content">
                                  <article><p>
                                 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_74968037366709a7eb002e2_26219394', 'messages');
?>

                                 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2838826666709a7eb067e7_16113928', 'bottom');
?>

                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Footer -->
         <footer id="footer">
            <ul class="copyright">
               <li>&copy; Michał Kromoliński. All rights reserved.</li>
               <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
         </footer>
      </div>
      <!-- Scripts -->
      <?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="assets/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>
   </body>
</html><?php }
/* {block 'top'} */
class Block_168155662866709a7eaffb28_60848706 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_168155662866709a7eaffb28_60848706',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'top'} */
/* {block 'messages'} */
class Block_74968037366709a7eb002e2_26219394 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_74968037366709a7eb002e2_26219394',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                                 <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
                                 <div class="messages bottom-margin">
                                    <ul>
                                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                       <li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                                       <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                 </div>
                                    </p></article>
                                 <?php }?>
                                 <?php
}
}
/* {/block 'messages'} */
/* {block 'bottom'} */
class Block_2838826666709a7eb067e7_16113928 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_2838826666709a7eb067e7_16113928',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'bottom'} */
}
