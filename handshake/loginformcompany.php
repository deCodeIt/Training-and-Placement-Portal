<div class="panel panel-success">
	<div class="panel-heading"><h4>Login : Company's</h4></div>
	<div class="panel-body">
	 <form class="form-horizontal" role="form" action = './handshake/loginquerycompany.php' method = 'POST' autocomplete="off">
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
	      <button type="submit" class="btn btn-success btn-block btn-lg">Login!</button>
	    </div>
	  </div>
	</form>
	</div>
</div>