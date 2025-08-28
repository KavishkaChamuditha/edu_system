@extends("layouts.main")
@include("partials.header")
@section('title', "Student Registration")
@section('content')

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
             <h4 class="text-light">  Welcome {{ Auth::user()->first_name }} </h4> 
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul>
	          </li>
	          <li>
	              <a href="#">About</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="route('logout')">Portfolio</a>
	          </li>
	          <li>
              <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <a href="route('logout')"
                    onclick="event.preventDefault();
                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
                </li>
            </ul>

	        <div class="footer">
	        	<p>
				    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank">Colorlib.com</a>
				</p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">


       <h2 class="mb-4">@yield('page-title', 'Sidebar #01')</h2>

        <div class="page-content">
            @yield('content-section')
        </div>

      </div>
		</div>

@include("partials.footer")
@include("partials.js_filles")

@endsection
