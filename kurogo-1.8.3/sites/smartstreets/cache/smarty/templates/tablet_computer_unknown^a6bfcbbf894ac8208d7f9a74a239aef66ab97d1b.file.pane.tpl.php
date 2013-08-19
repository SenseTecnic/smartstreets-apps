<?php /* Smarty version Smarty-3.0.7, created on 2013-07-25 16:34:23
         compiled from "/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/social/templates/pane.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193002691051f18bcfdca8a8-96615582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6bfcbbf894ac8208d7f9a74a239aef66ab97d1b' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/modules/social/templates/pane.tpl',
      1 => 1364681345,
      2 => 'file',
    ),
    '321066d9e22dcfac44588d9a5e7456a7e46c9af8' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/paneStories.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
    '2729eb99ef68aa053a0bd6fa74db917f2fd179e7' => 
    array (
      0 => '/Users/crysng/Magic/smart_streets_apps_repo/kurogo-1.8.3/Kurogo-Mobile-Web/app/common/templates/pane.tpl',
      1 => 1364681342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193002691051f18bcfdca8a8-96615582',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

  <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineCSSBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?>
    <style type="text/css" media="screen">
      <?php echo $_smarty_tpl->tpl_vars['css']->value;?>

    </style>
  <?php }} ?>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>



  <?php if (count($_smarty_tpl->getVariable('onOrientationChangeBlocks')->value)){?>
    <script type="text/javascript">
      registerPaneResizeHandler(function () {
        <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?><?php echo $_smarty_tpl->tpl_vars['script']->value;?>
<?php }} ?>
      });
    </script>
  <?php }?>



  <?php $_smarty_tpl->tpl_vars['placeholderImage'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('placeholderImage')->value)===null||$tmp==='' ? "/modules/".($_smarty_tpl->getVariable('configModule')->value)."/images/".($_smarty_tpl->getVariable('configModule')->value)."-placeholder.png" : $tmp), null, null);?>
  <?php $_smarty_tpl->tpl_vars['showImages'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('showImages')->value)===null||$tmp==='' ? true : $tmp), null, null);?>
  <?php $_smarty_tpl->tpl_vars['hasLargeImages'] = new Smarty_variable(false, null, null);?>
  <?php  $_smarty_tpl->tpl_vars['story'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('stories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['story']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['story']->key => $_smarty_tpl->tpl_vars['story']->value){
 $_smarty_tpl->tpl_vars['story']->index++;
 $_smarty_tpl->tpl_vars['story']->first = $_smarty_tpl->tpl_vars['story']->index === 0;
?>
    <?php if ($_smarty_tpl->tpl_vars['story']->value['large']){?>
      <?php $_smarty_tpl->tpl_vars['hasLargeImages'] = new Smarty_variable(true, null, null);?>
    <?php }?>
  <?php }} ?>

  <?php $_smarty_tpl->tpl_vars['paneStoriesInstanceId'] = new Smarty_variable(($_smarty_tpl->getVariable('configModule')->value)."PaneStoriesId", null, null);?>
  <div id="<?php echo $_smarty_tpl->getVariable('paneStoriesInstanceId')->value;?>
" class="pane-stories-container">
    <div class="pane-stories">
      <?php  $_smarty_tpl->tpl_vars['story'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('stories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['story']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['story']->key => $_smarty_tpl->tpl_vars['story']->value){
 $_smarty_tpl->tpl_vars['story']->index++;
 $_smarty_tpl->tpl_vars['story']->first = $_smarty_tpl->tpl_vars['story']->index === 0;
?>
        <?php $_smarty_tpl->tpl_vars['showImageLarge'] = new Smarty_variable($_smarty_tpl->getVariable('showImages')->value&&$_smarty_tpl->tpl_vars['story']->value['large'], null, null);?>
        <?php $_smarty_tpl->tpl_vars['showImageSmall'] = new Smarty_variable($_smarty_tpl->getVariable('showImages')->value&&!$_smarty_tpl->getVariable('showImageLarge')->value&&($_smarty_tpl->tpl_vars['story']->value['img']||!$_smarty_tpl->getVariable('hasLargeImages')->value), null, null);?>
      
        <?php $_smarty_tpl->tpl_vars['imageClass'] = new Smarty_variable("pane-story-image-none", null, null);?>
        <?php if ($_smarty_tpl->getVariable('showImageLarge')->value){?>
          <?php $_smarty_tpl->tpl_vars['imageClass'] = new Smarty_variable("pane-story-image-large", null, null);?>
        <?php }elseif($_smarty_tpl->getVariable('showImageSmall')->value){?>
          <?php $_smarty_tpl->tpl_vars['imageClass'] = new Smarty_variable("pane-story-image-small", null, null);?>
        <?php }?>
        
        
        <a href="<?php echo $_smarty_tpl->getVariable('story')->value['url'];?>
" class="pane-story<?php if ($_smarty_tpl->getVariable('story')->first){?> current<?php }?><?php if ($_smarty_tpl->getVariable('story')->value['class']){?> <?php echo $_smarty_tpl->getVariable('story')->value['class'];?>
<?php }?>">
          <div class="pane-story-caption">
            <div class="ellipsis">
              <h2 class="title">
	              <?php echo $_smarty_tpl->getVariable('story')->value["title"];?>

              </h2>
              <div class="smallprint">
                <div class="source-info">
                  <?php if ($_smarty_tpl->getVariable('story')->value['img']){?><img src="<?php echo $_smarty_tpl->getVariable('story')->value['img'];?>
" alt="" /><?php }?>
                  <?php if ($_smarty_tpl->getVariable('story')->value['author']||$_smarty_tpl->getVariable('story')->value['created']){?>
                    <div class="author-created">
                      <?php if ($_smarty_tpl->getVariable('story')->value['author']){?><span class="author"><?php echo $_smarty_tpl->getVariable('story')->value['author'];?>
</span><?php }?>
                      <?php if ($_smarty_tpl->getVariable('story')->value['created']){?><span class="post-date"><?php echo $_smarty_tpl->getVariable('story')->value['created'];?>
</span><?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </a>
      
      <?php }} ?>
    </div>
    <div class="pane-stories-pager">
      <a onclick="return homePortlets.<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
.switchStory(this, 'prev');" class="pane-stories-pager-prev disabled"><img src="/common/images/page-prev.png" alt="Previous Story" /></a>
      <div class="pane-stories-pager-dots">
        <?php  $_smarty_tpl->tpl_vars['story'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('stories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['story']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['story']->key => $_smarty_tpl->tpl_vars['story']->value){
 $_smarty_tpl->tpl_vars['story']->index++;
 $_smarty_tpl->tpl_vars['story']->first = $_smarty_tpl->tpl_vars['story']->index === 0;
?> 
          <div class="pane-stories-pager-dot <?php if ($_smarty_tpl->tpl_vars['story']->first){?> current<?php }?>"></div>
        <?php }} ?>
      </div>
      <a onclick="return homePortlets.<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
.switchStory(this, 'next');" class="pane-stories-pager-next"><img src="/common/images/page-next.png" alt="Next Story" /></a>
    </div>
  </div>
  <script type="text/javascript">
      homePortlets.<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
 = new paneStories("<?php echo $_smarty_tpl->getVariable('paneStoriesInstanceId')->value;?>
");
      registerPaneResizeHandler(function () {
          homePortlets.<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
.resizeHandler();
      });
  </script>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptFooterBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onLoadBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>
  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>

