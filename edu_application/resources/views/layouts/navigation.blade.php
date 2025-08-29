@extends("layouts.main")
@include("partials.header")
@section('title', "Student Registration")
@section('content')

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
             <h4 class="text-light">  
              Welcome @auth('admin')
                {{ Auth::guard('admin')->user()->name }}
              @endauth </h4> 
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Class</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{ route('class.create') }}">Add New Class</a>
                </li>
                <li>View Class</a>
                </li>
	            </ul>
	          </li>
	          <li>
              <a href="route('logout')">Portfolio</a>
	          </li>
	          <li>
              <!-- Authentication -->
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                    <a href="route('admin.logout')"
                    onclick="event.preventDefault();
                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
                </li>
            </ul>

	        <div class="footer">
	        	
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
