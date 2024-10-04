<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Including Links -->
    <?php require('inc/links.php');?>
    <title><?php echo $settings_r['site_title']?> - Facilities</title>
    
    <!-- Style codes-->
    <style>
        .pop:hover{
            border-top-color: var(--gold) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>


<body class="bg-dark">
    
    <!-- Including Header -->
    <?php require('inc/header.php');?>

    <!-- Facilities Page Description -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center" style="color:#e6be8a;">OUR FACILITIES</h2>
        <div>
            <hr style="color:#e6be8a; width:150px; margin: 0 auto; height: 2.5px;">
            <p class="text-center mt-3" style="color:#d4bea2;">
                Indulge in the epitome of luxury at our exquisite hotel, where alongside opulent spa and wellness centers for rejuvenation, 
                world-class dining experiences <br> showcasing culinary masterpieces, and state-of-the-art fitness centers for maintaining
                your wellness routine, you'll also find seamless connectivity with <br> complimentary WiFi, well-equipped boardrooms for productive 
                meetings, meticulously landscaped gardens for serene relaxation, and personalized <br> concierge services ensuring 
                every aspect of your stay is nothing short of perfection.
            </p>
        </div>
    </div>

    <!-- Each Facility Card -->
    <div class="container-fluid">
        <div class="row">
            <?php
                $res = selectAll('facilities');
                $path = FACILITIES_IMG_PATH;
                while($row = mysqli_fetch_assoc($res))
                {
                    echo<<<data
                        <div class="col-lg-2 col-md-6 mb-5 px-4">
                            <div class="pop bg-dark rounded shadow p-4 border-top border-4 border-secondary" style="max-width: 300px; margin: auto;">
                                <img src="$path$row[icon]" width="200px" class="card-img">
                                <h5 class="mt-3" style="color:#e6be8a;">$row[name]</h5>
                                <p class="text-justify mt-2" style="color:#d4bea2;">$row[description]</p>
                            </div>
                        </div>
                    data;
                }
            ?>
        </div>
    </div>

    <!-- Including Footer -->
    <?php require('inc/footer.php');?>
    
</body>
</html>