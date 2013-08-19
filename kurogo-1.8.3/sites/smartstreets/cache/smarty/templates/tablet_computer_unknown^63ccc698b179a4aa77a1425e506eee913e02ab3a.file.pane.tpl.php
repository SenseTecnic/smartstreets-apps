<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:34:23
         compiled from "/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/map/templates/pane.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189871100051f18bcf991877-40271828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ccc698b179a4aa77a1425e506eee913e02ab3a' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/map/templates/pane.tpl',
      1 => 1364681344,
      2 => 'file',
    ),
    '2729eb99ef68aa053a0bd6fa74db917f2fd179e7' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/pane.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189871100051f18bcf991877-40271828',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

  <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineCSSBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?>
    <style type="text/css" media="screen">
      <?php echo $_smarty_tpl->tpl_vars['css']->value;?>

    </style>
  <?php }} ?>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>



  <?php if (count($_smarty_tpl->getVariable('onOrientationChangeBlocks')->value)){?>
    <script type="text/javascript">
      registerPaneResizeHandler(function () {
        <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?><?php echo $_smarty_tpl->tpl_vars['script']->value;?>
<?php }} ?>
      });
    </script>
  <?php }?>



<div id="<?php echo $_smarty_tpl->getVariable('mapImageElementId')->value;?>
" class="mapimage pane"></div>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptFooterBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onLoadBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>
  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>

