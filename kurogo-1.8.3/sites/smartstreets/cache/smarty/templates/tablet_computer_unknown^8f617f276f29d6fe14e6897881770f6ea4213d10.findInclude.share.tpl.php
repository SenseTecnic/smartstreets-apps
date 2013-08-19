<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:36:25
         compiled from "findInclude:common/templates/share.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21940196651f18c4924f237-27534082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f617f276f29d6fe14e6897881770f6ea4213d10' => 
    array (
      0 => 'findInclude:common/templates/share.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '21940196651f18c4924f237-27534082',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php if ($_smarty_tpl->getVariable('shareEmailURL')->value||$_smarty_tpl->getVariable('shareURL')->value){?>
<div id="share">
  <a onclick="showShare()"><img src="/common/images/share.png" width="44" height="38" /></a>
  <div id="sharesheet" style="display:none">
    <div id="shareback"> </div>
    <div id="sharedialog">
      <h1><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SHARE_THIS_ITEM");?>
<?php $_tmp1=ob_get_clean();?><?php echo (($tmp = @$_smarty_tpl->getVariable('shareTitle')->value)===null||$tmp==='' ? $_tmp1 : $tmp);?>
</h1>
      <ul>
        <?php if ($_smarty_tpl->getVariable('shareEmailURL')->value){?>
          <li>
            <a class="sharelink" href="<?php echo $_smarty_tpl->getVariable('shareEmailURL')->value;?>
"><img src="/common/images/button-email.png" alt="" width="32" height="32" /><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SHARE_OPTION_EMAIL");?>
</a>
          </li>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('shareURL')->value){?>
          <li>
            <a class="sharelink" href="http://m.facebook.com/sharer.php?u=<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('shareURL')->value,'url');?>
&t=<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('shareRemark')->value,'url');?>
"><img src="/common/images/button-facebook.png" alt="" width="32" height="32" /><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SHARE_OPTION_FACEBOOK");?>
</a>
          </li>
          <li>
            <a class="sharelink" href="http://twitter.com/share?url=<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('shareURL')->value,'url');?>
&text=<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('shareRemark')->value,'url');?>
"><img src="/common/images/button-twitter.png" alt="" width="32" height="32" /><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SHARE_OPTION_TWITTER");?>
</a>
          </li>
        <?php }?>
			</ul>
      <div class="formbuttons">
        <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("BUTTON_CANCEL");?>
<?php $_tmp2=ob_get_clean();?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/formButtonLink.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('buttonTitle',$_tmp2);$_template->assign('buttonOnclick',"hideShare()"); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
      </div>
		</div>
	</div>
</div>
<?php }?>
