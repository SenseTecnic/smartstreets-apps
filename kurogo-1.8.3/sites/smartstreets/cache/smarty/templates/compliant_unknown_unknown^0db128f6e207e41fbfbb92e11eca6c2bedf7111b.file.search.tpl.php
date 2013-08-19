<?php /* Smarty version Smarty-3.0.7, created on 2013-08-19 17:22:12
         compiled from "/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23400211552128c84d57b70-14545754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0db128f6e207e41fbfbb92e11eca6c2bedf7111b' => 
    array (
      0 => '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/sites/smartstreets/app/modules/CatalogueBrowser/templates/search.tpl',
      1 => 1376947322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23400211552128c84d57b70-14545754',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include '/Users/crysng/Magic/project_repo/smart_streets_apps/kurogo-1.8.3/Kurogo-Mobile-Web/lib/smarty/plugins/function.html_options.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:modules/CatalogueBrowser/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>  
<div class = "focal">
	<h1>Search</h1> 
	<form id= "search_form" action= "searchResults" method= "get">
		
	
		<table>
			<tr>
				<th>Datahub<font color="red">*</font>:  </th>
				<th>
				<select name="datahub"  onchange="getDatahubCatalogues(this)">
					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->getVariable('select_options_array')->value,'selected'=>$_smarty_tpl->getVariable('mySelect')->value),$_smarty_tpl);?>
 
				</select>
				<select id= "catalogue_select" name="catalogue">
					<option value="">None</option>
					<!-- <option value="/cat/data">Data</option>
					<option value="/cat/sensors">Sensors</option> -->
				</select> 
				</th>
			</tr>
			<tr>
				<th>ID :</th>
				<th><input type="text" name = "id" ></input></th>
			</tr>
			<tr>
				<th>Description:</th>
				<th><input type="text" name = "description"></input></th>
			</tr>
			<tr>
				<th>Name:</th>
				<th><input type="text" name = "name"></input></th>
			</tr>
			<tr>
				<th>Tags:</th>
				<th><input type="text" name = "tags" placeholder="ie: transport, traffic, etc."></input></th>
			</tr>
			<tr>
				<th>Content Type: </th>
				<th><input type="text" name = "content_type"/></th>
			</tr>
			<tr>
				<th>Maintainer:</th>
				<th><input type="text" name = "maintainer"></input></th>
			</tr>
			<tr>
				<th>Owner:</th>
				<th><input type="text" name = "owner"></input></th>
			</tr>
			<tr>
				<th>Organization:</th>
				<th><input type="text" name = "organization"></input></th>
			</tr>
			<tr>
				<th>License:</th>
				<th><input type="text" name = "license"></input></th>
			</tr>
			<tr>
				<th>Sort Results:</th>
				<th>
					<select name="sort">
						<option value="">Sort By:</option>
						<option value="lastupdate.d">Most Recently Updated</option>
						<option value="lastupdate.a">Least Recently Updated</option>
						<option value="name_sort.a">Ascending Name</option>
						<option value="name_sort.d">Descending Name</option>
					</select>
				</th>
			</tr>
		</table>
		<font color="red">*</font><font size="2">: Required Fields.</font> 
		<br><br>
		<input id = "hub_selected" type="hidden" name="hub_selected" value="smartstreets">
		<input type="submit" value="Search" id = "search_button" class = "disabled" disabled = "disabled">
		
	</form>

	
</div>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>