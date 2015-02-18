{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 
<div id="searchStorage" class = "focal" data-index={$index} data-param={$searchParam} data-sort={$sort}>
	<h1>Search Results:</h1> 
{$resultCount} result(s) found.

</div>
{include file="findInclude:modules/CatalogueBrowser/templates/navlist.tpl" navlistItems=$itemList secondary=true accessKey=false navlistID="searchResults"} 
{include file="findInclude:common/templates/footer.tpl"}

{if $resultCount gt 10}
<div id="scrollText" style="color: black; padding-left: 20%;">Scroll To Load More Items... </div>
{/if}

<div id="dialog-modal" title="Item Details">
  <div id = "item-details"></div>
</div>