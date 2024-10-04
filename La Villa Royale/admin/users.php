<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Customer</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-dark">

    <?php require('inc/header.php');?>
    
    <!-- Admin Dashboard Content (Body) -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4" style="color:#e6be8a;">CUSTOMER SECTION</h3>

                <!-- Customers Table-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">

                        <!--<div class="text-end mb-4">
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Type to search...">
                        </div>-->

                        <div class="table-responsive">
                            <table class="table table-hover text-center border-top" style="background-color:#56514a; min-width:1300px;">
                                <thead style="color:#e6be8a;">
                                    <tr class="bg-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date of Reg</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data" style="color:#d4bea2;">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require('inc/scripts.php');?>
    <script src="scripts/users.js"></script>

</body>
</html>