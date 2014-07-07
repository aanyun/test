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

    <title>Kaifesh for Congress ADMIN | Upload a Video</title>
	
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
  margin-top: 10px;
  }

  </style>
	
</head>

<body>

    <div class="container">

	 <div class="row">

		<div class="col-lg-4 col-md-4 col-sm-4 upload-endorsements">
<?php include "view/admin_menu.php";?>
    </div>
	
    
	<div class="col-lg-8 col-md-8 col-sm-8 upload-endorsements">
	  
	   <a href='view/congress_member.txt' target="_blank">Download Congress Members List</a>
	   <form id="imageform" method="post" enctype="multipart/form-data" action='class/API.php?command=uploadcl'>
      Upload Congress Members List
      <input type="file" name="add-press-release-file" id="add-cl-file" style="margin-left: 23px;">

      </form>
      <hr>
      <a href='view/officials.xls' target="_blank">Download 8th District Elected Officials List</a>
      <form id="ofform" method="post" enctype="multipart/form-data" action='class/API.php?command=uploadof'>
      Upload Officials List
      <input type="file" name="add-press-release-file" id="add-of-file" style="margin-left: 23px;">
      
      </form>

      <div id='preview'>
      </div>  

	
  </div>

	  </div>



	

	
	  
    </div> <!-- /container -->



    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/main.js"></script>	
  <script type="text/javascript" src="scripts/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/jquery.form.js"></script>
  <script type="text/javascript" >
   $(document).ready(function() { 
      
      $('#add-cl-file').live('change', function()      { 
        $("#preview").html('');
        $("#preview").html('<img src="img/loader.gif" alt="Uploading...."/>');
      $("#imageform").ajaxForm({
        target: '#preview'
      }).submit();

    });

      $('#add-of-file').live('change', function()      { 
        $("#preview").html('');
        $("#preview").html('<img src="img/loader.gif" alt="Uploading...."/>');
      $("#ofform").ajaxForm({
        target: '#preview'
      }).submit();

    });
  }); 
  </script>
</body>

</html>
