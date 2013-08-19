<?php /* Smarty version Smarty-3.0.7, created on 2013-08-07 19:33:04
         compiled from "findInclude:common/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140078656151fc257948de30-16896915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84aa7bebb379a8b294a029ad3ca0fe7f9594aef1' => 
    array (
      0 => 'findInclude:common/templates/header.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/page/navigation/navbar.tpl',
      1 => 1375918259,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '140078656151fc257948de30-16896915',
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
  
    <?php if (count($_smarty_tpl->getVariable('onLoadBlocks')->value)||count($_smarty_tpl->getVariable('onOrientationChangeBlocks')->value)){?>
      onload="<?php if (count($_smarty_tpl->getVariable('onLoadBlocks')->value)){?>onLoad();<?php }?>onOrientationChange();"
    <?php }?>
  >
  <div id="kgo_accessibility_links">
  
  
  </div>
  <div id="nonfooternav">
    <?php if (isset($_smarty_tpl->getVariable('customHeader',null,true,false)->value)){?>
      
        <a name="top"> </a>
      
      <?php echo $_smarty_tpl->getVariable('customHeader')->value;?>

    <?php }else{ ?>
      
        <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/navigation/navbar.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '140078656151fc257948de30-16896915';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-07 19:33:04
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
    <div class="breadcrumbs<?php if ($_smarty_tpl->getVariable('isModuleHome')->value){?> homepage<?php }?>">
      <?php echo $_smarty_tpl->getVariable('kgoNavbarHomelink')->value;?>

      <?php echo $_smarty_tpl->getVariable('kgoNavbarBreadcrumbsHTML')->value;?>

      <?php echo $_smarty_tpl->getVariable('kgoNavbarPagetitle')->value;?>

    </div>
    <?php echo $_smarty_tpl->getVariable('kgoNavbarHelp')->value;?>

  </div>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/navigation/navbar.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
      
    <?php }?>
    
    
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

