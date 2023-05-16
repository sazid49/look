
<section class="section-padding slider-section pt-0">
    <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
            <h3 class="font-semibold section-title mb-3">Popular Places</h3>
            <a href="#!" class="theme-clr xs-font text-uppercase font-medium ms-3 mb-2 view-all">View all</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 px-md-0">
                <div class="marquee">
                    <div class="d-flex marquee_track">
                        <?php
                        for ($n = 1; $n <= 10; $n++) { ?>
                        <div class="marquee_item">
                            <div class="lo-card-body card">
                                <div class="top-card position-relative">
                                    <a href="place-detail.php">
                                        <img src="img/plc1.jpg" class="card-img-top" alt="...">
                                    </a>
                                    <button class="btn-icon bookmark-btn">
                                        <input type="checkbox" id="bookmark" class="d-none">
                                        <label for="bookmark" class="btn-bookmark mb-0">
                                            <svg width="20" height="20">
                                                <use xlink:href="#ic_bookmark" />
                                            </svg>
                                        </label>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between lo-head">
                                        <a href="place-detail.php">
                                            <h5 class="lo-name font-bold mb-0">Nelo Lopes Boulangerie-Pâtisserie</h5>
                                        </a>
                                    </div>
                                    <div class="d-flex mt-2 align-items-center">
                                        <svg class="icon-20 me-1 gray-clr">
                                            <use xlink:href="#ic_map_pin"></use>
                                        </svg>
                                        <p class="gray-clr mb-0 font-15 truncate-1">1752 Villars-sur-Glâne</p>
                                    </div>
                                </div>
                                <!-- card body end -->
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
