{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 
<div class = "focal">
	<h1>Search Results:</h1> 
{$resultCount} result(s) found.
<select name="sort"  onchange="sortResults(this)">
	<option value="">Sort By:</option>
	<option value="lastupdate">Date</option>
	<option value="name">Name</option>
</select>
</div>
{include file="findInclude:modules/CatalogueBrowser/templates/navlist.tpl" navlistItems=$itemList secondary=true accessKey=false} 
{include file="findInclude:common/templates/footer.tpl"}

<div id="dialog-modal" title="Details">
  <div id = "item-details"></div>
</div>