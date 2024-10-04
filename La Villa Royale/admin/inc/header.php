<!-- Admin page header -->
<div class="container-fluid text-dark p-3 d-flex align-items-center justify-content-between sticky-top" style="background-color:#e6be8a;">
    <h3 class="h-font mb-0">LA VILLA ROYALE</h3>
    <a href="logout.php" class="btn btn-dark btn-sm" style="color:#e6be8a;">LOG OUT</a>
</div>

<!-- Left Admin Panel-->
<div class="col-lg-2 border-top border-3 border-dark" id="dashboard-menu" style="background-color:#e6be8a;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#e6be8a;">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-dark">Admin Panel</h4>
            <button style="background-color:#e6be8a;" class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="users.php">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="user_queries.php">Customer Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="features_facilities.php">Features & Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="carousel.php">Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="settings.php">Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>