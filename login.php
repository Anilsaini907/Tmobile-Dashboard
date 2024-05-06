<! DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title> Admin Login </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
  </head>
     
  <body>
    <div class="pt-5">
      <div class="alert alert-success" id="loginSuccessMessage" style="display: none;">
        <h2>Login Successful!</h2>
      </div>
      <div class="alert alert-danger" id="loginFailureMessage" style="display: none;">
        <h2>Login Failed. Please try again.</h2>
      </div>
      <h1 class="text-center"> Admin Login </h1>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-8 col-xs-10 mx-auto">
            <div class="card card-body">
              <div class="form-group required">
                <label for="username">UserName/Email </label>
                <input type="text" class="form-control text-lowercase" id="username" required="" name="username" value="">
              </div>
              <div class="form-group required">
                <label class="d-flex flex-row align-items-center" for="password">Password
                  <a class="ml-auto border-link small-xl" href="#"> Forget Password? </a> </label>
                <input type="password" class="form-control" required="" id="password" name="password" value="">
              </div>
              <div class="form-group pt-1">
                <a href="javascript:void(0);"> <button class="btn btn-primary btn-block" onClick="login()"> Log In </button> </a>
              </div>

              <p class="small-xl pt-3 text-center">
                <a><span class="text-muted"> Not a member? </span></a>
                <a href="#"> Sign up </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/login.js"></script>
  </body>

  </html>