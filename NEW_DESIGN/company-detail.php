<?php ?>
<!DOCTYPE html>
<html>

<head>
  <?php include('header-link.php');
  $currentPage = 'company-detail'; ?>
</head>

<body>
  <?php include 'header.php'; ?>
  <main class="fixheight">
    <section class="d-flex align-items-center listing-profile-header">
      <div class="container-fluid container-xl">
        <div class="row">
          <div class="col-md-12">
            <div class="profile-name">
              <a href="#">
                <img src="img/cmplogo1.jpg" alt="" class="listing-logo me-3">
              </a>
              <div class="d-sm-flex align-items-center flex-grow-1">
                <div>
                  <div class="d-flex">
                    <h1 class="md-font font-semibold xs2-font mb-1 me-3 cmp-name flex-grow-1">Nelo Lopes Boulangerie-Pâtisserie</h1>
                    <span class="d-flex d-md-none ms-auto" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                      <svg class="icon-20 me-2 mt-1">
                        <use xlink:href="#ic_share"></use>
                      </svg>
                    </span>
                    <div class="d-flex d-sm-none ms-auto">
                      <span class="d-flex mb-2 ms-1 mt-1">
                        <svg class="icon-14 star-fill me-1">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-14 star-fill me-1">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-14 star-fill me-1">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-14 star-fill me-1">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                        <svg class="icon-14 star me-1">
                          <use xlink:href="#ic_star"></use>
                        </svg>
                      </span>
                    </div>
                  </div>
                  <div class="mb-0 d-flex flex-wrap align-items-center gray-clr">
                    <div class="mb-2 mb-md-0">
                      <svg class="icon-20 me-1">
                        <use xlink:href="#ic_map_pin"></use>
                      </svg>
                      <span class="font-14 me-3">Länggasstrasse 32, 3012 Bern</span>
                    </div>

                  </div>
                  <div class="d-none d-sm-flex">
                    <span class="d-flex mb-1 mt-2 ms-1">
                      <svg class="icon-14 star-fill me-1">
                        <use xlink:href="#ic_star"></use>
                      </svg>
                      <svg class="icon-14 star-fill me-1">
                        <use xlink:href="#ic_star"></use>
                      </svg>
                      <svg class="icon-14 star-fill me-1">
                        <use xlink:href="#ic_star"></use>
                      </svg>
                      <svg class="icon-14 star-fill me-1">
                        <use xlink:href="#ic_star"></use>
                      </svg>
                      <svg class="icon-14 star me-1">
                        <use xlink:href="#ic_star"></use>
                      </svg>
                    </span>
                  </div>
                </div>
                <div class="ms-auto gray-clr text-end">
                  <div class="d-flex justify-content-md-end">
                    <div class="mb-2 mb-md-2 mt-md-0">
                      <svg class="icon-20 me-1">
                        <use xlink:href="#ic_eye"></use>
                      </svg>
                      <span class="font-14">410</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-md-end">
                    <div class="mb-2 mb-md-2 mt-md-0">
                      <svg class="icon-20 me-1">
                        <use xlink:href="#ic_date"></use>
                      </svg>
                      <span class="font-14">Last Updated: Sep 20, 2022</span>
                    </div>
                  </div>
                  <div class="mb-3 d-flex align-items-center font-14  justify-content-md-end">
                    <svg class="icon-20 me-1">
                      <use xlink:href="#ic_filepencil"></use>
                    </svg>
                    <span>
                      All data is managed from company itself
                    </span>
                  </div>
                  <!-- mobile social sharing -->
                  <div class="offcanvas offcanvas-bottom social_canvas" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasBottomLabel">Share</h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small">
                      <div class="d-flex radius-6 text-center justify-content-around">
                        <a href="#" class="bg-white gray-clr theme-hover border-0 me-2 ms-2">
                          <svg class="icon">
                            <use xlink:href="#ic_facebook"></use>
                          </svg>
                          <div>Facebook</div>
                        </a>
                        <a href="#" class="bg-white gray-clr theme-hover border-0 me-2">
                          <svg class="icon">
                            <use xlink:href="#ic_twitter"></use>
                          </svg>
                          <div>Twitter</div>
                        </a>
                        <a href="#" class="bg-white gray-clr theme-hover border-0 me-2">
                          <svg class="icon">
                            <use xlink:href="#ic_linkedin"></use>
                          </svg>
                          <div>Linkedin</div>
                        </a>
                        <a href="#" class="bg-white gray-clr theme-hover border-0 me-2">
                          <svg class="icon">
                            <use xlink:href="#ic_whatsapp"></use>
                          </svg>
                          <div>Whatsapp</div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="profile-header">
      <div class="container-fluid container-xl">
        <div class="row justify-content-center">
          <div class="col-12">
            <!-- tabs start here -->
            <ul class="nav nav-tabs custom-tabs justify-content-lg-center border-bottom-0 cts-carousel scrollspy-tabs mt-1">
              <li class="nav-item">
                <a class="nav-link active" href="#info" data-bs-toggle="tab">Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#offer" data-bs-toggle="tab">Angebot</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#reviews" data-bs-toggle="tab">Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#galerie" data-bs-toggle="tab">Galerie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#jobs" data-bs-toggle="tab">Jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#team" data-bs-toggle="tab">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link pricetab" href="#pricelist" data-bs-toggle="tab">Pricelist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#news" data-bs-toggle="tab">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#kontaktformular" data-bs-toggle="tab">Kontaktformular</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#handelsregister" data-bs-toggle="tab">Handelsregister</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- profile header end -->
    <!-- quick links header -->
    <div class="quick-links bg-light-gray pt-1 pt-md-2 pb-md-2">
      <div class="container-fluid container-xl">
        <div class="row">
          <div class="col-12">
            <ul class="d-flex nav quick-nav justify-content-lg-center list-unstyled cts-carousel">
              <li class="nav-item">
                <a href="tel:031 525 73 73" class="nav-link d-flex align-items-center">
                  <svg class="icon-18 me-2">
                    <use xlink:href="#ic_call"></use>
                  </svg>
                  <span>
                    Call Now
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="mailto:m.mahmoud055@hotmail.com " class="nav-link d-flex align-items-center">
                  <svg class="icon-18 me-2">
                    <use xlink:href="#ic_mail"></use>
                  </svg>
                  <span>
                    Email
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://www.coiffeur-boss.digitalone.site/" target="_blank" class="nav-link d-flex align-items-center">
                  <svg class="icon-18 me-2">
                    <use xlink:href="#ic_world"></use>
                  </svg>
                  <span>
                    Website
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                  <svg class="icon-18 me-2">
                    <use xlink:href="#ic_map_pin"></use>
                  </svg>
                  <span>
                    Get Directions
                  </span>
                </a>
              </li>
              <li class="nav-item d-none d-md-block">
                <div class="dropdown dropdown-animate py-1 share-nav" data-bs-toggle="hover">
                  <div class="d-flex align-items-center nav-link cursor-pointer">
                    <svg class="icon-18 me-2">
                      <use xlink:href="#ic_share"></use>
                    </svg>
                    <span>
                      Share
                    </span>
                  </div>
                  <div class="dropdown-menu mt-0 dropdown-menu-end social_share">
                    <div class="d-flex radius-6">
                      <a href="#" class="bg-white gray-clr theme-hover border-0">
                        <svg class="icon">
                          <use xlink:href="#ic_facebook"></use>
                        </svg>
                        <span>
                      </a>
                      <a href="#" class="bg-white gray-clr theme-hover border-0">
                        <svg class="icon">
                          <use xlink:href="#ic_twitter"></use>
                        </svg>
                        <span>
                      </a>
                      <a href="#" class="bg-white gray-clr theme-hover border-0">
                        <svg class="icon">
                          <use xlink:href="#ic_linkedin"></use>
                        </svg>
                        <span>
                      </a>
                      <a href="#" class="bg-white gray-clr theme-hover border-0">
                        <svg class="icon">
                          <use xlink:href="#ic_whatsapp"></use>
                        </svg>
                        <span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                  <svg class="icon-18 me-2">
                    <use xlink:href="#ic_bookmark"></use>
                  </svg>
                  <span>
                    Bookmark
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link d-flex align-items-center">
                  <svg class="icon-18 me-2">
                    <use xlink:href="#ic_star_line"></use>
                  </svg>
                  <span>
                    Leave a Review
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- quick links header end -->
    <section class="list-detail">
      <div class="container-fluid container-xl">
        <div class="tab-content py-4">
          <!-- info tab pane start -->
          <?php include('tabs/info.php'); ?>
          <!-- about tab pane end -->
          <!-- Offer tab pane start -->
          <?php include('tabs/offer.php'); ?>
          <!-- Offer tab pane end -->
          <!-- reviews tab pane start -->
          <?php include('tabs/review.php'); ?>
          <!-- reviews tab pane end -->
          <!-- gallery tab start -->
          <?php include('tabs/gallery.php'); ?>
          <!-- gallery tab end -->
          <!-- team tab pane start -->
          <?php include('tabs/team.php'); ?>
          <!-- team tab pane end -->
          <!-- pricelist tab pane start -->
          <?php include('tabs/pricelist.php'); ?>
          <!-- pricelist tab pane end -->
          <!-- news tab start -->
          <?php include('tabs/news.php'); ?>
          <!-- news tab end -->
          <!-- contact tab pane start -->
          <?php include('tabs/contact.php'); ?>
          <!-- contact tab pane end -->
          <!-- job tab pane start -->
          <?php include('tabs/jobs.php'); ?>
          <!-- job tab pane end -->
          <!-- handelsregister tab pane start -->
          <?php include('tabs/register.php'); ?>
          <!-- handelsregister tab pane end -->
        </div>

      </div>
    </section>

    <!--light bg div end-->
    <?php include 'footer.php'; ?>
  </main>
  <?php include 'footer-link.php'; ?>

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

</body>

</html>