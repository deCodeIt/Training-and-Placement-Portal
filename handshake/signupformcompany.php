
<div class="panel panel-success">
	<div class="panel-heading"><h4>SignUp : Company's</h4></div>
	<div class="panel-body">
	 <form class="form-horizontal" role="form" action = './handshake/signupquerycompany.php' method = 'POST' autocomplete="off">
	  <div class="form-group">
	  <div class="col-xs-offset-1">
	  <?php
	  if(isset($_SESSION['error']))
	  {
	  	$cts=1;
	  	echo '<p class="form-control-static text-warning bg-warning">ERROR!!!<br>';
	  	foreach ($_SESSION['error'] as $key => $value) {
	  		echo $cts++.'. '.$value.'<br>';
	  	}
	  	echo '</p>';
	  	#echo '<p class="form-control-static text-warning bg-warning">'..'</p>';
	  	unset($_SESSION['error']);
	  }
	  elseif (isset($_SESSION['success'])) {
	  	$cts=1;
	  	echo '<p class="form-control-static text-success bg-success"><br>';
	  	foreach ($_SESSION['success'] as $key => $value) {
	  		echo $cts++.'. '.$value.'<br>';
	  	}
	  	echo '</p>';
	  	unset($_SESSION['success']);
	  	# code...
	  }
	  elseif (isset($_SESSION['activated'])) {
	  	$cts=1;
	  	echo '<p class="form-control-static text-info bg-info"><br>';
	  	foreach ($_SESSION['activated'] as $key => $value) {
	  		echo $cts++.'. '.$value.'<br>';
	  	}
	  	echo '</p>';
	  	unset($_SESSION['activated']);
	  	# code...
	  }
	  	?>
	  	</div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-xs-3 col-sm-4 col-lg-3" for="pwd">Email Id:</label>
	    <div class="col-xs-9 col-sm-8 col-lg-9">
	      <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Your Email Id" autofocus>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-xs-3 col-sm-4 col-lg-3" for="pwd">Password:</label>
	    <div class="col-xs-9 col-sm-8 col-lg-9">
	      <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-xs-offset-3 col-xs-6">
	      <button type="submit" class="btn btn-success btn-block btn-lg">Register!</button>
	    </div>
	  </div>
	</form>
	</div>
</div>