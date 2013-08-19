{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"}  
<div class = "focal">
	<h1>Search</h1> 
	<form id= "search_form" action= "searchResults" method= "get">
		
	
		<table>
			<tr>
				<th>Datahub<font color="red">*</font>:  </th>
				<th>
				<select name="datahub"  onchange="getDatahubCatalogues(this)">
					{html_options options=$select_options_array selected=$mySelect} 
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
{include file="findInclude:common/templates/footer.tpl"}