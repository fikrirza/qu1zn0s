<section>
	<!-- Left Sidebar -->
	<aside id="leftsidebar" class="sidebar">
		<!-- User Info -->
		<div class="user-info">
			<div class="image">
				<img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
			</div>
			<div class="info-container">
				<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
				<div class="email">{{ Auth::user()->email }}</div>
				<div class="btn-group user-helper-dropdown">
					<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
					<ul class="dropdown-menu pull-right">
						<li><a href="#"><i class="material-icons">person</i>Profile</a></li>
						<li role="seperator" class="divider"></li>
						<li><a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</ul>
				</div>
			</div>
		</div>
		<!-- #User Info -->
		<!-- Menu -->
		<div class="menu">
			<ul class="list">
				<li class="{{ Route::is('home') ? 'active' : '' }}">
					<a href="{{ route('home') }}">
						<i class="material-icons">home</i>
						<span>Beranda</span>
					</a>
				</li>
				<li class="header">MASTER MENU</li>
				<li class="{{ Route::is('warehouse*') ? 'active' : '' }}">
					<a href="{{ route('warehouse.index') }}">
						<i class="material-icons">assignment</i>
						<span>Warehouse</span>
					</a>
				</li>
				<li class="">
					<a href="javascript:void(0);" class="menu-toggle">
						<i class="material-icons">inbox</i>
						<span>Item</span>
					</a>
					<ul class="ml-menu">
						<li class="">
							<a href="">Item List</a>
						</li>
						<li class="">
							<a href="">Item Category</a>
						</li>
					</ul>
				</li>
				<li class="{{ Route::is('supplier*') ? 'active' : '' }}">
					<a href="{{ route('supplier.index') }}">
						<i class="material-icons">shopping_basket</i>
						<span>Supplier</span>
					</a>
				</li>
				<li class="header">TRANSACTION</li>
				
				<li class="header">SETTING</li>
				@if (Auth::user()->can('management-user') || Auth::user()->can('read-user'))
				<li class="{{ Route::is('user.*') ? 'active' : '' }}  {{ Route::is('role.*') ? 'active' : '' }}">
					<a href="javascript:void(0);" class="menu-toggle">
						<i class="material-icons">accessibility</i>
						<span>Account</span>
					</a>
					<ul class="ml-menu">
						<li class="{{ Route::is('user.*') ? 'active' : '' }}">
							<a href="{{ route('user.index') }}">User</a>
						</li>
						@can('management-role')
						<li class="{{ Route::is('role.*') ? 'active' : '' }}">
							<a href="{{ route('role.index') }}">Role</a>
						</li>
						@endcan
					</ul>
				</li>
				@endif
			</ul>
		</div>
		<!-- #Menu -->

		<!-- Footer -->
		<div class="legal">
			<div class="copyright">
				&copy; 2018 <a href="javascript:void(0);">FRA</a>.
			</div>
			<div class="version">
				<b>Version: </b> Dev Mode
			</div>
		</div>
		<!-- #Footer -->
	</aside>
	<!-- #END# Left Sidebar -->
</section>