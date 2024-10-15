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
        <h2>Showcase Your <em>Projects</em> &amp; <em>Innovate</em> with Impact</h2>
        <p>Present your unique projects, share your creativity, and get recognized on Aptech Project Prism!</p>
      </div>
    </div>
  </div>
</div>

<div class="search-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form id="search-form" name="gs" method="submit" role="search" action="#">
          <div class="row">
            <div class="col-lg-12">
              <fieldset class="text-center">
                <label for="contest" class="form-label">Search Any Projects</label>
                <input type="text" id="searchInput" name="contest" class="searchText"
                  placeholder="Project Name, Category..." autocomplete="on" required>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<section class="contest-win pricing-plans">
  <div class="container-fluid">
    <div class="row" id="projectContainer">

      <?php
      if (isset($row['u_id'])) {
        $_SESSION['user_id'] = $row['u_id'];
      }
      ?>
     <?php

// Get category ID from query string
$cat_id = isset($_GET['cat_id']) ? (int)$_GET['cat_id'] : 0;

// Ensure the category ID is valid
if ($cat_id > 0) {
  // Fetch projects based on the selected category
  $fetch_project = "SELECT * FROM `project` as p 
                    INNER JOIN `project_category` as c 
                    ON p.category = c.c_id 
                    WHERE p.category = $cat_id";
  $fetch_result = mysqli_query($connection, $fetch_project);

  if (mysqli_num_rows($fetch_result) > 0) {
    while ($row = mysqli_fetch_assoc($fetch_result)) {
      ?>
      <div class="col-lg-4 project-item">
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
    echo "No projects found in this category.";
  }
} else {
  echo "Invalid category ID.";
}

?>


      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const searchInput = document.getElementById('searchInput');
          const projectContainer = document.getElementById('projectContainer');
          const noResultsMessage = document.getElementById('noResultsMessage');
          const projects = Array.from(projectContainer.getElementsByClassName('project-item'));

          searchInput.addEventListener('input', function () {
            const query = searchInput.value.toLowerCase();
            let hasResults = false;

            projects.forEach(function (project) {
              const projectName = project.querySelector('h4').textContent.toLowerCase();
              const projectCategory = project.querySelector('span').textContent.toLowerCase();
              const projectDescription = project.querySelector('.project-description') ? project.querySelector('.project-description').textContent.toLowerCase() : '';

              if (projectName.includes(query) || projectCategory.includes(query) || projectDescription.includes(query)) {
                project.style.display = '';
                hasResults = true;
              } else {
                project.style.display = 'none';
              }
            });

            // Show or hide the "No results found" message based on the search results
            if (hasResults) {
              noResultsMessage.style.display = 'none';
            } else {
              noResultsMessage.style.display = 'block';
            }
          });
        });

      </script>

      <!-- CSS for Animations and Hover Effects -->
      <style>
        /* Fade-in effect for section content */
        .contest-win {
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
        .contest-win .thumb {
          position: relative;
          overflow: hidden;
          transition: transform 0.3s ease-in-out;
        }

        .contest-win .thumb:hover {
          transform: scale(1.05);
        }

        /* Fade effect on hover */
        .contest-win .thumb img {
          width: 100%;
          height: auto;
          transition: opacity 0.3s ease-in-out;
        }

        .contest-win .thumb:hover img {
          opacity: 0.7;
        }

        /* Hover effect overlay */
        .contest-win .hover-effect {
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

        .contest-win .thumb:hover .hover-effect {
          opacity: 1;
          transform: translateY(0);
        }

        /* Content styling */
        .contest-win .content h4 {
          margin-bottom: 10px;
          font-size: 18px;
          font-weight: bold;
          animation: fadeInUp 0.5s ease-in-out;
        }

        .contest-win .content span {
          display: block;
          margin-bottom: 5px;
          animation: fadeInUp 0.7s ease-in-out;
        }

        .contest-win .content ul {
          list-style: none;
          padding: 0;
        }

        .contest-win .content ul li {
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

    </div>
    <p id="noResultsMessage" class="text-center" style="display: none;">No results found</p>

  </div>
</section>

<?php
include("includes/footer.php");
?>