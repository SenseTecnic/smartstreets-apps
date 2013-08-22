{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 
<div id="searchStorage" class = "focal" data-index={$index} data-param={$searchParam} data-sort={$sort}>
	<h1>Search Results:</h1> 
{$resultCount} result(s) found.

</div>
{include file="findInclude:modules/CatalogueBrowser/templates/navlist.tpl" navlistItems=$itemList secondary=true accessKey=false navlistID="searchResults"} 
{include file="findInclude:common/templates/footer.tpl"}

<div id="scrollText" style="color: black; padding-left: 20%;">Scroll To Load 10 More Items... </div>

<div id="dialog-modal" title="Item Details">
  <div id = "item-details"></div>
</div>