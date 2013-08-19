<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:36:42
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/info/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22372273851fc266a28f4c2-69172604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e71cf3bac4a8a0cbf2cd70997320acab28b8a88' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/info/templates/index.tpl',
      1 => 1364681344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22372273851fc266a28f4c2-69172604',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->getVariable('charset')->value;?>
" />
<title><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('strings')->value['SITE_NAME']);?>
</title>
<link type="text/css" href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('minify')->value['css']);?>
" rel="stylesheet" />
<link rel="shortcut icon" href="/favicon.ico" />
<meta name="description" http-equiv="description" content="" />
</head>

<body>

<div id="container">
  <div id="header">
    
  	<div id="utility_nav">
  		<?php if ($_smarty_tpl->getVariable('links')->value['homeURL']){?><a href="<?php echo $_smarty_tpl->getVariable('links')->value['homeURL'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('links')->value['homeTitle'];?>
</a>
        <?php if ($_smarty_tpl->getVariable('links')->value['contactURL']||$_smarty_tpl->getVariable('links')->value['facebookURL']||$_smarty_tpl->getVariable('links')->value['twitterURL']){?>&nbsp;|&nbsp;<?php }?><?php }?>
        <?php if ($_smarty_tpl->getVariable('links')->value['contactURL']){?><a href="<?php echo $_smarty_tpl->getVariable('links')->value['contactURL'];?>
" target="_blank">Contact</a>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('links')->value['facebookURL']||$_smarty_tpl->getVariable('links')->value['twitterURL']){?>
        &nbsp;<?php if ($_smarty_tpl->getVariable('links')->value['homeURL']||$_smarty_tpl->getVariable('links')->value['contactURL']){?>|&nbsp;<?php }?>
        <span class="share">Share:</span> &nbsp; <?php if ($_smarty_tpl->getVariable('links')->value['facebookURL']){?><a href="<?php echo $_smarty_tpl->getVariable('links')->value['facebookURL'];?>
" title="Facebook" target="_blank"><img src="/modules/info/images/facebook.png" width="16" height="16" alt="facebook"></a>
		&nbsp;<?php }?>
		<?php if ($_smarty_tpl->getVariable('links')->value['twitterURL']){?>
		<a href="<?php echo $_smarty_tpl->getVariable('links')->value['twitterURL'];?>
" title="Twitter" target="_blank"><img src="/modules/info/images/twitter.png" width="16" height="16" alt="twitter"></a>
		<?php }?>
		<?php }?>
    </div><!--/utility_nav-->
    
    <div id="devices">
        <img src="/modules/info/images/devices.png" width="500" height="300" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('strings')->value['SITE_NAME']);?>
" border="0" />
    </div>
    <div id="introduction">
       
       <?php if ($_smarty_tpl->getVariable('logo_image')->value){?>
        <div id="logo">
            <img src="<?php echo $_smarty_tpl->getVariable('logo_image')->value;?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('strings')->value['SITE_NAME']);?>
" border="0" />
        </div>
        <?php }?>
        <p><?php echo $_smarty_tpl->getVariable('moduleStrings')->value['description'];?>
 </p>
        
    </div>
    
  </div>

  <div id="content">
    
  	<div class="leftcol">
    	<h2><?php echo $_smarty_tpl->getVariable('moduleStrings')->value['mobileWebTitle'];?>
</h2>
        <p><?php echo $_smarty_tpl->getVariable('moduleStrings')->value['mobileWebDescription'];?>
</p>
        <p>
          <a id="preview" class="roundbox" href="#" onclick="javascript:window.open('<?php echo $_smarty_tpl->getVariable('previewURL')->value;?>
','KurogoMobile','scrollbars=1,width=350,height=550');">Click here to preview the  mobile site on your computer.</a>
        </p>
        <?php if ($_smarty_tpl->getVariable('moduleStrings')->value['appsTitle']){?>
    	<h2><?php echo $_smarty_tpl->getVariable('moduleStrings')->value['appsTitle'];?>
</h2>
        <p>
        	<?php echo $_smarty_tpl->getVariable('moduleStrings')->value['appsDescription'];?>
 
        </p>
        <table cellpadding="0" cellspacing="0" id="download" align="right">
        <?php if ($_smarty_tpl->getVariable('appData')->value['iphone']){?>
          <tr>
            <td>
            <?php echo $_smarty_tpl->getVariable('appData')->value['iphone']['downloadText'];?>

            </td>
            <td>
            <a href="<?php echo $_smarty_tpl->getVariable('appData')->value['iphone']['url'];?>
" target="_blank"><img src="/modules/info/images/appstore.png" alt="" width="114" height="40" /></a>
            </td>
          </tr>
          <?php }?>
          <?php if ($_smarty_tpl->getVariable('appData')->value['android']){?>
          <tr>
            <td>
            <?php echo $_smarty_tpl->getVariable('appData')->value['android']['downloadText'];?>

            </td>
            <td>
            <a href="<?php echo $_smarty_tpl->getVariable('appData')->value['android']['url'];?>
" target="_blank"><img src="/modules/info/images/playstore.png" alt="" width="114" height="40" /></a>
            </td>
          </tr>
          <?php }?>
        </table>
        <?php }?>
        <div class="clr"></div>
        
    	<h2><?php echo $_smarty_tpl->getVariable('moduleStrings')->value['extraTitle'];?>
</h2>
        <p>
        <?php echo $_smarty_tpl->getVariable('moduleStrings')->value['extraDescription'];?>

        </p>
        
        <p>
          <a class="roundbox" id="feedback" href="mailto:<?php echo $_smarty_tpl->getVariable('strings')->value['FEEDBACK_EMAIL'];?>
">
            <strong><?php echo $_smarty_tpl->getVariable('moduleStrings')->value['feedbackTitle'];?>
</strong>
            <br />
            <?php echo $_smarty_tpl->getVariable('moduleStrings')->value['feedbackDescription'];?>

          </a>
        </p>
        
    </div><!--/leftcol-->
    
    <div class="rightcol">
    	<h2><?php echo $_smarty_tpl->getVariable('moduleStrings')->value['modulesTitle'];?>
</h2>
        
    	<table cellpadding="0" cellspacing="0" id="features">
    	<?php  $_smarty_tpl->tpl_vars['moduleData'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['moduleID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modulesData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['moduleData']->key => $_smarty_tpl->tpl_vars['moduleData']->value){
 $_smarty_tpl->tpl_vars['moduleID']->value = $_smarty_tpl->tpl_vars['moduleData']->key;
?>
          <tr>
            <td>
              <img class="moduleicon" src="<?php if ($_smarty_tpl->getVariable('info_icon_set')->value){?>/common/images/iconsets/<?php echo $_smarty_tpl->getVariable('info_icon_set')->value;?>
/120/<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['icon'];?>
.png<?php }elseif($_smarty_tpl->getVariable('navigation_icon_set')->value){?>/common/images/iconsets/<?php echo $_smarty_tpl->getVariable('navigation_icon_set')->value;?>
/120/<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['icon'];?>
.png<?php }else{ ?>/modules/<?php echo $_smarty_tpl->getVariable('homeModuleID')->value;?>
/images/<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['icon'];?>
.png<?php }?>" alt="" />
            </td>
            <td>
            <h2><?php echo $_smarty_tpl->tpl_vars['moduleData']->value['title'];?>
</h2>
            <p>
            <?php echo $_smarty_tpl->tpl_vars['moduleData']->value['description'];?>

            </p>
            </td>
          </tr>
          <?php }} ?>
        </table>
    </div><!--/rightcol-->

	<div class="clr"></div>
	
  </div>

  <div id="footer">
    
		<?php if ($_smarty_tpl->getVariable('strings')->value['COPYRIGHT_LINK']){?>
		  <a href="<?php echo $_smarty_tpl->getVariable('strings')->value['COPYRIGHT_LINK'];?>
" class="copyright">
		<?php }?>
			<?php echo $_smarty_tpl->getVariable('strings')->value['COPYRIGHT_NOTICE'];?>

		<?php if ($_smarty_tpl->getVariable('strings')->value['COPYRIGHT_LINK']){?>
		  </a>
		<?php }?>
		&nbsp;
	   <?php echo $_smarty_tpl->getVariable('footerKurogo')->value;?>

    
  </div>

</div><!--/container-->

<script type="text/javascript">
</script>

</body>
</html>
