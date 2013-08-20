{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 
<div class = "focal">
	<h1>Search Results:</h1> 
{$resultCount} result(s) found.

</div>
{include file="findInclude:modules/CatalogueBrowser/templates/navlist.tpl" navlistItems=$itemList secondary=true accessKey=false} 
{include file="findInclude:common/templates/footer.tpl"}

<div id="dialog-modal" title="Item Details">
  <div id = "item-details"></div>
</div>