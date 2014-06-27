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
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
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
	  
	<form class="form-inline" role="form">
		<div class="form-group">
		<p style="font-size: 1.3em; font-weight: bold; margin-left: 15px;">Upload A News Article:</p>
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Title:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<input type="text" name="news-title" id="news-title" class="form-control" style="width: 360px;" placeholder="Title of News Article Here">
		</div>
		</div>

		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Date:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<input type="text" name="news-date" id="news-date" class="form-control" style="width: 360px;" placeholder="yyyy-mm-dd">
		</div>
		</div>


		<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Description:</label>
		<div class="col-sm-8" style="padding-bottom: 10px; margin-left: 10px;">
		<textarea name="news-description" id="news-description" class="form-control" rows="3"  maxlength="235" style="width: 307px;" placeholder="Enter description of news article here. Description must not exceed the maximum of 235 characters."></textarea>
		</div>
		</div>

		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">URL:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<input type="text" name="news-url" id="news-url" class="form-control" style="width: 360px;" placeholder="http://www.dailyherald.com/article/1234567">
		</div>
		</div>
  
    	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label" style="margin-top: 5px;">Publisher:</label>
		<div class="col-sm-10" style="padding-bottom: 10px;">
		<select type="text" name="publisher" id="publisher" class="form-control" style="width: 330px; margin-left: 7px;" placeholder="test">
			<option>Select from the list</label>
				<?php 
				$db = new Mysqlidb('localhost', 'root', '', 'kaifesh');
				$publishers = $db->get("publishers");
				foreach ($publishers as $publisher){

				echo '<option value="'.$publisher['logo'].'">'.$publisher['name'].'</option>';

				}
				?>
    	</select>
    	</div>  
  
	    <div class="col-sm-9" style="padding-bottom: 10px;">
	    	<label style="display:none;"></label>

			<a href="#" data-toggle="collapse" data-target="#not-listed" style="font-size: .95em;">
			Click here if the publisher is not listed to &nbsp;<strong>ADD A NEW</strong> &nbsp;publisher.
			</a>
		</div>
	  
	  	</div>
  

	
  <div id="not-listed" class="collapse" width="400px;">
  
  <hr>
  
  <div class="form-group">
  <p style="font-size: 1.3em; font-weight: bold; margin-left: 15px;">Add a New Publisher:</p>
		  <label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px">Publisher:</label>
		  <div class="col-sm-9" style="padding-bottom: 10px;">
		  <input type="text" name="add-publisher" id="add-publisher" class="form-control" style="width: 321px;" placeholder="Name of Publisher Here">
		  </div>
		  </div>
		  
		  <div class="form-group">
		  <label for="inputEmail3" class="col-sm-3 control-label" style="margin-top: 5px;">Logo:</label>
		  <div class="col-sm-9" style="padding-bottom: 10px;">
		  <input type="file" name="add-publisher-file" id="add-publisher-file" style="margin-left: 17px;">
		  <br>
		  <div style="font-size: .8em; margin-top: -10px;">
		  *Must be a JPG file no larger than 240px x 55px.
		  </div>
		  </div>
		  </div>
		  
		    <hr>
	</div>
		

  
    <div class="form-group">

  
  	<div class="col-lg-5 col-md-6 col-sm-12 ">
  		<button class="btn btn-md btn-default btn-block" type="reset" style="width: 136px;">Reset</button>
	</div>
	<div class="col-lg-5 col-lg-push-1 col-md-6 col-sm-12">
        <button class="btn btn-md btn-primary btn-block" type="submit" style="width: 136px;">Upload</button>
	</div>
	
	</div>
	  

	
	</form>

	  </div>

	  </div>

	</section>
	
	
	<section id='successInfo' class='hide'>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto;">
			<div class="alert alert-success text-center">
			 	<span class="glyphicon glyphicon-ok" style="padding-right: 20px;"></span>
				You have successfully uploaded a news article to Recent News! <a href="#">Check it out now!</a>
			</div>
			</div>
		</div>
	</section>
	
	  
    </div> <!-- /container -->


    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/main.js"></script>	

</body>

</html>
