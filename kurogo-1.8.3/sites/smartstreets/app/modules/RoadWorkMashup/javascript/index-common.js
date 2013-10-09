$(document).ready(function() {

	//hardcoded data
	var vms_url= "http://guiness.magic.ubc.ca/wotkit/api/sensors/42605/data?beforeE=100";
	var roadwork_url="http://guiness.magic.ubc.ca/wotkit/api/sensors/504/data?beforeE=100";
	var layer ={
	   		'Road Works': {
	   			'class':'roadwork_points', 
	   			'color':'#FFA200',
	   			'url':'http://guiness.magic.ubc.ca/wotkit/api/sensors/42602/data?beforeE=4000',
	   			'dataField':'comment'
	   		},
	   		'VMS Messages': {
	   			'class':'vms_points', 
	   			'color':'#6BC4D6',
	   			'url':'http://guiness.magic.ubc.ca/wotkit/api/sensors/42605/data?beforeE=4000',
	   			'dataField':'message'
	   		},
	   		'Accidents': {
	   			'class':'accident_points', 
	   			'color':'#C72C53',
	   			'url':'http://guiness.magic.ubc.ca/wotkit/api/sensors/42601/data?beforeE=4000',
	   			'dataField':'comment'
	   		}
	}
	
	//create leaflet map
	var map = new L.Map("map", {
	      center: [52.7, -2],
      		zoom: 6,
      		minZoom: 5,
      		maxZoom:19
	    })
	    .addLayer(new L.TileLayer("http://{s}.tile.cloudmade.com/d33d78dd8edd4f61a812a0d56b062f56/998/256/{z}/{x}/{y}.png"));
	var svg = d3.select(map.getPanes().overlayPane).append("svg"),
	    g = svg.append("g").attr("class", "leaflet-zoom-hide");
	    // timeline= d3.select("#map").append("div").attr("id", "timeline");

	//create timeline
	create_timeline();
	
	
	//Draw with D3
	d3.json("media/maps/subunits.json", function(error, collection) {
	 	var bounds = d3.geo.bounds(collection),
	    path = d3.geo.path().projection(project);

	  	var feature = g.selectAll("path")
	      	.data(collection.features)
	    	.enter().append("path")
	    	.attr("class", "uk_boundary");	
	  	var div= d3.select(".tooltip").style("opacity", 0);  

	  	//Event Binding for filters
	  	$(".cells").click(function(event){
			var self = $(this);
			event.stopPropagation();
		   	var selected= self.children("span").text();
		   	

			if (!$(self).hasClass("clicked")){
				$(self).addClass("clicked");
				if($(self).hasClass("filter")){
					//add map layer
					$("#summary_content").html("");
					plot_data(layer[selected].url, layer[selected]["class"], layer[selected]["color"], layer[selected]["dataField"]);
				}
				//turn on layers
				if(selected.indexOf("Statistics")>-1){
					$("#summary").show();
				}
				if(selected.indexOf("Date")>-1){
					$("#date-slider").show();
				}

			}else{
				$(self).removeClass("clicked");
				if($(self).hasClass("filter")){
					//remove map layer
					g.selectAll("."+layer[selected]["class"])
						.data([])
						.exit()
						.transition()       
		                .duration(300)
		                .style("opacity", 0.1)
		                .remove();
				}
				//turn off layers
				if(selected.indexOf("Statistics")>-1){
					$("#summary").hide();
				}
				if(selected.indexOf("Date")>-1){
					$("#date-slider").hide();
				}
			}
		});

		slider_onChange($("#date-slider").dateRangeSlider("values"));

	  	//bind event for date range slider
	  	$("#date-slider").bind("valuesChanged", function(e, data){
	  		slider_onChange(data.values);
		});

		$("#date-slider").click(function(event){
  			$(".tooltip").css("display", "none");
		});

	  	map.on("viewreset", reset);
	  	reset();

	  	//D3 functions
	  	function slider_onChange(data){
		  	$(".tooltip").css("display", "none");
	  		console.log("Values just changed. min: " + data.min + " max: " + data.max);
	  		$("#summary_content").html("");
	  		$("#item_summary_content").html("");
	  		//check which cells are selected
	  		$(".filter").each(function(){
	  				if ($(this).hasClass("clicked")){
	  					var key = $(this).children("span").text();
	  					var obj = layer[key];
	  					//remove existing data on map
					   	g.selectAll("."+obj["class"])
						.data([])
						.exit()
		                .remove();
		                //plot new data 
		                plot_data(obj["url"], obj["class"], obj["color"], obj["dataField"]);
	  				}	
	  		});
		}
		function plot_data(url, className, color, dataFieldName){
            makeAPICall('POST', "RoadWorkMashup" , "getDataResponse", {"url" : url}, function(response){
            	//filter data with Cross Filter here...
            	var dateValues = $("#date-slider").dateRangeSlider("values");
            	var min_date= dateValues.min;
            	var max_date= dateValues.max;
				console.log("date range: "+dateValues.min.toString() + " " + dateValues.max.toString());

               	var dataFilter = crossfilter(response);
	            console.log ("size: "+dataFilter.size());
	            var dataByDate = dataFilter.dimension(function(d) {
	            var startDay= new Date(d.starttime);
	            return startDay; 
	          	});
	            dataByDate.filterRange([min_date,max_date]);
	            var type= get_key_by_object_value("class",className);
	            console.log ("classname : "+className);
	            
	            var count = dataFilter.groupAll().reduceCount().value();
	            var string= "# of "+type+": "+count+"<br>";
	            $("#summary_content").append(string);
	            // var sortByStartTime = dataFilter.groupAll().quicksort.by(function(d) { return new Date(d.starttime); });

	   			var filteredResponse= dataByDate.top(Infinity);
               	drawPins(className, color, dataFieldName,filteredResponse);

               	
               	var filter_count= dataFilter.groupAll().reduceCount().value();
               	//draw impact graphs
               	if (className!="vms_points")
               		if(filter_count>0){
               			graphImpact(filteredResponse, className,color);
               		}
            }); 
        }

		function graphImpact(response, className, color){

        	var levels= ["impossible", "heavy", "congested", "freeFlow"];
        	var values=new Array();
        	var jsonObj = [];

        	//filter 
        	var impactFilter= crossfilter(response);
        	var dataByImpact = impactFilter.dimension(function(d) {return d.impact}); 


        	for (var i in levels){
        		dataByImpact.filter(null).filter(levels[i]);
        		var count = impactFilter.groupAll().reduceCount().value();
        		console.log ("impact "+levels[i]+": "+impactFilter.groupAll().reduceCount().value());

        		var value={};
        		value["key"]= levels[i];
        		value["y"]= count;
        		values.push(value);
        	}
        	console.log (" values: "+values);

        	jsonObj.push({key: "Impact Proportion", values: values});
        	console.log ("json dump: "+ JSON.stringify(jsonObj));


        	var chart_id = (className=="roadwork_points" ? "roadwork_chart" : "accident_chart");
        	console.log("chart id:"+chart_id);

        	var title;
        	var myColors = [LightenDarkenColor(color,-80), LightenDarkenColor(color,0), LightenDarkenColor(color,-40), LightenDarkenColor(color,40)];
        	if (chart_id=="roadwork_chart"){
        		title= "Roadwork";
        	}else{
        		title= "Accident";
        	}
        	if ($("#"+chart_id).length==0)
        		$("#item_summary_content").append(title+" Impact<svg id="+"'"+chart_id+"'"+" class='mypiechart chart'></svg>");

        	//nvd3 graph
        	nv.addGraph(function() {
			    var width = 200,
			        height = 200;

			    var chart = nv.models.pieChart()
			        .x(function(d) { return d.key })
			        .y(function(d) { return d.y })
			        .color(myColors)
			        .width(width)
			        .height(height);

			      d3.select("#"+chart_id)
			          .datum(values)
			        .transition().duration(500)
			          .attr('width', width)
			          .attr('height', height)
			          .call(chart);
			    chart.dispatch.on('stateChange', function(e) { nv.log('New State:', JSON.stringify(e)); });

			    return chart;
			});


        }

        //draw pins
        function drawPins(className, color, dataFieldName,response){
        	g.selectAll("."+className)
                .data(response)
                .enter()
                .append("circle")
                .attr("class", className+" pin")
                .attr("cx", function(d) {
                        return project([d.lng, d.lat])[0];
                })
                .attr("cy", function(d) {
                        return project([d.lng, d.lat])[1];
                })
                .attr("r", function(d) {
                	var r=8;
                	if(d.impact=="impossible"){
                		r=14;
                		newcolor= LightenDarkenColor(color,-80);
                	}
                	else if(d.impact=="congested"){
                		r=12;
                		newcolor= LightenDarkenColor(color,-40);
                	}else if (d.impact=="heavy"){
                		r=10;
                		newcolor= LightenDarkenColor(color,0);
                	}else if (d.impact=="freeFlow"){
                		r=8;
                		newcolor= LightenDarkenColor(color,40);
                	}else{
                		console.log("New impact type: "+d.impact);
                		newcolor=color;
                	}
                	d3.select(this)
                           .style({fill: newcolor});
                	return r;
                })
                .on('mouseover', function(d, i){
                      d3.select(this)
                           .style({stroke: 'red'});
                })
                .on('click', function(d, i){

	//roadworks: timestamp, recordedtime,restrictedlanes, starttime, endtime
		//info: comment, impact, latto, latfrom (lngto,lngfrom), starttime, endtime, occurrance 
	//VMS: starttime, timestamp, updatedtime, (dup. timestamp)  : 2013-08-29T15:31:09+01:00: 8/29 to 8/30
		//starttime, reason, direction, 
	//Accidents: timestamp, endtime, starttime, recordedtime, (dup.timestamp), delayTime: 8/24-8/30
		//comment, impact, restrictedlanes, starttime, lngto , endtime, occurance 

		//impact: congested, heavy, freeFlow

                           //add tooltip
                           console.log("event x, y: "+ d3.event.pageX +", "+d3.event.pageY);
                           d3.select(this)
                          .style({stroke: 'red'});
                           div.transition()       
                          .duration(200)
                          .style("display","block")     
                          .style("opacity", .9);

                          $("#extra_content").html("");//clear all content

                          var type= get_key_by_object_value("class",className);
                          $("#type").html(type);
                          $("#lat").html(d.lat);
                          $("#lng").html(d.lng);
                          // $("#msg").html(d[dataFieldName]);
                          $("#startTime").html(d["starttime"]);
                          $("#endTime").html(d["endtime"]);

                          //append additional content depending on class
                          if(className=="roadwork_points"||className=="accident_points"){
                          	$("#extra_content").append("<div style='text-align: left;'>Impact: <span class='bold'>"+d.impact+"</span></div>");
                          	$("#extra_content").append("<div style='text-align: left;'>Restricted Lanes: <span class='bold'>"+d.restrictedlanes+"</span></div>");
                          	//limit length of content
                          	$("#extra_content").append("<div style='text-align: left;'>Comment: <span class='bold'>"+d[dataFieldName]+"</span></div>");
                          }else{
                          	$("#extra_content").append("<div style='text-align: left;'>Reason: <span class='bold'>"+d.reason+"</span></div>");
                          	//limit length of message
                          	$("#extra_content").append("<div style='text-align: left;'>Message: <span class='bold'>"+d[dataFieldName]+"</span></div>");
                          }

                          //get panel height:
                          var height=parseInt($(".tooltip").css("height"),10);
                          div.style("left", (d3.event.pageX-100-8) + "px")    
                          .style("top", (d3.event.pageY-height-75) + "px");
                  })
               	.on('mouseout', function(d, i){
                     d3.select(this)
                           .style({stroke: 'rgba(255, 255, 255, 0.75)'});
                });
        }

	  	// Reposition the SVG to cover the features.
	  	function reset() {
	  	 	var bottomLeft = project(bounds[0]),
	        	topRight = project(bounds[1]);
		    svg .attr("width", topRight[0] - bottomLeft[0])
		        .attr("height", bottomLeft[1] - topRight[1])
		        .style("margin-left", bottomLeft[0] + "px")
		        .style("margin-top", topRight[1] + "px");
		    g   .attr("transform", "translate(" + -bottomLeft[0] + "," + -topRight[1] + ")");
		    feature.attr("d", path);
		    //redraw the pins due to zoom level
		 //    for (var key in layer) {
			//    	var obj = layer[key];
			// 	g.selectAll("."+obj["class"])
		 //    		.attr("cx", function (d) { return project([d.lng, d.lat])[0]; })
	  //          		.attr("cy", function (d) { return project([d.lng, d.lat])[1]; });
			// }	
			g.selectAll(".accident_points")
	        	.attr("cx", function (d) { return project([d.lng, d.lat])[0]; })
	           	.attr("cy", function (d) { return project([d.lng, d.lat])[1]; });
	        g.selectAll(".roadwork_points")
	        	.attr("cx", function (d) { return project([d.lng, d.lat])[0]; })
	           	.attr("cy", function (d) { return project([d.lng, d.lat])[1]; });
		    
	        g.selectAll(".vms_points")
	        	.attr("cx", function (d) { return project([d.lng, d.lat])[0]; })
	           	.attr("cy", function (d) { return project([d.lng, d.lat])[1]; });
	  	}
	  	// Use Leaflet to implement a D3 geographic projection.
		function project(x) {
		    var point = map.latLngToLayerPoint(new L.LatLng(x[1], x[0]));
		    return [point.x, point.y];
		}

		function get_key_by_object_value(searchKey, searchVal){
			    for( var key in layer ) {
			    	var obj= layer[key];
			    	if( obj.hasOwnProperty(searchKey)) {
			    		if (obj[searchKey]=== searchVal)
			    			return key;
			    	}
			    }
		}

		function LightenDarkenColor(col, amt) {
  
		    var usePound = false;
		  
		    if (col[0] == "#") {
		        col = col.slice(1);
		        usePound = true;
		    }
		 
		    var num = parseInt(col,16);
		 
		    var r = (num >> 16) + amt;
		 
		    if (r > 255) r = 255;
		    else if  (r < 0) r = 0;
		 
		    var b = ((num >> 8) & 0x00FF) + amt;
		 
		    if (b > 255) b = 255;
		    else if  (b < 0) b = 0;
		 
		    var g = (num & 0x0000FF) + amt;
		 
		    if (g > 255) g = 255;
		    else if (g < 0) g = 0;
		 
		    return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);
		  
		}
	});//end of D3 loop

	$("#menu_button").click(function(){
		$('#slider').toggle("slide", {
            direction: "left",
            distance: 200
        }, 500);
	});
	//prevent click through to zoom
	$("#timeline").dblclick(function(event){
		event.stopPropagation();
	});
	$("#left").click(function() {
		var scrollContent= $("#scrollContent"),
			scrollPane=$("#window");
		var marginLeft= parseInt(scrollContent.css("margin-left"), 10),
			slideLength=scrollPane.width();
		if ( scrollContent.width() > scrollPane.width() ) {
			//minus
			if (marginLeft+slideLength>=0){
				scrollContent.css( "margin-left", 0 );
			}else{
				scrollContent.css( "margin-left", marginLeft+slideLength+ "px" );
			}
        } else {
          scrollContent.css( "margin-left", 0 );
        }
	});
	$("#right").click(function() {
		var scrollContent= $("#scrollContent"),
			scrollPane=$("#window");
		var marginLeft= parseInt(scrollContent.css("margin-left"), 10),
			slideLength=scrollPane.width();
		if ( scrollContent.width() > scrollPane.width() ) {
          	scrollContent.css( "margin-left", marginLeft-slideLength+ "px" );
        } else {
          scrollContent.css( "margin-left", 0 );
        }
	});

	function create_timeline(){
		//create timeline scroll
		// var months = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
		var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
		var today = new Date();
	  	var before= new Date(today.getTime() - 60*(24 * 60 * 60 * 1000));
	  	$("#date-slider").dateRangeSlider({
	  		
		    bounds: {min: new Date(2013, 0, 1), max: new Date(2013, 11, 31, 12, 59, 59)},
		    defaultValues: {min: before, max: today},
		    step:{days: 1},
		    scales: [{
		      first: function(value){ return value; },
		      end: function(value) {return value; },
		      next: function(value){
		        var next = new Date(value);
		        return new Date(next.setMonth(value.getMonth() + 1));
		      },
		      label: function(value){
		        return months[value.getMonth()];
		      },
		      format: function(tickContainer, tickStart, tickEnd){
		        tickContainer.addClass("myCustomClass");
		      }
		    }]
	  	});

	} //end of create_timeline

	

	// Summary events
	$("#summary_header").click(function (event) {
		$('#summary_content').toggle("slide", {
            direction: "up",
            distance: 1000
        }, 200);
	});
	$("#item_summary_header").click(function (event) {
		$('#item_summary_content').toggle("slide", {
            direction: "up",
            distance: 1000
        }, 200);
	});

	$("#map").on('click', function(event) {
	    if ($(".tooltip").css('opacity')>0 && ($(event.target).attr('class') !== 'tooltip')){
	    	$(".tooltip").css("opacity",0)
                     	.css("display", "none");
	    } 
	    if (parseInt($("#slider").css('left'),10)==0 && ($(event.target).attr('id') !== 'slider'&&$(event.target).attr('id') !== 'menu_button')){
	    	$("#slider").hide("slide", { direction: "left" }, 500);
	    }
	});
	$(".tooltip").on('dblclick click', function(event) {
		event.stopPropagation();
	});
});
