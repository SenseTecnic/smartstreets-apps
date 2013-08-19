<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:34:52
         compiled from "findInclude:common/templates/page/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155471295751f18becc9bb19-07625633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1a236ee39fa5cc5b17fd4680e51241fd6fd0e34' => 
    array (
      0 => 'findInclude:common/templates/page/head.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
    '06a9b78711fc0366ba7fcc64f1a8c319b62c591d' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/page/head.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155471295751f18becc9bb19-07625633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?>
 
<?php ob_start(); ?>
  
    <link href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('minify')->value['css']);?>
" rel="stylesheet" media="all" type="text/css"/>
  
  
  
    <?php  $_smarty_tpl->tpl_vars['cssURL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cssURLs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cssURL']->key => $_smarty_tpl->tpl_vars['cssURL']->value){
?>
      <link href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cssURL']->value);?>
" rel="stylesheet" media="all" type="text/css"/>
    <?php }} ?>
  
  
  
    <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineCSSBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?>
      <style type="text/css" media="screen">
        <?php echo $_smarty_tpl->tpl_vars['css']->value;?>

      </style>
    <?php }} ?>
  
<?php  $_smarty_tpl->assign("kgoHeadCSSHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoHeadCSSHTML"]=ob_get_clean();?>

<?php ob_start(); ?><div class="loading"><div><img src="/common/images/loading.gif" width="27" height="21" alt="Loading" align="absmiddle" /><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("AJAX_CONTENT_LOADING");?>
</div></div><?php  $_smarty_tpl->assign("kgoHeadJavascriptAJAXContentLoadingHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoHeadJavascriptAJAXContentLoadingHTML"]=ob_get_clean();?>

<?php ob_start(); ?><div class="nonfocal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("AJAX_CONTENT_LOAD_FAILED");?>
</div><?php  $_smarty_tpl->assign("kgoHeadJavascriptAJAXContentErrorHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoHeadJavascriptAJAXContentErrorHTML"]=ob_get_clean();?>

<?php ob_start(); ?>
  
    <script type="text/javascript">
      var URL_BASE='<?php echo @URL_BASE;?>
';
      var API_URL_PREFIX='<?php echo @API_URL_PREFIX;?>
';
      var KUROGO_PAGETYPE='<?php echo $_smarty_tpl->getVariable('pagetype')->value;?>
';
      var KUROGO_PLATFORM='<?php echo $_smarty_tpl->getVariable('platform')->value;?>
';
      var KUROGO_BROWSER='<?php echo $_smarty_tpl->getVariable('browser')->value;?>
';
    </script>
  
    
  
    <script type="text/javascript">
      var AJAX_CONTENT_LOADING_HTML = '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('kgoHeadJavascriptAJAXContentLoadingHTML')->value,"quotes");?>
';
      var AJAX_CONTENT_ERROR_HTML = '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('kgoHeadJavascriptAJAXContentErrorHTML')->value,"quotes");?>
';
    </script>
  
  
  
    <?php if (strlen($_smarty_tpl->getVariable('GOOGLE_ANALYTICS_ID')->value)){?>
      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo $_smarty_tpl->getVariable('GOOGLE_ANALYTICS_ID')->value;?>
']);
        <?php if ($_smarty_tpl->getVariable('GOOGLE_ANALYTICS_DOMAIN')->value){?>
        _gaq.push(['_setDomainName', '<?php echo $_smarty_tpl->getVariable('GOOGLE_ANALYTICS_DOMAIN')->value;?>
']);
        <?php }?>
        _gaq.push(['_trackPageview']);
      </script>
    <?php }?>
  

  
    <?php  $_smarty_tpl->tpl_vars['url'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('javascriptURLs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['url']->key => $_smarty_tpl->tpl_vars['url']->value){
?>
      <script src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['url']->value);?>
" type="text/javascript"></script>
    <?php }} ?>
  
    
  
    <script src="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('minify')->value['js']);?>
" type="text/javascript"></script>
  
    
  
    <?php  $_smarty_tpl->tpl_vars['inlineJavascriptBlock'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['inlineJavascriptBlock']->key => $_smarty_tpl->tpl_vars['inlineJavascriptBlock']->value){
?>
      <script type="text/javascript"><?php echo $_smarty_tpl->tpl_vars['inlineJavascriptBlock']->value;?>
</script>
    <?php }} ?>
  
    
  
    <script type="text/javascript">
      setupOrientationChangeHandlers();
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
    </script>
  
    
  
    <?php if (count($_smarty_tpl->getVariable('onLoadBlocks')->value)){?>
      <script type="text/javascript">
        function onLoad() {
          <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onLoadBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

          <?php }} ?>
        }
      </script>
    <?php }?>
  
<?php  $_smarty_tpl->assign("kgoHeadJavascriptHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoHeadJavascriptHTML"]=ob_get_clean();?>

  <meta http-equiv="content-type" content="application/xhtml+xml" charset="<?php echo $_smarty_tpl->getVariable('charset')->value;?>
" />



  <?php if ($_smarty_tpl->getVariable('refreshPage')->value){?>
    <meta http-equiv="refresh" content="<?php echo $_smarty_tpl->getVariable('refreshPage')->value;?>
" />
  <?php }?>



  <title><?php if (!$_smarty_tpl->getVariable('isModuleHome')->value){?><?php echo $_smarty_tpl->getVariable('moduleName')->value;?>
: <?php }?><?php echo smarty_modifier_escape(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('pageTitle')->value),'htmlall');?>
</title>



  <link rel="shortcut icon" href="/favicon.ico" />



  <?php echo $_smarty_tpl->getVariable('kgoHeadCSSHTML')->value;?>




  <?php echo $_smarty_tpl->getVariable('kgoHeadJavascriptHTML')->value;?>




  <?php if (!$_smarty_tpl->getVariable('autoPhoneNumberDetection')->value){?>
    <meta name="format-detection" content="telephone=no" />
  <?php }?>



  <meta name="HandheldFriendly" content="true" />



  <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, <?php if ((($tmp = @$_smarty_tpl->getVariable('scalable')->value)===null||$tmp==='' ? false : $tmp)){?>user-scalable=yes, maximum-scale=2.0<?php }else{ ?>user-scalable=no, maximum-scale=1.0<?php }?>" />



  <link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['nosecure'][0][0]->nosecure(@FULL_URL_BASE);?>
common/images/icon.png" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['nosecure'][0][0]->nosecure(@FULL_URL_BASE);?>
common/images/icon.png" />

