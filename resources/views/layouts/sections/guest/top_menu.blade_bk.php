
	<div class="top-menu">
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="{{url('assets/img/logo.png')}}" class="img-responsive" alt=""></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="{{ url('/') }}">Home</a>
						</li>
						<li>
							<a href="{{ url('/about') }}">About</a>
						</li>
						<li>
							<a href="{{ url('/ripple') }}">Ripple</a>
						</li>
						<li>
							<a href="{{ url('/neptune') }}">Neptune</a>
						</li>
						<li>
							<a href="{{ url('/support') }}">Contact</a>
						</li>

							@if (Auth::check())
										<li class="log_bs current-page">
											<a>{{ Auth::user()->name }}</a>
										</li>
							  		<li class="log_bs current-page">
												<a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                   </li>
							@else
									<li class="log_bs current-page">
										<a href="{{ url('/login') }}">Login</a>
									</li>
							@endif


						@if (!Auth::check())
							<li class="log_bs">
								<a href="{{ url('/register') }}">Sign Up</a>
							</li>
						@endif
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
	</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
   {{ csrf_field() }}
</form>
