<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:36:25
         compiled from "findInclude:modules/athletics/templates/index-latest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188819708851f18c4992b890-20449180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3cef79104e434f82ef67f78d44f00d89de6a170' => 
    array (
      0 => 'findInclude:modules/athletics/templates/index-latest.tpl',
      1 => 1364681343,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '188819708851f18c4992b890-20449180',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (count($_smarty_tpl->getVariable('latestSubTabLinks')->value)>1){?>
	
		<ul class="tabstrip twotabs subtab">
		<?php  $_smarty_tpl->tpl_vars['tabItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('latestSubTabLinks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tabItem']->key => $_smarty_tpl->tpl_vars['tabItem']->value){
?>
			<li<?php if ($_smarty_tpl->getVariable('latestSubTab')->value==$_smarty_tpl->tpl_vars['tabItem']->value['id']){?> class="active"<?php }?>>
				<a href="<?php echo $_smarty_tpl->tpl_vars['tabItem']->value['url'];?>
" onclick="updateSubTab(this, '<?php echo $_smarty_tpl->getVariable('tabstripId')->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['tabItem']->value['ajaxUrl'];?>
'); return false;"><?php echo $_smarty_tpl->tpl_vars['tabItem']->value['title'];?>
</a>
			</li>
		<?php }} ?>
		</ul>
	
<?php }?>
<?php if ($_smarty_tpl->getVariable('latestSubTab')->value=='topnews'){?>
	<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<?php $_template = new Smarty_Internal_Template("findInclude:modules/athletics/templates/stories.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('stories',$_smarty_tpl->getVariable('topNews')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }elseif($_smarty_tpl->getVariable('latestSubTab')->value=='allschedule'){?>
	<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('scheduleItems')->value);$_template->assign('subTitleNewline',true); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }?>