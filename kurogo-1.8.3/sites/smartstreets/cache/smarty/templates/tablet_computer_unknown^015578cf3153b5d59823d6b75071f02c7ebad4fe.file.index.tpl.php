<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:35:00
         compiled from "/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/dining/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176431707951f18bf4a72010-06339135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '015578cf3153b5d59823d6b75071f02c7ebad4fe' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/dining/templates/index.tpl',
      1 => 1364681343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176431707951f18bf4a72010-06339135',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>


<?php if (isset($_smarty_tpl->getVariable('description',null,true,false)->value)&&strlen($_smarty_tpl->getVariable('description')->value)){?>
  <p class="nonfocal smallprint">
    <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('description')->value);?>

  </p>
<?php }?>

<div id="locations">
<?php  $_smarty_tpl->tpl_vars['locationGroup'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('groupedLocations')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['locationGroup']->key => $_smarty_tpl->tpl_vars['locationGroup']->value){
?>
	<?php if ($_smarty_tpl->tpl_vars['locationGroup']->value){?>
		<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navListHeading',$_smarty_tpl->tpl_vars['locationGroup']->value['title']);$_template->assign('navlistItems',$_smarty_tpl->tpl_vars['locationGroup']->value['items']);$_template->assign('subTitleNewline',true); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<?php }?>
<?php }} ?>
</div>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
