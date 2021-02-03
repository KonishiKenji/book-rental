<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv=”Cache-Control” content=”no-cache”>

		<title>Fox Library</title>


    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="/css/library.css" rel="stylesheet" />
		<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/css/themify-icons.css" rel="stylesheet">
			<!-- icon & img	 -->
			<link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
			<link rel="icon" type="image/png" sizes="96x96" href="/img/favicon.png">
		<!-- Bootstrap core CSS     -->

		<!--   Core JS Files   -->
		<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

		<!-- <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script> //jquery -->
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<!--  Checkbox, Radio & Switch Plugins -->
		<script src="js/bootstrap-checkbox-radio.js"></script>
		<!--  Notifications Plugin    -->
		<script src="js/bootstrap-notify.js"></script>
		<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
		<script src="js/paper-dashboard.js"></script>
		<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
		<!-- <script src="js/library.js"></script> -->
		<script src="js/library-k.js"></script>
		<!-- 10/29 app.jsを有効にしていると、ログイン時ログアウト表示で不具合があったためコメントアウト -->
		<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
		<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.min.js"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<!-- <script>
		Vue.prototype.$http = axios;

		new Vue({
		el: '#app'
	})

</script> -->

<script type="text/javascript">
$(window).bind("unload",function(){});
</script>

<!--   Core JS Files   -->

</head>

<body>
    <!-- Modal for borrow -->

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
        <!-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
									<label>User Id</label>
									<input type="text" class="form-control border-input" id="userId" placeholder="User Id" name="user_id">
                </div>
            </div>
        </div> -->
        <!-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control border-input" id="password" placeholder="Password" name="password">
                </div>
            </div>
        </div> -->
				<!-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Borrow date</label>
                    <input type="date" class="form-control border-input" id="borrowDate" placeholder="date" name="borrow_date">
                </div>
            </div>
        </div> -->
				<!-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Return date</label>
                    <input type="date" class="form-control border-input" id="returnDate" placeholder="date" name="return_date">
                </div>
            </div>
        </div> -->
      <!-- </div>
      <div class="modal-footer"> -->
        <button type="button" class="btn btn-secondary cancel-btn" data-dismiss="modal">Cancel</button>
				<!-- <button type="button" class="btn btn-primary" id="borrow-btn" data-dismiss="modal">Borrow!</button> -->
				<button type="button" class="btn btn-danger" id="borrow-btn" data-dismiss="modal">Borrow!</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal for return -->

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
        <button type="button" class="btn btn-secondary cancel-btn" data-dismiss="modal">Cancel</button>
				<!-- <button type="button" class="btn btn-primary" id="return-btn" data-dismiss="modal">return!</button> -->
				<!-- <button type="button" class="btn btn-primary" id="return-btn" data-dismiss="modal">return!</button> -->
				<button type="button" class="btn btn-danger" id="return-btn" data-dismiss="modal">return!</button>
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
				      <a href="{{ url('/libraryHome')}}" class="simple-text">
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
              <p>My Borrow History</p>
            </a>
          </li>
        </ul>
				<ul class="nav">
					<li class="link" id="link-book-list" class="active">
            <a href="{{ url('/libraryBookSignUp')}}">
							<!-- <i class="ti-book"></i> -->
              <!-- <p>new book registration</p> -->
							<!-- <button type="button" name="button" class="btn btn-primary">new book registration</button> -->
							<button type="button" name="button" class="btn btn-secondary">Click here for new book<br> registration</button>
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
              </button>
                <!-- ！！変動値！！ -->
								<!-- <span class="navbar-brand" id="page-title">{{ Request::path()}}</span> -->
								<!-- 表示している画面ごとにページタイトルを変更させる -->
								<span class="navbar-brand" id="page-title">
									<?php if (Request::path() == "libraryHome") {
										echo "BOOK LIST";
									 }
									 elseif (Request::path() == "libraryBorrowingList") {
									 	echo "BORROW BOOK LIST";
									 }
									 elseif (Request::path() == "libraryBorrowHistory") {
										 echo "MY BORROW HISTORY";
									 }
									  ?>
								</span>
								<!-- /！！変動値！！ -->
          <!-- </div>
        </div> -->
      <!-- </nav> -->

			<!-- 右寄せメニュー -->
			<!-- Authentication Links -->
			<!-- <ul class="navbar-nav">
			@guest
			<li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
		</li>
		<li class="nav-item">
		@if (Route::has('register'))
		<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
		@endif
	</li>
	@else
	<li class="nav-item dropdown">
	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	{{ Auth::user()->name }} <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>
@endguest
</ul> -->

<!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel"> -->
		<div class="container">

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ml-auto listDotNone">
								<!-- Authentication Links -->
								@guest
										<li class="nav-item">
												<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
										</li>
										<li class="nav-item">
												@if (Route::has('register'))
														<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
												@endif
										</li>
								@else
										<li class="nav-item dropdown">
												<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
														{{ Auth::user()->name }} <span class="caret"></span>
												</a>
<!--
												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
														<a class="dropdown-item" href="{{ route('logout') }}"
															 onclick="event.preventDefault();
																						 document.getElementById('logout-form').submit();">
																{{ __('Logout') }}
														</a>

														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																@csrf
														</form>
												</div>
 -->
														<a class="dropdown-item" href="{{ route('logout') }}"
															 onclick="event.preventDefault();
																						 document.getElementById('logout-form').submit();">
																						 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
															　	{{ __('Logout') }}
																<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																	@csrf
																</form>
															</div>
														</a>
													</li>
								@endguest
						</ul>
					</div>
			</div>
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
        <!--
        <div id="area-book-list" class="area content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Library</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                      <th>Title</th>
                                      <th>Status</th>
                                    </thead>
                                    <tbody data-toggle="modal" data-target="#returnModal">
                                        <td>1</td>
                                        <td>PHP初歩 ポケットリファレンス</td>
                                        <td>To lend</td>
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
    -->
    <main class="py-4">
      @yield('contents')
    </main>

		<footer class="footer">
			<div class="container-fluid">
				<nav class="pull-left">
				</nav>
				<div class="copyright pull-right">
					&copy;
					<script>document.write(new Date().getFullYear())</script>
				</div>
				<div class="result"></div>
			</div>
		</footer>

    </div>
  </div>


  </body>
</html>
