<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:07
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/news/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196275692852012bd35d4ff3-69419746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eda292414a9bfc1d6e2f09e7a6fdc41be6921816' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/news/templates/index.tpl',
      1 => 1364681344,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/page/moduleDebug.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '196275692852012bd35d4ff3-69419746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('scalable',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php ob_start(); ?>
  <select class="newsinput" id="section" name="section" onchange="loadSection(this);">
    <?php  $_smarty_tpl->tpl_vars['section'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sections')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['section']->key => $_smarty_tpl->tpl_vars['section']->value){
?>
      <?php if ($_smarty_tpl->tpl_vars['section']->value['selected']){?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['section']->value['value'];?>
" selected="true"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['section']->value['title']);?>
</option>
      <?php }else{ ?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['section']->value['value'];?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['section']->value['title']);?>
</option>
      <?php }?>
    <?php }} ?>
  </select>
<?php  $_smarty_tpl->assign("categorySelect", ob_get_contents()); Smarty::$_smarty_vars['capture']["categorySelect"]=ob_get_clean();?>



  <?php if (count($_smarty_tpl->getVariable('sections')->value)>1){?>
    <div class="header">
      <div id="category-switcher" class="category-mode">
        <form method="get" action="/<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
/index" id="category-form">
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="formlabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SECTION_TEXT");?>
</td>
              <td class="inputfield"><div id="news-category-select"><?php echo $_smarty_tpl->getVariable('categorySelect')->value;?>
</div></td>
              <td class="togglefield">
                
                  <input src="/common/images/search_button.png" type="image" class="toggle-search-button"  onclick="return toggleSearch();" width="32" height="30" />
                
              </td>
            </tr>
          </table>
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
          <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['arg'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('breadcrumbSamePageArgs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['arg']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['arg']->value;?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value);?>
" />
          <?php }} ?>
        </form>
  
        <form method="get" action="/<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
/search" id="search-form">
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="formlabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCH");?>
</td>
              <td class="inputfield">
                <input type="hidden" name="section" value="<?php echo $_smarty_tpl->getVariable('currentSection')->value['value'];?>
" />
                <input class="newsinput search-field" type="text" id="search_terms" 
                name="filter" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('searchTerms')->value);?>
" 
                onKeyPress="return submitenter(this, event);"/>
              </td>
              <td class="togglefield">
                <input type="button" class="toggle-search-button" onclick="return toggleSearch();" value="Cancel" />
              </td>
            </tr>
          </table>
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
          <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['arg'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('breadcrumbArgs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['arg']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['arg']->value;?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value);?>
" />
          <?php }} ?>
        </form>
      </div>
    </div>
  <?php }else{ ?>
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('extraArgs',$_smarty_tpl->getVariable('hiddenArgs')->value);$_template->properties['nocache_hash']  = '196275692852012bd35d4ff3-69419746';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:08
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


<?php $_template = new Smarty_Internal_Template("findInclude:modules/news/templates/stories.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '196275692852012bd35d4ff3-69419746';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:08
         compiled from "findInclude:modules/news/templates/stories.tpl" */ ?>
<ul class="results">
  <?php if ($_smarty_tpl->getVariable('previousURL')->value){?>
    <li class="pagerlink">
      <a href="<?php echo $_smarty_tpl->getVariable('previousURL')->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("PREVIOUS_STORY_TEXT",$_smarty_tpl->getVariable('maxPerPage')->value);?>
</a>
    </li>
  <?php }?>

  <?php $_smarty_tpl->tpl_vars['ellipsisCount'] = new Smarty_variable(0, null, null);?>
  <?php  $_smarty_tpl->tpl_vars['story'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('stories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['story']->key => $_smarty_tpl->tpl_vars['story']->value){
?>
    <li class="story<?php if (!$_smarty_tpl->getVariable('showImages')->value){?> noimage<?php }?>">
      <a href="<?php echo $_smarty_tpl->tpl_vars['story']->value['url'];?>
">
      <?php if ($_smarty_tpl->getVariable('showImages')->value){?>
        <?php if ($_smarty_tpl->tpl_vars['story']->value['img']){?>
          <img class="thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['story']->value['img'];?>
" alt="" />
        <?php }else{ ?>
          <img class="thumbnail" src="/modules/<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
/images/news-placeholder<?php echo $_smarty_tpl->getVariable('imageExt')->value;?>
" alt="" />
        <?php }?>
        <?php }?>
        <div class="ellipsis" id="ellipsis_<?php echo $_smarty_tpl->getVariable('ellipsisCount')->value++;?>
">
          <div class="title"><?php echo $_smarty_tpl->tpl_vars['story']->value["title"];?>
</div>
          <div class="smallprint"><?php if ($_smarty_tpl->getVariable('showAuthor')->value){?><div class="author"><?php echo $_smarty_tpl->tpl_vars['story']->value['author'];?>
</div><?php }?>
          <?php if ($_smarty_tpl->getVariable('showPubDate')->value){?><div class="pubdate"><?php echo $_smarty_tpl->tpl_vars['story']->value['pubDate'];?>
</div><?php }?>
          <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['story']->value['subtitle']);?>
</div>
        </div>
      </a>
    </li>
  <?php }} ?>

  <?php if ($_smarty_tpl->getVariable('nextURL')->value){?>
    <li class="pagerlink">
      <a href="<?php echo $_smarty_tpl->getVariable('nextURL')->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("NEXT_STORY_TEXT",$_smarty_tpl->getVariable('maxPerPage')->value);?>
</a>
    </li>
  <?php }?>
</ul>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:modules/news/templates/stories.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>



  <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '196275692852012bd35d4ff3-69419746';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:08
         compiled from "findInclude:common/templates/footer.tpl" */ ?>
<?php if (!$_smarty_tpl->getVariable('webBridgeAjaxContentLoad')->value&&!$_smarty_tpl->getVariable('ajaxContentLoad')->value){?>
  
  
    <?php if (!$_smarty_tpl->getVariable('hideFooterLinks')->value){?>
      <div id="footerlinks">
        <a href="#top"><?php echo $_smarty_tpl->getVariable('footerBackToTop')->value;?>
</a> | <a href="<?php echo $_smarty_tpl->getVariable('homeLink')->value;?>
"><?php echo $_smarty_tpl->getVariable('homeLinkText')->value;?>
</a>
      </div>
    <?php }?>
  

  
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/login.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '69805937752012bd4ca3cb2-46385909';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:08
         compiled from "findInclude:common/templates/page/login.tpl" */ ?>
<?php if ($_smarty_tpl->getVariable('showLogin')->value){?>
  <div class="loginstatus">
    
      <ul class="nav secondary loginbuttons">
      <li<?php if ($_smarty_tpl->getVariable('footerLoginClass')->value){?> class="<?php echo $_smarty_tpl->getVariable('footerLoginClass')->value;?>
"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('footerLoginLink')->value;?>
"><?php echo $_smarty_tpl->getVariable('footerLoginText')->value;?>
</a></li>
      </ul>
    
  </div>
<?php }?>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/page/login.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  
  
  
  
    <div id="footer">
      <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/credits.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '69805937752012bd4ca3cb2-46385909';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:08
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
    </div>
  

  
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/page/deviceDetection.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '69805937752012bd4ca3cb2-46385909';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:08
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
$_template->properties['nocache_hash']  = '69805937752012bd4ca3cb2-46385909';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-06 13:01:08
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
  

  <?php ob_start(); ?>
    
      <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptFooterBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
        <script type="text/javascript">
          <?php echo $_smarty_tpl->tpl_vars['script']->value;?>
 
        </script>
      <?php }} ?>
    
    
    
      <?php if (strlen($_smarty_tpl->getVariable('GOOGLE_ANALYTICS_ID')->value)){?>
        <script type="text/javascript">
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
      <?php }?>
    
  <?php  $_smarty_tpl->assign("kgoFooterJavascript", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoFooterJavascript"]=ob_get_clean();?>
  
  
    <?php echo $_smarty_tpl->getVariable('kgoFooterJavascript')->value;?>

  
  
  
    </div> <!--container -->
  </div> <!--nonfooternav -->
  
  
  
  
  </body>
  </html>
<?php }else{ ?>
  
    <script type="text/javascript">
      <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptFooterBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
        <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

      <?php }} ?>
      
      <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onLoadBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
        <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

      <?php }} ?>
    
      <?php if (count($_smarty_tpl->getVariable('onOrientationChangeBlocks')->value)){?>
        addOnOrientationChangeCallback(function () {
          <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

          <?php }} ?>
        });
      <?php }?>
      
      onOrientationChange();
    </script>
  
<?php }?>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/footer.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

