<?php
    require('inc/essentials.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-dark">

    <?php require('inc/header.php');?>
    
    <!-- Admin Dashboard Content (Body) -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4" style="color:#e6be8a;">SETTINGS</h3>

                <!-- General Settings Section-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0" style="color:#e6be8a;">General Settings</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn shadow-none btn-sm" style="background-color:#e6be8a;" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square" style="background-color:#e6be8a;"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">Site Title</h6>
                        <p class="card-text text-secondary" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">About us</h6>
                        <p class="card-text text-secondary" id="site_about"></p>
                    </div>
                </div>

                <!-- General Settings Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#e6be8a;">
                                    <h5 class="modal-title" style="color:#353839;">General Setting</h5>
                                </div>
                                <div class="modal-body" style="background-color:#353839;">
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label" style="color:#e6be8a;">Site Title *</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" style="color:#e6be8a;">About us *</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer" style="background-color:#353839;">
                                    <button type="button" onclick="site_title.value=general_data.site_title, site_about.value=general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-dark shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Shutdown Section-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0" style="color:#e6be8a;">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text text-secondary" id="site_about">
                            No customers will be allowed to book hotel rooms when shutdown mode is turned on.
                        </p>
                    </div>
                </div>

                <!-- Contact Details section-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0" style="color:#e6be8a;">Contacts Settings</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn shadow-none btn-sm" style="background-color:#e6be8a;" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square" style="background-color:#e6be8a;"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">Address</h6>
                                    <p class="card-text text-secondary" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">Google Map</h6>
                                    <p class="card-text text-secondary" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">Phone Numbers</h6>
                                    <p class="card-text text-secondary mb-1">
                                        <i class="bi bi-telephone-fill" style="color:#d4bea2;"></i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text text-secondary">
                                        <i class="bi bi-telephone-fill" style="color:#d4bea2;"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">Email</h6>
                                    <p class="card-text text-secondary" id="email"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">Social Links</h6>
                                    <p class="card-text text-secondary mb-1">
                                        <i class="bi bi-facebook me-1" style="color:#d4bea2;"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text text-secondary mb-1">
                                        <i class="bi bi-instagram me-1" style="color:#d4bea2;"></i>
                                        <span id="insta"></span>
                                    </p>
                                    <p class="card-text text-secondary">
                                        <i class="bi bi-twitter-x me-1" style="color:#d4bea2;"></i>
                                        <span id="tw"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold" style="color:#d4bea2;">iFrame</h6>
                                    <iframe id="iframe" class="border border-secondary p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Details Modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#e6be8a;">
                                    <h5 class="modal-title" style="color:#353839;">Contacts Setting</h5>
                                </div>
                                <div class="modal-body" style="background-color:#353839;">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#e6be8a;">Address *</label>
                                                    <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#e6be8a;">Google Map Link *</label>
                                                    <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#e6be8a;">Phone Numbers (with country code)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="background-color:#353839;"><i class="bi bi-telephone-fill" style="color:#d4bea2;">*</i></span>
                                                        <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="background-color:#353839;"><i class="bi bi-telephone-fill" style="color:#d4bea2;"></i></span>
                                                        <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#e6be8a;">Email *</label>
                                                    <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#e6be8a;">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="background-color:#353839;"><i class="bi bi-facebook me-1" style="color:#d4bea2;">*</i></span>
                                                        <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="background-color:#353839;"><i class="bi bi-instagram me-1" style="color:#d4bea2;">*</i></span>
                                                        <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="background-color:#353839;"><i class="bi bi-twitter-x me-1" style="color:#d4bea2;"></i></span>
                                                        <input type="text" name="tw" id="tw_inp" class="form-control shadow-none">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color:#e6be8a;">iFrame Src *</label>
                                                    <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="background-color:#353839;">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-dark shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Management Team Section-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0" style="color:#e6be8a;">Management Team</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn shadow-none btn-sm" style="background-color:#e6be8a;" data-bs-toggle="modal" data-bs-target="#team-s">
                                <i class="bi bi-plus-square-fill" style="background-color:#e6be8a;"></i> Add
                            </button>
                        </div>

                        <div class="row" id="team-data"></div>
                    </div>
                </div>

                <!-- Management Team Modal -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#e6be8a;">
                                    <h5 class="modal-title" style="color:#353839;">Add Team Member</h5>
                                </div>
                                <div class="modal-body" style="background-color:#353839;">
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label" style="color:#e6be8a;">Full Name *</label>
                                        <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" style="color:#e6be8a;">Picture *</label>
                                        <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
                                    </div>
                                </div>
                                <div class="modal-footer" style="background-color:#353839;">
                                    <button type="button" onclick="member_name.value='', member_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-dark shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php');?>
    <script src="scripts/settings.js"></script>
</body>
</html>