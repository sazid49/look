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
                     <h2 class="fw-600 md-font mb-3 mt-4 pt-2">Create an account</h2>
                     <form>
                        <div class="form-body">
                           <div class="form-group">
                              <div class="form-check form-switch mb-3 ps-0" onclick="toggleNotPrivatePerson()">
                                 <label class="form-check-label me-2" for="flexSwitchCheckDefault">Private Person</label>
                                 <input class="form-check-input float-none ms-0" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                              </div>
                              <input type="text" id="notprivateperson" class="form-control " placeholder="Company Name" />
                           </div>
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name" />
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" />
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Zip Code" />
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="City" />
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <input type="email" class="form-control email" placeholder="Email" />
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Phone Number" />
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group pwd">
                                    <input type="password" id="password" class="form-control" placeholder="••••••••••" aria-describedby="password-addon" name="password" />
                                    <span toggle="#password" class="toggle-password img-eye"></span>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group pwd">
                                    <input type="password" id="cnfmpasswrd" class="form-control" placeholder="••••••••••" aria-describedby="password-addon" name="password" />
                                    <span toggle="#cnfmpasswrd" class="toggle-password img-eye"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="text-center pb-4 mb-2 d-flex justify-content-between align-items-center">
                              <a href="index.php" class="btn btn-theme flex-fill w-100">Register</a>

                           </div>
                           <div class="alert text-center">
                              Already a member? <a class="font-semibold text-underline" href="login.php">Log in</a>
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