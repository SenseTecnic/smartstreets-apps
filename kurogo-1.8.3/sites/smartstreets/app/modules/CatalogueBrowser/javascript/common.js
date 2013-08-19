$(document).ready(function() {

	// enable/disable search submit button depends on selected option
	$("#catalogue_select").change(function(){
		if ($(this).val()!=""){
			//enable submit button
			$("#search_button").addClass("enabled");
			$("#search_button").removeClass("disabled");
			$("#search_button").removeAttr("disabled", "disabled");
		}else{
			$("#search_button").removeClass("enabled");
			$("#search_button").addClass("disabled");
			$("#search_button").attr("disabled", "disabled");
		}
	});
});

function viewItemDetails(that){
	var itemSearchURL= $(that).data("search");
	console.log ("item url: "+ itemSearchURL);

	var params = {"searchUrl" : itemSearchURL };
	// console.log ("module id: "+ moduleId);

	//TODO: Call AJAX to get item details
	makeAPICall('GET', "CatalogueBrowser" , 'viewItemDetails', params, function(response){
		//clear all previous dialog content
		$("#item-details").html ("");
		//display details in a pop up 
		$(response.items[0]["i-object-metadata"]).each(function(i,data){
			//append data content to dialog 
			$( "#item-details" ).append("<b>"+data["rel"].split (':')[3]+ ": </b>"+data["val"]+"<br>");
		});

		$( "#dialog-modal" ).dialog({
		      height: 'auto',//how to make responsive height 
		      width: 'auto',
		      modal: true,
		      dialogClass: 'detailDialog'
		});
	});
}

function sortResults (sel){
	var selected_sort = sel.options[sel.selectedIndex].value;
	console.log ("selected: "+selected_sort);
}

function getDatahubCatalogues(sel){
	var selected_datahub_url = sel.options[sel.selectedIndex].value;
	var selected_datahub_name = sel.options[sel.selectedIndex].label;

	$("#hub_selected").val(selected_datahub_name);

	//TODO: set global var of base url
	console.log ("selected hub url : "+selected_datahub_url); 
	if (selected_datahub_name=="None"){
		//clear catalogue selector options and set default to none
		$("#catalogue_select").html ("<option value=''>None</option>");
	}else{
		// fetch first level catalogues using AJAX
		var params = {"baseURL" : selected_datahub_url };
		makeAPICall('GET', "CatalogueBrowser" , 'getDatahubCatalogues', params, function(response){
			//update combo box
			$(response.items).each(function(i,data){
				//append href to dropdown
				$("#catalogue_select").append($("<option></option>")
	         		.attr("value", data["href"])
	         		.text(data["href"])); 
			});
		});
	}	
}