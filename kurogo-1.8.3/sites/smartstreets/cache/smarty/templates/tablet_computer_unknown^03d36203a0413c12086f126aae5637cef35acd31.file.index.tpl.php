<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:34:56
         compiled from "/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/calendar/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13019708051f18bf029d2a9-87892853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03d36203a0413c12086f126aae5637cef35acd31' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/calendar/templates/index.tpl',
      1 => 1364681343,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/navlist.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '13019708051f18bf029d2a9-87892853',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="nonfocal">
  <h2><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('today')->value,$_smarty_tpl->getVariable('dateFormat')->value);?>
</h2>
</div>

<?php if ($_smarty_tpl->getVariable('upcomingEvents')->value){?> 
  <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('upcomingEvents')->value);$_template->assign('subTitleNewline',true); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('userCalendars')->value)){?>
  <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('userCalendars')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('resources')->value)){?>
  <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('resources')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('calendarPages')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php ob_start(); ?>
  <?php if ($_smarty_tpl->getVariable('totalFeeds')->value>1){?>
    <select id="calendars" name="calendar">
    <?php  $_smarty_tpl->tpl_vars['typeFeeds'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('feeds')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['typeFeeds']->key => $_smarty_tpl->tpl_vars['typeFeeds']->value){
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['typeFeeds']->key;
?>
      <?php if (count($_smarty_tpl->getVariable('feeds')->value)>1){?>
        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
      <?php }?>
        <?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['feed'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['typeFeeds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value){
 $_smarty_tpl->tpl_vars['feed']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['feed']->value;?>
"<?php if ($_smarty_tpl->getVariable('selectedFeed')->value==$_smarty_tpl->tpl_vars['feed']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("CALENDAR_SEARCH_IN",$_smarty_tpl->tpl_vars['title']->value);?>
</option>
        <?php }} ?>
      <?php if (count($_smarty_tpl->getVariable('feeds')->value)>1){?>
        </optgroup>
      <?php }?>
    <?php }} ?>
    </select>
  <?php }elseif(strlen($_smarty_tpl->getVariable('selectedFeed')->value)){?>
    <input type="hidden" name="calendar" value="<?php echo $_smarty_tpl->getVariable('selectedFeed')->value;?>
" />
  <?php }?>
  <select id="timeframe" name="timeframe">
    <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('searchOptions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['option']->value['selected'])&&$_smarty_tpl->tpl_vars['option']->value['selected']){?> selected="selected"<?php }?> >
        <?php echo $_smarty_tpl->tpl_vars['option']->value['phrase'];?>

      </option>
    <?php }} ?>
  </select>
<?php  $_smarty_tpl->assign("selectSection", ob_get_contents()); Smarty::$_smarty_vars['capture']["selectSection"]=ob_get_clean();?>

<?php if (count($_smarty_tpl->getVariable('categories')->value)){?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('categories')->value);$_template->assign('navListHeading',$_smarty_tpl->getVariable('categoryHeading')->value);$_template->properties['nocache_hash']  = '13019708051f18bf029d2a9-87892853';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:34:56
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

<div class="<?php if ($_smarty_tpl->getVariable('totalFeeds')->value>1){?>select-count-2<?php }else{ ?>select-count-1<?php }?>">
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('additionalInputs',$_smarty_tpl->getVariable('selectSection')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</div>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
