<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
         compiled from "findInclude:common/templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205818541651fc257abe92d0-65039580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fa1ce90517828d1f7dd1b47ebe9bab07ede9bcf' => 
    array (
      0 => 'findInclude:common/templates/footer.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/page/moduleDebug.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '205818541651fc257abe92d0-65039580',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
$_template->properties['nocache_hash']  = '205818541651fc257abe92d0-65039580';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
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
$_template->properties['nocache_hash']  = '205818541651fc257abe92d0-65039580';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
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
$_template->properties['nocache_hash']  = '205818541651fc257abe92d0-65039580';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:43
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
$_template->properties['nocache_hash']  = '205818541651fc257abe92d0-65039580';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:43
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
