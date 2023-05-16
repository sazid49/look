<?php ?>
<!DOCTYPE html>
<html>

<?php include 'header-link.php'; ?>

<body class="bg-light">
   <main class="login p-0">
      <div class="container-fluid px-0">
         <div class="row g-0">
            <div class="order-2 order-sm-1 col-sm col-12 login-left">
               <div class="text-start py-3 py-md-3 py-xl-5 h-100 login-top">
                  <div class="row login-row h-100 g-0">
                     <div class="login-bg col">
                        <img src="img/home-hero-1a.jpg" alt="" class="img-fluid">
                     </div>
                     <div class="login-bg2 col align-self-lg-end">
                        <img src="img/home-hero-1b.jpg" alt="" class="img-fluid me-n5">
                     </div>

                  </div>
                  <ul class="list-unstyled checklist gray-clr">
                     <li class="li1 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Write a Review
                     </li>
                     <li class="li2 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Obtain tailor-made offers
                     </li>
                     <li class="li3 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Apply to different companies
                     </li>
                  </ul>

               </div>
            </div>
            <div class="order-1 order-sm-2 col-sm col-12 d-flex align-items-center justify-content-center bg-white">
               <div class="login-form py-5">
                  <div class="px-3">
                     <a href="index.php"><img src="img/logo.png" alt="Lookon" /></a>
                     <h2 class="fw-600 sxl-font mb-3 mt-4 pt-2">Welcome</h2>
                     <p class="mb-4 pb-2">Please enter your email and password to continue</p>
                     <form>
                        <div class="form-body">
                           <div class="form-group">
                              <input type="email" class="form-control email" placeholder="Email" />
                           </div>
                           <div class="form-group pwd">
                              <input type="password" id="loggedpassword" class="form-control" placeholder="Password" aria-describedby="password-addon" name="password" />
                              <span toggle="#loggedpassword" class="toggle-password img-eye"></span>
                           </div>
                           <div class="text-center pb-4 mb-2 d-flex justify-content-between align-items-center">
                              <a href="index.php" class="btn btn-theme flex-fill">Sign In </a>
                              <a href="javascript:void(0)" class="flex-fill blue-clr">Forgot Password?</a>
                           </div>
                           <div class="alert text-center">
                              New to Lookon? <a class="font-semibold text-underline" href="register.php">Register Now</a>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php include 'footer-link.php'; ?>

</body>

</html>