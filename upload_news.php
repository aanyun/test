<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaifesh for Congress ADMIN | Upload a News Article</title>

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
<?php
	include "class/MysqliDb.php";

?>
    <div class="container">
	<section>	
	<!-- Notes for Management side of things: We will need 2 text fields in the admin form for title and description. 
	The description field needs to have a max-limit of 230 characters. They will put the date the article was posted 
	with a selector/calendar similar to our Event Admin. There will be a text field to enter a URL for the article. 
	There will be a select menu where they can pick “Daily Herald, Chicago Tribune, etc…” which will be tied to the 
	logo that shows up under the articles. -->
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
		<p style="font-size: 1.3em; font-weight: bold; margin-left: 15px;">Upload A News Article:</p>
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Title:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<input required type="text" name="news-title" id="news-title" class="form-control" style="width: 360px;" placeholder="Title of News Article Here">
		</div>
		</div>

		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Date:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<input required type="text" name="news-date" id="news-date" class="form-control datepicker" style="width: 360px;" placeholder="yyyy-mm-dd">
		</div>
		</div>


		<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Description:</label>
		<div class="col-sm-8" style="padding-bottom: 10px; margin-left: 10px;">
		<textarea required name="news-description" id="news-description" class="form-control" rows="3"  maxlength="235" style="width: 307px;" placeholder="Enter description of news article here. Description must not exceed the maximum of 235 characters."></textarea>
		<div><small id="counter"></small></div>
		</div>
		</div>

		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">URL:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<input required type="text" name="news-url" id="news-url" class="form-control" style="width: 360px;" placeholder="http://www.dailyherald.com/article/1234567">
		</div>
		</div>
  
    	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Publisher:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<select type="text" name="publisher" id="publisher" class="form-control" style="width: 330px; margin-left: 7px;">
			<option value="">Select from the list</label>
				<?php 
				$db = new Mysqlidb();
				$publishers = $db->get("publishers");
				foreach ($publishers as $publisher){

				echo '<option value="'.$publisher['id'].'">'.$publisher['name'].'</option>';

				}
				?>
    	</select>
    	</div>  
  
	    <div class="col-sm-9" style="padding-bottom: 10px;">
	    	<label style="display:none;"></label>

			<a href="#" data-toggle="modal" data-target="#newPublisher" style="font-size: .95em;">
			Click here if the publisher is not listed to &nbsp;<strong>ADD A NEW</strong> &nbsp;publisher.
			</a>
		</div>
	  
	  	</div>
  

	

    	<div class="modal fade" id="newPublisher">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">Add a New Publisher</h4>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px">Publisher:</label>
				  <div class="col-sm-9" style="padding-bottom: 10px;">
				  <input type="text" name="add-publisher" id="add-publisher" class="form-control" style="width: 321px;" placeholder="Name of Publisher Here">
				  </div>
				  </div>
				  
				  <div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Logo:</label>
				  <div class="col-sm-9" style="padding-bottom: 10px;">
				  	<form id="imageform" method="post" enctype="multipart/form-data" action='class/API.php?command=uploadimg'>
					<input type="file" name="photoimg" id="photoimg" />
					</form>
					<div id='preview'>
					</div>
				  <br>
				  <div style="font-size: .8em; margin-top: -10px;">
				  *Must be a JPG file no larger than 240px x 55px.
				  </div>
				  </div>
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" onclick="newPublisher()">Add</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		

  
    <div class="form-group">

  
  	<div class="col-lg-5 col-md-6 col-sm-12 ">
  		<button class="btn btn-md btn-default btn-block reset" type="reset" style="width: 136px;">Reset</button>
	</div>
	<div class="col-lg-5 col-lg-push-1 col-md-6 col-sm-12">
        <button class="btn btn-md btn-primary btn-block" onclick="submit()" type="button" style="width: 136px;">Upload</button>
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
				You have successfully uploaded a news article to Recent News! <a href="recent-news.php">Check it out now!</a>
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
		date = $('#news-date').val();
		title = $('#news-title').val();
		story = $('#news-description').val();
		link = $('#news-url').val();
		idPublisher = $('select option:checked').val();
		if(idPublisher==""){
			alert("please select publisher");
			return;
		}
		if(title==""||story==""||link==""||date==""){
			alert('please fill in all fields');
			return;
		}
		var eg = /^\d{4}-\d{1,2}-\d{1,2}$/;
		//alert(eg.test(date));
		if(!eg.test(date)){
			alert('Invalid date format');
			return;
		}
		if (!/^http:\/\//.test(link)) {
            link = "http://" + link;
        }
		$.post('class/API.php?command=saveNews',{
			title:title,
			date:date,
			story:story, 
			link:link,
			idPublisher:idPublisher
		},function(data){
			if(data == 'success'){
				$('#successInfo').removeClass('hide');
			} else alert(data);
		});

	}
	function newPublisher(){
		name = $('#add-publisher').val();
		img = $('#preview img').attr('src');
		
		if(name == ""){
			alert('please input publisher name');
			return;
		}
		if(img == ""||img == null){
			alert('please upload logo img');
			return;
		}
		$.post('class/API.php',{
			command:'createPublisher',
			name: name,
			img: img
		},function(data){
			jQuery.noConflict();
			if($.isNumeric(data)){
				$('#publisher').append("<option value='"+data+"'>"+name+"</option>");
				$('#publisher').val(data);
				$('#newPublisher').modal('hide');
				$('#add-publisher').val("");
				$('#preview').html('');
				$('#photoimg').val('');

			} else {
				alert("Insert new Publisher error");
			}
		});		
	}
	$('.datepicker').datepicker({format:'yyyy-mm-dd'});
	var characters = 230;
	$("#news-description").keyup(function(){
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
		$('.form input').val('');
		$('.form textarea').val('');
	});
	function reset(){
		$('.form input').val('');
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
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>
