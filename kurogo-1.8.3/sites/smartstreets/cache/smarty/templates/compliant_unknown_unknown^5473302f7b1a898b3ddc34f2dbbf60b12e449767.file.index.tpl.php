<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 15:07:11
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/emergency/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14787766295201495f1dfd03-01922690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5473302f7b1a898b3ddc34f2dbbf60b12e449767' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/emergency/templates/index.tpl',
      1 => 1364681343,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/results.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '14787766295201495f1dfd03-01922690',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php if ($_smarty_tpl->getVariable('hasEmergencyFeed')->value){?>
  <?php  $_smarty_tpl->tpl_vars['emergencyNotice'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('emergencyNotices')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['emergencyNotice']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['emergencyNotice']->key => $_smarty_tpl->tpl_vars['emergencyNotice']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['emergencyNotice']->key;
 $_smarty_tpl->tpl_vars['emergencyNotice']->index++;
 $_smarty_tpl->tpl_vars['emergencyNotice']->first = $_smarty_tpl->tpl_vars['emergencyNotice']->index === 0;
?>
      <?php ob_start(); ?>
        
          <div class="emergency-notice<?php if ($_smarty_tpl->tpl_vars['emergencyNotice']->first){?> emergency-featured<?php }?>">
          <?php if ($_smarty_tpl->getVariable('notice')->value['url']){?><a href="<?php echo $_smarty_tpl->getVariable('notice')->value['url'];?>
"<?php if ($_smarty_tpl->getVariable('notice')->value['external']){?> class="external"<?php }?>><?php }?>
            <div class="title"><?php echo $_smarty_tpl->tpl_vars['emergencyNotice']->value['title'];?>
</div>
            <?php if ($_smarty_tpl->tpl_vars['emergencyNotice']->value['date']){?>
              <div class="pubdate"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['emergencyNotice']->value['date'],$_smarty_tpl->getVariable('dateFormat')->value);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['emergencyNotice']->value['date'],$_smarty_tpl->getVariable('timeFormat')->value);?>
</div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['emergencyNotice']->value['text']){?>
              <div class="content"><?php echo $_smarty_tpl->tpl_vars['emergencyNotice']->value['text'];?>
</div>
            <?php }?>
          <?php if ($_smarty_tpl->getVariable('notice')->value['url']){?></a><?php }?>
          </div>
        
      <?php  $_smarty_tpl->assign("title", ob_get_contents()); Smarty::$_smarty_vars['capture']["title"]=ob_get_clean();?>
      <?php if (!isset($_smarty_tpl->tpl_vars['emergencyNotices']) || !is_array($_smarty_tpl->tpl_vars['emergencyNotices']->value)) $_smarty_tpl->createLocalArrayVariable('emergencyNotices', null, null);
$_smarty_tpl->tpl_vars['emergencyNotices']->value[$_smarty_tpl->tpl_vars['i']->value]['title'] = $_smarty_tpl->getVariable('title')->value;?>
  <?php }} ?>
  
  
    <div class="focal nav">
      <?php if (count($_smarty_tpl->getVariable('emergencyNotices')->value)){?>
        <?php $_smarty_tpl->tpl_vars['featuredNotice'] = new Smarty_variable(array_shift($_smarty_tpl->getVariable('emergencyNotices')->value), null, null);?>
        <?php if ($_smarty_tpl->getVariable('featuredNotice')->value['url']){?><a href="<?php echo $_smarty_tpl->getVariable('featuredNotice')->value['url'];?>
"<?php if ($_smarty_tpl->getVariable('featuredNotice')->value['external']){?> class="external"<?php }?>><?php }?>
        <?php echo $_smarty_tpl->getVariable('featuredNotice')->value['title'];?>

        <?php if ($_smarty_tpl->getVariable('featuredNotice')->value['url']){?></a><?php }?>
      <?php }else{ ?>
        <?php echo $_smarty_tpl->getVariable('moduleStrings')->value['NO_EMERGENCY'];?>

      <?php }?>
    </div>
  
<?php }?>

<?php if ($_smarty_tpl->getVariable('hasContacts')->value){?>
  
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('contactNavListItems')->value);$_template->assign('accessKey',false);$_template->assign('subTitleNewline',$_smarty_tpl->getVariable('subTitleNewline')->value);$_template->properties['nocache_hash']  = '14787766295201495f1dfd03-01922690';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 15:07:11
         compiled from "findInclude:common/templates/navlist.tpl" */ ?>
<?php $_smarty_tpl->tpl_vars['defaultTemplateFile'] = new Smarty_variable("findInclude:common/templates/listItem.tpl", null, null);?>
<?php $_smarty_tpl->tpl_vars['listItemTemplateFile'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('listItemTemplateFile')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('defaultTemplateFile')->value : $tmp), null, null);?>
<?php if ($_smarty_tpl->getVariable('navListHeading')->value){?>
<div class="nonfocal listhead">
  <h3><?php echo $_smarty_tpl->getVariable('navListHeading')->value;?>
</h3>
  <?php if ($_smarty_tpl->getVariable('navListSubheading')->value){?><p class="smallprint"><?php echo $_smarty_tpl->getVariable('navListSubheading')->value;?>
</p><?php }?>
</div>
<?php }?>
<ul class="nav<?php if ($_smarty_tpl->getVariable('secondary')->value){?> secondary<?php }?><?php if ($_smarty_tpl->getVariable('nested')->value){?> nested<?php }?><?php if ($_smarty_tpl->getVariable('navlistClass')->value){?> <?php echo $_smarty_tpl->getVariable('navlistClass')->value;?>
<?php }?>"<?php if ($_smarty_tpl->getVariable('navlistID')->value){?> id="<?php echo $_smarty_tpl->getVariable('navlistID')->value;?>
"<?php }?>>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('navlistItems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <?php if ($_smarty_tpl->getVariable('hideImages')->value){?><?php if (!isset($_smarty_tpl->tpl_vars['item']) || !is_array($_smarty_tpl->tpl_vars['item']->value)) $_smarty_tpl->createLocalArrayVariable('item', null, null);
$_smarty_tpl->tpl_vars['item']->value['img'] = null;?><?php }?>
    <?php if (!isset($_smarty_tpl->tpl_vars['item']->value['separator'])){?>
      <li<?php if ($_smarty_tpl->tpl_vars['item']->value['img']||$_smarty_tpl->tpl_vars['item']->value['listclass']){?> class="<?php echo $_smarty_tpl->tpl_vars['item']->value['listclass'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?> icon<?php }?>"<?php }?>><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('listItemTemplateFile')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('subTitleNewline',(($tmp = @$_smarty_tpl->getVariable('subTitleNewline')->value)===null||$tmp==='' ? false : $tmp)); echo $_template->getRenderedTemplate();?><?php unset($_template);?></li>
    <?php }?>
  <?php }} ?>
</ul>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/navlist.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  
<?php }?>

<?php if ($_smarty_tpl->getVariable('hasEmergencyFeed')->value&&count($_smarty_tpl->getVariable('emergencyNotices')->value)){?>
  
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('emergencyNotices')->value);$_template->properties['nocache_hash']  = '14787766295201495f1dfd03-01922690';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 15:07:11
         compiled from "findInclude:common/templates/results.tpl" */ ?>
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
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/results.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  
<?php }?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
