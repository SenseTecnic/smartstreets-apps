<?php /* Smarty version Smarty-3.0.7, created on 2013-08-19 18:54:24
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/viewCatalogue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10098173065212a220023058-39144399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd7ad2c74cbf5813996c0936e32fc84969d04e40' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/viewCatalogue.tpl',
      1 => 1376952850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10098173065212a220023058-39144399',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/CatalogueBrowser/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
<div class = "focal">
	<h1>Catalogue Details:</h1> 
	<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('catalogueInfo')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
?>
	    <li class = "smallprint"><?php echo $_smarty_tpl->tpl_vars['line']->value;?>
</li>
	<?php }} ?>
</div>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/CatalogueBrowser/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('itemList')->value);$_template->assign('secondary',true);$_template->assign('accessKey',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div id="dialog-modal" title="Item Details">
  <div id = "item-details"></div>
</div>