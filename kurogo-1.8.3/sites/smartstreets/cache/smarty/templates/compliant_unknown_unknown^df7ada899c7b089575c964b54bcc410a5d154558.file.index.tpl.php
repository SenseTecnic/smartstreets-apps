<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 12:55:15
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/people/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32241655952012a73d67238-64588506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df7ada899c7b089575c964b54bcc410a5d154558' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/people/templates/index.tpl',
      1 => 1364681344,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/navlist.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '32241655952012a73d67238-64588506',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php ob_start(); ?>
<?php if (count($_smarty_tpl->getVariable('feeds')->value)>1){?>
    <select id="feed" name="feed">
	<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['feed'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('feeds')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value){
 $_smarty_tpl->tpl_vars['feed']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['feed']->value;?>
"<?php if ($_smarty_tpl->getVariable('selectedFeed')->value==$_smarty_tpl->tpl_vars['feed']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("PEOPLE_SEARCH_IN",$_smarty_tpl->tpl_vars['title']->value);?>
</option>
	<?php }} ?>
	</select>
<?php }?>
<?php  $_smarty_tpl->assign("selectSection", ob_get_contents()); Smarty::$_smarty_vars['capture']["selectSection"]=ob_get_clean();?>


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('resultCount',$_smarty_tpl->getVariable('resultCount')->value);$_template->assign('tip',$_smarty_tpl->getVariable('searchTip')->value);$_template->assign('additionalInputs',$_smarty_tpl->getVariable('selectSection')->value);$_template->properties['nocache_hash']  = '32241655952012a73d67238-64588506';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 12:55:16
         compiled from "findInclude:common/templates/search.tpl" */ ?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php ob_start(); ?>
  <?php if ((!isset($_smarty_tpl->getVariable('searchPage',null,true,false)->value)&&($_smarty_tpl->getVariable('page')->value=='search'))||($_smarty_tpl->getVariable('page')->value==$_smarty_tpl->getVariable('searchPage')->value)){?>
    <?php $_smarty_tpl->tpl_vars['hiddenArgs'] = new Smarty_variable($_smarty_tpl->getVariable('breadcrumbSamePageArgs')->value, null, null);?>
  <?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['hiddenArgs'] = new Smarty_variable($_smarty_tpl->getVariable('breadcrumbArgs')->value, null, null);?>
  <?php }?>
  
  <?php if (isset($_smarty_tpl->getVariable('extraArgs',null,true,false)->value)){?>
    <?php $_smarty_tpl->tpl_vars['hiddenArgs'] = new Smarty_variable(array_merge($_smarty_tpl->getVariable('extraArgs')->value,$_smarty_tpl->getVariable('hiddenArgs')->value), null, null);?>
  <?php }?>
  <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['arg'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hiddenArgs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['arg']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
    <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['arg']->value;?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value);?>
" />
  <?php }} ?>
<?php  $_smarty_tpl->assign("hiddenArgHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["hiddenArgHTML"]=ob_get_clean();?>

<?php ob_start(); ?>
  <?php if ($_smarty_tpl->getVariable('inlineSearchError')->value){?>
    <p><?php echo $_smarty_tpl->getVariable('inlineSearchError')->value;?>
</p>
  <?php }elseif(isset($_smarty_tpl->getVariable('resultCount',null,true,false)->value)){?>
    <?php if ($_smarty_tpl->getVariable('resultCount')->value==0){?>
      <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("NO_MATCHES_FOUND");?>
</p>
    <?php }elseif($_smarty_tpl->getVariable('resultCount')->value==1){?>
      <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ONE_MATCH_FOUND");?>
</p>
    <?php }else{ ?>
      <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("NUM_MATCHES_FOUND",$_smarty_tpl->getVariable('resultCount')->value);?>
</p>
    <?php }?>
  <?php }?>
<?php  $_smarty_tpl->assign("inlineErrorHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["inlineErrorHTML"]=ob_get_clean();?>

<?php ob_start(); ?>
  <?php if (isset($_smarty_tpl->getVariable('tip',null,true,false)->value)){?>
    <p class="legend nonfocal">
      <strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCH_TIP_TITLE");?>
</strong> <?php echo $_smarty_tpl->getVariable('tip')->value;?>

    </p>
  <?php }?>
<?php  $_smarty_tpl->assign("tipHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["tipHTML"]=ob_get_clean();?>

<?php $_smarty_tpl->tpl_vars['searchAction'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('searchPage')->value)===null||$tmp==='' ? "/".($_smarty_tpl->getVariable('configModule')->value)."/search" : $tmp), null, null);?>


  <?php if (!$_smarty_tpl->getVariable('insideForm')->value){?>
    <div class="nonfocal" id="searchformcontainer">
      <form method="get" action="<?php echo $_smarty_tpl->getVariable('searchAction')->value;?>
">
  <?php }?>
  
        <fieldset class="inputcombo<?php if ((($tmp = @$_smarty_tpl->getVariable('emphasized')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('isModuleHome')->value : $tmp)){?> emphasized<?php }?>">
          <div class="searchwrapper"><input class="forminput" type="text" id="<?php echo (($tmp = @$_smarty_tpl->getVariable('inputName')->value)===null||$tmp==='' ? 'filter' : $tmp);?>
" name="<?php echo (($tmp = @$_smarty_tpl->getVariable('inputName')->value)===null||$tmp==='' ? 'filter' : $tmp);?>
" placeholder="<?php echo (($tmp = @$_smarty_tpl->getVariable('placeholder')->value)===null||$tmp==='' ? '' : $tmp);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('searchTerms')->value);?>
" onfocus="androidPlaceholderFix(this);" /></div>

          <input class="combobutton" id="sch_btn" src="/common/images/search-button.png" type="image" />
          <?php echo $_smarty_tpl->getVariable('hiddenArgHTML')->value;?>

        </fieldset>
        <?php if (isset($_smarty_tpl->getVariable('additionalInputs',null,true,false)->value)){?>
          <fieldset>
            <?php echo $_smarty_tpl->getVariable('additionalInputs')->value;?>

          </fieldset>
        <?php }?>
        <?php echo $_smarty_tpl->getVariable('tipHTML')->value;?>

        <?php echo $_smarty_tpl->getVariable('inlineErrorHTML')->value;?>

      
  <?php if (!$_smarty_tpl->getVariable('insideForm')->value){?>
      </form>
    </div>
  <?php }?>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/search.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>


<?php if ($_smarty_tpl->getVariable('hasBookmarks')->value){?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('bookmarkLink')->value);$_template->assign('secondary',true); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }?>


<?php if ($_smarty_tpl->getVariable('contacts')->value){?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('contacts')->value);$_template->assign('secondary',true);$_template->assign('accessKey',false);$_template->assign('subTitleNewline',$_smarty_tpl->getVariable('contactsSubTitleNewline')->value);$_template->properties['nocache_hash']  = '32241655952012a73d67238-64588506';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 12:55:16
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


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>