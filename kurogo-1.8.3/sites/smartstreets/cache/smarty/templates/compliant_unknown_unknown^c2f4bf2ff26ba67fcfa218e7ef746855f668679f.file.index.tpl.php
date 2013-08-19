<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:40
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/home/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89905730251fc25783b7082-20545669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2f4bf2ff26ba67fcfa218e7ef746855f668679f' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/home/templates/index.tpl',
      1 => 1364681343,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/page/navigation/userContextList.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '89905730251fc25783b7082-20545669',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php ob_start(); ?>
  
    <?php if ($_smarty_tpl->getVariable('bannerNotice')->value){?>
      <div class="banner-notice">
        <?php if ($_smarty_tpl->getVariable('bannerURL')->value){?>
          <a href="<?php echo $_smarty_tpl->getVariable('bannerURL')->value;?>
" class="banner-message">
        <?php }else{ ?>
          <span class="banner-message">
        <?php }?>
          <img class="banner-icon" src="/common/images/alert<?php echo $_smarty_tpl->getVariable('imageExt')->value;?>
" />
          <?php echo $_smarty_tpl->getVariable('bannerNotice')->value['title'];?>

        <?php if ($_smarty_tpl->getVariable('bannerURL')->value){?>
          </a>
        <?php }else{ ?>
          </span>
        <?php }?>
      </div>
    <?php }?>
  
  
    <h1 id="homelogo" class="<?php if (isset($_smarty_tpl->getVariable('topItem',null,true,false)->value)){?>roomfornew<?php }?> <?php echo $_smarty_tpl->getVariable('home_banner_class')->value;?>
">
      <img src="/modules/<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
/images/logo-home<?php echo $_smarty_tpl->getVariable('imageExt')->value;?>
" width="<?php echo (($tmp = @$_smarty_tpl->getVariable('banner_width')->value)===null||$tmp==='' ? 265 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->getVariable('banner_height')->value)===null||$tmp==='' ? 45 : $tmp);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('strings')->value['SITE_NAME']);?>
" />
    </h1>
  
<?php  $_smarty_tpl->assign("banner", ob_get_contents()); Smarty::$_smarty_vars['capture']["banner"]=ob_get_clean();?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('customHeader',$_smarty_tpl->getVariable('banner')->value);$_template->assign('scalable',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php if ($_smarty_tpl->getVariable('showFederatedSearch')->value){?>
  
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '89905730251fc25783b7082-20545669';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:40
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
  
<?php }?>

<div id="homemodules">
<?php $_template = new Smarty_Internal_Template("findInclude:modules/home/templates/include/modules.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</div>





  <?php if ($_smarty_tpl->getVariable('SHOW_DOWNLOAD_TEXT')->value){?>
    <p id="download">
      <a href="/download/">
        <img src="<?php echo $_smarty_tpl->getVariable('downloadImgPrefix')->value;?>
<?php echo $_smarty_tpl->getVariable('imageExt')->value;?>
" alt="" align="absmiddle" />
        <?php echo $_smarty_tpl->getVariable('SHOW_DOWNLOAD_TEXT')->value;?>

      </a>
      <br />
    </p>
  <?php }?>  



<?php if ($_smarty_tpl->getVariable('userContextList')->value){?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/navigation/userContextList.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navContainerID',"homemodules");$_template->properties['nocache_hash']  = '89905730251fc25783b7082-20545669';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:41
         compiled from "findInclude:common/templates/page/navigation/userContextList.tpl" */ ?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php if ($_smarty_tpl->getVariable('userContextListStyle')->value!='none'){?>
<div id="userContextList" class="userContextList">
<?php if ($_smarty_tpl->getVariable('userContextListStyle')->value=='link'){?>
<a href="<?php echo $_smarty_tpl->getVariable('customizeURL')->value;?>
"><?php echo $_smarty_tpl->getVariable('strings')->value['USER_CONTEXT_CUSTOM'];?>
</a>
<?php }else{ ?>
<div class="userContextListDescription"><?php echo $_smarty_tpl->getVariable('userContextListDescription')->value;?>
</div>
<?php if ($_smarty_tpl->getVariable('userContextListStyle')->value=='list'){?>
<ul>
<?php  $_smarty_tpl->tpl_vars['contextItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('userContextList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['contextItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['contextItem']->iteration=0;
if ($_smarty_tpl->tpl_vars['contextItem']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contextItem']->key => $_smarty_tpl->tpl_vars['contextItem']->value){
 $_smarty_tpl->tpl_vars['contextItem']->iteration++;
 $_smarty_tpl->tpl_vars['contextItem']->last = $_smarty_tpl->tpl_vars['contextItem']->iteration === $_smarty_tpl->tpl_vars['contextItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["userContextList"]['last'] = $_smarty_tpl->tpl_vars['contextItem']->last;
?>
<li context="<?php echo $_smarty_tpl->tpl_vars['contextItem']->value['context'];?>
" url="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['contextItem']->value['url']);?>
" ajax="<?php echo $_smarty_tpl->tpl_vars['contextItem']->value['ajax'];?>
"<?php if ($_smarty_tpl->tpl_vars['contextItem']->value['active']){?> class="contextSelected"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['contextItem']->value['ajax']){?>#<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['contextItem']->value['url'];?>
<?php }?>"<?php if ($_smarty_tpl->tpl_vars['contextItem']->value['ajax']){?> onclick="return updateUserContextLink(this, '<?php echo $_smarty_tpl->getVariable('navContainerID')->value;?>
');<?php }?>"><?php echo $_smarty_tpl->tpl_vars['contextItem']->value['title'];?>
</a> <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['userContextList']['last']){?><?php }?></li>
<?php }} ?>
</ul>
<?php }elseif($_smarty_tpl->getVariable('userContextListStyle')->value=='select'){?>
<select onchange="updateUserContextSelect(this,'<?php echo $_smarty_tpl->getVariable('navContainerID')->value;?>
')">
<?php  $_smarty_tpl->tpl_vars['contextItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('userContextList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['contextItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['contextItem']->iteration=0;
if ($_smarty_tpl->tpl_vars['contextItem']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contextItem']->key => $_smarty_tpl->tpl_vars['contextItem']->value){
 $_smarty_tpl->tpl_vars['contextItem']->iteration++;
 $_smarty_tpl->tpl_vars['contextItem']->last = $_smarty_tpl->tpl_vars['contextItem']->iteration === $_smarty_tpl->tpl_vars['contextItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["userContextList"]['last'] = $_smarty_tpl->tpl_vars['contextItem']->last;
?>
  <option value="<?php echo $_smarty_tpl->tpl_vars['contextItem']->value['context'];?>
" url="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['contextItem']->value['url']);?>
" ajax="<?php echo $_smarty_tpl->tpl_vars['contextItem']->value['ajax'];?>
"<?php if ($_smarty_tpl->tpl_vars['contextItem']->value['active']){?> selected="true"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contextItem']->value['title'];?>
</option>
<?php }} ?>
</select>
<?php }?>
<?php }?>
</div>
<?php }?><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/navigation/userContextList.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
<?php }?>


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
