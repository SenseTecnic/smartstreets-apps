<?php /* Smarty version Smarty-3.0.7, created on 2013-08-09 14:30:42
         compiled from "findInclude:modules/CatalogueBrowser/templates/listItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180537734452053552630959-50015991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8944b06d867dd37c5c905b49c45c88b23f9b0f5' => 
    array (
      0 => 'findInclude:modules/CatalogueBrowser/templates/listItem.tpl',
      1 => 1376073021,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '180537734452053552630959-50015991',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.truncate.php';
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
    <!-- add download button and details button -->
    <a class = "details_link" onclick="viewItemDetails(this)" data-search = <?php echo $_smarty_tpl->getVariable('item')->value['itemSearchURL'];?>
>View Details</a>
    <?php if ($_smarty_tpl->getVariable('item')->value['resourceURL']){?>
      <a class = "resource_link" href="<?php echo $_smarty_tpl->getVariable('item')->value['resourceURL'];?>
">Download Resource</a>
    <?php }?>
    </span>
  <?php }?>

