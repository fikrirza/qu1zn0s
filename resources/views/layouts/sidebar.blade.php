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
				@if (Auth::user()->can('read-warehouse') || Auth::user()->can('read-item') || Auth::user()->can('read-itemCategory'))
				<li class="header">MASTER MENU</li>
				@can('read-warehouse')
				<li class="{{ Route::is('warehouse*') ? 'active' : '' }}">
					<a href="{{ route('warehouse.index') }}">
						<i class="material-icons">assignment</i>
						<span>Warehouse</span>
					</a>
				</li>
				@endcan
				@if (Auth::user()->can('read-item') || Auth::user()->can('read-itemCategory'))
				<li class="{{ Route::is('itemCategory*') ? 'active' : '' }}{{ Route::is('items*') ? 'active' : '' }}">
					<a href="javascript:void(0);" class="menu-toggle">
						<i class="material-icons">inbox</i>
						<span>Item</span>
					</a>
					<ul class="ml-menu">
						@can('read-item')
						<li class="{{ Route::is('items*') ? 'active' : '' }}">
							<a href="{{ route('items.index') }}">Item List</a>
						</li>
						@endcan
						@can('read-itemCategory')
						<li class="{{ Route::is('itemCategory*') ? 'active' : '' }}">
							<a href="{{ route('itemCategory.index') }}">Item Category</a>
						</li>
						@endcan
					</ul>
				</li>
				@endif
				@can('read-supplier')
				<li class="{{ Route::is('supplier*') ? 'active' : '' }}">
					<a href="{{ route('supplier.index') }}">
						<i class="material-icons">shopping_basket</i>
						<span>Supplier</span>
					</a>
				</li>
				@endcan
				@endif
				<li class="header">TRANSACTIONS</li>
				<li class="{{ Route::is('stocks.*') ? 'active' : '' }}{{ Route::is('scanin.*') ? 'active' : '' }}{{ Route::is('scanout.*') ? 'active' : '' }}">
					<a href="javascript:void(0);" class="menu-toggle">
						<i class="material-icons">format_list_bulleted</i>
						<span>Inventory</span>
					</a>
					<ul class="ml-menu">
						<li class="{{ Route::is('stocks.*') ? 'active' : '' }}">
							<a href="{{ route('stocks.index') }}">Stock Summary</a>
						</li>
						<li class="{{ Route::is('scanin.*') ? 'active' : '' }}">
							<a href="{{ route('scanin.index') }}">Scan In</a>
						</li>
						<li class="{{ Route::is('scanout.*') ? 'active' : '' }}">
							<a href="{{ route('scanout.index') }}">Scan Out</a>
						</li>
					</ul>
				</li>
				@can('read-po')
				<li class="{{ Route::is('po.*') ? 'active' : '' }}">
					<a href="{{ route('po.index') }}">
						<i class="material-icons">receipt</i>
						<span>Purchase Order</span>
					</a>
				</li>
				@endcan
				<li class="{{ Route::is('orders.*') ? 'active' : '' }}">
					<a href="{{ route('orders.index') }}">
						<i class="material-icons">shopping_cart</i>
						<span>Orders</span>
					</a>
				</li>
				<li class="{{ Route::is('packages.*') ? 'active' : '' }}">
					<a href="{{ route('packages.index') }}">
						<i class="material-icons">archive</i>
						<span>Packages</span>
					</a>
				</li>

				
				@if (Auth::user()->can('management-user') || Auth::user()->can('read-user'))
				<li class="header">SETTING</li>
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