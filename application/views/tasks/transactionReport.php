
		
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			<div class="form-inline">
				<button class="btn btn-success transactionType">Yearly</button>
				<button class="btn btn-default transactionType">Monthly</button><!-- 
				<button class="btn btn-default transactionType">Weekly</button> -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			<div class="form-inline selection">
				<div class="yearly">
					<select class="form-control" data-catagory="yearly">
						<?php 
							for($i=2016;$i>2000;$i--){
								echo "<option value='".$i."'>".$i."</option>";
							}
						?>
					</select>
				</div>
				<div class="monthly" style="display: none">
					<select class="form-control" data-catagory="monthly">
						<?php 
							for($i=2016;$i>2000;$i--){
								echo "<option value='".$i."'>".$i."</option>";
							}
						?>
					</select>
					<select class="form-control" data-catagory="monthly">
						<option value="1">January</option>
						<option value="2">Fabruary</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>
				<div class="weekly" style="display: none">
					<select class="form-control" data-catagory="weekly">
						<?php 
							for($i=2016;$i>2000;$i--){
								echo "<option value='".$i."'>".$i."</option>";
							}
						?>
					</select>
					<select class="form-control" data-catagory="weekly">
						<option value="1">January</option>
						<option value="2">Fabruary</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="chartdiv"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".transactionType").on("click",function(){
			var thisBtn=$(this);
			$(this).closest("div").find(".transactionType.btn-success").removeClass("btn-success").addClass("btn-default");
			thisBtn.addClass("btn-success");
			var value;
			var month;
			switch(thisBtn.text()){
				case "Yearly":
					$(".yearly").show();
					$(".monthly").hide();
					$(".weekly").hide();
					value=$(".yearly select").val();
					break;
				case "Monthly":
					$(".yearly").hide();
					$(".monthly").show();
					$(".weekly").hide();
					value=$(".monthly").find("select").eq(0).val();
					month=$(".monthly").find("select").eq(1).val();
					break;
				case "Weekly":
					$(".yearly").hide();
					$(".monthly").hide();
					$(".weekly").show();
					value=$(".weekly").find("select").eq(0).val();
					month=$(".weekly").find("select").eq(1).val();
					break;
			}
			makeChart(thisBtn.text(),value,month);
		});

		$(".selection select").on("change",function(){
			var value=$(this).closest("div").find("select").eq(0).val();
			var catagory=$(this).attr("data-catagory");
			var month=$(this).closest("div").find("select").eq(1).val();
			makeChart(catagory,value,month);
		});
		$(".transactionType.btn-success").trigger("click");
	});

	function makeChart(catagory,value,month){
		var metaData=[];
		metaData.push({
					    "balloonText": "Pant: <b>[[value]]</b>",
					    "fillAlphas": 0.8,
					    "lineAlpha": 0.2,
					    "type": "column",
					    "title": "Pant",
					    "valueField": "pant"
					  });
		metaData.push({
					    "balloonText": "Shirt: <b>[[value]]</b>",
					    "fillAlphas": 0.8,
					    "lineAlpha": 0.2,
					    "type": "column",
					    "title": "Shirt",
					    "valueField": "shirt"
					  });
		metaData.push({
					    "balloonText": "Coat: <b>[[value]]</b>",
					    "fillAlphas": 0.8,
					    "lineAlpha": 0.2,
					    "type": "column",
					    "title": "Coat",
					    "valueField": "coat"
					  });
		metaData.push({
					    "balloonText": "Other: <b>[[value]]</b>",
					    "fillAlphas": 0.8,
					    "lineAlpha": 0.2,
					    "type": "column",
					    "title": "Other",
					    "valueField": "other"
					  });
		$.ajax({
			url:"DataProcessing/getTransactionByCatagoryJson",
			data:{catagory:catagory,value:value,month:month},
			method:"post",
			dataType:"json",
			success:function(msg){
				console.log(msg);
				var length=msg.data.length;
				switch(catagory.toLowerCase()){
					case "yearly":
						var data=[];


						data.push({"month":"Jan",
							"pant":msg.data.jan.pant,
							"shirt":msg.data.jan.shirt,
							"coat":msg.data.jan.coat,
							"other":msg.data.jan.other});
						data.push({"month":"Feb",
							"pant":msg.data.feb.pant,
							"shirt":msg.data.feb.shirt,
							"coat":msg.data.feb.coat,
							"other":msg.data.feb.other});
						data.push({"month":"Mar",
							"pant":msg.data.mar.pant,
							"shirt":msg.data.mar.shirt,
							"coat":msg.data.mar.coat,
							"other":msg.data.mar.other});
						data.push({"month":"Apr",
							"pant":msg.data.apr.pant,
							"shirt":msg.data.apr.shirt,
							"coat":msg.data.apr.coat,
							"other":msg.data.apr.other});
						data.push({"month":"May",
							"pant":msg.data.may.pant,
							"shirt":msg.data.may.shirt,
							"coat":msg.data.may.coat,
							"other":msg.data.may.other});
						data.push({"month":"Jun",
							"pant":msg.data.jun.pant,
							"shirt":msg.data.jun.shirt,
							"coat":msg.data.jun.coat,
							"other":msg.data.jun.other});
						data.push({"month":"Jul",
							"pant":msg.data.jul.pant,
							"shirt":msg.data.jul.shirt,
							"coat":msg.data.jul.coat,
							"other":msg.data.jul.other});
						data.push({"month":"Aug",
							"pant":msg.data.aug.pant,
							"shirt":msg.data.aug.shirt,
							"coat":msg.data.aug.coat,
							"other":msg.data.aug.other});
						data.push({"month":"Sep",
							"pant":msg.data.sep.pant,
							"shirt":msg.data.sep.shirt,
							"coat":msg.data.sep.coat,
							"other":msg.data.sep.other});
						data.push({"month":"Oct",
							"pant":msg.data.oct.pant,
							"shirt":msg.data.oct.shirt,
							"coat":msg.data.oct.coat,
							"other":msg.data.oct.other});
						data.push({"month":"Nov",
							"pant":msg.data.nov.pant,
							"shirt":msg.data.nov.shirt,
							"coat":msg.data.nov.coat,
							"other":msg.data.nov.other});
						data.push({"month":"Dec",
							"pant":msg.data.dec.pant,
							"shirt":msg.data.dec.shirt,
							"coat":msg.data.dec.coat,
							"other":msg.data.dec.other});
						

						displayChart(data,metaData,"month");
					break;
					case "monthly":
						var data=[];
						for(var i=0;i<msg.data.length;i++){
							data.push({"day":eval(i+1),
							"pant":msg.data[i].pant,
							"shirt":msg.data[i].shirt,
							"coat":msg.data[i].coat,
							"other":msg.data[i].other});
						}						
						displayChart(data,metaData,"day");
					break;
				}
			}
		});
	}
	function displayChart(data,metaData,catagory){
		var chart = AmCharts.makeChart( "chartdiv", {
			  "type": "serial",
			  "theme": "light",
			  "dataProvider": data,

			  "valueAxes": [ {
			    "gridColor": "#FFFFFF",
			    "gridAlpha": 0.2,
			    "dashLength": 0
			  } ],
			  "gridAboveGraphs": true,
			  "startDuration": 1,

			  "graphs": metaData,

			  "chartCursor": {
			    "categoryBalloonEnabled": false,
			    "cursorAlpha": 0,
			    "zoomable": false
			  },

			  "categoryField": catagory,

			  "categoryAxis": {
			    "gridPosition": "start",
			    "gridAlpha": 0,
			    "tickPosition": "start",
			    "tickLength": 20
			  },
			  "export": {
			    "enabled": true,
			    "fileName": "exportedChart",

				// set column names when exporting as data
				"exportTitles": true
			  },
				"legend": {
					"position": "bottom",
					"valueText": "[[value]]",
					"valueWidth": 100,
					"valueAlign": "left",
					"equalWidths": false,
					"periodValueText": "Total: [[value.sum]]"
				},
				"creditsPosition": "top-left",
			} );
	}
</script>