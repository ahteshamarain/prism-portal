<?php
include("includes/header.php");
include("includes/navbar.php");
include("includes/form.php");
include("config.php");
?>


<!-- Extra working  start -->

<div class="container">
  <div class="cover-photo col-lg-12">
    <img src="./User-Dashboard/assets/images/bg.jpg" alt="Cover Photo">
  </div>
  <div class="profile-info">
    <div class="profile-photo">
      <?php
      if (isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])) {
        $userImage = './User-Dashboard/assets/images/user_img/' . $_SESSION['user_image'];
      } else {
        // Set a default avatar if user image is not available
        $userImage = './User-Dashboard/assets/images/user_img/default-avatar.png';
      }
      ?>
      <img id="profile-image" src="<?php echo $userImage; ?>" alt="avatar" class="rounded-circle img-fluid shadow-sm"
        style="width: 150px;">
    </div>
    <div class="profile-details">
      <h1 class="name">
        <?php echo $_SESSION['user_name']; ?>
      </h1>
      <p class="bio">
        <?php echo isset($_SESSION['user_studentid']) ? $_SESSION['user_studentid'] : 'Student ID not available'; ?> |
        <?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'Email not available'; ?> |
        <?php echo isset($_SESSION['user_number']) ? $_SESSION['user_number'] : 'Number not available'; ?>
      </p>
      <div class="main-button d-flex flex-column flex-md-row align-items-center justify-content-md-start gap-2 mt-4">
        <?php
        $file_path = './User-Dashboard/assets/images/user_img/' . $_SESSION['user_cv'];
        if (file_exists($file_path)) {
          echo '<a href="' . $file_path . '" download class="btn btn-primary btn-sm mb-2 mb-md-0">
                            <i class="fas fa-download"></i> Download CV</a>';
        } else {
          echo '<span class="text-danger mb-2 mb-md-0">File not available.</span>';
        }
        ?>
        <?php
        // Start the session
// session_start();
        
        // Check if the user is logged in as a company
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'company') {
          ?>
          <form action="send.php" method="POST">
            <a href="zoom1.php" class="btn btn-secondary btn-sm" name="send" aria-label="Schedule Interview">
              <i class="fas fa-calendar-alt"></i> Schedule Interview
            </a>
          </form>
          <?php
        } // End of the conditional block
        ?>

      </div>

      <style>
        /* Additional styles if needed for further customizations */
        .main-button .btn {
          padding: 8px 16px;
          font-size: 14px;
        }
      </style>

    </div>
  </div>

</div>

<style>
  .cover-photo img {
    width: 100%;
    height: auto;
  }

  .profile-info {
    display: flex;
    align-items: center;
    padding: 20px;
    position: relative;

    border-bottom: 1px solid #ddd;
  }

  .profile-photo {
    position: absolute;
    top: -50px;
    left: 20px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid white;
    transition: transform 0.3s ease;
  }

  .profile-photo img {
    width: 100%;
    height: auto;
  }

  .profile-details {
    margin-left: 140px;
  }

  .name {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
  }

  /* Hover Effects */
  .profile-info:hover {
    background-color: #f7f7f7;
  }

  .profile-photo.hovered {
    transform: scale(1.1) rotate(5deg);
  }

  .profile-details.hovered .name {
    color: #1877f2;
    transition: color 0.3s ease;
  }

  /* Responsive Design */
  @media (max-width: 600px) {
    .profile-info {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .profile-photo {
      position: static;
      margin-bottom: 10px;
    }

    .profile-details {
      margin-left: 0;
    }

    .name {
      font-size: 20px;
    }
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const profilePhoto = document.querySelector('.profile-photo');
    const profileDetails = document.querySelector('.profile-details');
    const followBtn = document.querySelector('.follow-btn');

    // Add hover effect to the profile photo
    profilePhoto.addEventListener('mouseover', function () {
      profilePhoto.classList.add('hovered');
    });

    profilePhoto.addEventListener('mouseout', function () {
      profilePhoto.classList.remove('hovered');
    });

    // Add hover effect to the profile details
    profileDetails.addEventListener('mouseover', function () {
      profileDetails.classList.add('hovered');
    });

    profileDetails.addEventListener('mouseout', function () {
      profileDetails.classList.remove('hovered');
    });

    // Add hover effect to the follow button
    followBtn.addEventListener('mouseover', function () {
      followBtn.classList.add('hovered');
    });

    followBtn.addEventListener('mouseout', function () {
      followBtn.classList.remove('hovered');
    });
  });

</script>

<!-- yaha tk profile ka kaam hai -->

<!-- yaha se categories shuro hai -->

<div class="profile-content">
  <!-- Add content sections like posts, photos, etc. -->
  <div class="container mt-5">
    <div class="row">
      <?php
      // Your SQL query to get only the categories where the user has uploaded projects
      $user_id = $_SESSION['userid'];
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
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex">
            <div class="card shadow-sm border-0 animate-card hover-effect w-100">
              <div class="card-body text-center">
                <h6 class="card-title"><?php echo htmlspecialchars($row["c_name"]); ?></h6>
                <p class="card-text">Projects: <?php echo ($row["project_count"]); ?></p>
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        // If no categories found
        echo '<div class="col-12 text-center">
            <p>No Categories Found</p>
          </div>';
      }
      ?>
    </div>

  </div>

</div>
<!-- YE 2no Styling Categories wale kaam ki hai -->
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
<!-- //////////'//////////..........///////////////////// -->

</div>
</div>
<!-- Ye styling profile ki hai jo main pori main prfile hai or uski js bhe hai -->
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .profile-container {
    width: 100%;
    margin: 0 auto;
    background: white;
    border-radius: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
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

  .cover-photo img {
    width: 100%;
    height: 380px;
    object-fit: cover;
  }

  .profile-info {
    display: flex;
    align-items: center;
    padding: 20px;
    position: relative;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    animation: slideIn 1s ease-in-out;
  }

  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateX(-100%);
    }

    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  .profile-photo {
    position: absolute;
    top: -50px;
    left: 20px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid white;
    transition: transform 0.3s ease;
  }

  .profile-photo img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
  }

  .profile-details {
    margin-left: 200px;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .name {
    margin: 0;
    font-size: 28px;
    font-weight: bold;
  }

  .social {
    color: #1877f2;
    margin-right: 8px;
    transition: color 0.3s ease;
  }

  .separator {
    margin: 0 10px;
    color: black;
  }

  .follow-btn {
    background-color: #1877f2;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .follow-btn:hover {
    background-color: #165db0;
  }

  /* Hover Effects */
  .profile-photo.hovered {
    transform: scale(1.2) rotate(10deg);
  }

  .profile-photo img.hovered {
    transform: rotate(-10deg);
  }

  .profile-details.hovered .name {
    color: #1877f2;
  }

  .profile-details.hovered {
    transform: translateX(10px);
  }

  .follow-btn.hovered {
    background-color: #0a60c5;
    transform: scale(1.1);
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  /* Responsive Design */
  @media (max-width: 600px) {
    .profile-info {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .profile-photo {
      position: static;
      margin-bottom: 10px;
    }

    .profile-details {
      margin-left: 0;
    }

    .name {
      font-size: 20px;
    }

  }

  @media (max-width: 900px) {
    .contact-cards {
      flex-direction: column;
      align-items: center;
    }

    .card {
      margin: 10px 0;
      width: 100%;
    }
  }

  /* Contact Cards Section */
  .contact-cards {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    background-color: #fff;
    animation: fadeIn 1s ease-in-out;
  }

  .card {
    flex: 1;
    background: #f0f2f5;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    margin: 0 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .card i {
    font-size: 36px;
    color: #1877f2;
    margin-bottom: 10px;
    transition: color 0.3s ease;
  }

  .card:hover i {
    color: #0a60c5;
  }

  .card h3 {
    margin: 10px 0;
    font-size: 20px;
    color: #333;
  }

  .card p {
    margin: 0;
    color: #666;
  }

  /* Hover Effects */
  .profile-photo.hovered {
    transform: scale(1.2) rotate(10deg);
  }

  .profile-photo img.hovered {
    transform: rotate(-10deg);
  }

  .profile-details.hovered .name {
    color: #1877f2;
  }

  .profile-details.hovered {
    transform: translateX(10px);
  }

  .follow-btn.hovered {
    background-color: #0a60c5;
    transform: scale(1.1);
    transition: background-color 0.3s ease, transform 0.3s ease;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const profilePhoto = document.querySelector('.profile-photo');
    const profileDetails = document.querySelector('.profile-details');
    const followBtn = document.querySelector('.follow-btn');

    // Add hover effect to the profile photo
    profilePhoto.addEventListener('mouseover', function () {
      profilePhoto.classList.add('hovered');
      profilePhoto.querySelector('img').classList.add('hovered');
    });

    profilePhoto.addEventListener('mouseout', function () {
      profilePhoto.classList.remove('hovered');
      profilePhoto.querySelector('img').classList.remove('hovered');
    });

    // Add hover effect to the profile details
    profileDetails.addEventListener('mouseover', function () {
      profileDetails.classList.add('hovered');
    });

    profileDetails.addEventListener('mouseout', function () {
      profileDetails.classList.remove('hovered');
    });

    // Add hover effect to the follow button
    followBtn.addEventListener('mouseover', function () {
      followBtn.classList.add('hovered');
    });

    followBtn.addEventListener('mouseout', function () {
      followBtn.classList.remove('hovered');
    });
  });

</script>
<!-- /////////////////////////////.................//////////////////////////////// -->
<!-- Extra working  End -->


<section class="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading text-center">
          <h6>Your Projects</h6>
          <h4>Your <em></em> Uploads <em>Projects</em></h4>
        </div>
      </div>

      <?php
      if (isset($row['u_id'])) {
        $_SESSION['userid'] = $row['u_id'];
      }
      ?>

      <?php
      // Fetch projects query
      $fetch_project = "SELECT * FROM `project` AS p 
    INNER JOIN `project_category` AS c 
    ON p.category = c.c_id 
    WHERE p.status = 1 
    AND p.user_id = " . intval($_SESSION['userid']);

      // Execute the query
      $fetch_result = mysqli_query($connection, $fetch_project);

      // Check if any projects exist
      if (mysqli_num_rows($fetch_result) > 0) {
        while ($row = mysqli_fetch_assoc($fetch_result)) {
          ?>
          <div class="col-lg-4">
            <div class="thumb">
              <img src="<?php echo './User-Dashboard/assets/images/project_img/' . $row["project_img"]; ?>"
                alt="project img">
              <div class="hover-effect">
                <div class="content">
                  <h4><?php echo $row['project_name']; ?></h4>
                  <span>Technology : <?php echo $row['c_name']; ?></span>
                  <span>Faculty : <?php echo $row['project_faculty']; ?></span>
                  <ul>
                    <li><a href="view_project.php?p-id=<?php echo $row["project_id"]; ?>"><i class="fa fa-link"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
        <div class="col-lg-12">
          <div class="main-button">
            <a href="#">Load More</a>
          </div>
        </div>
        <?php
      } else {
        // If no projects are found
        echo '<div class="col-lg-12 text-center">
            <p>No Projects Found</p>
          </div>';
      }
      ?>
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
  </style>
</section>

<?php
include("includes/footer.php");
?>