<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:36:25
         compiled from "/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/athletics/templates/index-tablet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56019688751f18c494795f8-14814594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b610d726904c7a65b44ef20ef4c6a2c9c0119450' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/athletics/templates/index-tablet.tpl',
      1 => 1364681343,
      2 => 'file',
    ),
    'c754f26684cb87d43a9051adeb75d4ccb123cb84' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/athletics/templates/index.tpl',
      1 => 1364681343,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/tabs.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
    '81493c90684f341940ae5999e42d2af5009d210c' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/tabs.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56019688751f18c494795f8-14814594',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_smarty_tpl->tpl_vars['tabBodies'] = new Smarty_variable(array(), null, null);?>
<?php if ($_smarty_tpl->getVariable('latestSubTabLinks')->value){?>
  <?php ob_start(); ?>
    <?php $_template = new Smarty_Internal_Template("findInclude:modules/athletics/templates/index-latest.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <?php  $_smarty_tpl->assign("latestTab", ob_get_contents()); Smarty::$_smarty_vars['capture']["latestTab"]=ob_get_clean();?>
  <?php if (!isset($_smarty_tpl->tpl_vars['tabBodies']) || !is_array($_smarty_tpl->tpl_vars['tabBodies']->value)) $_smarty_tpl->createLocalArrayVariable('tabBodies', null, null);
$_smarty_tpl->tpl_vars['tabBodies']->value['topnews'] = $_smarty_tpl->getVariable('latestTab')->value;?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('menSports')->value){?>
  <?php ob_start(); ?>
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('menSports')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <?php  $_smarty_tpl->assign("menTab", ob_get_contents()); Smarty::$_smarty_vars['capture']["menTab"]=ob_get_clean();?>
  <?php if (!isset($_smarty_tpl->tpl_vars['tabBodies']) || !is_array($_smarty_tpl->tpl_vars['tabBodies']->value)) $_smarty_tpl->createLocalArrayVariable('tabBodies', null, null);
$_smarty_tpl->tpl_vars['tabBodies']->value['men'] = $_smarty_tpl->getVariable('menTab')->value;?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('womenSports')->value){?>
  <?php ob_start(); ?>
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('womenSports')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <?php  $_smarty_tpl->assign("womenTab", ob_get_contents()); Smarty::$_smarty_vars['capture']["womenTab"]=ob_get_clean();?>
  <?php if (!isset($_smarty_tpl->tpl_vars['tabBodies']) || !is_array($_smarty_tpl->tpl_vars['tabBodies']->value)) $_smarty_tpl->createLocalArrayVariable('tabBodies', null, null);
$_smarty_tpl->tpl_vars['tabBodies']->value['women'] = $_smarty_tpl->getVariable('womenTab')->value;?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('coedSports')->value){?>
  <?php ob_start(); ?>
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('coedSports')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <?php  $_smarty_tpl->assign("coedTab", ob_get_contents()); Smarty::$_smarty_vars['capture']["coedTab"]=ob_get_clean();?>
  <?php if (!isset($_smarty_tpl->tpl_vars['tabBodies']) || !is_array($_smarty_tpl->tpl_vars['tabBodies']->value)) $_smarty_tpl->createLocalArrayVariable('tabBodies', null, null);
$_smarty_tpl->tpl_vars['tabBodies']->value['coed'] = $_smarty_tpl->getVariable('coedTab')->value;?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('bookmarksTitle')->value){?> 
  <?php ob_start(); ?>
    <?php $_template = new Smarty_Internal_Template("findInclude:modules/athletics/templates/bookmarks.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <?php  $_smarty_tpl->assign("bookmarksTab", ob_get_contents()); Smarty::$_smarty_vars['capture']["bookmarksTab"]=ob_get_clean();?>
  <?php if (!isset($_smarty_tpl->tpl_vars['tabBodies']) || !is_array($_smarty_tpl->tpl_vars['tabBodies']->value)) $_smarty_tpl->createLocalArrayVariable('tabBodies', null, null);
$_smarty_tpl->tpl_vars['tabBodies']->value['bookmarks'] = $_smarty_tpl->getVariable('bookmarksTab')->value;?>
<?php }?>


<div id="tabscontainer">
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/tabs.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('tabBodies',$_smarty_tpl->getVariable('tabBodies')->value);$_template->assign('smallTabs',false);$_template->properties['nocache_hash']  = '56019688751f18c494795f8-14814594';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:36:25
         compiled from "findInclude:common/templates/tabs.tpl" */ ?>
<?php if (count($_smarty_tpl->getVariable('tabBodies')->value)>1){?>
  
    <ul id="tabs"<?php if ($_smarty_tpl->getVariable('smallTabs')->value){?> class="smalltabs"<?php }?>>
  
      <?php  $_smarty_tpl->tpl_vars['tabInfo'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tabbedView')->value['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tabInfo']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tabInfo']->iteration=0;
if ($_smarty_tpl->tpl_vars['tabInfo']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tabInfo']->key => $_smarty_tpl->tpl_vars['tabInfo']->value){
 $_smarty_tpl->tpl_vars['tabKey']->value = $_smarty_tpl->tpl_vars['tabInfo']->key;
 $_smarty_tpl->tpl_vars['tabInfo']->iteration++;
 $_smarty_tpl->tpl_vars['tabInfo']->last = $_smarty_tpl->tpl_vars['tabInfo']->iteration === $_smarty_tpl->tpl_vars['tabInfo']->total;
?>
        <?php if (isset($_smarty_tpl->getVariable('tabbedView',null,true,false)->value['tabs'][$_smarty_tpl->tpl_vars['tabKey']->value])){?>
          <?php $_smarty_tpl->tpl_vars['isLastTab'] = new Smarty_variable($_smarty_tpl->tpl_vars['tabInfo']->last, null, null);?>
          
          
            <?php if (strlen($_smarty_tpl->getVariable('GOOGLE_ANALYTICS_ID')->value)){?>
              <?php $_smarty_tpl->tpl_vars['gaArgs'] = new Smarty_variable($_GET, null, null);?>
              <?php if (!isset($_smarty_tpl->tpl_vars['gaArgs']) || !is_array($_smarty_tpl->tpl_vars['gaArgs']->value)) $_smarty_tpl->createLocalArrayVariable('gaArgs', null, null);
$_smarty_tpl->tpl_vars['gaArgs']->value['_b'] = null;?>
              <?php if (!isset($_smarty_tpl->tpl_vars['gaArgs']) || !is_array($_smarty_tpl->tpl_vars['gaArgs']->value)) $_smarty_tpl->createLocalArrayVariable('gaArgs', null, null);
$_smarty_tpl->tpl_vars['gaArgs']->value['_path'] = null;?>
              <?php $_smarty_tpl->tpl_vars['gaLabel'] = new Smarty_variable(http_build_query($_smarty_tpl->getVariable('gaArgs')->value,'','&'), null, null);?>
            <?php }?>
            <li id="<?php echo $_smarty_tpl->tpl_vars['tabInfo']->value['id'];?>
-tab" <?php if ($_smarty_tpl->tpl_vars['tabKey']->value==$_smarty_tpl->getVariable('tabbedView')->value['current']){?> class="active"<?php }?>>
              <a href="#" onclick="(function(){ var tabKey = '<?php echo $_smarty_tpl->tpl_vars['tabKey']->value;?>
';var tabId = '<?php echo $_smarty_tpl->tpl_vars['tabInfo']->value['id'];?>
';var tabCookie = '<?php echo $_smarty_tpl->getVariable('tabbedView')->value['tabCookie'];?>
';<?php if (strlen($_smarty_tpl->getVariable('GOOGLE_ANALYTICS_ID')->value)){?>_gaq.push(['_trackEvent', '<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['tabKey']->value;?>
 tab', '<?php echo $_smarty_tpl->getVariable('gaLabel')->value;?>
']);<?php }?>showTab(tabId);setCookie(tabCookie, tabKey, 0, '<?php echo @COOKIE_PATH;?>
');<?php echo $_smarty_tpl->tpl_vars['tabInfo']->value['javascript'];?>
 })();"><?php echo $_smarty_tpl->tpl_vars['tabInfo']->value['title'];?>
</a>
            </li>
          
          
        <?php }?>
      <?php }} ?>
      
  
  </ul>
  
<?php }?>


  <div id="tabbodies">
    <?php  $_smarty_tpl->tpl_vars['tabInfo'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['tabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tabbedView')->value['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tabInfo']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tabInfo']->iteration=0;
if ($_smarty_tpl->tpl_vars['tabInfo']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tabInfo']->key => $_smarty_tpl->tpl_vars['tabInfo']->value){
 $_smarty_tpl->tpl_vars['tabKey']->value = $_smarty_tpl->tpl_vars['tabInfo']->key;
 $_smarty_tpl->tpl_vars['tabInfo']->iteration++;
 $_smarty_tpl->tpl_vars['tabInfo']->last = $_smarty_tpl->tpl_vars['tabInfo']->iteration === $_smarty_tpl->tpl_vars['tabInfo']->total;
?>
      <?php if (isset($_smarty_tpl->getVariable('tabbedView',null,true,false)->value['tabs'][$_smarty_tpl->tpl_vars['tabKey']->value])){?>
        <div class="tabbody <?php echo $_smarty_tpl->tpl_vars['tabKey']->value;?>
-tabbody" id="<?php echo $_smarty_tpl->tpl_vars['tabInfo']->value['id'];?>
-tabbody" <?php if (count($_smarty_tpl->getVariable('tabBodies')->value)>1){?>style="display:none"<?php }?>>
          <?php echo $_smarty_tpl->getVariable('tabBodies')->value[$_smarty_tpl->tpl_vars['tabKey']->value];?>

        </div>
      <?php }?>
    <?php }} ?>
  </div>
  <div class="clear"></div>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/tabs.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
</div>


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
