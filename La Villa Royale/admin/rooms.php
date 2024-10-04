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
    <title>Admin Panel - Rooms</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-dark">

    <?php require('inc/header.php');?>
    
    <!-- Admin Dashboard Content (Body) -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4" style="color:#e6be8a;">ROOMS</h3>

                <!-- Rooms Table-->
                <div class="card border-3 border-secondary shadow rounded mb-4">
                    <div class="card-body bg-dark">

                        <div class="text-end mb-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn shadow-none btn-sm" style="background-color:#e6be8a;" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square-fill" style="background-color:#e6be8a;"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover text-center border-top" style="background-color:#56514a;">
                                <thead style="color:#e6be8a;">
                                    <tr class="bg-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">Room Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data" style="color:#d4bea2;">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Room Modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#e6be8a;">
                        <h5 class="modal-title" style="color:#353839;">Add Room</h5>
                    </div>
                    <div class="modal-body" style="background-color:#353839;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Name *</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Area *</label>
                                <input type="number" name="area" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Price *</label>
                                <input type="number" name="price" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Quantity *</label>
                                <input type="number" name="quantity" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Max. number of Adults *</label>
                                <input type="number" name="adult" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Max. number of Children *</label>
                                <input type="number" name="children" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Features</label>
                                <div class="row" style="color:#d4bea2;">
                                    <?php
                                        $res = selectAll('features');
                                        while($opt = mysqli_fetch_assoc($res))
                                        {
                                            echo"
                                                <div class='col-md-3 mb-1'>
                                                    <label>
                                                        <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                        $opt[name]
                                                    </label>
                                                </div>

                                            ";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Facilities</label>
                                <div class="row" style="color:#d4bea2;">
                                    <?php
                                        $res = selectAll('facilities');
                                        while($opt = mysqli_fetch_assoc($res))
                                        {
                                            echo"
                                                <div class='col-md-3 mb-1'>
                                                    <label>
                                                        <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                        $opt[name]
                                                    </label>
                                                </div>
                                            ";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Description *</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
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
    

    <!--Edit Room Modal -->
    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#e6be8a;">
                        <h5 class="modal-title" style="color:#353839;">Edit Room</h5>
                    </div>
                    <div class="modal-body" style="background-color:#353839;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Name *</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Area *</label>
                                <input type="number" name="area" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Price *</label>
                                <input type="number" name="price" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Room Quantity *</label>
                                <input type="number" name="quantity" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Max. number of Adults *</label>
                                <input type="number" name="adult" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Max. number of Children *</label>
                                <input type="number" name="children" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Features</label>
                                <div class="row" style="color:#d4bea2;">
                                    <?php
                                        $res = selectAll('features');
                                        while($opt = mysqli_fetch_assoc($res))
                                        {
                                            echo"
                                                <div class='col-md-3 mb-1'>
                                                    <label>
                                                        <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                        $opt[name]
                                                    </label>
                                                </div>
                                            ";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Facilities</label>
                                <div class="row" style="color:#d4bea2;">
                                    <?php
                                        $res = selectAll('facilities');
                                        while($opt = mysqli_fetch_assoc($res))
                                        {
                                            echo"
                                                <div class='col-md-3 mb-1'>
                                                    <label>
                                                        <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                        $opt[name]
                                                    </label>
                                                </div>

                                            ";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Description *</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                            <input type="hidden" name="room_id">
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

    <!-- Manage room images modal-->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header" style="background-color:#e6be8a;">
                <h5 class="modal-title">Room Name *</h5>
                <button type="button" required class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color:#353839;">
                <div id="image-alert"></div>
                <div class="border-bottom border-3 pb-3 mb-3">
                    <form id="add_image_form">
                        <label class="form-label" style="color:#e6be8a;">Add Image *</label>
                        <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                        <button class="btn custom-bg text-dark shadow-none">ADD</button>
                        <input type="hidden" name="room_id">
                    </form>
                </div>
                <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                    <table class="table table-hover text-center border-top" style="background-color:#56514a;">
                        <thead style="color:#e6be8a;">
                            <tr class="bg-dark sticky-top">
                                <th scope="col" widtg="60%">Image</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="room-image-data" style="color:#d4bea2;">
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php');?>
    <script src="scripts/rooms.js"></script>

</body>
</html>