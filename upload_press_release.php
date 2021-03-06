<?php
session_start();
if(!isset($_SESSION['kaifesh_auth'])||!$_SESSION['kaifesh_auth']) header('Location:signin/index.html');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Kaifesh for Congress | Upload a Press Release</title>
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
	<link href="css/font.css" rel="stylesheet">
	<link href="css/datepicker.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<style>
	
	.container {
	padding-top: 30px;
	margin-left:  20px;
	margin-right: 0;
	}
	
	a {
	  color: #304EB9;
	  text-decoration: none;
	}
		a:hover {
	  color: #999;
	  text-decoration: none;
	}

	.alert {
	width: 83%;
	font-size: 1.2em;
	margin-top: 30px;
	}

</style>
	
	
</head>

<body>

    <div class="container">
<section>	
	<!-- Notes for Management side of things: We will need 2 text fields in the admin form for title and description. 
	The description field needs to have a max-limit of 230 characters. They will put the date the press release was 
	posted with a selector/calendar similar to our Event Admin. There will be a button to �Upload� the press release. 
	All of the current ones are PDF and JPG. -->
			 <div class="row">
			 
	<div class="col-lg-4 col-md-4 col-sm-4 upload-news">
		<?php include "view/admin_menu.php";?>
	</div>
	
    
	<div class="col-lg-8 col-md-8 col-sm-8 upload-news">
	  
	  <div class="form-inline" role="form">
  <div class="form-group">
  <p style="font-size: 1.3em; font-weight: bold; margin-left: 15px;">Upload A Press Release:</p>
  <label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Title:</label>
  <div class="col-sm-10" style="padding-bottom: 10px;">
  <input type="text" name="press-release-title" id="press-release-title" class="form-control" style="width: 360px;" placeholder="Title of Press Release Here">
  </div>
  </div>
  
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Date:</label>
	<div class="col-sm-10" style="padding-bottom: 10px;">
	<input required type="text" name="news-date" id="press-release-date" class="form-control datepicker" style="width: 360px;" placeholder="yyyy-mm-dd">
	</div>
	</div>
  

  <div class="form-group">
  <label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Description:</label>
  <div class="col-sm-8" style="padding-bottom: 10px; margin-left: 10px;">
  <textarea name="press-release-description" id="press-release-description" class="form-control" rows="3"  maxlength="235" style="width: 307px;" placeholder="Enter description of press release here. Description must not exceed the maximum of 235 characters."></textarea>
  <div><small id="counter"></small></div>
  </div>
  </div>
  
		  <div class="form-group">
		  <label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Browse:</label>
		  <div class="col-sm-9" style="padding-bottom: 10px;">
		  <form id="imageform" method="post" enctype="multipart/form-data" action='class/API.php?command=uploadpdf'>
		  <input type="file" name="add-press-release-file" id="add-press-release-file" style="margin-left: 23px;">
		  </form>
			<div id='preview'>
			</div>
		  <br>
		  <div style="font-size: .8em; margin-top: -10px;">
		  *Must be a pdf file or a html file.
		  </div>
		  </div>
		  </div>


 
  

  
    <div class="form-group">

  
  	<div class="col-lg-5 col-md-6 col-sm-12 ">
  		<button class="btn btn-md btn-default btn-block" type="reset" style="width: 136px;">Reset</button>
	</div>
	<div class="col-lg-5 col-lg-push-1 col-md-6 col-sm-12">
        <button class="btn btn-md btn-primary btn-block" type="button" onclick="submit()" style="width: 136px;">Upload</button>
	</div>
	
 </div>
	  

	
</div>

	  </div>

	  </div>

	</section>
	
	
	<section id='successInfo' class='hide'>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto;">
			<div class="alert alert-success text-center">
			 	<span class="glyphicon glyphicon-ok" style="padding-right: 20px;"></span>
				You have successfully uploaded a news article to Recent News! <a href="press-releases.php">Check it out now!</a>
			</div>
			</div>
		</div>
	</section>
	
	  
    </div> <!-- /container -->


    <!-- JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/modern-business.js"></script>
	<script src="js/main.js"></script>	
	<script>
	function submit(){
		date = $('#press-release-date').val();
		title = $('#press-release-title').val();
		story = $('#press-release-description').val();
		link = $('#pdfurl').attr('url');
		if(title==""||story==""||date==""||link==""){
			alert('please fill in all fields');
			return;
		}
		var eg = /^\d{4}-\d{1,2}-\d{1,2}$/;
		//alert(eg.test(date));
		if(!eg.test(date)){
			alert('Invalid date format');
			return;
		}
		$.post('class/API.php?command=savePressRelease',{
			title:title,
			date:date,
			story:story, 
			link:link
		},function(data){
			if(data%1===0){
				reset();
				$('#successInfo').removeClass('hide');
			} else alert(data);
		});

	}

	function reset(){
		$('#press-release-date').val('');
		$('#press-release-title').val('');
		$('#press-release-description').val('');
		$('#add-press-release-file').val('');
		$('#preview').html('');
	}
	$('.datepicker').datepicker({format:'yyyy-mm-dd'});
	var characters = 235;
	$("#press-release-description").keyup(function(){
	    if($(this).val().length > characters){
	        $(this).val($(this).val().substr(0, characters));
	    }
	    var remaining = characters -  $(this).val().length;
	    $("#counter").html("You have <strong>"+  remaining+"</strong> characters remaining");
	    if(remaining <= 10)
	    {
	        $("#counter").css("color","red");
	    }
	    else
	    {
	        $("#counter").css("color","black");
	    }
	});
	</script>
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.form.js"></script>
	<script type="text/javascript" >
	 $(document).ready(function() { 
			
	    $('#add-press-release-file').live('change', function()			{ 
		    $("#preview").html('');
		    $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
				target: '#preview'
			}).submit();

		});
	}); 
	</script>
</body>

</html>
