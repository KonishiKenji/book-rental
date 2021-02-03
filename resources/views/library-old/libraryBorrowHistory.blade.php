<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Fox Library</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="/css/library.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/css/themify-icons.css" rel="stylesheet">

</head>
<body>
<!-- Modal -->
<div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="borrowModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Do you borrow this book?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4></h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>User Id</label>
                    <input type="text" class="form-control border-input" placeholder="User Id" name="user_id">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control border-input" placeholder="Password" name="password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Return date</label>
                    <input type="date" class="form-control border-input" placeholder="date" name="return_date">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="borrow-btn">Borrow!</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Do you return this book?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4></h4>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="return-btn">return!</button>
      </div>
    </div>
  </div>
</div>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">
    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="library.html" class="simple-text">
                    Fox Library
                </a>
            </div>
            <ul class="nav">
								<li class="link" id="link-book-list" class="active">
										<a href="{{ url('/libraryHome')}}">
												<i class="ti-book"></i>
												<p>Book List</p>
										</a>
								</li>
								<li class="link" id="link-book-list" class="active">
										<a href="{{ url('/libraryBorrowingList')}}">
												<i class="ti-view-list-alt"></i>
												<p>Borrow Book List</p>
										</a>
								</li>
                <li class="link" id="link-book-list" class="active">
                    <a href="{{ url('/libraryBorrowHistory')}}">
                        <i class="ti-user"></i>
                        <p>Borrow History</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                      <!--   <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span> -->
                    </button>
                    <span class="navbar-brand" id="page-title">BORROW HISTORY</span>
                </div>
            </div>
        </nav>
        <div id="error-alert"class="alert alert-danger" style="display: none">
            <span class="close">×</span>
            <strong>ERROR!</strong> API ERROR.
        </div>
        <div id="success-alert"class="alert alert-success" style="display: none">
            <span class="close">×</span>
            <strong>SUCCESS!</strong> You returned the book.
        </div>
        <div id="area-book-list" class="area content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Library</h4>
                             <!--    <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                      <th>ID</th>
                                    	<th>Title</th>
																			<th>Borrow Date</th>
																			<th>Return Date</th>
                                    </thead>
                                    <tbody data-toggle="modal">
                                        <td>1</td>
                                        <td>PHP初歩 ポケットリファレンス</td>
																				<td>2018/09/09</td>
																				<td></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>
            </div>
        </footer>
    </div>
	</div>
</div>

</body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>
	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<!-- <script src="assets/js/library.js"></script> -->
</html>
