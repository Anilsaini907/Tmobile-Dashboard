
console.log("login")
function login() {
    var apiUrl = "http://localhost/demo/rest_api";
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var dataJson = JSON.stringify({
      "p_username": username,
      "p_password": password
    });
    if (username == "" || password == "") {
      alert("Please enter username and password");
      return false;
    } else {
      //console.log("Login",username,password);
      $.ajax({
        type: 'POST',
        url: `${apiUrl}/login.php`,
        data: dataJson,
        success: function(response) {
          console.log(response);
          if (response.data[0]['NULL'] === null) {
            document.getElementById('loginFailureMessage').style.display = 'block';
            setTimeout(function() {
              document.getElementById('loginFailureMessage').style.display = 'none';
              window.location.href = "login.php";
            }, 2000);
          }
          else if(response.data[0]) {
            sessionStorage.setItem("IS_VALID", JSON.stringify(response.data[0]));
            document.getElementById('loginSuccessMessage').style.display = 'block';
            setTimeout(function() {
              window.location.href = "index.php";
              document.getElementById('loginSuccessMessage').style.display = 'none';
            }, 2000);

          }
          

        }
      });
    }


  }