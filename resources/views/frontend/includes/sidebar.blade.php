
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

	<div data-simplebar class="h-100">

		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">
				<li class="menu-title" key="t-menu">Menu</li>

				<li class="c-sidebar-nav-item">
					<x-utils.link
						class="waves-effect"
						:href="route('frontend.user.dashboard')"
						:active="activeClass(Route::is('frontend.user.dashboard'), 'c-active')"
						icon="bx bx-home-circle"
						:text="__('Dashboard')" />
				</li>
		
				<li>
					<a href="javascript: void(0);" class="waves-effect">
						<i class="bx bxs-eraser"></i>
						{{-- <span class="badge rounded-pill bg-info float-end">10</span> --}}
						<span key="t-forms">@lang('menus.listing.title')</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
						{{-- <li>
							<x-utils.link
								class="waves-effect"
								:href="route('frontend.panel.company.create')"
								:active="activeClass(Route::is('frontend.panel.company.create'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.company.add')" />
						</li> --}}
						<li>
							<x-utils.link
								class="waves-effect"
								:href="route('frontend.panel.company.index')"
								:active="activeClass(Route::is('frontend.panel.company.index'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.company.list')" />
						</li>

						{{-- <li>
							<x-utils.link
								class="waves-effect"
								:href="route('panel.places.create')"
								:active="activeClass(Route::is('panel.places.create'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.places.add')" />
						</li>
						<li>
							<x-utils.link
								class="waves-effect"
								:href="route('panel.places.index')"
								:active="activeClass(Route::is('panel.places.index'), 'c-active')"
								icon="bx bx-circle"
								:text="__('menus.listing.places.list')" />
						</li> --}}

					</ul>
				</li>

				<li>
					<x-utils.link
						class="waves-effect"
						:href="route('frontend.panel.offers.index')"
						:active="activeClass(Route::is('frontend.panel.offer.index'), 'c-active')"
						icon="bx bx-plus"
						:text="__('menus.listing.offers')" />
				</li>
				
				<li>
					<x-utils.link
						class="waves-effect"
						:href="route('frontend.panel.job_application.index')"
						:active="activeClass(Route::is('frontend.panel.job_application.index'), 'c-active')"
						icon="bx bx-briefcase"
						:text="__('menus.listing.job_application')" />
				</li>
				
				<li>
					<x-utils.link
						class="waves-effect"
						:href="route('frontend.panel.contactus.index')"
						:active="activeClass(Route::is('frontend.panel.contactus.index'), 'c-active')"
						icon="bx bx-user-voice"
						:text="__('menus.listing.contactus')" />
				</li>
				
				<li>
					<x-utils.link
						class="waves-effect"
						:href="route('frontend.panel.reviews.index')"
						:active="activeClass(Route::is('frontend.panel.reviews.index'), 'c-active')"
						icon="bx bx-star"
						:text="__('menus.listing.reviews')" />
				</li>
			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
<!-- Left Sidebar End -->
