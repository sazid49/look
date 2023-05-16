<?php ?>
<!DOCTYPE html>
<html>

<head>
  <?php include('header-link.php');
  $currentPage = 'home'; ?>
</head>

<body>
  <?php include 'header.php'; ?>
  <main>
    <section class="banner">
      <div class=" img-container" data-slideshow>
        <img src="img/banner10.jpg" />
        <img src="img/banner2.jpg" />
        <img src="img/banner7.jpg" />
        <img src="img/banner6.jpg" />
      </div>
      <div class="container-fluid container-xl position-relative">
        <div class="search-panel">
          <form action="company.php">
            <div class="row g-2 align-items-center justify-content-center flex-lg-nowrap">
              <div class="col-sm col-lg">
                <input type="text" class="form-control mb-2 search-input" id="res-search" placeholder="What Are you looking for?">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-theme mb-2">Search</button>
              </div>
              <div class="col-sm col-lg-auto">
                <div class="form-control mb-2 cursor-pointer advance-btn d-flex justify-content-between" aria-expanded="false" aria-controls="advanceSearchCollapse" data-bs-toggle="collapse" href=".advanceSearchCollapse">
                  <span class="me-2 d-lg-none">Advanced Filter</span>
                  <svg width="24" height="24" class="icon theme-clr">
                    <use xlink:href="#ic_setting" />
                  </svg>
                </div>
              </div>
            </div>
            <div class="collapse advanceSearchCollapse">
              <h2 class="font-medium text-uppercase body-font border-bottom filter-header d-flex d-md-none mb-0 align-items-center">
                <span>
                  <svg class="icon me-2 advance-close-btn d-md-none">
                    <use xlink:href="#ic_back"></use>
                  </svg>
                </span>
                Advanced Filter
              </h2>
              <div class="card card-body advance-body border-0 shadow">

                <div class="d-flex nav nav-tabs advance-nav mb-3" role="tablist">
                  <a href="#" class="active" data-bs-target="#afCompany" data-bs-toggle="tab" role="tab" aria-controls="afCompany" aria-selected="true">
                    Company
                  </a>
                  <a href="#" data-bs-target="#afPlace" data-bs-toggle="tab" role="tab" aria-controls="afPlace" aria-selected="false">
                    Place
                  </a>
                </div>
                <div class="tab-content">
                  <div id="afCompany" class="tab-pane fade show active advance-filter-pane" role="tabpanel" tabindex="0">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="pe-md-4">
                          <h4 class="font-16 title">Price Range</h4>
                          <div class="mb-3 filter-options range-filter">
                            <div>
                              <div id="slider-range">
                              </div>
                            </div>
                            <form>
                              <input type="hidden" name="min-value" value="">
                              <input type="hidden" name="max-value" value="">
                            </form>
                          </div>
                          <div class="mb-3 xs2-font d-flex justify-content-between">
                            <span id="slider-range-value1"></span>
                            <span id="slider-range-value2"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <h4 class="font-16 cat-title">Category</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Apotheke" checked>
                              <label class="form-check-label" for="Apotheke">Apotheke</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Architektur">
                              <label class="form-check-label" for="Architektur">Architektur</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Autogarage">
                              <label class="form-check-label" for="Autogarage">Autogarage</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Bank">
                              <label class="form-check-label" for="Bank">Bank Sparkasse</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Bauwesen">
                              <label class="form-check-label" for="Bauwesen">Bauwesen</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Bäckerei">
                              <label class="form-check-label" for="Bäckerei">Bäckerei</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Bank2">
                              <label class="form-check-label" for="Bank2">Bank Sparkasse</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Bauwesen2">
                              <label class="form-check-label" for="Bauwesen2">Bauwesen</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Bodenbeläge2">
                              <label class="form-check-label" for="Bodenbeläge2">Bodenbeläge</label>
                            </div>
                            <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                              <input type="checkbox" class="form-check-input" id="Bäckerei2">
                              <label class="form-check-label" for="Bäckerei2">Bäckerei</label>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div id="afPlace" class="tab-pane fade advance-filter-pane" role="tabpanel" tabindex="0">
                    <div class="row">
                      <div class="col-12">
                        <h4 class="font-16 cat-title">Category</h4>
                      </div>
                      <div class="col-md">
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Apotheke" checked>
                          <label class="form-check-label" for="Apotheke">Apotheke</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Architektur">
                          <label class="form-check-label" for="Architektur">Architektur</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Autogarage">
                          <label class="form-check-label" for="Autogarage">Autogarage</label>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bäckerei">
                          <label class="form-check-label" for="Bäckerei">Bäckerei</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bank2">
                          <label class="form-check-label" for="Bank2">Bank Sparkasse</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bauwesen2">
                          <label class="form-check-label" for="Bauwesen2">Bauwesen</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bodenbeläge2">
                          <label class="form-check-label" for="Bodenbeläge2">Bodenbeläge</label>
                        </div>

                      </div>
                      <div class="col-md">
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bank">
                          <label class="form-check-label" for="Bank">Bank Sparkasse</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bauwesen">
                          <label class="form-check-label" for="Bauwesen">Bauwesen</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bank">
                          <label class="form-check-label" for="Bank">Bank Sparkasse</label>
                        </div>
                        <div class="custom-control custom-checkbox form-check mb-2 pb-1">
                          <input type="checkbox" class="form-check-input" id="Bauwesen">
                          <label class="form-check-label" for="Bauwesen">Bauwesen</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer px-0 bg-white text-end pt-3 pb-0">
                  <button class="btn btn-gray btn-sm mb-2 mb-md-0">Reset</button>
                  <button class="btn btn-theme btn-sm">Apply</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="category-panel-section">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-auto">
            <div class="category-panel position-relative">
              <ul class="popular-searchs flex-nowrap d-flex align-items-center justify-content-lg-center list-unstyled text-center">
                <li>
                  <a href="#" class="shadow">
                    <span class="box d-flex flex-column align-items-center">
                      <svg class="icon mb-2 theme-clr">
                        <use xlink:href="#ic_plane"></use>
                      </svg>
                      <span>Travel</span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#" class="shadow">
                    <span class="box d-flex flex-column align-items-center">
                      <svg class="icon mb-2 theme-clr">
                        <use xlink:href="#ic_kitchen"></use>
                      </svg>
                      <span>Restaurant</span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#" class="shadow">
                    <span class="box d-flex flex-column align-items-center">
                      <svg class="icon mb-2 theme-clr">
                        <use xlink:href="#ic_mountain"></use>
                      </svg>
                      <span>Mountain</span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#" class="shadow">
                    <span class="box d-flex flex-column align-items-center">
                      <svg class="icon mb-2 theme-clr">
                        <use xlink:href="#ic_barbell"></use>
                      </svg>
                      <span>Fitness</span>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#" class="shadow">
                    <span class="box d-flex flex-column align-items-center">
                      <svg class="icon mb-2 theme-clr">
                        <use xlink:href="#ic_beach"></use>
                      </svg>
                      <span>Beach</span>
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- popular company section start -->
    <section class="section-padding slider-section">
      <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
          <h3 class="font-semibold section-title mb-3">Top Companies</h3>
          <a href="company.php" class="theme-clr xs-font text-uppercase font-medium ms-3 mb-2 view-all">View all</a>
        </div>
        <div class="marquee">
          <div class="d-flex marquee_track">
            <?php
            for ($n = 1; $n <= 10; $n++) { ?>
              <div class="marquee_item">
                <div class="lo-card-body card">
                  <div class="top-card position-relative">
                    <a href="company-detail.php">
                      <img src="img/cmp1.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                      <svg class="icon-18 me-1 theme-clr">
                        <use xlink:href="#ic_playcard"></use>
                      </svg>Casino
                    </div><button class="btn-icon bookmark-btn">
                      <input type="checkbox" id="bookmark" class="d-none">
                      <label for="bookmark" class="btn-bookmark mb-0">
                        <svg width="20" height="20">
                          <use xlink:href="#ic_bookmark" />
                        </svg>
                      </label>
                    </button>
                    <p class="percent-off xs-font font-medium bg-green text-white position-absolute">Open</p>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between lo-head">
                      <a href="company-detail.php">
                        <h5 class="lo-name font-bold mb-0">Nelo Lopes Boulangerie-Pâtisserie</h5>
                      </a>
                    </div>
                    <div class="d-flex mt-2 align-items-center">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      <p class="gray-clr mb-0 font-15 truncate-1">1752 Villars-sur-Glâne</p>
                    </div>
                    <ul class="d-flex list-unstyled rating-view mt-2 mb-0">
                      <li>
                        <svg class="yellow-clr">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </li>
                      <li>
                        <svg class="yellow-clr">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </li>
                      <li>
                        <svg class="yellow-clr">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </li>
                      <li>
                        <svg class="light-clr">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </li>
                      <li>
                        <svg class="light-clr">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </li>
                    </ul>
                  </div>
                  <!-- card body end -->
                </div>
              </div>
            <?php  } ?>
          </div>
        </div>
      </div>
    </section>
    <!-- popular company section end -->

    <!-- popular places section start -->
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
    <!-- popular places section end -->

    <!-- Recent jobs section start -->
    <section class="section-padding jobs-section slider-section pt-0">
      <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
          <h3 class="font-semibold section-title mb-3">Recent Jobs</h3>
          <a href="javascript:void(0)" class="theme-clr xs-font text-uppercase font-medium ms-3 mb-3 view-all">View all</a>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 px-md-0">
            <div class="job_slick">
              <div>
                <div class="lo-card-body card">
                  <div class="card-body box white job-list d-flex flex-column">
                    <h3 class="border-0 sm-font font-bold">Assistant Property Manager</h3>
                    <p class="loc gray-clr d-flex mb-2">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      Villars-sur-Glâne
                    </p>
                    <div class="tags gray-clr">
                      <p class="mr-0 flex-fill d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_building"></use>
                        </svg>
                        IT & Network Administration
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_briefcase"></use>
                        </svg> Full Time
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_bookmark"></use>
                        </svg>
                        Intermediate
                      </p>
                    </div>
                    <div class="chips d-flex align-items-center flex-wrap">
                      <span class="em-chip">Management</span>
                      <span class="em-chip">Admin &amp; Clerical</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                      <a href="javascript:void(0)" class="btn btn-border-theme btn-theme btn-sm">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="lo-card-body card">
                  <div class="card-body box white job-list d-flex flex-column">
                    <h3 class="border-0 sm-font font-bold">Assistant Property Manager</h3>
                    <p class="loc gray-clr d-flex mb-2">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      Villars-sur-Glâne
                    </p>
                    <div class="tags gray-clr">
                      <p class="mr-0 flex-fill d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_building"></use>
                        </svg>
                        IT & Network Administration
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_briefcase"></use>
                        </svg> Full Time
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_bookmark"></use>
                        </svg>
                        Intermediate
                      </p>
                    </div>
                    <div class="chips d-flex align-items-center flex-wrap">
                      <span class="em-chip">Management</span>
                      <span class="em-chip">Admin &amp; Clerical</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                      <a href="javascript:void(0)" class="btn btn-border-theme btn-theme btn-sm">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="lo-card-body card">
                  <div class="card-body box white job-list d-flex flex-column">
                    <h3 class="border-0 sm-font font-bold">Assistant Property Manager</h3>
                    <p class="loc gray-clr d-flex mb-2">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      Villars-sur-Glâne
                    </p>
                    <div class="tags gray-clr">
                      <p class="mr-0 flex-fill d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_building"></use>
                        </svg>
                        IT & Network Administration
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_briefcase"></use>
                        </svg> Full Time
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_bookmark"></use>
                        </svg>
                        Intermediate
                      </p>
                    </div>
                    <div class="chips d-flex align-items-center flex-wrap">
                      <span class="em-chip">Management</span>
                      <span class="em-chip">Admin &amp; Clerical</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                      <a href="javascript:void(0)" class="btn btn-border-theme btn-theme btn-sm">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="lo-card-body card">
                  <div class="card-body box white job-list d-flex flex-column">
                    <h3 class="border-0 sm-font font-bold">Assistant Property Manager</h3>
                    <p class="loc gray-clr d-flex mb-2">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      Villars-sur-Glâne
                    </p>
                    <div class="tags gray-clr">
                      <p class="mr-0 flex-fill d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_building"></use>
                        </svg>
                        IT & Network Administration
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_briefcase"></use>
                        </svg> Full Time
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_bookmark"></use>
                        </svg>
                        Intermediate
                      </p>
                    </div>
                    <div class="chips d-flex align-items-center flex-wrap">
                      <span class="em-chip">Management</span>
                      <span class="em-chip">Admin &amp; Clerical</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                      <a href="javascript:void(0)" class="btn btn-border-theme btn-theme btn-sm">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="lo-card-body card">
                  <div class="card-body box white job-list d-flex flex-column">
                    <h3 class="border-0 sm-font font-bold">Assistant Property Manager</h3>
                    <p class="loc gray-clr d-flex mb-2">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      Villars-sur-Glâne
                    </p>
                    <div class="tags gray-clr">
                      <p class="mr-0 flex-fill d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_building"></use>
                        </svg>
                        IT & Network Administration
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_briefcase"></use>
                        </svg> Full Time
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_bookmark"></use>
                        </svg>
                        Intermediate
                      </p>
                    </div>
                    <div class="chips d-flex align-items-center flex-wrap">
                      <span class="em-chip">Management</span>
                      <span class="em-chip">Admin &amp; Clerical</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                      <a href="javascript:void(0)" class="btn btn-border-theme btn-theme btn-sm">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="lo-card-body card">
                  <div class="card-body box white job-list d-flex flex-column">
                    <h3 class="border-0 sm-font font-bold">Assistant Property Manager</h3>
                    <p class="loc gray-clr d-flex mb-2">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      Villars-sur-Glâne
                    </p>
                    <div class="tags gray-clr">
                      <p class="mr-0 flex-fill d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_building"></use>
                        </svg>
                        IT & Network Administration
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_briefcase"></use>
                        </svg> Full Time
                      </p>
                      <p class="d-flex  mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_bookmark"></use>
                        </svg>
                        Intermediate
                      </p>
                    </div>
                    <div class="chips d-flex align-items-center flex-wrap">
                      <span class="em-chip">Management</span>
                      <span class="em-chip">Admin &amp; Clerical</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                      <a href="javascript:void(0)" class="btn btn-border-theme btn-theme btn-sm">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--col-end-->
        </div>
      </div>
    </section>
    <!-- Recent jobs section end -->

    <!-- New Users section start -->
    <section class="section-padding pt-0">
      <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
          <h3 class="font-semibold section-title mb-3">New Users</h3>
          <a href="javascript:void(0)" class="theme-clr xs-font text-uppercase font-medium ms-3 mb-3 view-all">View all</a>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 px-md-0">
            <div class="multiple_slick">
              <div>
                <div class="lo-card-body card text-center">
                  <div class="card-body box white job-list d-flex flex-column">
                    <div>
                      <img src="img/user1.jpg" alt="" class="img-user rounded-circle mb-4 mt-2 mx-auto">
                    </div>
                    <h3 class="border-0 sm-font font-medium">Marie Walters</h3>
                    <p class="loc  gray-clr d-flex mb-2 justify-content-center">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      414243, Villars-sur-Glâne
                    </p>
                    <ul class="d-flex justify-content-center list-unstyled social_icons gray-clr mt-3 mb-1">
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_facebook"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_twitter"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_instagram"></use>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- slide end -->
              <div>
                <div class="lo-card-body  card text-center">
                  <div class="card-body box white job-list d-flex flex-column">
                    <div>
                      <img src="img/user2.jpg" alt="" class="img-user rounded-circle mb-4 mt-2 mx-auto">
                    </div>
                    <h3 class="border-0 sm-font font-medium">Rena Warner</h3>
                    <p class="loc  gray-clr d-flex mb-2 justify-content-center">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      414242, Villars-sur-Glâne
                    </p>
                    <ul class="d-flex justify-content-center list-unstyled social_icons gray-clr mt-3 mb-1">
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_facebook"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_twitter"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_instagram"></use>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- slide end -->
              <div>
                <div class="lo-card-body card text-center">
                  <div class="card-body box white job-list d-flex flex-column">
                    <div>
                      <img src="img/user3.jpg" alt="" class="img-user rounded-circle mb-4 mt-2 mx-auto">
                    </div>
                    <h3 class="border-0 sm-font font-medium">Marie Walters</h3>
                    <p class="loc  gray-clr d-flex mb-2 justify-content-center">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      414243, Villars-sur-Glâne
                    </p>
                    <ul class="d-flex justify-content-center list-unstyled social_icons gray-clr mt-3 mb-1">
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_facebook"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_twitter"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_instagram"></use>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- slide end -->
              <div>
                <div class="lo-card-body  card text-center">
                  <div class="card-body box white job-list d-flex flex-column">
                    <div>
                      <img src="img/user4.jpg" alt="" class="img-user rounded-circle mb-4 mt-2 mx-auto">
                    </div>
                    <h3 class="border-0 sm-font font-medium">Rena Warner</h3>
                    <p class="loc  gray-clr d-flex mb-2 justify-content-center">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      414242, Villars-sur-Glâne
                    </p>
                    <ul class="d-flex justify-content-center list-unstyled social_icons gray-clr mt-3 mb-1">
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_facebook"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_twitter"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_instagram"></use>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- slide end -->
              <div>
                <div class="lo-card-body  card text-center">
                  <div class="card-body box white job-list d-flex flex-column">
                    <div class="text-center">
                      <img src="img/user2.jpg" alt="" class="img-user rounded-circle mb-4 mt-2 mx-auto">
                    </div>
                    <h3 class="border-0 sm-font font-medium">Rena Warner</h3>
                    <p class="loc  gray-clr d-flex mb-2 justify-content-center">
                      <svg class="icon-20 me-1 gray-clr">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      414242, Villars-sur-Glâne
                    </p>
                    <ul class="d-flex justify-content-center list-unstyled social_icons gray-clr mt-3 mb-1">
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_facebook"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_twitter"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="icon-20">
                            <use xlink:href="#ic_instagram"></use>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- slide end -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- New Users section end -->

    <section class="section-padding slider-section pt-0">
      <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
          <h3 class="font-semibold section-title mb-3">Testimonials</h3>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 px-md-0">
            <div class="testimonial_slick ">
              <div>
                <div class="card testimonial-card">
                  <div class="card-body p-0">
                    <div class="d-flex">
                      <div class="rounded-circle position-relative">
                        <!-- <div class="bg-round rounded-circle bg-theme position-absolute"></div> -->
                        <img src="img/cmplogo1.jpg" alt="Coiffeur Boss" class="ts-img img-fluid rounded-circle position-relative">
                      </div>
                      <div class="ps-3 body-font">
                        <p class="mb-1 fw-600 text-capitalize">Coiffeur Boss</p>
                        <div class="xs-font mb-1 d-sm-flex gray-clr d-block">
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr">
                              <use xlink:href="#ic_map_pin"></use>
                            </svg>Brunnmattstr
                          </div>
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr ms-sm-2">
                              <use xlink:href="#ic_date"></use>
                            </svg>10 Feb 2020
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tsdesc d-flex flex-column">
                      <div class="star-rating d-flex mb-1">
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </div>
                      <p class="sm-font fw-600 mb-2 mt-2">Great Platform To Start With</p>
                      <p class="mb-2 gray-clr truncate-4">
                        Freundliches Team mit hoher Fachkompetenz. Der Berater war nicht aufdringlich und sehr sympathisch. Danke für die Werbegeschenke :)
                      </p>
                      <svg class="quote quote-right gray-clr mb-2 me-2">
                        <use xlink:href="#ic_quote"></use>
                      </svg>
                    </div>
                    <div class="body-font mt-auto">
                      <p class="mb-1 fw-600 text-capitalize">heather Bennet</p>
                      <p class="gray-clr xs-font">Co-Founder, MyGwoop</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- slide end -->
              <div>
                <div class="card testimonial-card">
                  <div class="card-body p-0">
                    <div class="d-flex">
                      <div class="rounded-circle position-relative">
                        <img src="img/cmplogo1.jpg" alt="Coiffeur Boss" class="ts-img img-fluid rounded-circle position-relative">
                      </div>
                      <div class="ps-3 body-font">
                        <p class="mb-1 fw-600 text-capitalize">Coiffeur Boss</p>
                        <div class="xs-font mb-1 d-sm-flex gray-clr d-block">
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr">
                              <use xlink:href="#ic_map_pin"></use>
                            </svg>Brunnmattstr
                          </div>
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr ms-sm-2">
                              <use xlink:href="#ic_date"></use>
                            </svg>10 Feb 2020
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tsdesc d-flex flex-column">
                      <div class="star-rating d-flex mb-1">
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </div>
                      <p class="sm-font fw-600 mb-2 mt-2">Great Platform To Start With</p>
                      <p class="mb-2 gray-clr truncate-4">
                        Freundliches Team mit hoher Fachkompetenz. Der Berater war nicht aufdringlich und sehr sympathisch. Danke für die Werbegeschenke :)
                      </p>
                      <svg class="quote quote-right gray-clr mb-2 me-2">
                        <use xlink:href="#ic_quote"></use>
                      </svg>
                    </div>
                    <div class="body-font mt-auto">
                      <p class="mb-1 fw-600 text-capitalize">heather Bennet</p>
                      <p class="gray-clr xs-font">Co-Founder, MyGwoop</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- slide end -->
              <div>
                <div class="card testimonial-card">
                  <div class="card-body p-0">
                    <div class="d-flex">
                      <div class="rounded-circle position-relative">
                        <img src="img/cmplogo1.jpg" alt="Coiffeur Boss" class="ts-img img-fluid rounded-circle position-relative">
                      </div>
                      <div class="ps-3 body-font">
                        <p class="mb-1 fw-600 text-capitalize">Coiffeur Boss</p>
                        <div class="xs-font mb-1 d-sm-flex gray-clr d-block">
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr">
                              <use xlink:href="#ic_map_pin"></use>
                            </svg>Brunnmattstr
                          </div>
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr ms-sm-2">
                              <use xlink:href="#ic_date"></use>
                            </svg>10 Feb 2020
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tsdesc d-flex flex-column">
                      <div class="star-rating d-flex mb-1">
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </div>
                      <p class="sm-font fw-600 mb-2 mt-2">Great Platform To Start With</p>
                      <p class="mb-2 gray-clr truncate-4">
                        Wurde vollumfänglich vom Mitarbeiter Dardan Salijaj beraten. Kann die Agentur nur weiterempfeheln, super Leute dort
                      </p>
                      <svg class="quote quote-right gray-clr mb-2 me-2">
                        <use xlink:href="#ic_quote"></use>
                      </svg>
                    </div>
                    <div class="body-font mt-auto">
                      <p class="mb-1 fw-600 text-capitalize">heather Bennet</p>
                      <p class="gray-clr xs-font">Co-Founder, MyGwoop</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- slide end -->
              <div>
                <div class="card testimonial-card">
                  <div class="card-body p-0">
                    <div class="d-flex">
                      <div class="rounded-circle position-relative">
                        <img src="img/cmplogo1.jpg" alt="Coiffeur Boss" class="ts-img img-fluid rounded-circle position-relative">
                      </div>
                      <div class="ps-3 body-font">
                        <p class="mb-1 fw-600 text-capitalize">Coiffeur Boss</p>
                        <div class="xs-font mb-1 d-sm-flex gray-clr d-block">
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr">
                              <use xlink:href="#ic_map_pin"></use>
                            </svg>Brunnmattstr
                          </div>
                          <div class="mb-1">
                            <svg class="icon-18 me-1 gray-clr ms-sm-2">
                              <use xlink:href="#ic_date"></use>
                            </svg>10 Feb 2020
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tsdesc d-flex flex-column">
                      <div class="star-rating d-flex mb-1">
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18 star-fill">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-18">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </div>
                      <p class="sm-font fw-600 mb-2 mt-2">Great Platform To Start With</p>
                      <p class="mb-2 gray-clr truncate-4">
                        Freundliches Team mit hoher Fachkompetenz. Der Berater war nicht aufdringlich und sehr sympathisch. Danke für die Werbegeschenke :).
                        Danke für die Werbegeschenke :)
                      </p>
                      <svg class="quote quote-right gray-clr mb-2 me-2">
                        <use xlink:href="#ic_quote"></use>
                      </svg>
                    </div>
                    <div class="body-font mt-auto">
                      <p class="mb-1 fw-600 text-capitalize">heather Bennet</p>
                      <p class="gray-clr xs-font">Co-Founder, MyGwoop</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- slide end -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- testimonial section end -->
  </main>
  <?php include 'footer.php'; ?>
  <?php include 'footer-link.php'; ?>
  <script type="text/javascript" src="js/range-slider.js"></script>
</body>

</html>