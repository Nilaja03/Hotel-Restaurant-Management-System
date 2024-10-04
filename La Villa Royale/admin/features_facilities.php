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
    <title>Admin Panel - Features & Facilities</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-dark">

    <?php require('inc/header.php');?>
    
    <!-- Admin Dashboard Content (Body) -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4" style="color:#e6be8a;">FEATURES & FACILITIES</h3>

                <!-- Feature Table-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0" style="color:#e6be8a;">Features</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn shadow-none btn-sm" style="background-color:#e6be8a;" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square-fill" style="background-color:#e6be8a;"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border-top" style="background-color:#56514a;">
                                <thead style="color:#e6be8a;">
                                    <tr class="bg-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">Feature Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data" style="color:#d4bea2;">
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Facilities Table-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0" style="color:#e6be8a;">Facilities</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn shadow-none btn-sm" style="background-color:#e6be8a;" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square-fill" style="background-color:#e6be8a;"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border-top" style="background-color:#56514a;">
                                <thead style="color:#e6be8a;">
                                    <tr class="bg-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Facility Name</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data" style="color:#d4bea2;">
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Feature Modal -->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#e6be8a;">
                        <h5 class="modal-title" style="color:#353839;">Add Feature</h5>
                    </div>
                    <div class="modal-body" style="background-color:#353839;">
                        <div class="col-md-12 ps-0 mb-3">
                            <label class="form-label" style="color:#e6be8a;">Feature Name *</label>
                            <input type="text" name="feature_name" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color:#353839;">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-dark shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Facilities Modal -->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facility_s_form">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#e6be8a;">
                        <h5 class="modal-title" style="color:#353839;">Add Facility</h5>
                    </div>
                    <div class="modal-body" style="background-color:#353839;">
                        <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label" style="color:#e6be8a;">Facilitiy Name *</label>
                            <input type="text" name="facility_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="color:#e6be8a;">Icon *</label>
                            <input type="file" name="facility_icon" accept=".svg" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="color:#e6be8a;">Description *</label>
                            <textarea name="facility_desc" class="form-control shadow-none" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color:#353839;">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-dark shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php require('inc/scripts.php');?>
    <script src="scripts/features_facilities.js"></script>

</body>
</html>