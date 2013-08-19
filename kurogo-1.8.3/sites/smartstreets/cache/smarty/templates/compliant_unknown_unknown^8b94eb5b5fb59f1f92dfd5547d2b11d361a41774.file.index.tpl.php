<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:59:55
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/hello/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19821373151fc2bdb7bde63-11360596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b94eb5b5fb59f1f92dfd5547d2b11d361a41774' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/hello/templates/index.tpl',
      1 => 1375480160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19821373151fc2bdb7bde63-11360596',
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