<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<div id="mapContainer">	

{include file="findInclude:common/templates/header.tpl"} 
<div id="map" >
	
	<div id="summary">
		<div class="summary" id="summary_header">Current View Statistics: <span style=" position: relative; right: 0px;">-</span></div>
		<div class="summary" id="summary_content">No Data</div>
		<div class="summary" id="item_summary_header">Impact Graphs: <span style="right: 0;">-</span></div>
		<div class="summary" id="item_summary_content">
		</div>
	</div>
	
	<div id="slider">
		<div class="label">Map Filters</div>
		<div class="cells filter clicked"><div class="tag" style="background-color: #FFA200; "> </div><span>Road Works</span></div>
		<div class="cells filter clicked"><div class="tag" style="background-color: skyblue;"> </div><span>VMS Messages</span></div>
		<div class="cells filter clicked"><div class="tag" style="background-color: #80002B;"> </div><span>Accidents</span></div>

		<div class="label">Map Widgets</div>
		<div class="cells widget clicked"><span>Statistics Panel</span></div>
		<div class="cells widget clicked"><span>Date Range Slider</span></div>
	</div>
	<div id="menu_button">
			Menu
	</div>

	<div class="tooltip">
	<div id="header"></div>
	<div id="content">
		<div id="type"></div>
		<table border="0">
			<tr>
				<td style="border-right: 1px solid grey;">Latitude <span id="lat" class="locationData"></span></td>
				<td>Longitude <span id="lng" class="locationData"></span></td>
			</tr>
		</table>
		<table border="0">
			<tr>
				<td style="border-top: 1px solid grey;">Start Time<br><span id="startTime" class="bold"></span></td>
			</tr>
			<tr>
				<td style="border-bottom: 1px solid grey;">End Time <br><span id="endTime" class="bold"></span></td>
			</tr>
		</table>
		<div id="extra_content"></div>
	</div>
	</div>
</div> 
<div id= "date-slider"></div>
</div>
</div>



