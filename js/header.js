let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
// console.log("hearder",userName)
document.getElementById('username').textContent += userName.username; 


function logout(){
    let userName = sessionStorage.getItem("IS_VALID");
    console.log(userName);
    sessionStorage.clear();
    window.location.href = "login.php";
  }