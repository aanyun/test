<h2><strong>Stay Updated</strong><span style="font-size: 17px; color: #494949;"> &ndash; Subscribe for the latest campaign updates!</span></h3>


<div class="form-inline" role="form">
<div class="row" style="margin:0;">
  <div class="form-group adjust1">
	<label class="sr-only">First Name</label>
	<input name="firstName" class="form-control" placeholder="First Name">
  </div>
  <div class="form-group">
	<label class="sr-only">Last Name</label>
	<input name="lastName" class="form-control" placeholder="Last Name">
  </div>

	  <div class="form-group adjust1" style="padding-top: 15px;">
		<label class="sr-only">Email Address</label>
		<input name="emailAddress" class="form-control" placeholder="Email Address">
	  </div>
	  <div class="form-group" style="padding-top: 15px;">
		<label class="sr-only">Zip Code</label>
		<input name="zipCode" class="form-control-sm" placeholder="Zip Code">
	  </div>
	  <span style="position: relative; top: 8px;">
	  <button type="button" id='subscrbesubmit' class="btn btn-danger" style="margin-left: -8px;">Submit</button>
	</span>
  </div> <!-- /.row --> 
</div>


<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>


$('#subscrbesubmit').click(function(){
	alert();
	fn = $('input[name="firstName"]').val();
	ln = $('input[name="lastName"]').val();
	email = $('input[name="emailAddress"]').val();
	zip = $('input[name="zipCode"]').val();


	$.post('subscribe.php',{
		fn:fn,
		ln:ln,
		zip:zip,
		email:email
	},function(data){

	});

});
</script>