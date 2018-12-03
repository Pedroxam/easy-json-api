<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Easy API</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" lang="en" content="ADD SITE DESCRIPTION">
		<meta name="author" content="ADD AUTHOR INFORMATION">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="assets/img/favicon.ico">

		<!-- Bootstrap Core CSS file -->
		<link rel="stylesheet" href="./bootstrap.min.css">

		<link rel="stylesheet" href="./styles.css">

		<!-- Conditional comment containing JS files for IE6 - 8 -->
		<!--[if lt IE 9]>
			<script src="./html5.js"></script>
			<script src="./respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<!-- Navigation -->
	    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container-fluid">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Easy API</a>
				</div>
				<!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="./">Home</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<!-- /.navbar -->

		<!-- Page Content -->
		<div class="container-fluid">
		
					<!-- Forms -->
					<form method="POST" action="./make.php">
						<div class="well">
							<div class="form-group">
								<label for="contactName">URL</label>
								<input type="url" class="form-control" name="url" placeholder="Enter The Full Page You Want To Grab" required>
								<div class="checkbox">
									<label>
										<input  onclick="ShowOptions();" name="client_url" type="checkbox"> Accept Request an address from the Client <a href="#" data-toggle="modal" data-target="#exampleModal">(See Help)</a>
									</label>
								</div>
							<div id="funcDync">
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="method[1][m]" id="POST" value="POST" checked>
								  <label class="form-check-label" for="POST">
									Response On POST
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="method[1][m]" id="GET" value="GET">
								  <label class="form-check-label" for="GET">
									Response On GET
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="method[1][m]" id="REQUEST" value="REQUEST" >
								  <label class="form-check-label" for="REQUEST">
									Response On REQUEST
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="method[1][m]" id="PUT" value="PUT" >
								  <label class="form-check-label" for="PUT">
									Response On PUT
								  </label>
								</div>
								<div class="checkbox">
									<label>
										<input name="auth" type="checkbox"> + Api Key Authentication <a href="#" data-toggle="modal" data-target="#exampleModal2">(See Help)</a>
									</label>
								</div>
							</div>
							</div>
						</div>
						
						<div class="well">
							<div class="form-group">
								<label for="FieldName">Field Name</label>
								<input type="text" class="form-control" name="regex[1][name]" placeholder="Enter the name you want to use for the API" required>
							</div>
							<div class="form-group">
								<label for="FieldPattern">Field Pattern</label>
								<input type="text" class="form-control" name="regex[1][pattern]" placeholder="Enter Regex the part you want to receive. like: /hello/" required>
								<div class="checkbox">
									<label>
										<input name="regex[1][multi]" type="checkbox"> Make Array
									</label>
								</div>
							</div>
						</div>
							
						<div id="here"></div>
							
						<div class="well">
							<span class="add btn btn-danger">Add Field</span>
						</div>
							
						<div class="well">
							<button type="submit" name="submit" class="btn btn-primary">Submit & Download File </button>
						</div>
						
					</form>
					
			</div>
		<!-- /.container-fluid -->
		
		<!-- Modal 1 -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Dynamically API</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<p>By choosing this option, you can dynamically modify your API file and create the ability to run the address by the client.</p>
				<p>In the drop-down menu, specify which types of requests are.</p>
				<p>Also, the name of the address of all requests is "url".</p>
				<b>The Same Value: ?url=http://example.com</b>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		
		<!-- Modal 2 -->
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel2">Api Key Authentication</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<p>By selecting this option, you can specify that only those who have the API key can use this service.</p>
				<p>After choosing this option, the parameter is created with the name "key" that the client should place his own key against this option so that he can use the service.</p>
				<p>Also, the value of the first default key is "123", which, in order to add more keys, should be directly edit the output php file as many keys as you want.</p>
				<b>Default Value: ?key=123</b>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>

		<!-- JQuery scripts -->
	    <script src="./jquery-1.11.2.min.js"></script>

		<!-- Custom scripts -->
		<script>
			var $ =jQuery.noConflict();
			$(document).ready(function() {
				var count = 1;
				$(".add").click(function() {
					count = count + 1;
					$('#here').append('<div class="well"><div class="form-group"><label for="FieldName">Field Name</label> <input type="text" class="form-control" name="regex['+count+'][name]" placeholder="Enter the name you want to use for the API"></div><div class="form-group"><label for="FieldPattern">Field Pattern</label> <input type="text" class="form-control" name="regex['+count+'][pattern]" placeholder="Enter Regex the part you want to receive. like: /hello/"><div class="checkbox"> <label> <input name="regex['+count+'][multi]" type="checkbox"> Make Array </label> </div> </div><span class="remove btn btn-warning">Remove Field</span></div>');
					return false;
				});
				$('#here').on('click', '.remove', function() {
					$(this).parent().remove();
				});
			});
				function ShowOptions() {
					$('#funcDync').toggle('slow');
				}
		</script>
		
		<!-- Bootstrap Core scripts -->
		<script src="./bootstrap.min.js"></script>
  </body>
</html>
