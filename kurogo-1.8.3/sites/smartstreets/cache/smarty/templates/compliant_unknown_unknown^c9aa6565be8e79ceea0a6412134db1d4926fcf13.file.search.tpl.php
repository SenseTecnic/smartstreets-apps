<?php /* Smarty version Smarty-3.0.7, created on 2013-08-09 14:53:08
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/home/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127635929752053a94ac4c62-98397725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9aa6565be8e79ceea0a6412134db1d4926fcf13' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/home/templates/search.tpl',
      1 => 1364681343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127635929752053a94ac4c62-98397725',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('scalable',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php if ($_smarty_tpl->getVariable('showFederatedSearch')->value){?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('emphasized',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }else{ ?>
<div class="focal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("FEDERATED_SEARCH_DISABLED");?>
</div>
<?php }?>

<?php  $_smarty_tpl->tpl_vars['federatedSearchModule'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('federatedSearchModules')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['federatedSearchModule']->key => $_smarty_tpl->tpl_vars['federatedSearchModule']->value){
?>
  <h3 class="nonfocal"><?php echo $_smarty_tpl->tpl_vars['federatedSearchModule']->value['title'];?>
</h3>
  <div id="<?php echo $_smarty_tpl->tpl_vars['federatedSearchModule']->value['elementId'];?>
">
    
      <div class="focal">
        <div class="loading">Loading...</div>
      </div>
    
  </div>
<?php }} ?>


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
