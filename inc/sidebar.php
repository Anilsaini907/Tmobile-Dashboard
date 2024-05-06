


<nav class="navbar navbar-expand-md navbar-light">
  <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="myNavbar">
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar -->
        <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
          <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">
            <img id="companylogo" src="" width="60" class="rounded-circle mr-3"></a>
          <div class="bottom-border pb-3">
            <img id="userimage" src="" width="50" class="rounded-circle mr-3">
            <a href="#" class="text-white">Anil saini</a>
          </div>
          <ul class="navbar-nav flex-column mt-4" id="myList">
            <li class="nav-item"><a href="http://localhost/demo/index.php" class="nav-link text-white p-3 mb-2 "><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
            <li class="nav-item" id="userManagement"><a href="http://localhost/demo/manageuser.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i>User Management</a></li>
            <li class="nav-item"><a href="http://localhost/demo/profile.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>Profile</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i>Settings</a></li>

          </ul>
        </div>
        <!-- end of sidebar -->

        <!-- top-nav -->
        <?php include 'header.php'; ?>
        <!-- end of top-nav -->
      </div>
    </div>
  </div>
</nav>
<!-- <script id="myScriptprofile" src="../js/sidebar.js"></script> -->
<script>

const url = window.location.href;
const lastSegment = url.substring(url.lastIndexOf('/') + 1);

if(lastSegment==="index.php" || lastSegment==="manageuser.php" || lastSegment==="profile.php" ){
const companylogo = document.getElementById("companylogo");
companylogo.src = "images/amdoc.jpg";
const userimage = document.getElementById("userimage");
userimage.src = "images/admin.jpg";
}
else{
const companylogo = document.getElementById("companylogo");
companylogo.src = "../images/amdoc.jpg";
const userimage = document.getElementById("userimage");
userimage.src = "../images/admin.jpg";

}
  var userManagement = document.getElementById("userManagement");
  let userStore = JSON.parse(sessionStorage.getItem("IS_VALID"));
  if (userStore.role_name === "admin") {
    userManagement.style.display = "block";
  } else {
    userManagement.style.display = "none";
  }

addClassBasedOnURLMatch();
function addClassBasedOnURLMatch() {
  // console.log("addClassBasedOnURLMatch");
const url = window.location.href;
const lastSegment = url;
//url.substring(url.lastIndexOf('/') + 1);

const links = document.querySelectorAll('#myList li a');
 Array.from(links).map(link =>{
  if(lastSegment===link.getAttribute('href')){
    console.log("link",lastSegment,link.getAttribute('href'));
    link.classList.add('current');
  }});
}

function logout(){
      let userName = sessionStorage.getItem("IS_VALID");
      console.log(userName);
      sessionStorage.clear();
      window.location.href = "login.php";
    }

</script>