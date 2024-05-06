function updateAddvalue(){
    const inputElement = document.getElementById("useremail");
    inputElement.disabled = false;
    passwordDiv.style.display = "block";
    addBtn.style.display = "block";
    editBtn.style.display = "none";
    document.getElementById("useremail").value="";
    document.getElementById("password").value="";
    }
    function addUser() {
        var username = document.getElementById("useremail").value;
        var password = document.getElementById("password").value;
        var selectElement = document.getElementById("role");
        var roleid = selectElement.value;

        var apiUrl = "http://localhost/demo/rest_api";
        var dataJson = JSON.stringify({
            data_request: "add",
            id: 0,
            username: username,
            password: password,
            role_id: roleid
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
                console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                };
            }
        });
    }

    function editUser() {
        var id = document.getElementById("editBtn").value;
        var username = document.getElementById("useremail").value;
        var password = document.getElementById("password").value;
        var selectElement = document.getElementById("role");
        var roleid = selectElement.value;
        // console.log("addUser", username, password,roleid);
        var apiUrl = "http://localhost/demo/rest_api";
        var dataJson = JSON.stringify({
            data_request: "update",
            id: id,
            username: username,
            password: password,
            role_id: roleid
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
                console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);

                };
            }
        });
    }

    function updatePassUser() {
        var id = document.getElementById("editBtnpass").value;
        var username = document.getElementById("updatepassuseremail").value;
        var password = document.getElementById("updatepassword").value;
        var selectElement = document.getElementById("updatepassrole");
        var roleid = selectElement.value;

        var apiUrl = "http://localhost/demo/rest_api";
        var dataJson = JSON.stringify({
            data_request: "updatePassword",
            id: id,
            username: username,
            password: password,
            role_id: roleid
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
                console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                };
            }
        });
    }


    function deleteUser() {
        var id = document.getElementById("deleteBtn").value;
        console.log("delete", id);
        var apiUrl = "http://localhost/demo/rest_api";
        var dataJson = JSON.stringify({
            data_request: "delete",
            id: id,
            username: '',
            password: '',
            role_id: ''
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
                console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                };
            }
        });
    }

    function checkAuthrization() {
        let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
        if (userName.role_name != "admin") {
            window.location.href = "pages/notAuthrizeUser.php";
        }
    }
    $(document).ready(function() {
        checkAuthrization();
       var buttonDisplayed = false;
       console.log("redy",buttonDisplayed);
        if (!buttonDisplayed) {
            addBtn.style.display = "inline-block";
            editBtn.style.display = "none";
        }

        var apiUrl = "http://localhost/demo/rest_api";

        $.ajax({
            type: 'GET',
            url: `${apiUrl}/manageuser.php`,
            success: function(response) {
                var data = response.data;
                //   console.log("response", data);
                var table = $('#example').DataTable();
                table.rows.add(data).draw();
            }
        });

        // Initialize DataTable
        var table = $('#example').DataTable({
            // Define column headers
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "username"
                },
                // { "data": "role_id" },
                {
                    "data": "role_name"
                },
                {
                    // Add actions buttons (edit and delete)
                    // "width": "400px",
                    "data": null,
                    "defaultContent": "<button class='edit btn btn-warning' data-toggle='modal' data-target='#loginModal' title='update role'><i class='fas fa-user'></i></button><button style='margin-left:10px;' class='editpass btn btn-warning' data-toggle='modal' data-target='#updateModal' title='update password'><i class='fas fa-unlock'></i></button><button style='margin-left:10px;' class='delete btn btn-danger' data-toggle='modal' data-target='#deleteuser' title='delete'><i class='fas fa-trash'></i></button>"
                }
            ]
        });

        // Add event listener for edit button
        $('#example tbody').on('click', '.edit', function() {
            buttonDisplayed = true;
            console.log("edit",buttonDisplayed);
            var data = table.row($(this).parents('tr')).data();
            document.getElementById("useremail").value = data.username;
            document.getElementById("password").value = data.password;
            document.getElementById("role").value = data.role_id;
            document.getElementById("editBtn").value = data.id;
            var addBtn = document.getElementById("addBtn");
            var editBtn = document.getElementById("editBtn");
            var passwordDiv = document.getElementById("passwordDiv");

            
            if (buttonDisplayed) {
                const inputElement = document.getElementById("useremail");
                inputElement.disabled = true;
                passwordDiv.style.display = "none";
                addBtn.style.display = "none";
                editBtn.style.display = "inline-block";
            }
          
        });
        // Add event listener for delete button
        $('#example tbody').on('click', '.delete', function() {
            var data = table.row($(this).parents('tr')).data();
            document.getElementById("deleteBtn").value = data.id;

        });
        $('#example tbody').on('click', '.editpass', function() {
            var data = table.row($(this).parents('tr')).data();
            document.getElementById("updatepassuseremail").value = data.username;
            document.getElementById("editBtnpass").value = data.id;

        });

    });

    function logout(){
        let userName = sessionStorage.getItem("IS_VALID");
        console.log(userName);
        sessionStorage.clear();
        window.location.href = "login.php";
      }