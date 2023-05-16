<?php ?>
<header class="fixed-top bg-white overflow-hidden">
  <div class="overflow-hidden">
    <nav class="navbar py-0 px-md-0 position-relative">
      <div class="container-fluid container-xl">
        <div class="left d-flex align-items-center">
          <a class="navbar-brand me-3 me-sm-5" href="index.php">
            <img src="img/logo.png" class="logo" alt="Lookon" />
          </a>
        </div>

        <button class="btn p-1 btn-white d-md-none d-inline-block ms-auto <?php echo ($currentPage == 'home') ? 'd-none' : ''; ?>" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
          <svg class="icon me-1">
            <use xlink:href="#ic_search"></use>
          </svg>
        </button>

        <div class="offcanvas offcanvas-top searchcanvas" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
          <div class="offcanvas-body p-0">
            <form action="company.php">
              <div class="nav-search <?php echo ($currentPage == 'home') ? 'd-none' : ''; ?>">
                <button type="button" class="btn p-0 text-reset d-md-none" data-bs-dismiss="offcanvas" aria-label="Close">
                  <svg class="icon me-1 ms-3">
                    <use xlink:href="#ic_back"></use>
                  </svg>
                </button>
                <input type="text" class="form-control search-input" id="res-search" placeholder="Enter Keyword">
              </div>
            </form>
          </div>
        </div>
        <div class="navbar-toggler border-0 ms-3 cursor-pointer" aria-label="Toggle navigation" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>
        </div>
      </div>
    </nav>
  </div>
</header>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="ms-auto align-items-center" id="navbarNav">
    <div class="offcanvas-header align-items-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav ms-md-auto">
        <li class="nav-item mb-3">
          <div class="btn-group lng-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1"><img src="img/english.svg" class="icon me-2" title="English" />English</label>
            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2"><img src="img/germany.svg" class="icon me-2" title="Germany" />German</label>
            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3"><img src="img/france.svg" class="icon me-2" title="French" />French</label>
          </div>
        </li>
        <li class="nav-item <?php echo ($currentPage == 'login') ? 'active' : ''; ?>">
          <a class="nav-link" href="login.php">
            <svg class="icon-20 me-1">
              <use xlink:href="#ic_login"></use>
            </svg>
            <span>
              Login
            </span>
          </a>
        </li>
        <li class="nav-item <?php echo ($currentPage == 'signup') ? 'active' : ''; ?>">
          <a class="nav-link" href="#">
            <svg class="icon-20 me-1">
              <use xlink:href="#ic_person"></use>
            </svg>
            <span>
              Register
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="overlay"></div>
