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

<div id="login-form" title="Log In">
  <p class="validateTips">You must login to use the Catalogue Browser.</p>
  <form>
  <fieldset>
    <label for="uid">ID: </label>
    <input type="text" name="uid" id="uid" value="" class="text ui-widget-content ui-corner-all">
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all">
  </fieldset>
  <p id="login-message" style="color:red"></p>
  </form>
</div>

{include file="findInclude:common/templates/navlist.tpl" navlistItems=$catalogueList secondary=true accessKey=false} 
{include file="findInclude:common/templates/footer.tpl"}
