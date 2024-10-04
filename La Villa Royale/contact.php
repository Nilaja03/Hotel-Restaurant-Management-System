<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Including Links -->
    <?php require('inc/links.php');?>
    <title><?php echo $settings_r['site_title']?> - Contact</title>
    
</head>


<body class="bg-dark">
    
    <!-- Including Header -->
    <?php require('inc/header.php');?>

    <!-- Contacts Page Description -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center" style="color:#e6be8a;">CONTACT US</h2>
        <div>
            <hr style="color:#e6be8a; width:150px; margin: 0 auto; height: 2.5px;">
            <p class="text-center mt-3" style="color:#d4bea2;">
            Contact us at La Villa Royale to experience unparalleled luxury and exceptional service. Whether you have inquiries about 
            reservations, <br>event planning, or special requests, our dedicated team is here to assist you. Reach out to us via phone, 
            email, or <br>through the convenient contact form below, and let us help you create unforgettable memories at our esteemed hotel.
            </p>
        </div>
    </div>

    <!-- Map, Location and Form for Customer message entry -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-dark rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe']?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                    <h5 style="color:#e6be8a;">Address</h5>
                    <a href="<?php echo $contact_r['gmap']?>" style="color:#d4bea2;" target="_blank" class="d-inline-block text-decoration-none mb-2">
                        <i class="bi bi-geo-alt-fill" style="color:#d4bea2;"></i> <?php echo $contact_r['address']?>
                    </a>

                    <h5 class="mt-4" style="color:#e6be8a;">Call us:</h5>
                    <a href="tel: <?php echo $contact_r['pn1']?>" class="d-inline-block mb-2 text-decoration-none" style="color:#d4bea2;">
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
                    

                    <h5 class="mt-4" style="color:#e6be8a;">Email</h5>
                    <a href="mailto: <?php echo $contact_r['email']?>" class="d-inline-block mb-2 text-decoration-none" style="color:#d4bea2;">
                        <i class="bi bi-envelope-fill" style="color:#d4bea2;"></i> <?php echo $contact_r['email']?>
                    </a>

                    <h5 class="mt-4" style="color:#e6be8a;">Follow us on:</h5>
                    <?php
                        if($contact_r['tw']!='')
                        {
                            echo<<<data
                                <a href="$contact_r[tw]" target="_blank" class="d-inline-block fs-5 me-2" style="color:#d4bea2;">
                                    <i class="bi bi-twitter-x me-1" style="color:#d4bea2;"></i>
                                </a>
                            data;
                        }
                    ?>
                    
                    <a href="<?php echo $contact_r['fb']?>" target="_blank" class="d-inline-block fs-5 me-2" style="color:#d4bea2;">
                        <i class="bi bi-facebook me-1" style="color:#d4bea2;"></i>
                    </a>
                    <a href="<?php echo $contact_r['insta']?>" target="_blank" class="d-inline-block fs-5" style="color:#d4bea2;">
                        <i class="bi bi-instagram me-1" style="color:#d4bea2;"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-dark rounded shadow p-4">
                    <form method="POST">
                        <h5 style="color:#e6be8a;">Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="color:#d4bea2; font-weight:500;">Name:</label>
                            <input name="name" required type="text" class="form-control shadow-none" style="background-color:#565a5b; border-color:#e6be8a;">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="color:#d4bea2; font-weight:500;">Email:</label>
                            <input name="email" required type="email" class="form-control shadow-none" style="background-color:#565a5b; border-color:#e6be8a;">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="color:#d4bea2; font-weight:500;">Subject:</label>
                            <input name="subject" required type="text" class="form-control shadow-none" style="background-color:#565a5b; border-color:#e6be8a;">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="color:#d4bea2; font-weight:500;">Message:</label>
                            <textarea name="message" required class="form-control shadow-none" style="resize:none; background-color:#565a5b; border-color:#e6be8a;" rows="5"></textarea>
                        </div>
                        <button type="submit" name="send" class="btn btn-outline-dark text-dark custom-bg mt-3">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['send']))
        {
            $frm_data = filteration($_POST);
            $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

            $res = insert($q,$values,'ssss');
            if($res==1)
            {
                alert('success','Mail sent!');
            }
            else
            {
                alert('error','Server down! Try again later.');
            }
        }
    ?>

    <!-- Including Footer -->
    <?php require('inc/footer.php');?>
    
</body>
</html>