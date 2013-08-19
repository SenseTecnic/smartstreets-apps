<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 18:09:45
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/catalog/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124361388151fc2e29be0995-57485767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f382cbabd03a96951d31791c00fa527ee93881a4' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/catalog/templates/index.tpl',
      1 => 1375480160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124361388151fc2e29be0995-57485767',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
<h1 class="focal"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h1> 
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>