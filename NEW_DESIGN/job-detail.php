<?php ?>
<!DOCTYPE html>
<html>

<head>
  <?php include('header-link.php');
  $currentPage = 'job-detail'; ?>
</head>

<body>
  <?php include 'header.php'; ?>
  <main>
    <section class="d-flex align-items-center job-detail">
      <div class="container-fluid container-xl">
        <h1 class="lg-font font-semibold mb-4">Full stack developer</h1>
        <div class="row">
          <div class="col-md-7 position-sticky top-0">
            <div class="card mb-4">
              <div class="card-body box white job-list d-flex flex-column">

                <div class="row">
                  <div class="col-xl-12">
                    <h2 class="s-font">Job Brief</h2>
                    <p>
                      Bewirb dich jetzt als Automatiker. Nur 1x bewerben und wir finden den passenden Job für dich in Basel. Dank unserem Netzwerk mit über 1'000 Firmen und unseren Personalberatern, die persönlich auf dich eingehen, erhöht sich bei Kollabo deine Chance auf die ideale Stelle. Melde dich jetzt kostenlos an.
                    </p>
                  </div>
                  <div class="col-xl-12 d-flex flex-column">
                    <div class="row tags pt-2">
                      <p class="col-auto mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_map_pin"></use>
                        </svg> Villars-sur-Glâne, 1752
                      </p>
                      <p class="col-auto mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_building"></use>
                        </svg>
                        IT & Network Administration
                      </p>
                      <p class="col-auto mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_briefcase"></use>
                        </svg>
                        Full Time
                      </p>
                      <p class="col-auto mb-2">
                        <svg class="icon-20 me-1 gray-clr">
                          <use xlink:href="#ic_bookmark"></use>
                        </svg>
                        Intermediate
                      </p>
                    </div>
                    <div class="chips d-flex align-items-center flex-wrap mt-auto mb-2">
                      <span class="em-chip">Management</span>
                      <span class="em-chip">Admin &amp; Clerical</span>
                    </div>
                    <div>
                      <h4 class="s-font mt-4"> Key responsibilities will include:</h4>
                      <ul class="style-icon list-unstyled">
                        <li>Manage a portfolio of accounts to achieve long-term success</li>
                        <li>Develop positive relationships with clients</li>
                        <li>Act as the point of contact and handle customers’ individual needs</li>
                        <li>Generate new business using existing and potential customer networks</li>
                        <li>Resolve conflicts and provide solutions to customers in a timely manner</li>
                        <li>Supervise account representatives to ensure sales increase</li>
                        <li>Report on the status of accounts and transactions</li>
                        <li>Set and track sales account targets, aligned with company objectives</li>
                        <li>Monitor sales metrics (e.g. quarterly sales results and annual forecasts)</li>
                        <li>Suggest actions to improve sales performance and identify opportunities for growth</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card mb-4">
              <div class="card-header bg-white">
                <h5 class="s-font mb-0 ">
                  Apply for this position
                </h5>
              </div>
              <div class="card-body pt-0">
                <div class="form-body">
                  <div class="row">
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control email" />
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="number" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label">Zip Code</label>
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label">Date</label>
                        <input type="text" class="form-control datepick" name="date">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label">Civil Status</label>
                        <input type="text" class="form-control" name="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="border-bottom mb-3 mt-2">
                        <h5 class="s-font mb-2">Upload Documents</h5>
                      </div>
                      <p class="gray-clr xs-font mb-3">Allowed Type(s): .pdf, .doc, .docx</p>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label me-2">Motivation letter</label>
                        <div class="position-relative form-file">
                          <label for="motivation-letter" class="form-control file-input text-truncate">
                            <span class="text-muted">Browse</span>
                          </label>
                          <input type="file" id="motivation-letter" accept="application/pdf, image/*" name="motivation_letter">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label me-2">CV</label>
                        <div class="position-relative form-file">
                          <label for="cv" class="form-control file-input text-truncate">
                            <span class="text-muted">Browse</span>
                          </label>
                          <input type="file" id="cv" accept="application/pdf, image/*" name="cv">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label me-2">Certificate of Employment</label>
                        <div class="position-relative form-file">
                          <label for="emp_cert" class="form-control file-input text-truncate">
                            <span class="text-muted">Browse</span>
                          </label>
                          <input type="file" id="emp_cert" accept="application/pdf, image/*" name="emp_cert">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label class="form-label me-2">Diplomas and Certificates</label>
                        <div class="position-relative form-file">
                          <label for="diploma_cert" class="form-control file-input text-truncate">
                            <span class="text-muted">Browse</span>
                          </label>
                          <input type="file" id="diploma_cert" accept="application/pdf, image/*" name="diploma_cert">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="form-label">Message</label>
                      <textarea name="message" id="message" rows="5" class="form-control" data-gramm="false" wt-ignore-input="true"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="tools" id="terms">
                        <label class="form-check-label" for="terms">
                          I have read the <a href="https://lookon.ch/pages/datenschutzerklarung" target="_blank" class="text-underline theme-hover">data protection</a> conditions and the <a href="https://lookon.ch/pages/allgemeine-geschaftsbedingungen" target="_blank" class="text-underline theme-hover">terms and conditions</a> and I agree.
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="btn btn-theme">Apply Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>
  <?php include 'footer.php'; ?>
  <?php include 'footer-link.php'; ?>
</body>

</html>