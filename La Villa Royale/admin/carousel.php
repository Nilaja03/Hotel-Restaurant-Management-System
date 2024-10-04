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
    <title>Admin Panel - Carousel</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-dark">

    <?php require('inc/header.php');?>
    
    <!-- Admin Dashboard Content (Body) -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4" style="color:#e6be8a;">CAROUSEL</h3>

                <!-- Carousel Section-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0" style="color:#e6be8a;">Images for home page of La Villa Royale</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn shadow-none btn-sm" style="background-color:#e6be8a;" data-bs-toggle="modal" data-bs-target="#carousel-s">
                                <i class="bi bi-plus-square-fill" style="background-color:#e6be8a;"></i> Add
                            </button>
                        </div>

                        <div class="row" id="carousel-data"></div>
                    </div>
                </div>

                <!-- Carousel Modal -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_s_form">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#e6be8a;">
                                    <h5 class="modal-title" style="color:#353839;">Add Image</h5>
                                </div>
                                <div class="modal-body" style="background-color:#353839;">
                                    <div class="mb-3">
                                        <label class="form-label" style="color:#e6be8a;">Picture *</label>
                                        <input type="file" name="carousel_picture" id="carousel_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
                                    </div>
                                </div>
                                <div class="modal-footer" style="background-color:#353839;">
                                    <button type="button" onclick="carousel_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
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
    <script src="scripts/carousel.js"></script>
</body>
</html>