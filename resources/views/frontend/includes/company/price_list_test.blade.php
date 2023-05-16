@extends('frontend.pages.company')

@section('title', __('labels.company.pricelist_tab_title'))

@section('tabcontent')
    <div class="tab-pane fade active show" id="pricelist" role="tabpanel" aria-labelledby="pricelist-tab">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="row">
                    <div class="col-md-4 d-none d-md-block">
                        <div id="nav-container" class="card">
                            <div class="card-header bg-white pb-0">
                                <h4 class="s-font mb-0">
                                    Price List
                                </h4>
                            </div>
                            <div id="nav" class="card-body">
                                <div class="title-box list-group list-unstyled ">
                                    <a href="#salad" class="nav-link list-group-item list-group-item-action active">Salad</a>
                                    <a href="#indianDish" class="nav-link list-group-item list-group-item-action">indianDish</a>
                                    <a href="#burger" class="nav-link list-group-item list-group-item-action">burger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pricelistmenu" id="priceListTab">
                        <div class="accordion-item" id="salad">
                            <h2 class="accordion-header d-block d-md-none">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSalad" aria-expanded="true" aria-controls="collapseSalad">
                                    Salad
                                </button>
                            </h2>
                            <h5 class="font-semibold font-18 dark-color vtabtitle border-bottom d-none d-md-block">Salad</h5>
                            <!-- dish start -->
                            <div id="collapseSalad" class="accordion-collapse collapse show" data-bs-parent="#priceListTab">
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Tomatencremesuppe</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dish div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Vegetarische Cremesuppe</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->

                            </div>
                        </div>
                        <div class="accordion-item" id="indianDish">
                            <h2 class="accordion-header d-block d-md-none">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIndianDish" aria-expanded="false">
                                    Indian Dish
                                </button>
                            </h2>
                            <h5 class="font-semibold font-18 dark-color vtabtitle border-bottom d-none d-md-block"> Indian Dish</h5>
                            <!-- dish start -->
                            <div id="collapseIndianDish" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#priceListTab">
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                            </div>
                        </div>
                        <!-- indian end -->
                        <div class="accordion-item" id="burger">
                            <h2 class="accordion-header d-block d-md-none">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBurger" aria-expanded="false" aria-controls="collapseBurger">
                                    Burger
                                </button>
                            </h2>
                            <h5 class="font-semibold font-18 dark-color vtabtitle border-bottom d-none d-md-block">Burger</h5>
                            <!-- dish start -->
                            <div id="collapseBurger" class="accordion-collapse collapse" data-bs-parent="#priceListTab">
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                                <!-- dish start -->
                                <div class="card-body order-dish-detail pb-0">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="img/img_dish.png" srcset="img/img_dish@2x.png 2x" alt="Dish Image" height="70" width="70" class="radius-6 img-fluid mr-1 dish-img">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex row g-0">
                                                    <h4 class="font-18 font-semibold dark-clr mb-1 col-8">Dish Name</h4>
                                                    <p class="theme-clr font-semibold body-font mb-0 col-4 text-end">£9.90</p>
                                                </div>
                                                <p class="font-14 gray-clr mb-1">Zubereitet mit Tomaten, Rahm, Butter, Zwiebeln und Croutons</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dsih div end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var sectionIds = $(".title-box a.nav-link");

            $(document).scroll(function() {
                sectionIds.each(function() {
                    var container = $(this).attr("href");
                    var containerOffset = $(container).offset().top;
                    var containerHeight = $(container).outerHeight();
                    var containerBottom = containerOffset + containerHeight;
                    var scrollPosition = $(document).scrollTop();

                    if (
                        scrollPosition < containerBottom - 90 &&
                        scrollPosition >= containerOffset - 90
                    ) {
                        $(this).addClass("active");
                    } else {
                        $(this).removeClass("active");
                    }
                });
            });
        });
    </script>
@endpush
