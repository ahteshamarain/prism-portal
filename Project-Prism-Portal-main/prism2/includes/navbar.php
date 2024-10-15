<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="./assets/images/Logo.png" alt="Aptech Project Prism">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="projects.php" class="active">Projects</a></li>
                        <li><a href="categories.php">Categories</a></li>
                        <!-- <li><a href="users.php">Users</a></li> -->
                    </ul>

                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>

                    <?php
                    if (isset($_SESSION["user_name"])) {
                        // If a normal user is logged in
                        ?>
                        <div class="dropdown border-button2">
                            <button class="dropbtn d-flex align-items-center">
                                <?php
                                if (isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])) {
                                    $userImage = './User-Dashboard/assets/images/user_img/' . $_SESSION['user_image'];
                                } else {
                                    // Set a default avatar if user image is not available
                                    $userImage = './User-Dashboard/assets/images/user_img/default-avatar.png';
                                }
                                ?>
                                <img src="<?php echo $userImage; ?>" class="avatar2 rounded-circle me-2" height="38"
                                    width="38" style="object-fit: cover;" alt="User Avatar">
                                <span><?php echo $_SESSION["user_name"]; ?></span>
                            </button>
                            <div class="dropdown-content">
                                <a href="user.php">Profile</a>
                                <a href="./User-Dashboard/index.php">My Dashboard</a>
                                <a href="logout.php">LogOut</a>
                            </div>
                        </div>
                        <?php
                    } elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'company') {
                        // If a company is logged in
                        ?>
                        <div class="dropdown border-button2">
                            <button class="dropbtn d-flex align-items-center">
                                <?php
                                if (isset($_SESSION['company_image']) && !empty($_SESSION['company_image'])) {
                                    $companyImage = './Dashboard/assets/images/admin_img/' . $_SESSION['company_image'];
                                } else {
                                    // Set a default avatar if company image is not available
                                    $companyImage = './Dashboard/assets/images/admin_img/default-avatar.png';
                                }
                                ?>
                                <img src="<?php echo $companyImage; ?>" class="avatar2 rounded-circle me-2" height="38"
                                    width="38" style="object-fit: cover;" alt="Company Avatar">
                                <span><?php echo $_SESSION["company_name"]; ?></span>
                            </button>
                            <div class="dropdown-content">
                                <a href="logout.php">LogOut</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        // If no user or company is logged in
                        ?>
                        <div class="border-button">
                            <a href="form.php" class="sign-in-up"><i class="fa fa-user"></i> Sign In/Up</a>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<style>
    .avatar2 {
        vertical-align: middle;
        width: 38px;
        height: 38px;
        border-radius: 50%;
    }

    .dropbtn {
        background-color: #00bdfe;
        color: white;
        align-items: center;
        text-align: center;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 150px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #4cd2ff;
    }
</style>