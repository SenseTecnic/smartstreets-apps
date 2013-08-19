<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 15:07:06
         compiled from "findInclude:common/templates/results.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17884753095201495a9e77e8-21808674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ccf8308e8a0e2a5b1dbd27afb04022de556e605' => 
    array (
      0 => 'findInclude:common/templates/results.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '17884753095201495a9e77e8-21808674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['defaultTemplateFile'] = new Smarty_variable("findInclude:common/templates/listItem.tpl", null, null);?>
<?php $_smarty_tpl->tpl_vars['listItemTemplateFile'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('listItemTemplateFile')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('defaultTemplateFile')->value : $tmp), null, null);?>
<ul class="results"<?php if ($_smarty_tpl->getVariable('resultslistID')->value){?> id="<?php echo $_smarty_tpl->getVariable('resultslistID')->value;?>
"<?php }?>>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('results')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <?php if (!isset($_smarty_tpl->tpl_vars['item']->value['separator'])){?>
      <li<?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?> class="icon"<?php }?>>
        <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('listItemTemplateFile')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('subTitleNewline',(($tmp = @$_smarty_tpl->getVariable('subTitleNewline')->value)===null||$tmp==='' ? true : $tmp)); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
      </li>
    <?php }?>
  <?php }} ?>
  <?php if (count($_smarty_tpl->getVariable('results')->value)==0){?>
    
      <li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("NO_RESULTS");?>
</li>
    
  <?php }?>
</ul>
