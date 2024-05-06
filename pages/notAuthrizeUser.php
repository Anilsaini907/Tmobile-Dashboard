<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Dashboard</title>
    <link rel="title icon" href="images/title-img.png">
    <!-- custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Include Highcharts CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.2.2/css/highcharts.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

</head>

<body>
    <!-- navbar -->
    <?php include '../inc/sidebar.php'; ?>
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
              <div class="card card-common" >
                <div class="card-body">
                <h5 class="card-title">Unauthorized Access</h5>
    <p class="card-text">You are not authorized to view this page.</p>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end of filter cards -->
  
    <!-- footer -->
    <!-- <footer class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto ">
                    <div class="row border-top pt-3">
                        <div class="col-lg-6 text-center">
                            <p>&copy; 2024 Copyright am-docs <span class="text-success"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
    <!-- end of footer -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Include Highcharts JS -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- Include Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Include data tables js -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
 
  

</body>

</html>