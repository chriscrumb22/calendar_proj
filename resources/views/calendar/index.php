<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calendar</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>Calendar</h2>	
		</div>		
	</div>	
</div>
<hr>
<div class="container">
	<div class="row">
		

		<div class="col-sm-4">
			<div class="form-group">
			    <label for="exampleInputEmail1">Event</label>
			    <input type="text" class="form-control" id="Event_Name" >
			</div>	
		
			<div class="form-row">
		    	<div class="form-group col-md-6">
		      		<label for="inputEmail4">Start Date</label>
		      		<input type="text" class="form-control" id="StartDate">
		    	</div>
		    	<div class="form-group col-md-6">
		      		<label for="inputPassword4">End Date</label>
		      		<input type="text" class="form-control" id="EndDate">
		    	</div>
		  	</div>

		  	<div class="form-row">
		  		<div class="form-check">
			      <input class="form-check-input" type="checkbox" id="monday">
			      <label class="form-check-label" for="gridCheck">
			        Mon
			      </label>
			    </div>&nbsp&nbsp
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" id="tuesday">
			      <label class="form-check-label" for="gridCheck">
			        Tue
			      </label>
			    </div>&nbsp&nbsp
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" id="wednesday">
			      <label class="form-check-label" for="gridCheck">
			        Wed
			      </label>
			    </div>&nbsp&nbsp
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" id="thursday">
			      <label class="form-check-label" for="gridCheck">
			        Thur
			      </label>
			    </div>&nbsp&nbsp
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" id="friday">
			      <label class="form-check-label" for="gridCheck">
			        Fri
			      </label>
			    </div>&nbsp&nbsp
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" id="saturday">
			      <label class="form-check-label" for="gridCheck">
			        Sat
			      </label>
			    </div>
		  	</div>
			<br/>
			<button type="button" class="btn btn-success" id="addEvent">Save</button>
		</div>
	
		<div class="col-sm-8" id="calendarTable">
			
		</div>
	</div>
		
	
</div>
	
</body>


<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script type="text/javascript">
	$("#StartDate").datepicker();
	$("#EndDate").datepicker();

	var monthsName = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
	var weeks = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

	$(document).ready(function(){
		var today = new Date();
		var noDay = getDaysInMonth(today.getMonth(), today.getFullYear());
		$("#calendarTable").append('<div class="row"><div class="col-sm-12"><h2>'+monthsName[today.getMonth()]+'</h2></div></div>');
		$("#calendarTable").append('<div class="list-group" id="monthTable"></div>');
		showCalendar(noDay);
	})

	$("#addEvent").on('click', function(){
		var startDate = $("#StartDate").val();
		var endDate = $("#EndDate").val();

		var date1 = new Date(startDate);
		var date2 = new Date(endDate);

		$("#monday").prop("checked") == true
		$("#tuesday").prop("checked") == true
		$("#wednesday").prop("checked") == true
		$("#thursday").prop("checked") == true
		$("#friday").prop("checked") == true
		$("#saturday").prop("checked") == true

		var event_name = $("#Event_Name").val();

		// To calculate the time difference of two dates 
		var Difference_In_Time = date2.getTime() - date1.getTime(); 
  
		// To calculate the no. of days between two dates 
		var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
		
		var objectList = [];
		objectList.push({
			date: date1.getMonth() +"-"+date1.getDate()+"-"+date1.getFullYear(),
			day: date1.getDay(),
		})
		
		var monthName = monthsName[date1.getMonth()];
		if(date1.getMonth() != date2.getMonth()){
			monthName = monthName+" - "+monthsName[date2.getMonth()];
		}

		$("#calendarTable").empty();
		$("#calendarTable").append('<div class="row"><div class="col-sm-12"><h2>'+monthName+'</h2></div></div>');
		$("#calendarTable").append('<div class="list-group" id="monthTable"></div>');
		
		

		DateLoop = date1;
		for (var i = 0; i < Difference_In_Days; i++) {
			var datePage = {}
			DateLoop.setDate(DateLoop.getDate()+1);
			datePage.date = DateLoop.getMonth()+"-"+DateLoop.getDate()+"-"+DateLoop.getFullYear();
			datePage.day = DateLoop.getDay();
			//check the day == to the checked day
			//save it on the object
			objectList.push(datePage);
		}
		console.log(objectList);//pass this object to this route eventSave and save them using jquery ajax.
		//when ajax is success reload the month table.

		$.post("route/eventSave", {"object": objectList, 'event_name':event_name}, function(returnVal,err){

		});
	})

	function showCalendar(noDay){


		var today = new Date();
		var firstDay = new Date(today.getMonth()+"/1/"+today.getFullYear());

		get_data_current_month = {} //kung ano yung data naka save
		DateLoop = firstDay;
		var event_name = "";
		for(var i = 0; i < noDay; i++){
			event_name = "";
			
			$("#monthTable").append('<a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start"><div class="d-flex w-100 justify-content-between"><h5>'+event_name+'</h5><small>'+weeks[DateLoop.getDay()]+' '+DateLoop.getDate()+'</small></div></a>');
			DateLoop.setDate(DateLoop.getDate()+1);
		}
	}

	

	function getDaysInMonth(month,year) {
	  // Here January is 1 based
	  //Day 0 is the last day in the previous month
	 return new Date(year, month, 0).getDate();
	// Here January is 0 based
	// return new Date(year, month+1, 0).getDate();
	};

	function saveEvent(){
		var startDate = $("#StartDate").val();
		var endDate = $("#EndDate").val();

		var date1 = new Date(startDate);
		var date2 = new Date(endDate);


		// To calculate the time difference of two dates 
		var Difference_In_Time = date2.getTime() - date1.getTime(); 
  
		// To calculate the no. of days between two dates 
		var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
		
		var objectList = [];
		objectList.push({
			date: date1.getMonth() +"-"+date1.getDate()+"-"+date1.getFullYear(),
			day: date1.getDay(),
		})
		
		
		DateLoop = date1;
		for (var i = 0; i < Difference_In_Days; i++) {
			var datePage = {}
			DateLoop.setDate(DateLoop.getDate()+1);
			datePage.date = DateLoop.getMonth()+"-"+DateLoop.getDate()+"-"+DateLoop.getFullYear();
			datePage.day = DateLoop.getDay();
			objectList.push(datePage);
		}
		console.log(objectList);
	}
</script>

</html>