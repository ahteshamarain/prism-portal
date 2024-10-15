<?php
include("includes/header.php");
include("includes/navbar.php");
include("includes/form.php");
include("config.php");
?>


<div class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 header-text">
        <h2>View User's Photos and <em>Contest Details</em></h2>
        <p>If you wish to <a rel="nofollow" href="https://templatemo.com/contact" target="_blank">support
            TemplateMo</a>, you shall make a little amount of contribution via PayPal. We hope this SnapX template is
          useful for your web development. Thank you.</p>
      </div>
    </div>
  </div>
</div>

<div class="user-info py-5">
  <?php
  if (isset($_GET['u-id'])) {
    $u_id = $_GET['u-id'];
    $fetch_project = "SELECT * FROM `users` where `u_id` = '$u_id'";
    $fetch_result = mysqli_query($connection, $fetch_project);
    if (mysqli_num_rows($fetch_result) > 0) {
      while ($row = mysqli_fetch_assoc($fetch_result)) {
        ?>
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-12">
              <div class="avatar mb-4">
                <label for="upload-image" class="cursor-pointer">
                  <?php
                  if (isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])) {
                    $userImage = './User-Dashboard/assets/images/user_img/' . $_SESSION['user_image'];
                  } else {
                    // Set a default avatar if user image is not available
                    $userImage = './User-Dashboard/assets/images/user_img/default-avatar.png';
                  }
                  ?>
                  <img id="profile-image" src="<?php echo $userImage; ?>" alt="avatar" class="rounded-circle img-fluid shadow-sm" style="width: 150px;">
                </label>
                <h4 class="mt-3"><?php echo $row['u_name']; ?></h4>
              </div>
            </div>
          </div>

          <div class="row justify-content-center mt-5">
            <?php
            // Your SQL query to get only the categories where the user has uploaded projects
            $user_id = $row['u_id'];
            $fetch_category = "
      SELECT pc.c_id, pc.c_name, COUNT(p.project_id) AS project_count
      FROM project_category pc
      LEFT JOIN project p ON pc.c_id = p.category
      WHERE p.user_id = '$user_id'
      GROUP BY pc.c_id, pc.c_name 
      HAVING project_count > 0
      ";

            // Execute the query
            $fetch_result = mysqli_query($connection, $fetch_category);

            // Check if there are results
            if (mysqli_num_rows($fetch_result) > 0) {
              // Loop through each row in the result
              while ($row = mysqli_fetch_assoc($fetch_result)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card shadow-sm border-0 animate-card hover-effect">
                    <div class="card-body text-center">
                      <h6 class="card-title"><?php echo htmlspecialchars($row["c_name"]); ?></h6>
                      <p class="card-text">Projects: <?php echo ($row["project_count"]); ?></p>
                    </div>
                  </div>
                </div>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <style>
          /* Card animation */
          .animate-card {
            transform: translateY(20px);
            opacity: 0;
            transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
          }

          /* Fade-in effect on scroll */
          .animate-card {
            animation: fadeInUp 1s ease forwards;
          }

          @keyframes fadeInUp {
            0% {
              transform: translateY(20px);
              opacity: 0;
            }

            100% {
              transform: translateY(0);
              opacity: 1;
            }
          }

          /* Hover effects */
          .hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
          }

          .hover-effect:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
          }

          /* Additional hover effects for text */
          .hover-effect:hover .card-title {
            color: #007bff;
            transition: color 0.3s ease;
          }

          .hover-effect:hover .card-text {
            color: #343a40;
            font-weight: bold;
            transition: color 0.3s ease, font-weight 0.3s ease;
          }
        </style>
        <style>
          /* Card animation */
          .animate-card {
            transform: translateY(20px);
            opacity: 0;
            transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
          }

          /* Animate on hover */
          .animate-card:hover {
            transform: translateY(0);
            opacity: 1;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
          }

          /* Fade-in effect on scroll */
          .animate-card {
            animation: fadeInUp 1s ease forwards;
          }

          @keyframes fadeInUp {
            0% {
              transform: translateY(20px);
              opacity: 0;
            }

            100% {
              transform: translateY(0);
              opacity: 1;
            }
          }
        </style>

        <?php
      }
    }
  }
  ?>
</div>


<section class="portfolio">
  <div class="container">
    <div class="row" id="portfolio-container">
      <div class="col-lg-12">
        <div class="section-heading text-center">
          <h6>User's Projects</h6>
          <h4>Projects Uploaded by <em>User</em> in Various Categories</h4>
        </div>
      </div>
      <?php
      if (isset($_GET['u-id'])) {
        $u_id = $_GET['u-id'];
        $limit = 6; // Number of projects to load per request
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0; // Current offset
        $fetch_project = "
          SELECT p.*, c.c_name 
          FROM `project` p 
          INNER JOIN `users` u ON p.user_id = u.u_id 
          INNER JOIN `project_category` c ON p.category = c.c_id 
          WHERE u.u_id = '$u_id'
          ORDER BY c.c_name, p.project_name
          LIMIT 6
        ";
        $fetch_result = mysqli_query($connection, $fetch_project);
        if (mysqli_num_rows($fetch_result) > 0) {
          while ($row = mysqli_fetch_assoc($fetch_result)) {
            ?>
            <div class="col-lg-4">
              <div class="thumb">
                <img src="<?php echo './User-Dashboard/assets/images/project_img/' . $row["project_img"]; ?>"
                  alt="project img">
                <div class="hover-effect">
                  <div class="content">
                    <h4><?php echo $row['project_name'] ?></h4>
                    <span>Technology: <?php echo $row['c_name'] ?></span>
                    <span>Faculty: <?php echo $row['project_faculty'] ?></span>
                    <ul>
                      <li><a href="view_project.php?p-id=<?php echo $row["project_id"] ?>"><i class="fa fa-link"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo '<div class="col-lg-12"><p>No more projects to load.</p></div>';
        }
      }
      ?>
    </div>
    <div class="col-lg-12">
      <div class="main-button">
        <a href="#">Load More </a>
      </div>
    </div>
  </div>
  <!-- CSS for Animations and Hover Effects -->
  <style>
    /* Fade-in effect for section content */
    .portfolio {
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Scale effect on hover */
    .portfolio .thumb {
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease-in-out;
    }

    .portfolio .thumb:hover {
      transform: scale(1.05);
    }

    /* Fade effect on hover */
    .portfolio .thumb img {
      width: 100%;
      height: auto;
      transition: opacity 0.3s ease-in-out;
    }

    .portfolio .thumb:hover img {
      opacity: 0.7;
    }

    /* Hover effect overlay */
    .portfolio .hover-effect {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      color: #fff;
      opacity: 0;
      transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      transform: translateY(20px);
    }

    .portfolio .thumb:hover .hover-effect {
      opacity: 1;
      transform: translateY(0);
    }

    /* Content styling */
    .portfolio .content h4 {
      margin-bottom: 10px;
      font-size: 18px;
      font-weight: bold;
      animation: fadeInUp 0.5s ease-in-out;
    }

    .portfolio .content span {
      display: block;
      margin-bottom: 5px;
      animation: fadeInUp 0.7s ease-in-out;
    }

    .portfolio .content ul {
      list-style: none;
      padding: 0;
    }

    .portfolio .content ul li {
      display: inline-block;
      margin-right: 10px;
    }

    /* Keyframes for fadeInUp animation */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Category section styling */
    .category-section {
      margin-bottom: 30px;
    }

    .category-section h5 {
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
      border-bottom: 2px solid #ddd;
      padding-bottom: 10px;
    }
  </style>
</section>


<section class="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="info-item animate__animated animate__fadeInUp">
          <i class="fa fa-phone"></i>
          <h4>Phone Numbers</h4>
          <span><a href="#">010-020-0340</a><br><a href="#">090-080-0760</a></span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-item animate__animated animate__fadeInUp">
          <i class="fa fa-envelope"></i>
          <h4>Email Addresses</h4>
          <span><a href="#">info@company.com</a><br><a href="#">SnapX@company.com</a></span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-item animate__animated animate__fadeInUp">
          <i class="fa fa-map-marked"></i>
          <h4>Office Location</h4>
          <span><a href="#">155 Michigan Ave, Chicago,<br>IL 60601, United States</a></span>
        </div>
      </div>
    </div>
  </div>
  <style>
    .contact-us {
      padding: 60px 0;
      background-color: #f9f9f9;
    }


    .info-item {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
      opacity: 0;
      animation: fadeInUp 0.8s forwards;
      animation-delay: 1.2s;
    }

    .info-item i {
      font-size: 36px;
      color: #007bff;
      margin-bottom: 10px;
    }

    .info-item h4 {
      margin-bottom: 10px;
      font-size: 18px;
      color: #333;
    }

    .info-item span a {
      color: #007bff;
      text-decoration: none;
    }

    .info-item span a:hover {
      text-decoration: underline;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</section>

<?php
include("includes/footer.php");
?>