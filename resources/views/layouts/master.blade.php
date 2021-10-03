<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

  
    

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>

<body>

<div class="container">
	<div class="row">
    	<div class="col-sm-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    			<div class="collapse navbar-collapse" id="navbarSupportedContent">
    				<ul class="navbar-nav mr-auto">
      					<li class="nav-item @if(request()->route()->uri=='/') active @endif  ">
        					<a class="nav-link" href="http://127.0.0.1:8000">Report Details </a>
      					</li>
                        <li class="nav-item @if(request()->route()->uri=='months' or request()->route()->uri=='months/{month}' or request()->route()->uri=='months/{month}/edit' or request()->route()->uri=='months/create') active @endif">
							                        
        					<a class="nav-link" href="http://127.0.0.1:8000/months">Month</a>
      					</li> 
      					<li class="nav-item @if(request()->route()->uri=='members' or request()->route()->uri=='members/{member}' or request()->route()->uri=='members/{member}/edit' or request()->route()->uri=='members/create') active @endif">
        					<a class="nav-link" href="http://127.0.0.1:8000/members">Members</a>
      					</li>      
      					<li class="nav-item @if(request()->route()->uri=='target_cats' or request()->route()->uri=='target_cats/{target_cat}' or request()->route()->uri=='target_cats/{target_cat}/edit' or request()->route()->uri=='target_cats/create') active @endif">
        					<a class="nav-link" href="http://127.0.0.1:8000/target_cats">Target Cat</a>
      					</li>
      					<li class="nav-item @if(request()->route()->uri=='target_units' or request()->route()->uri=='target_units/{target_unit}' or request()->route()->uri=='target_units/{target_unit}/edit' or request()->route()->uri=='target_units/create') active @endif">
        					<a class="nav-link" href="http://127.0.0.1:8000/target_units">Target Unit</a>
      					</li>
      					<li class="nav-item @if(request()->route()->uri=='user_targets' or request()->route()->uri=='user_targets/{user_target}' or request()->route()->uri=='user_targets/{user_target}/edit' or request()->route()->uri=='user_targets/create') active @endif">
        					<a class="nav-link" href="http://127.0.0.1:8000/user_targets">User Target</a>
      					</li>
      					<li class="nav-item @if(request()->route()->uri=='user_achievements' or request()->route()->uri=='user_achievements/{user_achievement}' or request()->route()->uri=='user_achievements/{user_achievement}/edit' or request()->route()->uri=='user_achievements/create') active @endif">
        					<a class="nav-link" href="http://127.0.0.1:8000/user_achievements">User Achievement</a>
      					</li>
      					<li class="nav-item @if(request()->route()->uri=='users' or request()->route()->uri=='users/{user}' or request()->route()->uri=='users/{user}/edit' or request()->route()->uri=='users/create') active @endif">
        					<a class="nav-link" href="http://127.0.0.1:8000/users">User</a>
      					</li>
    				</ul>
     			</div>
			</nav>
		</div>
	</div>

    @yield('content')
   

    
    
    

<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> 
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> 
  <script language="javascript" type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>

</div>
</body>
</html>
