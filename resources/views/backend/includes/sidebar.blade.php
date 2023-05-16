<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

	<div data-simplebar class="h-100">

		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu" style="display: block !important;">
				<li style="padding: 0px !important" class="menu-title" key="t-menu">Menu</li>

				<li style="padding: 0px !important" class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="route('admin.dashboard')"
						:active="activeClass(Route::is('admin.dashboard'), 'c-active')"
						icon="bx bx-home-circle"
						:text="__('Dashboard')" />
				</li>

				<li style="padding: 0px !important">
					<a href="javascript: void(0);" class="waves-effect">
						<i class="bx bxs-eraser"></i>
						<span class="badge rounded-pill bg-info float-end">10</span>
						<span key="t-forms">{{__('menus.listing.title')}}</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
						<li style="padding: 0px !important">
							<x-utils.link
								class="waves-effect"
								:href="route('admin.company.create')"
								:active="activeClass(Route::is('admin.company.create'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.company.add')" />
						</li>
						<li style="padding: 0px !important">
							<x-utils.link
								class="waves-effect"
								:href="route('admin.company.new')"
								:active="activeClass(Route::is('admin.company.new'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.company.new')" />
						</li>
						<li style="padding: 0px !important">
							<x-utils.link
								class="waves-effect"
								:href="route('admin.company.index')"
								:active="activeClass(Route::is('admin.company.index'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.company.list')" />
						</li>

						<li style="padding: 0px !important">
							<x-utils.link
								class="waves-effect"
								:href="route('admin.places.create')"
								:active="activeClass(Route::is('admin.places.create'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.places.add')" />
						</li>
						<li style="padding: 0px !important">
							<x-utils.link
								class="waves-effect"
								:href="route('admin.places.index')"
								:active="activeClass(Route::is('admin.places.index'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.places.list')" />
						</li>

					</ul>
				</li>

				<li style="padding: 0px !important" class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="route('admin.auth.user.index')"
						:active="activeClass(Route::is('admin.auth.user.*'), 'c-active')"
						icon="bx bx-user"
						:text="__('menus.user_management')" />
				</li>

				<li style="padding: 0px !important" class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="route('admin.offer_field.index')"
						:active="activeClass(Route::is('admin.offer_field'), 'c-active')"
						icon="bx bx-plus"
						:text="__('menus.offer_field')" />
				</li>

				<li style="padding: 0px !important" class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="route('admin.cms.index')"
						:active="activeClass(Route::is('admin.cms'), 'c-active')"
						icon="bx bx-list-ul"
						:text="__('menus.cms')" />
				</li>

				<li style="padding: 0px !important" class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="route('admin.tags.index')"
						:active="activeClass(Route::is('admin.tags'), 'c-active')"
						icon="bx bx-tag"
						:text="__('menus.tags')" />
				</li>

				<li style="padding: 0px !important" class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="route('admin.category.index')"
						:active="activeClass(Route::is('admin.category'), 'c-active')"
						icon="bx bx-flag"
						:text="__('menus.categories')" />
				</li>

				<li style="padding: 0px !important" class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="url('admin/languages')"
						:active="activeClass(Route::is('admin.languages'), 'c-active')"
						icon="bx bx-flag"
						:text="__('menus.languages')" />
				</li>




			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
<!-- Left Sidebar End -->
