<?php /* Smarty version Smarty-3.0.7, created on 2013-08-19 16:09:40
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/searchResults.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34038682652127b84310405-31817465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3827fc0a07cf078afb7181004c7660a54a01ae6' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/searchResults.tpl',
      1 => 1376942964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34038682652127b84310405-31817465',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/CatalogueBrowser/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
<div class = "focal">
	<h1>Search Results:</h1> 
<?php echo $_smarty_tpl->getVariable('resultCount')->value;?>
 result(s) found.
<!-- <select name="sort"  onchange="sortResults(this)">
	<option value="">Sort By:</option>
	<option value="lastupdate">Date</option>
	<option value="name">Name</option>
</select> -->
</div>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/CatalogueBrowser/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('itemList')->value);$_template->assign('secondary',true);$_template->assign('accessKey',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div id="dialog-modal" title="Details">
  <div id = "item-details"></div>
</div>