<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="title icon" href="images/title-img.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
  </script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <!-- Include Highcharts CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.2.2/css/highcharts.min.css">

  <link rel="stylesheet" href="css/style.css">
  <title>Admin Dashboard</title>

  <style>
    .error-msg {
    width: 100%;
    font-family: 'nobelregular';
    color: #ff0002;
    display: none;
}
  </style>
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

  <!-- profile-->
  <section>
    <div class="container-fluid">
      <div class="row mb-5 pt-md-5 mt-md-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="card card-common">
            <div class="card-header d-flex justify-content-between">
              <h3 class="text-muted text-center mb-3">User Profile</h3>
              <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal" onclick="updateAddvalue()">
                Add user
              </button> -->
            </div>
            <div class="row align-items-center card-body">
              <div class="error-msg"></div>
             
              <form style="width: 50%;margin:0 auto;" id="profileForm">

                <!-- <div class="alert alert-danger" id="oldFailureMessage" style="display: none;">
                <h2>Old password does not matched</h2>
              </div> -->
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter name" disabled>
                </div>


                <div class="form-group">
                  <label for="oldPassword">Old Password</label>
                  <input type="password" class="form-control" id="oldPassword" placeholder="Old Password">
                  <input type="hidden" class="form-control" id="oldpasswordhidden" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group">
                  <label for="newPassword">New Password</label>
                  <input type="password" class="form-control" id="newPassword" placeholder="New Password">
                </div>
                <!-- <div class="form-group">
                  <label for="newPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="confirmPassword" placeholder="New Password">
                </div> -->
                <div class="form-group">
                  <label for="roleName">Role Name</label>
                  <select class="form-control" id="roleName" disabled>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                    <!-- Add more options as needed -->
                  </select>
                </div>
                <button  type="submit" class="btn btn-primary btn-lg">Update</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end profile-->


  <!-- footer -->
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row border-top pt-3">
            <div class="col-lg-6 text-center">
              <p>&copy; 2024 Copyright.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end of footer -->


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <!-- Include Highcharts JS -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!-- Include Bootstrap Datepicker JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>


    function GetUserProfileData() {
      let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
      var userid = userName.id;
      var apiUrl = "http://localhost/demo/rest_api";
      $.ajax({
        type: 'GET',
        url: `${apiUrl}/profile.php?p_DataRequest=get&p_id=${userid}`,
        success: function(response) {
          console.log("response", response.data[0]);
          if (response.status === "true") {
            document.getElementById("name").value = response.data[0].username;
            document.getElementById("roleName").value = response.data[0].role_id;
            document.getElementById("oldpasswordhidden").value = response.data[0].password;
          };
        }
      });
    }


    $('#profileForm').submit(function(event) {
        event.preventDefault();
      var oldPassword = document.getElementById("oldPassword").value;
      var oldPasswordhidden = document.getElementById("oldpasswordhidden").value;
      console.log("out",oldPassword, oldPasswordhidden);
      if (oldPassword != oldPasswordhidden) {
        console.log("if",oldPassword, oldPasswordhidden);
        $(".error-msg").html("Old password does not matched").show();
      }
      else {
        console.log("else",oldPassword, oldPasswordhidden);
        $(".error-msg").html("").hide();
        updateprofile();}
      });

    function updateprofile() {
      let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
      var id = userName.id;
      var password = document.getElementById("newPassword").value;
      var apiUrl = "http://localhost/demo/rest_api";
      var dataJson = JSON.stringify({
        data_request: "updateProfile",
        id: id,
        username: '',
        password: password,
        role_id: ''
      });

      $.ajax({
        type: 'POST',
        url: `${apiUrl}/profile.php`,
        data: dataJson,
        success: function(response) {
          console.log("response", response);
          if (response.status === "true") {
            $('#profileForm')[0].reset();

            GetUserProfileData();
            alert("Your Password has been updated");
          };
        }
      });
    }

    $(document).ready(function() {
      GetUserProfileData();
    });

    function logout(){
      let userName = sessionStorage.getItem("IS_VALID");
      console.log(userName);
      sessionStorage.clear();
      window.location.href = "login.php";
    }
  </script>

</body>

</html>