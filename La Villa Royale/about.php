<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!-- Including Links -->
    <?php require('inc/links.php');?>
    <title><?php echo $settings_r['site_title']?> - About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <!-- Style codes-->
    <style>
        .box:hover{
            border-top-color: var(--gold) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>


<body class="bg-dark">
    
    <!-- Including Header -->
    <?php require('inc/header.php');?>


    <!-- About Page Description -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center" style="color:#e6be8a;">ABOUT US</h2>
        <div>
            <hr style="color:#e6be8a; width:150px; margin: 0 auto; height: 2.5px;">
            <p class="text-center mt-3" style="color:#d4bea2;">
            Since 1972, La Villa Royale has been synonymous with timeless elegance, royalty and unparalleled luxury, captivating discerning 
            travelers with its refined charm and exceptional service. <br> From its inception, our boutique hotel has set the standard for 
            sophistication, offering lavish accommodations, exquisite dining, and personalized experiences designed to enchant and delight.
            <br> Experience a legacy of excellence spanning over five decades at La Villa Royale, where tradition meets modernity 
            in perfect harmony.
            </p>
        </div>
    </div>


    <!-- History and Legacy -->
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-7 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3 h-font" style="color:#e6be8a;">Our History & Legacy</h3>
                <p style="color:#88959c;">
                La Villa Royale hotel stands as a testament to timeless elegance and refined luxury, with a rich history that spans over 
                five decades. Established in 1972, this illustrious establishment quickly garnered a reputation as a beacon of 
                sophistication in the heart of the city. 
                <br><br>
                Throughout the years, La Villa Royale has played host to countless dignitaries, celebrities, and discerning travelers from 
                around the world, each drawn to its exquisite charm and unparalleled hospitality. From intimate gatherings to lavish events, 
                the hotel has been the backdrop for unforgettable moments and cherished memories, weaving its way into the fabric of the 
                city's social scene and cultural landscape.
                <br><br>
                But beyond its glamorous facade lies a deeper legacy—a legacy of innovation, resilience, and an unwavering dedication to 
                exceeding expectations. Over the years, La Villa Royale has evolved with the times, seamlessly blending timeless tradition 
                with modern comforts to ensure that every guest experience is nothing short of extraordinary.
                <br><br>
                Today, as La Villa Royale continues to reign as a bastion of luxury and refinement, its legacy lives on in the hearts and 
                minds of those who have had the privilege of crossing its threshold. Whether it's the unparalleled service, the exquisite 
                cuisine, or the tranquil ambiance that leaves a lasting impression, one thing is certain: the legacy of La Villa Royale will 
                continue to inspire and captivate for generations to come.
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="LVRimages/about/LVRhotel.jpeg" class="w-100">
            </div>
        </div>
    </div>


    <!--Rooms, Customers, Reviews, Staff Cards-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark rounded shadow p-4 border-top border-4 border-secondary text-center box">
                    <img src="LVRimages/about/LVR.png" width="100px">
                    <h5 class="mt-3 h-font" style="color:#e6be8a;">100+ Rooms</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark rounded shadow p-4 border-top border-4 border-secondary text-center box">
                    <img src="LVRimages/about/customers.svg" width="100px">
                    <h5 class="mt-3 h-font" style="color:#e6be8a;">1.5M+ Customers</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark rounded shadow p-4 border-top border-4 border-secondary text-center box">
                    <img src="LVRimages/about/reviews.svg" width="100px">
                    <h5 class="mt-3 h-font" style="color:#e6be8a;">1.0M+ Reviews</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark rounded shadow p-4 border-top border-4 border-secondary text-center box">
                    <img src="LVRimages/about/staff.svg" width="100px">
                    <h5 class="mt-3 h-font" style="color:#e6be8a;">200+ Staff</h5>
                </div>
            </div>
        </div>
    </div>


    <!-- Management Team -->
    <h3 class="my-5 fw-bold h-font text-center" style="color:#e6be8a;">MANAGEMENT TEAM</h3>
    <div class="container px-4">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php
                    $about_r = selectAll('team_details');
                    $path=ABOUT_IMG_PATH;
                    while($row = mysqli_fetch_assoc($about_r))
                    {
                        echo<<<data
                            <div class="swiper-slide bg-dark text-center overflow-hidden rounded">
                                <img src="$path$row[picture]" class="w-100">
                                <h5 class="mt-2" style="color:#e6be8a;">$row[name]</h5>
                            </div>
                        data;
                    }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <!-- Including Footer -->
    <?php require('inc/footer.php');?>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 40,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
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
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
    
</body>
</html>