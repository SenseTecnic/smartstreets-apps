{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"}  
<div class = "focal">
	<h1>Search</h1> 
	<form id= "search_form" action= "searchResults" method= "get">
		
		<font color="red"></font><font size="2">Note: All fields are optional.</font> 
		<br><br>
		<table>
			<tr>
				<th>Datahub:  </th>
				<th>
				<select name="datahub" onchange="getDatahubCatalogues(this)">
					{html_options options=$select_options_array selected=$mySelect} 
				</select>
				<select id= "catalogue_select" name="catalogue">
					<option value="">None</option>
				</select> 
				</th>
			</tr>
			<tr>
				<th>ID :</th>
				<th><input type="text" name = "id" placeholder="ID of catalogues"></input></th>
			</tr>
			<tr>
				<th>Description:</th>
				<th><input type="text" name = "description" placeholder="Description text of catalogues"></input></th>
			</tr>
			<tr>
				<th>Name:</th>
				<th><input type="text" name = "name" placeholder="Full/partical catalogue names"></input></th>
			</tr>
			<tr>
				<th>Tags:</th>
				<th><input type="text" name = "tags" placeholder="ie: transport, traffic, etc."></input></th>
			</tr>
			<tr>
				<th>Content Type: </th>
				<th><input type="text" name = "content_type" placeholder="ie: json, excel, etc."></input></th>
			</tr>
			<tr>
				<th>Maintainer:</th>
				<th><input type="text" name = "maintainer" placeholder="ie: General Statistics Team, etc."></input></th>
			</tr>
			<tr>
				<th>Owner:</th>
				<th><input type="text" name = "owner" placeholder="ie: In Touch, Met Office, etc."></input></th>
			</tr>
			<tr>
				<th>Organization:</th>
				<th><input type="text" name = "organization" placeholder="ie: sense-tecnic etc."></input></th>
			</tr>
			<tr>
				<th>License:</th>
				<th><input type="text" name = "license" placeholder="ie: Creative Commons, OGL, etc."></input></th>
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
		
		<input id = "hub_selected" type="hidden" name="hub_selected" value="smartstreets">
		<input type="submit" value="Search" id = "search_button" />
		<!-- <input type="submit" value="Search" id = "search_button" class = "disabled" disabled = "disabled"> -->
		
	</form>

	
</div>
{include file="findInclude:common/templates/footer.tpl"}