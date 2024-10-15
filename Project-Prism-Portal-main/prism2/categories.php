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
        <h2>Explore Diverse <em>Project Categories</em> &amp; <em>Unleash Innovation</em></h2>
        <p>Discover a variety of project categories, showcase your creativity, and let your ideas shine on Aptech
          Project Prism!</p>
      </div>
    </div>
  </div>
</div>


<section class="featured-contests">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading text-center">
          <h6>Featured Technologies</h6>
          <h4>View Most <em>Popular</em> <em>Categories</em></h4>
        </div>
      </div>
      <?php
      $fetch_cat = "SELECT pc.c_id, pc.c_name, pc.c_img, COUNT(p.project_id) AS project_count
                                  FROM project_category pc
                                  LEFT JOIN project p ON pc.c_id = p.category
                                  GROUP BY pc.c_id, pc.c_name, pc.c_img";
      $fetch_result = mysqli_query($connection, $fetch_cat);
      if (mysqli_num_rows($fetch_result) > 0) {
        while ($row = mysqli_fetch_assoc($fetch_result)) {
          ?>
          <div class="col-lg-4">
            <div class="item">
              <div class="thumb">
                <img src="<?php echo './Dashboard/assets/images/category_img/' . $row["c_img"]; ?>" alt="category img">
                <div class="hover-effect">
                  <div class="content">
                    <div class="top-content">
                      <!-- <span class="award">Award Price</span>
                    <span class="price">$4,100</span> -->
                    </div>
                    <h4><?php echo $row['c_name'] ?></h4>
                    <div class="info">
                      <span>Projects: <?php echo ($row["project_count"]); ?></span>

                    </div>
                    <div class="border-button">
                      <a href="brose_cat.php?cat_id=<?php echo $row["c_id"] ?>">View Projects</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</section>

<?php
include("includes/footer.php");
?>