<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!-- Including Links -->
    <?php require('inc/links.php');?>
    <title><?php echo $settings_r['site_title']?> - Rooms</title>

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

    <!-- Rooms Page Description -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center" style="color:#e6be8a;">OUR ROOMS</h2>
        <div>
            <hr style="color:#e6be8a; width:150px; margin: 0 auto; height: 2.5px;">
            <p class="text-center mt-3" style="color:#d4bea2;">
            Experience unparalleled luxury and comfort in our meticulously designed rooms at La Villa Royale. Each of our elegantly 
            appointed accommodations offers a <br>sanctuary of tranquility, featuring plush furnishings, sumptuous bedding, and modern 
            amenities to ensure a restful stay. Choose from a variety of room types, from spacious <br>suites boasting panoramic city views 
            to intimate chambers exuding old-world charm. Whether you're traveling for business or leisure, our rooms provide the 
            <br>perfect retreat for relaxation and rejuvenation amidst the bustling cityscape.
            </p>
        </div>
    </div>

    <!-- Filter Section and Rooms card-->
    <div class="container">
        <div class="row">

            <!--<div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-dark rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2" style="color:#e6be8a;">Filter</h4>
                        <button style="background-color:#e6be8a;" class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border border-secondary bg-dark p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px; color:#e6be8a">Check Availability</h5>
                                <label class="form-label" style="color:#d4bea2;">Check-in:</label>
                                <input type="date" style="background-color: #e6be8a;" class="form-control shadow-none mb-3">
                                <label class="form-label" style="color:#d4bea2;">Check-out:</label>
                                <input type="date" style="background-color: #e6be8a;" class="form-control shadow-none">
                            </div>
                            <div class="border border-secondary bg-dark p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px; color:#e6be8a">Facilities</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" style="background-color: #e6be8a;" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1" style="color:#d4bea2;">Facility one:</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" style="background-color: #e6be8a;" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2" style="color:#d4bea2;">Facility two:</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" style="background-color: #e6be8a;" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3" style="color:#d4bea2;">Facility three:</label>
                                </div>
                            </div>
                            <div class="border border-secondary bg-dark p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px; color:#e6be8a">Guests</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label" style="color:#d4bea2;">Adults:</label>
                                        <input type="number" style="background-color: #e6be8a;" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-label" style="color:#d4bea2;">Children:</label>
                                        <input type="number" style="background-color: #e6be8a;" class="form-control shadow-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>-->

            <div class="col-lg-12 col-md-12 px-4">
                <?php
                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC",[1,0],'ii');
                    while($room_data = mysqli_fetch_assoc($room_res))
                    {
                        //get features of room
                        $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                                  INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                                  WHERE rfea.room_id = '$room_data[id]'");
                        
                        $features_data = "";
                        while($fea_row = mysqli_fetch_assoc($fea_q))
                        {
                            $features_data .="<span class='badge rounded-pill bg-secondary text-wrap me-1 mb-1' style='color:#000000;'>$fea_row[name]</span>";
                        }

                        //get facilities of room
                        $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                                                    INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                                                    WHERE rfac.room_id = '$room_data[id]'");
                        $facilities_data = "";
                        while($fac_row = mysqli_fetch_assoc($fac_q))
                        {
                            $facilities_data .="<span class='badge rounded-pill bg-secondary text-wrap me-1 mb-1' style='color:#000000;'>$fac_row[name]</span>";
                        }

                        //get thumbnail of image
                        $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                        $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                                                      WHERE `room_id`='$room_data[id]' 
                                                      AND `thumb`='1'");
                        if(mysqli_num_rows($thumb_q)>0)
                        {
                            $thumb_res = mysqli_fetch_assoc($thumb_q);
                            $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                        }

                        $book_btn = "";
                        if(!$settings_r['shutdown'])
                        {
                            $login=0;
                            if(isset($_SESSION['login']) && $_SESSION['login']==true)
                            {
                                $login=1;
                            }
                            $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm w-100 text-dark custom-bg shadow-none mb-2'>Book Now</button>";
                        }
                        //print room card
                        echo<<<data

                            <div class="card bg-dark mb-4 border-top border-4 border-dark rounded shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                        <img src="$room_thumb" class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                        <h5 class="mb-3" style="color:#e6be8a;">$room_data[name]</h5>
                                        <div class="features mb-3">
                                            <h6 class="mb-1" style="color:#d4bea2;">Features</h6>
                                            $features_data
                                        </div>
                                        <div class="facilities mb-3">
                                            <h6 class="mb-1" style="color:#d4bea2;">Facilities</h6>
                                            $facilities_data
                                        </div>
                                        <div class="guests">
                                            <h6 class="mb-1" style="color:#d4bea2;">Guests</h6>
                                            <span class="badge rounded-pill bg-secondary text-wrap" style="color:#000000;">
                                                $room_data[adult] Adults
                                            </span>
                                            <span class="badge rounded-pill bg-secondary text-wrap" style="color:#000000;">
                                                $room_data[children] Children
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                        <h6 class="mb-4" style="color: #d4bea2;">₹$room_data[price] per night</h6>
                                        $book_btn
                                        <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-secondary shadow-none" style="color:#e6be8a;">More Details</a>
                                    </div>
                                </div>
                            </div>

                        data;
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Including Footer -->
    <?php require('inc/footer.php');?>
    
</body>
</html>