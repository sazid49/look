<?php ?>
<!DOCTYPE html>
<html>

<head>
  <?php include('header-link.php');
  $currentPage = 'company'; ?>
</head>

<body class="filterpage">
  <?php include 'header.php'; ?>
  <div id="preloader">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
  <main class="search-page">
    <section class="search-section">
      <div class="container-fluid container-xl">
        <div class="row main-content ms-md-0 position-relative">
          <div class="sidebar col-md-4 col-lg-3 px-0">
            <!-- <div class="position-sticky top-70"> -->
            <h2 class="font-medium text-uppercase body-font border-bottom filter-header d-flex d-md-none mb-0 align-items-center">
              <span>
                <svg class="icon me-2 filter-close-btn d-md-none">
                  <use xlink:href="#ic_back"></use>
                </svg>
              </span>
              Filter
            </h2>
            <div class="filter-inner d-flex flex-column">
              <div class="filter-body">
                <div>
                  <h2 class="font-semibold body-font border-bottom filter-title">Categories</h2>
                  <div class="mb-3 filter-options overflow-y-auto" id="category-options">
                    <div class="custom-control custom-checkbox form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Apotheke" checked>
                      <label class="form-check-label" for="Apotheke">Apotheke (13976)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Architektur">
                      <label class="form-check-label" for="Architektur">Architektur (14109)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Autogarage">
                      <label class="form-check-label" for="Autogarage">Autogarage (14401)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bank">
                      <label class="form-check-label" for="Bank">Bank Sparkasse (14031)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bauwesen">
                      <label class="form-check-label" for="Bauwesen">Bauwesen (13912)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bodenbeläge">
                      <label class="form-check-label" for="Bodenbeläge">Bodenbeläge (14125)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bäckerei">
                      <label class="form-check-label" for="Bäckerei">Bäckerei (13942)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bank">
                      <label class="form-check-label" for="Bank">Bank Sparkasse (14031)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bauwesen">
                      <label class="form-check-label" for="Bauwesen">Bauwesen (13912)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bodenbeläge">
                      <label class="form-check-label" for="Bodenbeläge">Bodenbeläge (14125)</label>
                    </div>
                    <div class="custom-control custom-checkbox  form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="Bäckerei">
                      <label class="form-check-label" for="Bäckerei">Bäckerei (13942)</label>
                    </div>
                  </div>

                  <h2 class="font-semibold body-font border-bottom filter-title">Price Range</h2>
                  <div class="mb-3 theme-clr xs2-font d-flex justify-content-between">
                    <span id="slider-range-value1"></span>
                    <span id="slider-range-value2"></span>
                  </div>
                  <div class="mb-30 filter-options range-filter">
                    <div>
                      <div id="slider-range">
                      </div>
                    </div>
                    <form>
                      <input type="hidden" name="min-value" value="">
                      <input type="hidden" name="max-value" value="">
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-footer bg-white text-end pt-4 pb-0 d-md-none d-block mt-auto">
                <button class="btn btn-theme btn-sm w-100">Apply</button>
              </div>
            </div>
            <button class="btn px-0 pt-0 font-medium xxs-font text-uppercase reset-filter d-flex align-items-center">
              <svg class="icon-20 me-1">
                <use xlink:href="#ic_reset"></use>
              </svg>
              Reset Filters
            </button>
            <div class="alert text-center mt-md-4 looking-alert">
              Looking for places? <a class="font-semibold text-underline text-nowrap" href="places.php">Click here</a>
            </div>
            <!-- </div> -->
          </div>
          <div class="content col-md-8 col-lg-9">
            <div>
              <!-- tabs start here -->
              <div class="d-flex justify-content-between align-items-center">
                <p class="gray-clr card-body px-0 xs2-font mb-0">Found 230 <span class="fw-500 dark-clr">Companies</span> for you</p>

                <div class="filters-actions ms-auto">
                  <div class="filter-action-btn">
                    <button class="btn filter-btn d-md-none">
                      <svg class="icon me-2">
                        <use xlink:href="#ic_filter"></use>
                      </svg>
                      Filter</button>
                  </div>
                  <div class="d-flex align-items-center sort-group">
                    <span class="sort-label d-none d-md-block">
                      Sort By :
                    </span>
                    <div class="border border-start v-seperator position-static d-none"></div>
                    <select class="custom-select form-control js-select-single sort-select">
                      <option hidden="" selected="">Popularity</option>
                      <option>Ascending</option>
                      <option>Descending</option>
                      <option>Price(low to high)</option>
                      <option>Price(high to low)</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row lo-row-list">
                <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="lo-card mb-4">
                    <div class="lo-card-body card">
                      <div class="top-card position-relative">
                        <a href="company-detail.php">
                          <img src="img/cmp1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                          <svg class="icon-18 me-1 theme-clr">
                            <use xlink:href="#ic_playcard"></use>
                          </svg>Casino
                        </div>
                        <button class="btn-icon bookmark-btn">
                          <input type="checkbox" id="bookmark" class="d-none">
                          <label for="bookmark" class="btn-bookmark mb-0">
                            <svg width="20" height="20">
                              <use xlink:href="#ic_save" />
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
                </div>
                <!--col-end-->
                <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="lo-card mb-4">
                    <div class="lo-card-body card">
                      <div class="top-card position-relative">
                        <a href="company-detail.php">
                          <img src="img/cmp1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                          <svg class="icon-18 me-1 theme-clr">
                            <use xlink:href="#ic_playcard"></use>
                          </svg>Casino
                        </div>
                        <button class="btn-icon bookmark-btn">
                          <input type="checkbox" id="bookmark" class="d-none">
                          <label for="bookmark" class="btn-bookmark mb-0">
                            <svg width="20" height="20">
                              <use xlink:href="#ic_save" />
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
                </div>
                <!--col-end-->
                <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="lo-card mb-4">
                    <div class="lo-card-body card">
                      <div class="top-card position-relative">
                        <a href="company-detail.php">
                          <img src="img/cmp1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                          <svg class="icon-18 me-1 theme-clr">
                            <use xlink:href="#ic_playcard"></use>
                          </svg>Casino
                        </div>
                        <button class="btn-icon bookmark-btn">
                          <input type="checkbox" id="bookmark" class="d-none">
                          <label for="bookmark" class="btn-bookmark mb-0">
                            <svg width="20" height="20">
                              <use xlink:href="#ic_save" />
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
                </div>
                <!--col-end-->
                <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="lo-card mb-4">
                    <div class="lo-card-body card">
                      <div class="top-card position-relative">
                        <a href="company-detail.php">
                          <img src="img/cmp1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                          <svg class="icon-18 me-1 theme-clr">
                            <use xlink:href="#ic_playcard"></use>
                          </svg>Casino
                        </div>
                        <button class="btn-icon bookmark-btn">
                          <input type="checkbox" id="bookmark" class="d-none">
                          <label for="bookmark" class="btn-bookmark mb-0">
                            <svg width="20" height="20">
                              <use xlink:href="#ic_save" />
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
                </div>
                <!--col-end-->
                <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="lo-card mb-4">
                    <div class="lo-card-body card">
                      <div class="top-card position-relative">
                        <a href="company-detail.php">
                          <img src="img/cmp1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                          <svg class="icon-18 me-1 theme-clr">
                            <use xlink:href="#ic_playcard"></use>
                          </svg>Casino
                        </div>
                        <button class="btn-icon bookmark-btn">
                          <input type="checkbox" id="bookmark" class="d-none">
                          <label for="bookmark" class="btn-bookmark mb-0">
                            <svg width="20" height="20">
                              <use xlink:href="#ic_save" />
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
                </div>
                <!--col-end-->
                <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="lo-card mb-4">
                    <div class="lo-card-body card">
                      <div class="top-card position-relative">
                        <a href="company-detail.php">
                          <img src="img/cmp1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="homes-tag button alt featured f1 position-absolute text-dark bg-white">
                          <svg class="icon-18 me-1 theme-clr">
                            <use xlink:href="#ic_playcard"></use>
                          </svg>Casino
                        </div>
                        <button class="btn-icon bookmark-btn">
                          <input type="checkbox" id="bookmark" class="d-none">
                          <label for="bookmark" class="btn-bookmark mb-0">
                            <svg width="20" height="20">
                              <use xlink:href="#ic_save" />
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
                </div>
                <!--col-end-->
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <!-- <div class="main-content">
  
</div> -->


  </main>
  <?php include 'footer.php'; ?>
  <?php include 'footer-link.php'; ?>
  <script type="text/javascript" src="js/range-slider.js"></script>




</body>

</html>