<!-- Main Navigation Bar in Customer View-->
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light px-lg-3 py-lg-2 shadow-sm sticky-top" style="background-color: #e6be8a;">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><?php echo $settings_r['site_title']?></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/DBMS Mini Project/RestaurantProject-main/customerSide/home/home.php" target="_blank">Restaurant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About us</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php
                    if(isset($_SESSION['login']) && $_SESSION['login']==true)
                    {
                        $path = USERS_IMG_PATH;
                        echo<<<data
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="$path$_SESSION[uPic]" style="width:25px; height:25px;" class="me-1">
                                $_SESSION[uName]
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        data;
                    }
                    else
                    {
                        echo<<<data
                            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login
                            </button>
                            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                                Register
                            </button>
                        data;
                    }
                ?>
            </div>
        </div>
    </div>
</nav>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header" style="background-color: #e6be8a;">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> Customer Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #353839;">
                    <div class="mb-3">
                        <label class="form-label" style="color:#e6be8a;">Email ID / Mobile:</label>
                        <input type="text" name="email_mob" required class="form-control shadow-none">
                        <div class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" style="color:#e6be8a;">Password:</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                        <div class="form-text">Enter the password registered with the above Email ID.</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <button type="submit" class="btn btn-outline-dark shadow-none" style="background-color: #e6be8a;">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Register Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header" style="background-color: #e6be8a;">
                    <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #353839;">
                    <span class="badge bg-dark mb-3 text-wrap lh-base" style="color:#e6be8a;">
                        Note: Your details must match with your ID (Aadhaar Card, Passport, Driving License, etc...)
                        that will be required during check-in.
                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Full Name:</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Email ID:</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                                <div class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Phone Number:</label>
                                <input name="phonenum" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Picture:</label>
                                <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Address:</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Pincode:</label>
                                <input name="pincode" type="number" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Date of Birth:</label>
                                <input name="dob" type="date" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Password:</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                                <div class="form-text">Please give a strong password that cannot be copied easily.</div>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label" style="color:#e6be8a;">Confirm Password:</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                                <div class="form-text">Please enter the password again.</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-outline-dark shadow-none" style="background-color: #e6be8a;">REGISTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>