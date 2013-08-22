$(document).ready(function() {

	// enable/disable search submit button depends on selected option
	// $("#catalogue_select").change(function(){
	// 	if ($(this).val()!=""){
	// 		//enable submit button
	// 		$("#search_button").addClass("enabled");
	// 		$("#search_button").removeClass("disabled");
	// 		$("#search_button").removeAttr("disabled", "disabled");
	// 	}else{
	// 		$("#search_button").removeClass("enabled");
	// 		$("#search_button").addClass("disabled");
	// 		$("#search_button").attr("disabled", "disabled");
	// 	}
	// });


	//detect scroll to bottom
	$(window).scroll(function(){
	  if ($(window).scrollTop() == $(document).height() - $(window).height()){
	    console.log ("bottom!");
	    var current =$(location).attr('href');
	    if (current.indexOf("searchResults")>-1){
	    	//search result page
	    	loadMoreResults();
	    }else{
	    	loadMorePosts();
	    }
	    
	  }
	});
});


function viewItemDetails(that){
	var itemSearchURL= $(that).data("search");
	console.log ("item url: "+ itemSearchURL);
	var part1= itemSearchURL.substr(0, itemSearchURL.indexOf("&val="));
	var part2 = itemSearchURL.substr(itemSearchURL.indexOf("&val=")+5);

	console.log("part1: "+part1);
	console.log("part2: "+part2);
	var params = {"part1" : part1,"part2" :part2};
	// console.log ("module id: "+ moduleId);

	//TODO: Call AJAX to get item details
	makeAPICall('POST', "CatalogueBrowser" , 'viewItemDetails', params, function(response){
		//clear all previous dialog content
		$("#item-details").html ("");

		console.log (" item details response: "+response);
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

function loadMorePosts(){
  var param= $("#storage").data("param");
  // var parentUrl= (param["parentUrl"]);
  console.log ("param"+param);
  // console.log ("parent url"+parentUrl);
  var index= $("#storage").data("index");
  console.log ("index"+index);
  // var index= $(".sortinput").attr("data-index");
  // var sort= (param["sort"]);

  makeAPICall(
    'POST', 'CatalogueBrowser', 'loadMoreItems',
    {"parentUrl":param, "index": index},
    function(response){
      console.log (response);
      // set new index value
      var newIndex= parseInt(index)+10;
      console.log("new index: "+newIndex);
      $('#storage').data("index", newIndex);

      var json = $.parseJSON(response);
      var textToInsert = [];


      $(json.docs).each(function(i,data){

      	  var id = data.hasid;
      	  var datahub = data.datahub;
          var name = data.name;
          var description= data.hasdescription;
          var lastupdate= data.lastupdate;
          var tags= data.tags;
          var iscatalogue= data.isCatalogue;
          var parentUrl= data.parentUrl;
          var href= data.href;
          var tagArray;
           console.log ("is catalogue: "+iscatalogue);
          if(tags!=null){
          	tagArray = tags.split(',');
          }

          //dynammically append list item
          textToInsert[i++]  = '<li>';
          if(lastupdate!=null){
          	textToInsert[i++] = '<div class="lastUpdateLabel">Last Updated: ';
          	textToInsert[i++] = lastupdate;
         	textToInsert[i++] = '</div>';
          }
          textToInsert[i++] = ' <strong>Name: </strong>';
          if(name!=null){
          	textToInsert[i++] = name;
          }else{
          	textToInsert[i++] = "No Name";
          }
          if(iscatalogue){
          	//build breadcrumb url
            var sub_href = href.substr(href.indexOf("/cat"));
            console.log ("subref:: "+sub_href);
           console.log ("HI:: "+$(location).attr('href'));
           var current =$(location).attr('href');
           var base_href= current.substr(0,current.indexOf('?'));
           console.log("bz url:"+base_href);
           var breadcrumb = base_href+'?'+"href="+sub_href+"&hub="+datahub;
           console.log("bz url:"+breadcrumb);

          	textToInsert[i++] = "<a href='"+breadcrumb+"'>";
          }
          textToInsert[i++] = ' <br><strong>Description: </strong>&nbsp;<span class="smallprint">';
          if(description!=null){
          	textToInsert[i++] = description;
          }else{
          	textToInsert[i++] = "No Description";
          }
          textToInsert[i++] = '</span>';
          if(tags!=null){
          	textToInsert[i++] = "<br><br><strong>Tags: </strong>";
          	for(var y in tagArray ){
          		textToInsert[i++] = "<span class='badge'>"+tagArray[y];
          		textToInsert[i++] = "</span>";
          	}
          }

          if(iscatalogue){
          	textToInsert[i++] = "</a>";
          }else{
          	var hubUrl=parentUrl.substr(0, parentUrl.indexOf("/cat"));
          	var itemSearchURL=parentUrl+"?rel=urn:X-"+datahub+":rels:hasId"+"&val="+id;;
          	var resourceURL="";
          	if(href.indexOf("http")>-1){
          		resourceURL=href;
          	}else{
          		resourceURL=hubUrl+href;
          	}	
          	console.log ("resource url: "+resourceURL);
          	console.log ("item serach url: "+itemSearchURL);

          	//TODO: build view details and resource url
          	textToInsert[i++] = '<a class = "details_link" onclick="viewItemDetails(this)" data-search = ';
          	textToInsert[i++] = itemSearchURL;
          	textToInsert[i++] = ">View Details</a>";
          	textToInsert[i++] = '<a class = "resource_link" href="';
          	textToInsert[i++] = resourceURL;
          	textToInsert[i++] = '">Download Resource</a>';
          }
      
       	  textToInsert[i++]  = '</li>';
          $("#navResults").append(textToInsert.join(''));
          textToInsert = [];
      });

      if (newIndex>=json.numFound){
        $("#scrollText").text("End of list.");
      }


  });
}

function loadMoreResults(){
  var param= $("#searchStorage").data("param");
  var param_string = JSON.stringify(param);
  console.log ("param json: "+JSON.stringify(param));
  var index= $("#searchStorage").data("index");
  var sort= $("#searchStorage").data("sort");
  console.log ("sort: "+sort);
  // var index= $(".sortinput").attr("data-index");
  // var sort= (param["sort"]);

  makeAPICall(
    'POST', 'CatalogueBrowser', 'loadMoreResults',
    {"searchParam":param_string, "index": index, "sort": sort},
    function(response){
      console.log (response);
      // set new index value
      var newIndex= parseInt(index)+10;
      console.log("new index: "+newIndex);
      $('#searchStorage').data("index", newIndex);

      var json = $.parseJSON(response);
      var textToInsert = [];


      $(json.docs).each(function(i,data){

      	  var id = data.hasid;
      	  var datahub = data.datahub;
          var name = data.name;
          var description= data.hasdescription;
          var lastupdate= data.lastupdate;
          var tags= data.tags;
          var iscatalogue= data.isCatalogue;
          var parentUrl= data.parentUrl;
          var href= data.href;
          var tagArray;
           console.log ("is catalogue: "+iscatalogue);
          if(tags!=null){
          	tagArray = tags.split(',');
          }

          //dynammically append list item
          textToInsert[i++]  = '<li>';
          if(lastupdate!=null){
          	textToInsert[i++] = '<div class="lastUpdateLabel">Last Updated: ';
          	textToInsert[i++] = lastupdate;
         	textToInsert[i++] = '</div>';
          }
          textToInsert[i++] = ' <strong>Name: </strong>';
          if(name!=null){
          	textToInsert[i++] = name;
          }else{
          	textToInsert[i++] = "No Name";
          }
          if(iscatalogue){
          	//build breadcrumb url
            var sub_href = href.substr(href.indexOf("/cat"));
            console.log ("subref:: "+sub_href);
           console.log ("HI:: "+$(location).attr('href'));
           var current =$(location).attr('href');
           var base_href= current.substr(0,current.indexOf('?'));
           console.log("bz url:"+base_href);
           var breadcrumb = base_href+'?'+"href="+sub_href+"&hub="+datahub;
           console.log("bz url:"+breadcrumb);

          	textToInsert[i++] = "<a href='"+breadcrumb+"'>";
          }
          textToInsert[i++] = ' <br><strong>Description: </strong>&nbsp;<span class="smallprint">';
          if(description!=null){
          	textToInsert[i++] = description;
          }else{
          	textToInsert[i++] = "No Description";
          }
          textToInsert[i++] = '</span>';
          if(tags!=null){
          	textToInsert[i++] = "<br><br><strong>Tags: </strong>";
          	for(var y in tagArray ){
          		textToInsert[i++] = "<span class='badge'>"+tagArray[y];
          		textToInsert[i++] = "</span>";
          	}
          }

          if(iscatalogue){
          	textToInsert[i++] = "</a>";
          }else{
          	var hubUrl=parentUrl.substr(0, parentUrl.indexOf("/cat"));
          	var itemSearchURL=parentUrl+"?rel=urn:X-"+datahub+":rels:hasId"+"&val="+id;;
          	var resourceURL="";
          	if(href.indexOf("http")>-1){
          		resourceURL=href;
          	}else{
          		resourceURL=hubUrl+href;
          	}	
          	console.log ("resource url: "+resourceURL);
          	console.log ("item serach url: "+itemSearchURL);

          	//TODO: build view details and resource url
          	textToInsert[i++] = '<a class = "details_link" onclick="viewItemDetails(this)" data-search = ';
          	textToInsert[i++] = itemSearchURL;
          	textToInsert[i++] = ">View Details</a>";
          	textToInsert[i++] = '<a class = "resource_link" href="';
          	textToInsert[i++] = resourceURL;
          	textToInsert[i++] = '">Download Resource</a>';
          }
      
       	  textToInsert[i++]  = '</li>';
          $("#searchResults").append(textToInsert.join(''));
          textToInsert = [];
      });

      if (newIndex>=json.numFound){
        $("#scrollText").text("End of list.");
      }


  });
}
