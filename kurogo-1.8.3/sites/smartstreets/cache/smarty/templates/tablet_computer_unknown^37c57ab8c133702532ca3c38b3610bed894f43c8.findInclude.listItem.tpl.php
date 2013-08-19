<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:34:30
         compiled from "findInclude:common/templates/listItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84243678751f18bd61bd350-63724222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37c57ab8c133702532ca3c38b3610bed894f43c8' => 
    array (
      0 => 'findInclude:common/templates/listItem.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '84243678751f18bd61bd350-63724222',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.truncate.php';
?><?php ob_start(); ?>
  <?php if (isset($_smarty_tpl->getVariable('item',null,true,false)->value['label'])){?>
    <?php if ($_smarty_tpl->getVariable('boldLabels')->value){?>
      <strong>
    <?php }?>
      <?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
<?php if ((($tmp = @$_smarty_tpl->getVariable('labelColon')->value)===null||$tmp==='' ? true : $tmp)){?>: <?php }?>
    <?php if ($_smarty_tpl->getVariable('boldLabels')->value){?>
      </strong>
    <?php }?>
  <?php }?>
<?php  $_smarty_tpl->assign("listItemLabel", ob_get_contents()); Smarty::$_smarty_vars['capture']["listItemLabel"]=ob_get_clean();?>

  <?php if ($_smarty_tpl->getVariable('item')->value['url']){?>
    <a href="<?php echo $_smarty_tpl->getVariable('item')->value['url'];?>
" class="<?php echo (($tmp = @$_smarty_tpl->getVariable('item')->value['class'])===null||$tmp==='' ? '' : $tmp);?>
"<?php if ($_smarty_tpl->getVariable('linkTarget')->value||$_smarty_tpl->getVariable('item')->value['linkTarget']){?> target="<?php if ($_smarty_tpl->getVariable('item')->value['linkTarget']){?><?php echo $_smarty_tpl->getVariable('item')->value['linkTarget'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('linkTarget')->value;?>
<?php }?>"<?php }?><?php if ($_smarty_tpl->getVariable('item')->value['onclick']){?>onclick="<?php echo $_smarty_tpl->getVariable('item')->value['onclick'];?>
"<?php }?>>
  <?php }else{ ?>
    <span class="nolink">
  <?php }?>
    <?php if ($_smarty_tpl->getVariable('item')->value['img']){?>
      <img src="<?php echo $_smarty_tpl->getVariable('item')->value['img'];?>
" alt="<?php if ($_smarty_tpl->getVariable('item')->value['imgAlt']){?><?php echo $_smarty_tpl->getVariable('item')->value['imgAlt'];?>
<?php }?>"
        <?php if ($_smarty_tpl->getVariable('item')->value['imgWidth']){?> width="<?php echo $_smarty_tpl->getVariable('item')->value['imgWidth'];?>
"<?php }?>
        <?php if ($_smarty_tpl->getVariable('item')->value['imgHeight']){?> height="<?php echo $_smarty_tpl->getVariable('item')->value['imgHeight'];?>
"<?php }?> />
    <?php }?>
    <?php echo $_smarty_tpl->getVariable('listItemLabel')->value;?>

    <?php if ($_smarty_tpl->getVariable('titleTruncate')->value){?>
      <?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('item')->value['title'],$_smarty_tpl->getVariable('titleTruncate')->value);?>

    <?php }else{ ?>
      <?php echo $_smarty_tpl->getVariable('item')->value['title'];?>

    <?php }?>
    <?php if ($_smarty_tpl->getVariable('item')->value['subtitle']){?>
      <?php if ((($tmp = @$_smarty_tpl->getVariable('subTitleNewline')->value)===null||$tmp==='' ? true : $tmp)){?><div<?php }else{ ?>&nbsp;<span<?php }?> class="smallprint">
        <?php echo $_smarty_tpl->getVariable('item')->value['subtitle'];?>

      <?php if ((($tmp = @$_smarty_tpl->getVariable('subTitleNewline')->value)===null||$tmp==='' ? true : $tmp)){?></div><?php }else{ ?></span><?php }?>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('item')->value['badge']){?>
      <span class="badge"><?php echo $_smarty_tpl->getVariable('item')->value['badge'];?>
</span>
    <?php }?>
  <?php if ($_smarty_tpl->getVariable('item')->value['url']){?>
    </a>
  <?php }else{ ?>
    </span>
  <?php }?>

