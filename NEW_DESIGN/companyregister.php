<?php ?>
<!DOCTYPE html>
<html>

<?php include 'header-link.php'; ?>

<body class="bg-light">
   <main class="login p-0">
      <div class="container-fluid px-0">
         <div class="row g-0">
            <div class="order-2 order-sm-1 col-sm-5 col-12 login-left">
               <div class="text-start h-100 login-top overflow-hidden">
                  <div class="row login-row h-100 g-0">
                     <div class="login-bg col">
                        <img src="img/home-hero-1a.jpg" alt="" class="img-fluid">
                        <img src="img/banner1.jpg" alt="" class="img-fluid me-n5">
                     </div>
                     <div class="login-bg2 col align-self-lg-end">
                        <img src="img/home-hero-3.jpg" alt="" class="img-fluid">
                        <img src="img/home-hero-1b.jpg" alt="" class="img-fluid me-n5">


                     </div>
                  </div>
                  <ul class="list-unstyled checklist gray-clr">
                     <li class="li1 bg-white radius-4 d-flex align-items-center py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Dein Unternehmen wird von tausenden von Personen gesehen
                     </li>
                     <li class="li2 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Erhalte Offerten direkt von Interessenten
                     </li>
                     <li class="li3 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Schreibe Stellen aus, die aktuell frei sind
                     </li>
                     <li class="li4 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Erhalte bessere Positionen bei Google
                     </li>
                  </ul>
               </div>
            </div>
            <div class="order-1 order-sm-2 col-sm-7 col-12">
               <div class=" d-flex align-items-center justify-content-center bg-white">
                  <div class="login-form cmpregister-form py-5">
                     <div class="px-3">
                        <h2 class="fw-600 md-font mb-3 text-center">Enter your company</h2>
                        <div class="wizard-content">
                           <form id="steps-form" action="#" class="tab-wizard wizard-circle wizard clearfix">
                              <h6>Basisinformationen</h6>
                              <section>
                                 <p class="bold-font sm-font mb-2 text-center">Basis Informationen</p>
                                 <p class="font-14 gray-clr text-center">Basisinformationen zu Deiner Firma und Person eingeben</p>
                                 <div class="px-0">
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <div class="form-group" id="company_name">
                                             <label class="form-label" for="company_name"> Unternehmen</label>
                                             <input type="text" id="company_name" name="company_name" class="form-control inpt-control required" style="display:block;" value="">
                                             <div class="invalid-feedback"> Bitte Nachname eingeben</div>
                                          </div>
                                       </div>
                                       <!-- Address / Adresse -->
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="">Strasse und Nr.</label>
                                             <input class="form-control" type="text" name="address" value="">
                                             <div class="invalid-feedback"> Bitte Nachname eingeben</div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="gen_postcode"> PLZ</label>
                                             <input type="text" id="postcode" name="postcode" class="form-control" value="">
                                             <div class="invalid-feedback"> Bitte geben Sie die Postleitzahl ein</div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="city"> Ort</label>
                                             <input type="text" id="city" name="city" class="form-control" value="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="email"> E-Mail</label>
                                             <input type="text" id="email" name="email" class="form-control inpt-control required" value="">
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="phone"> Telefon</label>
                                             <input type="text" id="phone" name="phone" class="form-control" value="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col">
                                          <div class="form-group">
                                             <label class="form-label" for="website"> Webseite</label>
                                             <input type="text" id="website" name="website" class="form-control" value="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="rms-content-title">
                                       <div class="body-font fw-600 border-bottom mb-3 pb-2 mt-2">Ansprechperson</div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="gen_firstname"> Vorname</label>
                                             <input type="text" id="gen_firstname" name="firstname" class="form-control inpt-control required" value="">
                                             <div class="invalid-feedback"> Bitte geben Sie Ihren Vornamen ein</div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="gen_lastname"> Nachname</label>
                                             <input type="text" id="gen_lastname" name="lastname" class="form-control inpt-control required" value="">
                                             <div class="invalid-feedback"> Bitte Nachname eingeben</div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="gen_password"> Passwort</label>
                                             <input type="password" id="gen_password" name="password" class="form-control inpt-control required" value="">
                                             <div class="invalid-feedback"> Bitte geben Sie Ihren Vornamen ein</div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="form-label" for="gen_confirm_password"> Passwort bestätigen</label>
                                             <input type="password" id="gen_confirm_password" name="confirm_password" class="form-control inpt-control required" value="">
                                             <div class="invalid-feedback"> Bitte Nachname eingeben</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                              <h6>Bestätigung</h6>
                              <section>
                                 <p class="font-14 gray-clr text-center">Datenschutzbestimmungen akzeptieren und Firma eintragen</p>
                                 <div class="px-0">
                                    <div id="add-listing" class="separated-form">
                                       <div class="row justify-content-center">
                                          <div class="col-md-7 col-lg-6">
                                             <div class="pricing pricing-palden">
                                                <!-- pricing item 1 -->
                                                <div class="pricing-item features-item ja-animate card" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                                                   <div class="pricing-deco text-center card-body bg-light-gray card-header">
                                                      <img src="img/crown.svg" alt="" height="70" width="70">
                                                      <div class="pricing-price mt-3 mb-1 body-font fw-600">240 CHF</div>
                                                      <h3 class="pricing-title md-font fw-700 mb-2">Einmalig - für immer</h3>
                                                      <p class="mb-2 theme-clr ">Sofort Freischaltung</p>
                                                      <p><small class="mt-2 gray-clr mb-2">Keine weiteren Kosten</small></p>
                                                   </div>
                                                   <div class="pb-2 card-body">
                                                      <ul class="list-unstyled xs-font text-start feature p-3 mb-0">
                                                         <li class="mb-3">Kontaktinformationen Deiner Firma</li>
                                                         <li class="mb-3">Firmenadresse mit Google Maps-Funktion</li>
                                                         <li class="mb-3">Hilfe bei der Formatierung der Fotos</li>
                                                         <li class="mb-3">Slider mit ihren 5 professionellen Fotos</li>
                                                         <li class="mb-3">Lookon verfasst die Firmenbeschreibung in 100 Worten</li>
                                                         <li class="mb-3">Öffnungszeiten</li>
                                                         <li class="mb-3">Massgeschneiderte Offertenformular für Dein Business</li>
                                                         <li class="mb-3">Jobs Ausschreibungen</li>
                                                         <li class="mb-3">Freischaltung: sofort</li>
                                                         <li class="mb-3">Änderungen / Korrektur vom Firmenprofil durch Lookon</li>
                                                         <li class="mb-3">Keine widerkehrende Kosten</li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <p class="mt-4">Nach dem Eintrag kannst du dein Unternehmen mit weiteren Informationen ausfüllen.</p>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox form-check mb-3">
                                                <input id="agb" type="checkbox" name="agb" class="form-check-input mt-1 required">
                                                <label class="form-check-label" for="agb">Ich habe die <a href='https://lookon.ch/pages/datenschutzerklarung' target='_blank'>Datenschutzbedingungen</a> und die <a href='https://lookon.ch/pages/allgemeine-geschaftsbedingungen' target='_blank'>AGB</a> gelesen und bin damit einverstanden.</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox form-check mb-3">
                                                <input id="newsletter" type="checkbox" name="newsletter" class="form-check-input mt-1 required" value="Yes">
                                                <label class="form-check-label" for="newsletter">Ich möchte gerne den Newsletter abonnieren.</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php include 'footer-link.php'; ?>
   <script>
      // steps js start
      var form = $("#steps-form");
      form.steps({
         headerTag: "h6",
         bodyTag: "section",
         transitionEffect: "fade",
         titleTemplate: '<span class="step">#index#</span> #title#',
         // enableCancelButton: true,
         startIndex: 0,
         pagination: false,
         labels: {
            cancel: "Cancel",
            finish: "Verify",
            next: "Continue",
            previous: "Cancel",
            loading: "Loading ..."
         },
      });

      // steps js end
   </script>
</body>

</html>