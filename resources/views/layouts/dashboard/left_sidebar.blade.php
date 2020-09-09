<aside id="leftsidebar"
	   class="sidebar">
	<div class="navbar-brand">
		<button class="btn-menu ls-toggle-btn"
				type="button">
			<em class="zmdi zmdi-menu"></em>
		</button>
		<a href="{{ config('custom.url_panel') }}">
			<span class="m-l-10">{{ config('custom.name') }}</span>
		</a>
	</div>
	<div class="menu">
		<ul class="list">
			<li>
				<div class="user-info">
					<a class="image"
					   href="{{ config('custom.url_panel') }}">
					</a>
					<div class="detail">
						<small>{{ auth()->user()->name }}</small>
					</div>
				</div>
			</li>
			<li class="{{ menuActive(['home']) }}">
				<a href="{{ config('custom.url_panel') }}">
					<em class="zmdi zmdi-home"></em>
					<span>@lang('system.dashboard')</span>
				</a>
			</li>
			<li class="{{ menuActive(['users']) }}">
				<a href="javascript:void(0);"
				   class="menu-toggle">
					<em class="zmdi zmdi-lock"></em>
					<span>@lang('system.authentication')</span>
				</a>
				<ul class="ml-menu">
					<li class="{{ menuActive(['users']) }}">
						<a href="{{ route('dashboard.users.index') }}">
							<p>@lang('system.users')</p>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="{{ route('dashboard.logout') }}">
					<em class="zmdi zmdi-power"></em>
					<span>@lang('system.logout')</span>
				</a>
			</li>
		</ul>
	</div>
</aside>
