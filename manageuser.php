


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

    <!-- Delete user modal -->
    <div class="modal fade" id="deleteuser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure Want to Delete?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press delete button to Remove user
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button id="deleteBtn" type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->

    <!-- Add/Edit user modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Change Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="useremail" placeholder="Enter username" required>
                        </div>
                        <div class="form-group" id="passwordDiv">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="addBtn" type="button" class="btn btn-success" onclick="addUser()">Add user</button>
                    <button id="editBtn" type="button" class="btn btn-success" onclick="editUser()">Edit Role</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->


    <!-- update password user modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Change password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" disabled id="updatepassuseremail" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="updatepassword" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="updatepassrole" disabled>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="editBtnpass" type="button" class="btn btn-success" onclick="updatePassUser()">Update Pass</button>

                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->

    <!-- tables -->
    <section>
        <div class="container-fluid">
            <div class="row mb-5 pt-md-5 mt-md-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="card card-common">
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="text-muted text-center mb-3">User Management</h6>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal" onclick="updateAddvalue()">
                                Add user
                            </button>
                        </div>
                        <div class="row align-items-center card-body">
                            <div class="col-xl-12 col-md-8 table-responsive">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>User Name</th>
                                            <!-- <th>Role id</th> -->
                                            <th>Role Name</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table rows will be dynamically added here -->
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
    <script src="js/manageuser.js"></script>
</body>