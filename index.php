<?php include '../demo/commonHtml/head.php'; ?>
<!-- custom CSS -->
<link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- navbar -->
  <?php include 'inc/sidebar.php'; ?>
  <!-- end of navbar -->

  <!-- modal -->
  <div class="modal fade" id="sign-out">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Want to leave?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          Press logout to leave
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="logout()">Logout</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end of modal -->

  <!-- Filter cards -->
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto mt-auto">
          <div class="row pt-md-5 mt-md-5">
            <div class="col-xl-12 col-sm-6 p-2">
              <div class="card card-common" style="height: 80px;">
                <div class="card-body">
                  <form id="filterForm" style=" display: flex;flex-direction:  row;">
                    <div class="col-4 form-group" style=" display: flex;">
                      <label style="width:26%;margin-top:8px;" for="startDate">Start Date:</label>
                      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Select start date">
                    </div>
                    <div class="col-4 form-group" style=" display: flex;">
                      <label style="width:26%; margin-top:8px;" for="endDate">End Date:</label>
                      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="Select end date">
                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                    <div style="margin-left:10px;">
                      <button id="resetForm" type="submit" class="btn btn-primary">Reset</button>
                    </div>

                  </form>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end of filter cards -->
  <!-- cards -->
  <!-- <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row ">
            <div class="col-xl-3 col-sm-6 p-2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                    <div class="text-right text-secondary">
                      <h5>Sales</h5>
                      <h3>$135,000</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fas fa-sync mr-3"></i>
                  <span>Updated Now</span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                    <div class="text-right text-secondary">
                      <h5>Expenses</h5>
                      <h3>$39,000</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fas fa-sync mr-3"></i>
                  <span>Updated Now</span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <i class="fas fa-users fa-3x text-info"></i>
                    <div class="text-right text-secondary">
                      <h5>Users</h5>
                      <h3>15,000</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fas fa-sync mr-3"></i>
                  <span>Updated Now</span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <i class="fas fa-chart-line fa-3x text-danger"></i>
                    <div class="text-right text-secondary">
                      <h5>Visitors</h5>
                      <h3>45,000</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fas fa-sync mr-3"></i>
                  <span>Updated Now</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- end of cards -->

  <!-- chart -->
  <section>
    <div class="container-fluid">
      <div class="row ">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row align-items-center p-2">

            <div class="col-xl-6 col-12 mb-4 mb-xl-0">
              <div class="card card-common">
                <div class="card-header">
                  <h6 class="text-muted text-center mb-3">Total Usage for Each Technology</h6>
                </div>
                <div class="container card-body">
                  <div id="chartContainer" style="height: 400px;">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-12">
              <div class="card card-common">
                <div class="card-header">
                  <h6 class="text-muted text-center mb-3">Daily Technology Usage By Date</h6>
                </div>
                <div class="container card-body">
                  <div id="chartContainer1" style="height: 400px;">
                  </div>
                </div>
              </div>


            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end of chart -->

  <!-- tables -->
  <section>
    <div class="container-fluid">
      <div class="row mb-5 p-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">

          <div class="card card-common">
            <div class="card-header">
              <h6 class="text-muted text-center mb-3">Usage Table with TechNames</h6>
            </div>
            <div class="row align-items-center card-body">
              <div class="col-xl-12 col-md-8 table-responsive">
                <table id="dataTable" class="table display">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Tech Name</th>
                      <th>Total Usage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Table body will be populated dynamically -->
                  </tbody>
                </table>
              </div>

            </div>
          </div>


        </div>
      </div>
    </div>
  </section>
  <!-- end of tables -->

  <!-- footer -->
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row border-top pt-3">
            <div class="col-lg-6 text-center">
              <p>&copy; 2024 Copyright am-docs <span class="text-success"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end of footer -->
  <?php include '../demo/commonHtml/scriptCdn.php'; ?>
  <script src="js/index.js"></script>
</body>

</html>