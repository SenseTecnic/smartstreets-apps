{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 
<div id="storage" class = "focal" data-index={$index} data-param={$searchParam}>
	<h1>Catalogue Metadata: {$itemNum} items</h1> 
	<li class = "smallprint">URL: {$catalogueURL}</li>
	{foreach from=$catalogueInfo item=line}
	    <li class = "smallprint">{$line}</li>
	{/foreach}
</div>
{include file="findInclude:modules/CatalogueBrowser/templates/navlist.tpl" navlistItems=$itemList secondary=true accessKey=false navlistID="navResults"} 


<div id="scrollText" style="color: black; padding-left: 20%;">Scroll To Load 10 More Items... </div>

{include file="findInclude:common/templates/footer.tpl"}

<div id="dialog-modal" title="Item Details">
  <div id = "item-details"></div>
</div>