<?php /* Smarty version Smarty-3.0.7, created on 2013-08-09 20:26:52
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100955883520588cc13aec8-96795035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31d2b5bee40ccdd2953daea1adbf2d824a5c45c6' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/index.tpl',
      1 => 1376094232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100955883520588cc13aec8-96795035',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/CatalogueBrowser/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
<h1 class="focal"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h1> 
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('catalogueList')->value);$_template->assign('secondary',true);$_template->assign('accessKey',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>