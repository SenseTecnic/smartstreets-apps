<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:29
         compiled from "findInclude:modules/CatalogueBrowser/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99608987852040a71766ef6-75442774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8692960cba52006a3524936593779c03a42f006a' => 
    array (
      0 => 'findInclude:modules/CatalogueBrowser/templates/header.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
    'ec6fbe204c4bbde73077e070cf82ea43b894b599' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/header.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/page/moduleDebug.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
    '642372a0695c2d19f8431d3020553776161b6d41' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/page/navigation/navbar.tpl',
      1 => 1375918259,
      2 => 'file',
    ),
    '9d59ed3f8c2f66412c985cfe7b15d08391641341' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/page/login.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
    '6a0ef0be058ffb421dd331cccdcc99525f1ef994' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/search.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99608987852040a71766ef6-75442774',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.capitalize.php';
?><?php if (!$_smarty_tpl->getVariable('webBridgeAjaxContentLoad')->value&&!$_smarty_tpl->getVariable('ajaxContentLoad')->value){?><?php echo '<?xml';?> version="1.0" encoding="UTF-8"<?php echo '?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/head.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</head>


  <?php $_smarty_tpl->tpl_vars['kgoHasNavmenu'] = new Smarty_variable(count($_smarty_tpl->getVariable('navigationModules')->value)>0, null, null);?>
  <?php $_smarty_tpl->tpl_vars['kgoHasNavbar'] = new Smarty_variable(!isset($_smarty_tpl->getVariable('customHeader',null,true,false)->value), null, null);?>

<body class="<?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('configModule')->value);?>
Module<?php if ($_smarty_tpl->getVariable('configModule')->value!=$_smarty_tpl->getVariable('moduleID')->value){?> <?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('moduleID')->value);?>
Module<?php }?><?php if ($_smarty_tpl->getVariable('moduleFillScreen')->value){?> fillscreen<?php }?><?php if ($_smarty_tpl->getVariable('kgoHasNavmenu')->value){?> kgo-has-navmenu<?php }?><?php if ($_smarty_tpl->getVariable('kgoHasNavbar')->value){?> kgo-has-navbar<?php }?><?php if ($_smarty_tpl->getVariable('configModule')->value==$_smarty_tpl->getVariable('homeModuleID')->value&&$_smarty_tpl->getVariable('page')->value=='index'){?> kgo-site-homepage<?php }?>" 
  
  onload="tabletInit();<?php if (count($_smarty_tpl->getVariable('onLoadBlocks')->value)){?>onLoad();<?php }?><?php if (count($_smarty_tpl->getVariable('onOrientationChangeBlocks')->value)){?>onOrientationChange();<?php }?>"
>
  <div id="kgo_accessibility_links">
  
  <a href="#content_top">Skip to Content</a>

  </div>
  <div id="nonfooternav">
    <?php if (isset($_smarty_tpl->getVariable('customHeader',null,true,false)->value)){?>
      
        <a name="top"> </a>
      
      <?php echo $_smarty_tpl->getVariable('customHeader')->value;?>

    <?php }else{ ?>
      
        <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/navigation/navbar.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '99608987852040a71766ef6-75442774';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:32
         compiled from "findInclude:common/templates/page/navigation/navbar.tpl" */ ?>
<?php ob_start(); ?>
  
    <?php if (isset($_smarty_tpl->getVariable('customNavbarBreadcrumbsHTML',null,true,false)->value)){?>
      <?php echo $_smarty_tpl->getVariable('customNavbarBreadcrumbsHTML')->value;?>

    <?php }else{ ?>
      <?php if (!$_smarty_tpl->getVariable('isModuleHome')->value){?>
        <?php if (count($_smarty_tpl->getVariable('breadcrumbs')->value)&&!$_smarty_tpl->getVariable('breadcrumbsShowAll')->value){?>
          <?php $_smarty_tpl->tpl_vars['breadcrumb'] = new Smarty_variable(reset($_smarty_tpl->getVariable('breadcrumbs')->value), null, null);?>
          <?php $_smarty_tpl->tpl_vars['breadcrumbs'] = new Smarty_variable(array(), null, null);?>
          <?php if (!isset($_smarty_tpl->tpl_vars['breadcrumbs']) || !is_array($_smarty_tpl->tpl_vars['breadcrumbs']->value)) $_smarty_tpl->createLocalArrayVariable('breadcrumbs', null, null);
$_smarty_tpl->tpl_vars['breadcrumbs']->value[] = $_smarty_tpl->getVariable('breadcrumb')->value;?>
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['breadcrumb'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('breadcrumbs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['breadcrumb']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['breadcrumb']->iteration=0;
 $_smarty_tpl->tpl_vars['breadcrumb']->index=-1;
if ($_smarty_tpl->tpl_vars['breadcrumb']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['breadcrumb']->key => $_smarty_tpl->tpl_vars['breadcrumb']->value){
 $_smarty_tpl->tpl_vars['breadcrumb']->iteration++;
 $_smarty_tpl->tpl_vars['breadcrumb']->index++;
 $_smarty_tpl->tpl_vars['breadcrumb']->first = $_smarty_tpl->tpl_vars['breadcrumb']->index === 0;
 $_smarty_tpl->tpl_vars['breadcrumb']->last = $_smarty_tpl->tpl_vars['breadcrumb']->iteration === $_smarty_tpl->tpl_vars['breadcrumb']->total;
?>
          <?php if ($_smarty_tpl->tpl_vars['breadcrumb']->first){?>
            <?php $_smarty_tpl->tpl_vars['crumbClass'] = new Smarty_variable('module', null, null);?>
          <?php }elseif(count($_smarty_tpl->getVariable('breadcrumbs')->value)==1){?>
            <?php $_smarty_tpl->tpl_vars['crumbClass'] = new Smarty_variable('crumb1', null, null);?>
          <?php }elseif(count($_smarty_tpl->getVariable('breadcrumbs')->value)==2){?>
            <?php if (!$_smarty_tpl->tpl_vars['breadcrumb']->last){?>
              <?php $_smarty_tpl->tpl_vars['crumbClass'] = new Smarty_variable('crumb2a', null, null);?>
            <?php }else{ ?>
              <?php $_smarty_tpl->tpl_vars['crumbClass'] = new Smarty_variable('crumb2b', null, null);?>
            <?php }?>
          <?php }elseif(count($_smarty_tpl->getVariable('breadcrumbs')->value)>2){?>
            <?php if ($_smarty_tpl->tpl_vars['breadcrumb']->last){?>
              <?php $_smarty_tpl->tpl_vars['crumbClass'] = new Smarty_variable('crumb3c', null, null);?>
            <?php }elseif($_smarty_tpl->tpl_vars['breadcrumb']->index==($_smarty_tpl->tpl_vars['breadcrumb']->total-2)){?>
              <?php $_smarty_tpl->tpl_vars['crumbClass'] = new Smarty_variable('crumb3b', null, null);?>
            <?php }else{ ?>
              <?php $_smarty_tpl->tpl_vars['crumbClass'] = new Smarty_variable('crumb3a', null, null);?>
            <?php }?>
            
          <?php }?>
          <?php if ($_smarty_tpl->getVariable('configModule')->value!=$_smarty_tpl->getVariable('homeModuleID')->value||!$_smarty_tpl->tpl_vars['breadcrumb']->first){?>
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['sanitize_url'][0][0]->smartyModifierSanitizeURL($_smarty_tpl->tpl_vars['breadcrumb']->value['url']);?>
" <?php if (isset($_smarty_tpl->getVariable('crumbClass',null,true,false)->value)){?>class="<?php echo $_smarty_tpl->getVariable('crumbClass')->value;?>
"<?php }?>>
              <?php if ($_smarty_tpl->tpl_vars['breadcrumb']->first){?>
                <img src="/common/images/<?php if ($_smarty_tpl->getVariable('title_icon_set')->value){?>iconsets/<?php echo $_smarty_tpl->getVariable('title_icon_set')->value;?>
/<?php echo $_smarty_tpl->getVariable('title_icon_size')->value;?>
/<?php }else{ ?>title-<?php }?><?php echo (($tmp = @$_smarty_tpl->getVariable('navImageID')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('configModule')->value : $tmp);?>
.png" width="<?php echo (($tmp = @$_smarty_tpl->getVariable('module_nav_image_width')->value)===null||$tmp==='' ? 30 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->getVariable('module_nav_image_height')->value)===null||$tmp==='' ? 30 : $tmp);?>
" alt="" />
              <?php }else{ ?>
                <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['sanitize_html'][0][0]->smartyModifierSanitizeHTML($_smarty_tpl->tpl_vars['breadcrumb']->value['title'],'inline');?>
</span>
              <?php }?>
            </a>
          <?php }?>
        <?php }} ?>
      <?php }?>
    <?php }?>
  
<?php  $_smarty_tpl->assign("kgoNavbarBreadcrumbsHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoNavbarBreadcrumbsHTML"]=ob_get_clean();?>

<?php ob_start(); ?>
  
    <?php if ($_smarty_tpl->getVariable('isModuleHome')->value){?>
      <img src="/common/images/<?php if ($_smarty_tpl->getVariable('title_icon_set')->value){?>iconsets/<?php echo $_smarty_tpl->getVariable('title_icon_set')->value;?>
/<?php echo $_smarty_tpl->getVariable('title_icon_size')->value;?>
/<?php }else{ ?>title-<?php }?><?php echo (($tmp = @$_smarty_tpl->getVariable('navImageID')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('configModule')->value : $tmp);?>
.png" width="<?php echo (($tmp = @$_smarty_tpl->getVariable('module_nav_image_width')->value)===null||$tmp==='' ? 30 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->getVariable('module_nav_image_height')->value)===null||$tmp==='' ? 30 : $tmp);?>
" alt="" class="moduleicon" />
    <?php }?>
  
<?php  $_smarty_tpl->assign("kgoNavbarModuleHomeIconHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoNavbarModuleHomeIconHTML"]=ob_get_clean();?>

<?php ob_start(); ?>
  
    <?php if (isset($_smarty_tpl->getVariable('customNavbarHomelink',null,true,false)->value)){?>
      <?php echo $_smarty_tpl->getVariable('customNavbarHomelink')->value;?>

    <?php }else{ ?>
      <a href="<?php echo $_smarty_tpl->getVariable('homeLink')->value;?>
" class="homelink" title="<?php echo $_smarty_tpl->getVariable('homeLinkText')->value;?>
">
        <?php $_smarty_tpl->tpl_vars['useWideHomeLink'] = new Smarty_variable($_smarty_tpl->getVariable('homelink_use_wide_image')->value||($_smarty_tpl->getVariable('configModule')->value==$_smarty_tpl->getVariable('homeModuleID')->value&&$_smarty_tpl->getVariable('isModuleHome')->value&&$_smarty_tpl->getVariable('homelink_use_wide_image_sitehome')->value), null, null);?>
        <img src="/common/images/homelink<?php if ($_smarty_tpl->getVariable('useWideHomeLink')->value){?>-wide<?php }?>.png" width="<?php if ($_smarty_tpl->getVariable('useWideHomeLink')->value){?><?php echo $_smarty_tpl->getVariable('homelink_wide_image_width')->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('homelink_image_width')->value;?>
<?php }?>" height="<?php if ($_smarty_tpl->getVariable('useWideHomeLink')->value){?><?php echo $_smarty_tpl->getVariable('homelink_wide_image_height')->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('homelink_image_height')->value;?>
<?php }?>" alt="<?php echo $_smarty_tpl->getVariable('homeLinkText')->value;?>
" />
      </a>
    <?php }?>
  
<?php  $_smarty_tpl->assign("kgoNavbarHomelink", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoNavbarHomelink"]=ob_get_clean();?>

<?php ob_start(); ?>
  
    <?php if (isset($_smarty_tpl->getVariable('customNavbarPagetitle',null,true,false)->value)){?>
      <?php echo $_smarty_tpl->getVariable('customNavbarPagetitle')->value;?>

    <?php }else{ ?>
      <span class="pagetitle">
        <?php echo $_smarty_tpl->getVariable('kgoNavbarModuleHomeIconHTML')->value;?>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['sanitize_html'][0][0]->smartyModifierSanitizeHTML($_smarty_tpl->getVariable('pageTitle')->value,'inline');?>

      </span>
    <?php }?>
  
<?php  $_smarty_tpl->assign("kgoNavbarPagetitle", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoNavbarPagetitle"]=ob_get_clean();?>

<?php ob_start(); ?>
  <?php if ($_smarty_tpl->getVariable('hasHelp')->value){?>
    
      <?php if (isset($_smarty_tpl->getVariable('customNavbarHelp',null,true,false)->value)){?>
        <?php echo $_smarty_tpl->getVariable('customNavbarHelp')->value;?>

      <?php }else{ ?>
        <div class="help">
          <a href="<?php echo $_smarty_tpl->getVariable('helpLink')->value;?>
" title="<?php echo $_smarty_tpl->getVariable('helpLinkText')->value;?>
"><img src="/common/images/help.png" width="<?php echo (($tmp = @$_smarty_tpl->getVariable('help_image_width')->value)===null||$tmp==='' ? 46 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->getVariable('help_image_height')->value)===null||$tmp==='' ? 45 : $tmp);?>
" alt="<?php echo $_smarty_tpl->getVariable('helpLinkText')->value;?>
" /></a>
        </div>
      <?php }?>
    
  <?php }?>
<?php  $_smarty_tpl->assign("kgoNavbarHelp", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoNavbarHelp"]=ob_get_clean();?>


  <div id="navbar"<?php if ($_smarty_tpl->getVariable('hasHelp')->value){?> class="helpon"<?php }?>>
    <?php if (isset($_smarty_tpl->getVariable('customNavmenuButton',null,true,false)->value)){?>
      <?php echo $_smarty_tpl->getVariable('customNavmenuButton')->value;?>

    <?php }else{ ?>
      <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/navigation/navmenuButton.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '214136262452040a743c2934-40345450';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:33
         compiled from "findInclude:common/templates/page/navigation/navmenuButton.tpl" */ ?>
<?php if ($_smarty_tpl->getVariable('navigationModules')->value){?>
  <div class="navmenu-button" onclick="return handleNavmenuButton(this);">
    <img src="/common/images/menu-button.png" width="55" height="44" alt="Menu">
  </div>
<?php }?>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/navigation/navmenuButton.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php }?>
    <div class="breadcrumbs<?php if ($_smarty_tpl->getVariable('isModuleHome')->value){?> homepage<?php }?>">
      <?php echo $_smarty_tpl->getVariable('kgoNavbarHomelink')->value;?>

      <?php echo $_smarty_tpl->getVariable('kgoNavbarBreadcrumbsHTML')->value;?>

      <?php echo $_smarty_tpl->getVariable('kgoNavbarPagetitle')->value;?>

    </div>
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/login.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '214136262452040a743c2934-40345450';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:33
         compiled from "findInclude:common/templates/page/login.tpl" */ ?>
<?php if ($_smarty_tpl->getVariable('showLogin')->value){?>
  <div class="loginstatus">
    
  <div<?php if ($_smarty_tpl->getVariable('footerLoginClass')->value){?> class="<?php echo $_smarty_tpl->getVariable('footerLoginClass')->value;?>
"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('footerLoginLink')->value;?>
"><?php echo $_smarty_tpl->getVariable('footerLoginText')->value;?>
</a></div>

  </div>
<?php }?>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/page/login.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php echo $_smarty_tpl->getVariable('kgoNavbarHelp')->value;?>

  </div>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/page/navigation/navbar.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
      
    <?php }?>
    
    
  <div id="wrapper">
    <?php if (isset($_smarty_tpl->getVariable('customMenu',null,true,false)->value)){?>
      <?php echo $_smarty_tpl->getVariable('customMenu')->value;?>

    <?php }else{ ?>
      <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/navigation/navmenu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navmenuID',"navmenu");$_template->properties['nocache_hash']  = '99608987852040a71766ef6-75442774';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:33
         compiled from "findInclude:common/templates/page/navigation/navmenu.tpl" */ ?>
<?php if ($_smarty_tpl->getVariable('navigationModules')->value){?>
  <?php if ($_smarty_tpl->getVariable('navmenuID')->value){?><div id="navmenu"><?php }?>
    <ul class="navmenu-items">
      <?php if ($_smarty_tpl->getVariable('configModule')->value==$_smarty_tpl->getVariable('homeModuleID')->value&&$_smarty_tpl->getVariable('showFederatedSearch')->value){?>
        <li class="navmenu-item navmenu-search"><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '17625258852040a75b26520-09217170';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:33
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
          <input class="forminput" type="text" id="<?php echo (($tmp = @$_smarty_tpl->getVariable('inputName')->value)===null||$tmp==='' ? 'filter' : $tmp);?>
" name="<?php echo (($tmp = @$_smarty_tpl->getVariable('inputName')->value)===null||$tmp==='' ? 'filter' : $tmp);?>
" placeholder="<?php echo (($tmp = @$_smarty_tpl->getVariable('placeholder')->value)===null||$tmp==='' ? '' : $tmp);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('searchTerms')->value);?>
" />
          <input class="hiddensubmit" type="submit" value="submit" />
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
<?php /*  End of included template "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/search.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?></li>
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('navigationModules')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <?php if (!$_smarty_tpl->tpl_vars['item']->value['separator']){?>
          <li class="navmenu-item navmenu-module<?php if ($_smarty_tpl->tpl_vars['item']->value['class']){?> <?php echo $_smarty_tpl->tpl_vars['item']->value['class'];?>
<?php }?>">
            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['linkTarget']){?> target="<?php echo $_smarty_tpl->tpl_vars['item']->value['linkTarget'];?>
"<?php }?>>
              <img class="navmenu-icon" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" width="30" height="30" /> <span><?php echo $_smarty_tpl->tpl_vars['item']->value['shortTitle'];?>
</span>
              <?php if (isset($_smarty_tpl->tpl_vars['item']->value['badge'])){?>
                <span class="badge"><?php echo $_smarty_tpl->tpl_vars['item']->value['badge'];?>
</span>
              <?php }?>
            </a>
          </li>
        <?php }?>
      <?php }} ?>
      <li class="navmenu-item navmenu-footer">
        <div id="footer">
          <?php if ($_smarty_tpl->getVariable('userContextList')->value){?>
          <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/navigation/userContextList.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navContainerID',"navmenu");$_template->properties['nocache_hash']  = '17625258852040a75b26520-09217170';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:34
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
          <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/credits.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '17625258852040a75b26520-09217170';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:34
         compiled from "findInclude:common/templates/page/credits.tpl" */ ?>

  <div class="copyright">
    <?php if ($_smarty_tpl->getVariable('strings')->value['COPYRIGHT_LINK']){?>
      <a href="<?php echo $_smarty_tpl->getVariable('strings')->value['COPYRIGHT_LINK'];?>
">
    <?php }?>
        <?php echo $_smarty_tpl->getVariable('strings')->value['COPYRIGHT_NOTICE'];?>

    <?php if ($_smarty_tpl->getVariable('strings')->value['COPYRIGHT_LINK']){?>
      </a>
    <?php }?>
  </div>



  <?php echo $_smarty_tpl->getVariable('footerKurogo')->value;?>


<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/credits.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
          <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/deviceDetection.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '17625258852040a75b26520-09217170';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:34
         compiled from "findInclude:common/templates/page/deviceDetection.tpl" */ ?>

  <?php if ($_smarty_tpl->getVariable('configModule')->value==$_smarty_tpl->getVariable('homeModuleID')->value&&$_smarty_tpl->getVariable('showDeviceDetection')->value){?>
    <table class="footertable">
      <tr><th>Pagetype:</th><td><?php echo $_smarty_tpl->getVariable('pagetype')->value;?>
</td></tr>
      <tr><th>Platform:</th><td><?php echo $_smarty_tpl->getVariable('platform')->value;?>
</td></tr>
      <tr><th>Browser:</th><td><?php echo $_smarty_tpl->getVariable('browser')->value;?>
</td></tr>
      <tr><th>User Agent:</th><td><?php echo $_SERVER['HTTP_USER_AGENT'];?>
</td></tr>
    </table>
  <?php }?>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/deviceDetection.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
          <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/moduleDebug.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '17625258852040a75b26520-09217170';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-08 17:15:34
         compiled from "findInclude:common/templates/page/moduleDebug.tpl" */ ?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?>
  <?php if ($_smarty_tpl->getVariable('moduleDebug')->value&&count($_smarty_tpl->getVariable('moduleDebugStrings')->value)){?>
    <table class="footertable">
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('moduleDebugStrings')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
      <tr><th><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value);?>
:</th><td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value);?>
</td></tr>
    <?php }} ?>
    </table>
  <?php }?>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/moduleDebug.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
        </div>
      </li>
    </ul>
  <?php if ($_smarty_tpl->getVariable('navmenuID')->value){?></div><?php }?>
<?php }?>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/navigation/navmenu.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php }?>
    <div id="container-wrapper">
      <div id="container">

<?php }else{ ?>
  
    <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineCSSBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?>
      <style type="text/css" media="screen">
        <?php echo $_smarty_tpl->tpl_vars['css']->value;?>

      </style>
    <?php }} ?>
    
    <script type="text/javascript">
      <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
        <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

      <?php }} ?>
    </script>
  
<?php }?>

<a name="content_top" id="content_top"></a>

