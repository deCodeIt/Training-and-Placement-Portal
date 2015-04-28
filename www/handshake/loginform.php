
<div class="panel panel-success">
	<div class="panel-heading"><h4>Login : Student's</h4></div>
	<div class="panel-body">
	 <form class="form-horizontal" role="form" action = '/handshake/loginquery.php' method = 'POST' autocomplete="off">
	  <div class="form-group">
	    <label class="control-label col-xs-3 col-sm-7 col-md-4 col-lg-4" for="pwd">Entry-Num:</label>
	    <div class="col-sm-12 col-xs-9 col-lg-8 col-md-8">
	      <input type="text" class="form-control" id="entry_number" name="entry_number" placeholder="Your Entry Number" autofocus>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-xs-3 col-sm-7 col-md-4 col-lg-4" for="pwd">Password:</label>
	    <div class="col-xs-9 col-sm-12 col-lg-8 col-md-8">
	      <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-xs-offset-3 col-xs-6 hidden-sm">
	      <button type="submit" class="btn btn-success btn-lg">Login!</button>
	    </div>
	    <div class="col-xs-offset-3 col-xs-6 hidden-xs hidden-md hidden-lg">
	      <button type="submit" class="btn btn-success btn-md">Login!</button>
	    </div>
	  </div>
	</form>
	</div>
</div>
