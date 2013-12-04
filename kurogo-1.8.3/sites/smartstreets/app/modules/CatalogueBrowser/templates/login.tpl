{include file="findInclude:modules/CatalogueBrowser/templates/header.tpl"} 


<h1 class="focal">Login</h1> 
<div class="focal">
	<div title="Log In">
	  <p class="validateTips">You must login to use the Catalogue Browser.</p>
	  <form id="login-form">
	  <fieldset>
	    <label for="uid">ID: </label>
	    <input type="text" name="uid" id="uid" value="" class="text ui-widget-content ui-corner-all">
	    <br>
	    <label for="password">Password: </label>
	    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all">
	  </fieldset>
	  <p id="login-message" style="color:red"></p>
	   <input id="loginSubmit" type="submit" value="Login" ></input>
	  </form>
	</div>
</div>
{include file="findInclude:common/templates/footer.tpl"}
