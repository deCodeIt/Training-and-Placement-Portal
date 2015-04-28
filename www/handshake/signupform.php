<div class="panel panel-success">
	<div class="panel-heading"><h3>SignUp : Student's</h3></div>
	<div class="panel-body">
	 <form class="form-horizontal" role="form" action = '/handshake/signupquery.php' method = 'POST' autocomplete="off">
	  <div class="form-group">
	    <label class="control-label col-xs-3 col-sm-4 col-lg-3" for="pwd">Username:</label>
	    <div class="col-xs-9 col-sm-8 col-lg-9">
	      <input type="text" class="form-control" id="username" name="username" placeholder="Your username" autofocus>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-xs-3 col-sm-4 col-lg-3" for="pwd">Entry-Num:</label>
	    <div class="col-sm-8 col-xs-9 col-lg-9">
	      <input type="text" class="form-control" id="entry_number" name="entry_number" placeholder="Your Entry Number">
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
	      <button type="submit" class="btn btn-success btn-block btn-lg" disabled="disabled">SignUp!</button>
	    </div>
	  </div>
	</form>
	</div>
</div>