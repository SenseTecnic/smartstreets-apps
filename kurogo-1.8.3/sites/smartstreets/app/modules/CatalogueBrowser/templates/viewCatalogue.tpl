{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 
<div id="storage" class = "focal" data-index={$index} data-param={$searchParam} data-sort={$sort}>
	<h1>Catalogue Metadata: {$itemNum} items</h1> 
	<li class = "smallprint">URL: {$catalogueURL}</li>
	{foreach from=$catalogueInfo item=line}
	    <li class = "smallprint">{$line}</li>
	{/foreach}
</div>

<select id="sortView" name="sort">
	<option value="">Sort By:</option>
	<option value="lastupdate.d">Most Recently Updated</option>
	<option value="lastupdate.a">Least Recently Updated</option>
	<option value="name_sort.a">Ascending Name</option>
	<option value="name_sort.d">Descending Name</option>
</select>

{include file="findInclude:modules/CatalogueBrowser/templates/navlist.tpl" navlistItems=$itemList secondary=true accessKey=false navlistID="navResults"} 



{if $itemList|@count gt 10}
	<div id="scrollText" style="color: black; padding-left: 20%;">Scroll To Load 10 More Items... </div>
{/if}

{include file="findInclude:common/templates/footer.tpl"}

<div id="dialog-modal" title="Item Details">
  <div id = "item-details"></div>
</div>