{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 
<h1 class="focal">{$message}</h1> 
<div class="focal">
	<h2 >Select an IoT Hub:</h2>
	<form id= "datahub_form" action= "viewCatalogue" method= "get">
		{foreach $datahub_array as $datahub}
			<input class="datahub_selector" type="submit" name="datahub" value={$datahub}></input>
		{/foreach}
	</form>
</div>
{include file="findInclude:common/templates/navlist.tpl" navlistItems=$catalogueList secondary=true accessKey=false} 
{include file="findInclude:common/templates/footer.tpl"}
