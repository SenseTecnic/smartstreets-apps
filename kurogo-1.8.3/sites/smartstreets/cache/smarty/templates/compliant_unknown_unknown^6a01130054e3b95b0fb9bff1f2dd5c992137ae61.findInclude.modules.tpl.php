<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
         compiled from "findInclude:modules/home/templates/include/modules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155341094851fc257a45b5c6-94907604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a01130054e3b95b0fb9bff1f2dd5c992137ae61' => 
    array (
      0 => 'findInclude:modules/home/templates/include/modules.tpl',
      1 => 1364681343,
      2 => 'findInclude',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/navlist.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '155341094851fc257a45b5c6-94907604',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('displayType')->value=='springboard'){?>
  
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/springboard.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('springboardItems',$_smarty_tpl->getVariable('modules')->value['primary']);$_template->assign('springboardID',"homegrid");$_template->properties['nocache_hash']  = '155341094851fc257a45b5c6-94907604';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
         compiled from "findInclude:common/templates/springboard.tpl" */ ?>
<div class="springboard"<?php if ($_smarty_tpl->getVariable('springboardID')->value){?> id="<?php echo $_smarty_tpl->getVariable('springboardID')->value;?>
"<?php }?>>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('springboardItems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['separator']){?>
      
        <p class="separator">&nbsp;</p>
      
    <?php }else{ ?>
      <div <?php if ($_smarty_tpl->tpl_vars['item']->value['class']){?> class="<?php echo $_smarty_tpl->tpl_vars['item']->value['class'];?>
"<?php }?>>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['url']){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['linkTarget']){?> target="<?php echo $_smarty_tpl->tpl_vars['item']->value['linkTarget'];?>
"<?php }?>>
        <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img'];?>
" alt="" />
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?><br/><?php }?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['subTitle'])){?>
              <br/><span class="fineprint"><?php echo $_smarty_tpl->tpl_vars['item']->value['subTitle'];?>
</span>
            <?php }?>
            
              <?php if (isset($_smarty_tpl->tpl_vars['item']->value['badge'])){?>
                <span class="badge"><?php echo $_smarty_tpl->tpl_vars['item']->value['badge'];?>
</span>
              <?php }?>
            
            
              <?php if (isset($_smarty_tpl->tpl_vars['item']->value['secured'])){?>
          		<span class="secured"></span>
              <?php }?>
            
        <?php if ($_smarty_tpl->tpl_vars['item']->value['url']){?>
          </a>
        <?php }?>
      </div>
    <?php }?>
  <?php }} ?>
</div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/springboard.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php if (count($_smarty_tpl->getVariable('modules')->value['secondary'])){?>
      <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/springboard.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('springboardItems',$_smarty_tpl->getVariable('modules')->value['secondary']);$_template->assign('springboardID',"homegridSecondary");$_template->properties['nocache_hash']  = '155341094851fc257a45b5c6-94907604';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
         compiled from "findInclude:common/templates/springboard.tpl" */ ?>
<div class="springboard"<?php if ($_smarty_tpl->getVariable('springboardID')->value){?> id="<?php echo $_smarty_tpl->getVariable('springboardID')->value;?>
"<?php }?>>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('springboardItems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['separator']){?>
      
        <p class="separator">&nbsp;</p>
      
    <?php }else{ ?>
      <div <?php if ($_smarty_tpl->tpl_vars['item']->value['class']){?> class="<?php echo $_smarty_tpl->tpl_vars['item']->value['class'];?>
"<?php }?>>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['url']){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['linkTarget']){?> target="<?php echo $_smarty_tpl->tpl_vars['item']->value['linkTarget'];?>
"<?php }?>>
        <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img'];?>
" alt="" />
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?><br/><?php }?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['subTitle'])){?>
              <br/><span class="fineprint"><?php echo $_smarty_tpl->tpl_vars['item']->value['subTitle'];?>
</span>
            <?php }?>
            
              <?php if (isset($_smarty_tpl->tpl_vars['item']->value['badge'])){?>
                <span class="badge"><?php echo $_smarty_tpl->tpl_vars['item']->value['badge'];?>
</span>
              <?php }?>
            
            
              <?php if (isset($_smarty_tpl->tpl_vars['item']->value['secured'])){?>
          		<span class="secured"></span>
              <?php }?>
            
        <?php if ($_smarty_tpl->tpl_vars['item']->value['url']){?>
          </a>
        <?php }?>
      </div>
    <?php }?>
  <?php }} ?>
</div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/springboard.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php }?>
  
  
<?php }elseif($_smarty_tpl->getVariable('displayType')->value=='list'){?>
  
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('modules')->value['primary']);$_template->properties['nocache_hash']  = '155341094851fc257a45b5c6-94907604';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
         compiled from "findInclude:common/templates/navlist.tpl" */ ?>
<?php $_smarty_tpl->tpl_vars['defaultTemplateFile'] = new Smarty_variable("findInclude:common/templates/listItem.tpl", null, null);?>
<?php $_smarty_tpl->tpl_vars['listItemTemplateFile'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('listItemTemplateFile')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('defaultTemplateFile')->value : $tmp), null, null);?>
<?php if ($_smarty_tpl->getVariable('navListHeading')->value){?>
<div class="nonfocal listhead">
  <h3><?php echo $_smarty_tpl->getVariable('navListHeading')->value;?>
</h3>
  <?php if ($_smarty_tpl->getVariable('navListSubheading')->value){?><p class="smallprint"><?php echo $_smarty_tpl->getVariable('navListSubheading')->value;?>
</p><?php }?>
</div>
<?php }?>
<ul class="nav<?php if ($_smarty_tpl->getVariable('secondary')->value){?> secondary<?php }?><?php if ($_smarty_tpl->getVariable('nested')->value){?> nested<?php }?><?php if ($_smarty_tpl->getVariable('navlistClass')->value){?> <?php echo $_smarty_tpl->getVariable('navlistClass')->value;?>
<?php }?>"<?php if ($_smarty_tpl->getVariable('navlistID')->value){?> id="<?php echo $_smarty_tpl->getVariable('navlistID')->value;?>
"<?php }?>>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('navlistItems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <?php if ($_smarty_tpl->getVariable('hideImages')->value){?><?php if (!isset($_smarty_tpl->tpl_vars['item']) || !is_array($_smarty_tpl->tpl_vars['item']->value)) $_smarty_tpl->createLocalArrayVariable('item', null, null);
$_smarty_tpl->tpl_vars['item']->value['img'] = null;?><?php }?>
    <?php if (!isset($_smarty_tpl->tpl_vars['item']->value['separator'])){?>
      <li<?php if ($_smarty_tpl->tpl_vars['item']->value['img']||$_smarty_tpl->tpl_vars['item']->value['listclass']){?> class="<?php echo $_smarty_tpl->tpl_vars['item']->value['listclass'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?> icon<?php }?>"<?php }?>><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('listItemTemplateFile')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('subTitleNewline',(($tmp = @$_smarty_tpl->getVariable('subTitleNewline')->value)===null||$tmp==='' ? false : $tmp)); echo $_template->getRenderedTemplate();?><?php unset($_template);?></li>
    <?php }?>
  <?php }} ?>
</ul>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/navlist.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php if (count($_smarty_tpl->getVariable('modules')->value['secondary'])){?>
      <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('modules')->value['secondary']);$_template->assign('secondary',true);$_template->assign('accessKeyLink',false);$_template->properties['nocache_hash']  = '155341094851fc257a45b5c6-94907604';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-08-02 17:32:42
         compiled from "findInclude:common/templates/navlist.tpl" */ ?>
<?php $_smarty_tpl->tpl_vars['defaultTemplateFile'] = new Smarty_variable("findInclude:common/templates/listItem.tpl", null, null);?>
<?php $_smarty_tpl->tpl_vars['listItemTemplateFile'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('listItemTemplateFile')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('defaultTemplateFile')->value : $tmp), null, null);?>
<?php if ($_smarty_tpl->getVariable('navListHeading')->value){?>
<div class="nonfocal listhead">
  <h3><?php echo $_smarty_tpl->getVariable('navListHeading')->value;?>
</h3>
  <?php if ($_smarty_tpl->getVariable('navListSubheading')->value){?><p class="smallprint"><?php echo $_smarty_tpl->getVariable('navListSubheading')->value;?>
</p><?php }?>
</div>
<?php }?>
<ul class="nav<?php if ($_smarty_tpl->getVariable('secondary')->value){?> secondary<?php }?><?php if ($_smarty_tpl->getVariable('nested')->value){?> nested<?php }?><?php if ($_smarty_tpl->getVariable('navlistClass')->value){?> <?php echo $_smarty_tpl->getVariable('navlistClass')->value;?>
<?php }?>"<?php if ($_smarty_tpl->getVariable('navlistID')->value){?> id="<?php echo $_smarty_tpl->getVariable('navlistID')->value;?>
"<?php }?>>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('navlistItems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <?php if ($_smarty_tpl->getVariable('hideImages')->value){?><?php if (!isset($_smarty_tpl->tpl_vars['item']) || !is_array($_smarty_tpl->tpl_vars['item']->value)) $_smarty_tpl->createLocalArrayVariable('item', null, null);
$_smarty_tpl->tpl_vars['item']->value['img'] = null;?><?php }?>
    <?php if (!isset($_smarty_tpl->tpl_vars['item']->value['separator'])){?>
      <li<?php if ($_smarty_tpl->tpl_vars['item']->value['img']||$_smarty_tpl->tpl_vars['item']->value['listclass']){?> class="<?php echo $_smarty_tpl->tpl_vars['item']->value['listclass'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['img']){?> icon<?php }?>"<?php }?>><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('listItemTemplateFile')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('subTitleNewline',(($tmp = @$_smarty_tpl->getVariable('subTitleNewline')->value)===null||$tmp==='' ? false : $tmp)); echo $_template->getRenderedTemplate();?><?php unset($_template);?></li>
    <?php }?>
  <?php }} ?>
</ul>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/navlist.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php }?>
  
<?php }?>
