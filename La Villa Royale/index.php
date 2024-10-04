<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Including Links -->
    <?php require('inc/links.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <title><?php echo $settings_r['site_title']?> - Home</title>

    <style>
        .availability-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }
        @media screen and (max-width: 575px) {
            .availability-form{
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>


<body class="bg-dark">
    <!-- Including Header -->
    <?php require('inc/header.php');?>


    <!-- Carousel -->
    <div class="container-fluid px-lg-0 mt-2">
        <!-- Swiper -->
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                    $res = selectAll('carousel');
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $path = CAROUSEL_IMG_PATH;
                        echo <<<data
                            <div class="swiper-slide">
                                <img src="$path$row[image]" class="w-100 d-block">
                            </div>
                        data;
                    }
                ?>
            </div>
            <div class="swiper-button-next" style="color:#e6be8a;"></div>
            <div class="swiper-button-prev" style="color:#e6be8a;"></div>
        </div>
    </div>


    <!-- Check availability section
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-dark shadow p-4 rounded">
                <h5 class="mb-4" style="color:#e6be8a;">Check Booking Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="color:#e6be8a;">Check-in:</label>
                            <input type="date" style="background-color: #e6be8a;" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="color:#e6be8a;">Check-out:</label>
                            <input type="date" style="background-color: #e6be8a;" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="color:#e6be8a;">Adult:</label>
                            <select class="form-select shadow-none" style="background-color: #e6be8a;">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="color:#e6be8a;">Children:</label>
                            <select class="form-select shadow-none" style="background-color: #e6be8a;">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-dark shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>-->


    <!-- Our Rooms-->
    <h2 class="mt-3 pt-4 mb-4 text-center fw-bold h-font" style="color:#e6be8a;">OUR ROOMS</h2>
    <div class="container">
        <div class="row">

            <?php
                $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');
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
                        $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-dark custom-bg shadow-none'>Book Now</button>";
                    }
                    //print room card
                    echo<<<data

                        <div class="col-lg-4 col-md-6 my-3" style="color:#e6be8a;">
                            <div class="card bg-dark border-0 shadow" style="max-width: 350px; height:800px; margin: auto;">
                                <img src="$room_thumb" class="card-img-top">
                                <div class="card-body">
                                    <h5>$room_data[name]</h5>
                                    <h6 class="mb-4" style="color: #d4bea2;">₹$room_data[price] per night</h6>
                                    <div class="features mb-4">
                                        <h6 class="mb-1">Features</h6>
                                        $features_data
                                    </div>
                                    <div class="facilities mb-4">
                                        <h6 class="mb-1">Facilities</h6>
                                        $facilities_data
                                    </div>
                                    <div class="guests mb-4">
                                        <h6 class="mb-1">Guests</h6>
                                        <span class="badge rounded-pill bg-secondary text-wrap" style="color:#000000;">
                                            $room_data[adult] Adults
                                        </span>
                                        <span class="badge rounded-pill bg-secondary text-wrap" style="color:#000000;">
                                            $room_data[children] Children
                                        </span>
                                    </div>
                                    <div class="rating mb-4">
                                        <h6 class="mb-1">Rating</h6>
                                        <span class="badge rounded-pill bg-dark">
                                            <i class="bi bi-star-fill text-light"></i>
                                            <i class="bi bi-star-fill text-light"></i>
                                            <i class="bi bi-star-fill text-light"></i>
                                            <i class="bi bi-star-fill text-light"></i>
                                            <i class="bi bi-star-fill text-light"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-evenly mb-2">
                                        $book_btn<a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-secondary shadow-none" style="color:#e6be8a;">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    data;
                }
            ?>

            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-secondary rounded-0 fw-bold shadow-none" style="color:#e6be8a;">More Rooms >>></a>
            </div>
        </div>
    </div>


    <!-- Our Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" style="color:#e6be8a;">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">

            <?php
                $res = mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
                $path = FACILITIES_IMG_PATH;
                while($row = mysqli_fetch_assoc($res))
                {
                    echo<<<data
                        <div class="col-lg-2 col-md-2 text-center bg-dark rounded shadow py-4 my-3">
                            <img src="$path$row[icon]" width="80px">
                            <h5 class="mt-3" style="color:#e6be8a;">$row[name]</h5>
                        </div>
                    data;
                }
            ?>

            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-sm btn-outline-secondary rounded-0 fw-bold shadow-none" style="color:#e6be8a;">More Facilities >>></a>
            </div>
        </div>
    </div>


    <!-- Testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" style="color:#e6be8a;">TESTIMONIALS</h2>
    <div class="container mt-5">
        <!-- Swiper -->
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-dark p-4">
                    <div class="profile d-flex align-items-center mb-3">
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
                <div class="swiper-slide bg-dark p-4">
                    <div class="profile d-flex align-items-center mb-3">
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
                <div class="swiper-slide bg-dark p-4">
                    <div class="profile d-flex align-items-center mb-3">
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
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-3">
            <a href="about.php" class="btn btn-sm btn-outline-secondary rounded-0 fw-bold shadow-none" style="color:#e6be8a;">Know More >>></a>
        </div>
    </div>


    <!-- Reach us -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" style="color:#e6be8a;">REACH US</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-dark rounded shadow">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe']?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-dark p-4 rounded shadow mb-4">
                    <h5 style="color:#e6be8a;">Call us:</h5>
                    <a href="tel: +<?php echo $contact_r['pn1']?>" class="d-inline-block mb-2 text-decoration-none" style="color:#d4bea2;">
                        <i class="bi bi-telephone-fill" style="color:#d4bea2;"></i> +<?php echo $contact_r['pn1']?>
                    </a><br>
                    <?php
                        if($contact_r['pn2']!='')
                        {
                            echo<<<data
                                <a href="tel: +$contact_r[pn2]" class="d-inline-block text-decoration-none" style="color:#d4bea2;">
                                    <i class="bi bi-telephone-fill" style="color:#d4bea2;"></i> +$contact_r[pn2]
                                </a>
                            data;
                        }
                    ?>
                </div>
                <div class="bg-dark p-4 rounded shadow mb-4">
                    <h5 style="color:#e6be8a;">Follow us on:</h5>
                    <?php
                        if($contact_r['tw']!='')
                        {
                            echo<<<data
                                <a href="$contact_r[tw]" target="_blank" class="d-inline-block mb-1" style="color:#d4bea2;">
                                    <span class="badge bg-dark fs-6 p-2" style="color:#d4bea2;">
                                        <i class="bi bi-twitter-x me-1" style="color:#d4bea2;"></i> Twitter
                                    </span>
                                </a>
                                <br>
                            data;
                        }
                    ?>
                    
                    <a href="<?php echo $contact_r['fb']?>" target="_blank" class="d-inline-block mb-1" style="color:#d4bea2;">
                        <span class="badge bg-dark fs-6 p-2" style="color:#d4bea2;">
                            <i class="bi bi-facebook me-1" style="color:#d4bea2;"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['insta']?>" target="_blank" class="d-inline-block" style="color:#d4bea2;">
                        <span class="badge bg-dark fs-6 p-2" style="color:#d4bea2;">
                            <i class="bi bi-instagram me-1" style="color:#d4bea2;"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Including Footer -->
    <?php require('inc/footer.php');?>
    

    <!-- Script codes -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>

</body>
</html>