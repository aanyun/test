
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

    <title>Kaifesh for Congress ADMIN | Upload an Image</title>
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
	<link href="css/font.css" rel="stylesheet">
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
	The description field needs to have a max-limit of 80 characters. There will be a button to “Upload” the image. 
	Filetypes are restricted to JPG, PNG and GIF files only. -->
	
			 <div class="row">
	
		<div class="col-lg-4 col-md-4 col-sm-4 upload-news">
                <div class="well">
	<ul class="list-group">
  <li class="list-group-item">
    <span class="badge">
	  <span class="glyphicon glyphicon-link"></span>
	</span>
    <a href="upload_news.html">Upload a News Article</a>
  </li>
    <li class="list-group-item" style="margin-top: 15px;">
    <span class="badge">
	  <span class="glyphicon glyphicon-upload"></span>
	</span>
    <a href="upload_press_release.html">Upload a Press Release</a>
  </li>
   <li class="list-group-item" style="margin-top: 15px;">
    <span class="badge">
	  <span class="glyphicon glyphicon-picture"></span>
	</span>
    <a href="upload_image.html">Upload an Image</a>
  </li>
     <li class="list-group-item" style="margin-top: 15px;">
    <span class="badge">
	  <span class="glyphicon glyphicon-film"></span>
	</span>
    <a href="upload_video.html">Upload a Video</a>
  </li>
  
</ul>
</div>
</div>
	
    
	<div class="col-lg-8 col-md-8 col-sm-8 upload-news">
	  
	<div class="form-inline form" role="form">
		<div class="form-group">
		<p style="font-size: 1.3em; font-weight: bold; margin-left: 15px;">Upload An Image:</p>
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Title:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<input type="text" name="image-title" id="image-title" class="form-control" style="width: 360px;" placeholder="Title of Image Here">
		</div>
		</div>

		<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Description:</label>
		<div class="col-sm-8" style="padding-bottom: 10px; margin-left: 10px;">
		<textarea name="image-description" id="image-description" class="form-control" rows="3"  maxlength="235" style="width: 307px;" placeholder="Enter description of the image here. Description must not exceed the maximum of 80 characters."></textarea>
		<div><small id="counter"></small></div>
		</div>
		</div>
  
		<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Browse:</label>
		<div class="col-sm-9" style="padding-bottom: 10px;">
		  	<form id="imageform" method="post" enctype="multipart/form-data" action='class/API.php?command=uploadimg&size=0'>
			<input type="file" name="photoimg" id="photoimg" />
			</form>
			<div id='preview'>
			</div>
		<br>
		<div style="font-size: .8em; margin-top: -10px;">
		*Must be a JPG, PNG or GIF filetype only.
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
				You have successfully uploaded a news article to Recent News! <a href="media-gallery.php">Check it out now!</a>
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
		title = $('#image-title').val();
		story = $('#image-description').val();
		link = $('#preview img').attr('src');
		if(title==""||story==""||link==""||link==null){
			alert('please fill in all fields');
			return;
		}
		$.post('class/API.php?command=saveImg',{
			title:title,
			story:story, 
			link:link,
		},function(data){
			if(data%1===0){
				reset();
				$('#successInfo').removeClass('hide');
			} else alert(data);
		});

	}

	var characters = 80;
	$("#image-description").keyup(function(){
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
	
	$('.reset').click(function(){
		reset();
	});
	function reset(){
		$('.form input').val('');
		$('.form textarea').val('');
		$('#preview').html('');
	}

	</script>
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.form.js"></script>
	<script type="text/javascript" >
	 $(document).ready(function() { 
			
	    $('#photoimg').live('change', function()			{ 
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
