<div class="company_tabs_menu">
    <div class="container-fluid container-xl">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- tabs start here -->
                <ul class="nav nav-tabs custom-tabs justify-content-lg-center border-bottom-0 cts-carousel scrollspy-tabs mt-1">

                    <!-- Information -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link"
                            :href="route('frontend.company.information', [$company,'slug'=>$company->slug])"
                            :active="Route::is('frontend.company.information')?'active':''"
                            :text="__('labels.company.information')"></x-utils.link>
                    </li>
                    <!-- /Information -->

                    <!-- Offers -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_interraction') }}"
                            :href="route('frontend.company.offer', [$company,'slug'=>$company->slug])"
                            :active="Route::is('frontend.company.offer')?'active':''"
                            :text="__('labels.company.offer')"></x-utils.link>
                    </li>
                    <!-- /Offers -->

                    <!-- Reviews -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_review') }}"
                            :href="route('frontend.company.reviews', [$company, 'slug' => $company->slug])"
                            :active="Route::is('frontend.company.reviews')?'active':''"
                            :text="__('labels.company.reviews')"
                        ></x-utils.link>
                    </li>
                    <!-- /Reviews -->

                    <!-- Gallery -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_gallery') }}"
                            :href="route('frontend.company.gallery', [$company, 'slug' => $company->slug])"
                            :active="Route::is('frontend.company.gallery')?'active':''"
                            :text="__('labels.company.galerie')"
                        ></x-utils.link>
                    </li>
                    <!-- /Gallery -->

                    <!-- Jobs -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_jobs') }}"
                            :href="route('frontend.company.job-application', [$company, 'slug' => $company->slug])"
                            :active="Route::is('frontend.company.job-application')?'active':''"
                            :text="__('labels.company.job_application')"
                        ></x-utils.link>
                    </li>
                    <!-- /Jobs -->

                    <!-- Team -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_team') }}"
                            :href="route('frontend.company.team', [$company,'slug'=>$company->slug])"
                            :active="Route::is('frontend.company.team')?'active':''"
                            :text="__('labels.company.team')"
                        ></x-utils.link>
                    </li>
                    <!-- /Team -->

                    <!-- Price List -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_pricelist') }}"
                            :href="route('frontend.company.price_list', [$company, 'slug' => $company->slug])"
                            :active="Route::is('frontend.company.price_list')?'active':''"
                            :text="__('labels.company.price_list')"
                        ></x-utils.link>
                    </li>
                    <!-- /Price List -->

                    <!-- News -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_news') }}"
                            :href="route('frontend.company.news', [$company, 'slug' => $company->slug])"
                            :active="Route::is('frontend.company.news')?'active':''"
                            :text="__('labels.company.news')"
                        ></x-utils.link>
                    </li>
                    <!-- /News -->

                    <!-- Contact -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_contactform') }}"
                            :href="route('frontend.company.contact_us', [$company, 'slug' => $company->slug])"
                            :active="Route::is('frontend.company.contact_us')?'active':''"
                            :text="__('labels.company.contact_us')"
                        ></x-utils.link>
                    </li>
                    <!-- Contact -->

                    <!-- Register -->
                    <li class="nav-item">
                        <x-utils.link
                            class="nav-link {{ enableTab($company,'show_register') }}"
                            :href="route('frontend.company.register', [$company, 'slug' => $company->slug])"
                            :active="Route::is('frontend.company.register')?'active':''"
                            :text="__('labels.company.register')"
                        ></x-utils.link>
                    </li>
                    <!-- /Register -->

                </ul>
            </div>
        </div>
    </div>
</div>
