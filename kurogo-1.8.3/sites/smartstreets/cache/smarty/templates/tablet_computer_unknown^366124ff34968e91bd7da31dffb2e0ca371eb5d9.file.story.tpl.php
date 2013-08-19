<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:36:25
         compiled from "/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/news/templates/story.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185488175951f18c490098b3-96790353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '366124ff34968e91bd7da31dffb2e0ca371eb5d9' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/news/templates/story.tpl',
      1 => 1364681344,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/pager.tpl',
      1 => 1364681342,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '185488175951f18c490098b3-96790353',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="news">
    
    <?php if ($_smarty_tpl->getVariable('image')->value&&$_smarty_tpl->getVariable('showBodyImage')->value){?>
      <div id="image">
        <img class="image" src="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
" alt="" />
      </div>
    <?php }?>
    

    
  <h1 class="slugline"><?php if ($_smarty_tpl->getVariable('showLink')->value){?><a href="<?php echo $_smarty_tpl->getVariable('link')->value;?>
"><?php }?><?php echo $_smarty_tpl->getVariable('title')->value;?>
<?php if ($_smarty_tpl->getVariable('showLink')->value){?></a><?php }?></h1>
  

  <div id="storysubhead">
    <?php ob_start();?><?php echo $_smarty_tpl->getVariable('storyURL')->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('shareRemark')->value;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('shareEmailURL')->value;?>
<?php $_tmp3=ob_get_clean();?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/share.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('shareURL',$_tmp1);$_template->assign('shareRemark',$_tmp2);$_template->assign('shareEmailURL',$_tmp3); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
            
    <?php if ($_smarty_tpl->getVariable('pager')->value['pageNumber']==0){?>
        <p class="byline">
          
              
            <?php if ($_smarty_tpl->getVariable('author')->value&&$_smarty_tpl->getVariable('showBodyAuthor')->value){?>
              <span class="credit author"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("AUTHOR_CREDIT",$_smarty_tpl->getVariable('author')->value);?>
</span><br />
            <?php }?>
    
            <?php if ($_smarty_tpl->getVariable('showBodyPubDate')->value){?>
              <span class="postdate"><?php echo $_smarty_tpl->getVariable('date')->value;?>
</span>
            <?php }?>
          
        </p>    
    <?php }?>        
  </div><!--storysubhead-->
  
  <div id="story">
    
    <?php if ($_smarty_tpl->getVariable('pager')->value['pageNumber']==0){?>
        <?php if ($_smarty_tpl->getVariable('thumbnail')->value&&$_smarty_tpl->getVariable('showBodyThumbnail')->value){?>
          <div id="thumbnail">
            <img class="thumbnail" src="<?php echo $_smarty_tpl->getVariable('thumbnail')->value['src'];?>
" alt="" />
          </div>
        <?php }?>
    <?php }?>
    
        
    <span id="storybody">
      <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/pager.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '185488175951f18c490098b3-96790353';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:36:25
         compiled from "findInclude:common/templates/pager.tpl" */ ?>
<?php echo $_smarty_tpl->getVariable('pager')->value['html']['all'];?>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/pager.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    </span>
    
    <?php if ($_smarty_tpl->getVariable('showLink')->value){?>
    
    <div id="showmore">
    <a href="<?php echo $_smarty_tpl->getVariable('link')->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("READ_MORE");?>
</a>
    </div>
    
    <?php }?>
  </div><!--story-->
</div>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
