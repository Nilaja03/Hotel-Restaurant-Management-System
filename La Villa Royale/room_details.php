<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Including Links -->
    <?php require('inc/links.php');?>
    <title><?php echo $settings_r['site_title']?> - Room Details</title>

    <!-- Style codes-->
    <style>
        .card:hover{
            border-top-color: var(--gold) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
    
</head>


<body class="bg-dark">
    
    <!-- Including Header -->
    <?php require('inc/header.php');?>

    <?php
        if(!isset($_GET['id']))
        {
            redirect('rooms.php');
        }
        $data = filteration($_GET);
        $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');
        
        if(mysqli_num_rows($room_res)==0)
        {
            redirect('rooms.php');
        }

        $room_data = mysqli_fetch_assoc($room_res);
    ?>

    <!-- Filter Section and Rooms card-->
    <div class="container">
        <div class="row">

            <!-- Rooms Page Description -->
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold" style="color:#e6be8a;"><?php echo $room_data['name']?></h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            //get thumbnail of image
                            $room_img = ROOMS_IMG_PATH."thumbnail.jpg";
                            $img_q = mysqli_query($con,"SELECT * FROM `room_images` 
                                                        WHERE `room_id`='$room_data[id]'");
                            if(mysqli_num_rows($img_q)>0)
                            {
                                $active_class = 'active';
                                while($img_res = mysqli_fetch_assoc($img_q))
                                {
                                    echo"
                                        <div class='carousel-item $active_class'>
                                            <img src='".ROOMS_IMG_PATH.$img_res['image']."' class='d-block w-100 rounded'>
                                        </div>
                                    ";
                                    $active_class='';
                                }
                                
                                
                            }
                            else
                            {
                                echo "
                                    <div class='carousel-item active'>
                                        <img src='$room_img' class='d-block w-100'>
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card bg-dark mb-4 border-top border-4 border-dark rounded shadow">
                    <div class="card-body">
                        <?php

                            echo<<<price
                                <h4 class="mb-4" style="color: #d4bea2;">₹$room_data[price] per night</h4>
                            price;

                            echo<<<rating
                                <div class="rating mb-3">
                                    <i class="bi bi-star-fill text-light"></i>
                                    <i class="bi bi-star-fill text-light"></i>
                                    <i class="bi bi-star-fill text-light"></i>
                                    <i class="bi bi-star-fill text-light"></i>
                                    <i class="bi bi-star-fill text-light"></i>
                                </div>
                            rating;

                            //get features of room
                            $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                                                        INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                                                        WHERE rfea.room_id = '$room_data[id]'");
                            $features_data = "";
                            while($fea_row = mysqli_fetch_assoc($fea_q))
                            {
                                $features_data .="<span class='badge rounded-pill bg-secondary text-wrap me-1 mb-1' style='color:#000000;'>$fea_row[name]</span>";
                            }
                            echo<<<features
                                <div class="features mb-3">
                                    <h6 class="mb-1" style="color:#d4bea2;">Features</h6>
                                    $features_data
                                </div>
                            features;

                            //get facilities of room
                            $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                                                        INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                                                        WHERE rfac.room_id = '$room_data[id]'");
                            $facilities_data = "";
                            while($fac_row = mysqli_fetch_assoc($fac_q))
                            {
                            $facilities_data .="<span class='badge rounded-pill bg-secondary text-wrap me-1 mb-1' style='color:#000000;'>$fac_row[name]</span>";
                            }
                            echo<<<facilities
                                <div class="facilities mb-3">
                                    <h6 class="mb-1" style="color:#d4bea2;">Facilities</h6>
                                    $facilities_data
                                </div>
                            facilities;

                            echo<<<guests
                                <div class="mb-3">
                                    <h6 class="mb-1" style="color:#d4bea2;">Guests</h6>
                                    <span class="badge rounded-pill bg-secondary text-wrap" style="color:#000000;">
                                        $room_data[adult] Adults
                                    </span>
                                    <span class="badge rounded-pill bg-secondary text-wrap" style="color:#000000;">
                                        $room_data[children] Children
                                    </span>
                                </div>
                            guests;

                            echo<<<area
                                <div class="mb-3">
                                    <h6 class="mb-1" style="color:#d4bea2;">Area</h6>
                                    <span class='badge rounded-pill bg-secondary text-wrap me-1 mb-1' style='color:#000000;'>
                                        $room_data[area] sq. ft.
                                    </span>
                                </div>
                            area;

                        if(!$settings_r['shutdown'])
                        {
                            $login=0;
                            if(isset($_SESSION['login']) && $_SESSION['login']==true)
                            {
                                $login=1;
                            }
                            echo<<<book
                                <button onclick='checkLoginToBook($login,$room_data[id])' class="btn w-100 text-dark custom-bg shadow-none mb-1">Book Now</button>
                            book;
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 px-4">
                <div class="mb-5">
                    <h5 style="color:#e6be8a;">Description</h5>
                    <p style="color:#d4bea2;">
                        <?php echo $room_data['description']?>
                    </p>
                </div>

                <div class="rewiew-rating">
                    <h5 class="mb-3" style="color:#e6be8a;">Reviews & Ratings</h5>
                    <div class="d-flex align-items-center mb-2">
                        <img src="LVRimages/features/wifi.svg" width="30px">
                        <h6 class="m-0 ms-2" style="color:#e6be8a;">Random User1</h6>
                    </div>
                    <p style="color:#88959c;">
                        Indulging in the opulent embrace of this luxury hotel was like stepping into a realm of unparalleled elegance
                        and refinement. From the lavish accommodations to the impeccable service, every moment was a symphony of 
                        comfort and sophistication, leaving an indelible mark of luxury etched in memory.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-light"></i>
                        <i class="bi bi-star-fill text-light"></i>
                        <i class="bi bi-star-fill text-light"></i>
                        <i class="bi bi-star-fill text-light"></i>
                        <i class="bi bi-star-fill text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Including Footer -->
    <?php require('inc/footer.php');?>
    
</body>
</html>