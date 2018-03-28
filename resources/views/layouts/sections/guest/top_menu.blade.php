
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


					@if( Request::is('ripple') )
								<!-- ripple logo -->
								<a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('assets/optima/images/ripple-logo.png')}}" class="img-responsive" alt=""></a>

          @elseif( Request::is('neptune') )

							<!-- neptune logo -->
								<a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('assets/optima/images/neptune-logo.png')}}" class="img-responsive" alt=""></a>
          @else
          			<!-- default logo -->
								<a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('assets/img/logo.png')}}" class="img-responsive" alt=""></a>
          @endif


				</div>

				<div id="navbar" class="navbar-collapse collapse">

					<ul class="nav navbar-nav navbar-right">

						<li class="{{ Request::is('/') ? 'current-menu-item' : '' }}">

							<a href="{{ url('/') }}">Home</a>

						</li>

						<li class="{{ Request::is('about') ? 'current-menu-item' : '' }}">

							<a href="{{ url('/about') }}">About Subshare</a>

						</li>
            <li class="{{ Request::is('subshare-page') ? 'current-menu-item' : '' }}">

							<a href="{{ url('/subshare-page') }}">Subshare</a>

						</li>

						<li class="{{ Request::is('ripple') ? 'current-menu-item' : '' }}">

							<a href="{{ url('/ripple') }}">Ripple</a>

						</li>

						<li class="{{ Request::is('neptune') ? 'current-menu-item' : '' }}">

							<a href="{{ url('/neptune') }}">Neptune</a>

						</li>

						<li class="{{ Request::is('blog') ? 'current-menu-item' : '' }}">

							<a href="{{ url('/blog') }}">Blog</a>

						</li>

						<li class="{{ Request::is('support') ? 'current-menu-item' : '' }}">

							<a href="{{ url('/support') }}">Contact Us</a>

						</li>



							@if (Auth::check())

										<li class="{{ Request::is('login') ? 'current-menu-item' : 'log_bs current-page' }}">
                      <a href="{{ url('/login') }}" style="width: 125px;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
										</li>
							  		<li class="{{ Request::is('login') ? 'current-menu-item' : 'log_bs current-page' }}">
												<a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                   </li>
							@else
									<li class="log_bs current-page ">
                      <a class="login_bs" href="{{ url('/login') }}" style="font-weight: 400 !important;">Login</a>
									</li>

							@endif





						@if (!Auth::check())

							<li class="log_bs ">

                                                            <a class="register_bs" href="{{ url('/register') }}">Sign Up</a>

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

