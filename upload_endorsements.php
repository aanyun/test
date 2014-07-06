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
	  
	<a href='view/congress_member.txt' >Download Congress Members List</a>
	  

	
  </div>

	  </div>



	

	
	  
    </div> <!-- /container -->



    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/main.js"></script>	
    <script>
    function submit(){
    title = $('#video-title').val();
    story = $('#video-description').val();
    link = $('#video-url').val();
    if(title==""||story==""||link==""){
      alert('please fill in all fields');
      return;
    }
    $.post('class/API.php?command=savevideo',{
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
    function reset(){
      title = $('#video-title').val('');
      story = $('#video-description').val('');
      link = $('#video-url').val('');
      $('#counter').html('');
    }
    var characters = 80;
    $("#video-description").keyup(function(){
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
</body>

</html>
