<?php
include('includes/header.php');
include('includes/navbar.php');
include('config.php');
?>
<?php

if(isset($_POST['meeting'])){
  $url = $_POST['meeting_url'];
  
  $user_insert = "INSERT INTO `meetings` (`join_url`) VALUES ('$url')";
$user_result = mysqli_query($connection, $user_insert);
if($user_result){
  echo "<script> 
  alert('successful');
 
  </script>";
}else{
  echo "<script> 
  alert('failed');

  </script>";
}



}
?>


<!-- Header Section -->
<section class="pricing-plans">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading text-center">
          <h6>Our Meeting</h6>
          <h4>Welcome to <em>Our Meeting</em>..!</h4>
        </div>
      </div>
      <?php 
// Your existing query to fetch meetings
$fetch = 'SELECT * FROM meetings';
$res = mysqli_query($connection, $fetch);

if ($res) {
    if (mysqli_num_rows($res) > 0) {
        // Loop through the result set
        while ($row = mysqli_fetch_assoc($res)) {
            // Check if the join_url equals the provided $url
            if ($row['join_url'] == $url) {
                // If they match, echo the join_url
               
     
?>


      <!-- Meeting Section -->
      <section class="meeting-container">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
              <div class="meeting-frame shadow-lg">
                <iframe id="meetingIframe" class="w-100 h-100" src="<?php echo $row['join_url']; ?>" title="Meeting"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php 
       }
      }
  } else {
      echo 'No meetings found.';
  }
} else {
  echo 'Error in query execution: ' . mysqli_error($connection);
}
?>
    </div>
  </div>
</section>

<style>
  /* body {
  font-family: 'Arial', sans-serif;
  background-color: #f0f0f0;
} */

  .meeting-container {
    /* padding: 40px 0; */
    background: #fff;
    border-radius: 10px;
    margin-top: 30px;
  }

  .meeting-frame {
    position: relative;
    width: 100%;
    padding-top: 56.25%;
    /* 16:9 Aspect Ratio */
    border: 2px solid #007bff;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease-in-out;
  }

  .meeting-frame:hover {
    border-color: #28a745;
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }

  #meetingIframe {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
  }

  /* footer {
  margin-top: 40px;
  background-color: #333;
} */

  footer p {
    margin: 0;
    font-size: 14px;
  }

  @media (max-width: 768px) {
    .meeting-container {
      padding: 20px;
    }

    .meeting-frame {
      padding-top: 75%;
      /* Adjust aspect ratio for mobile */
    }
  }
</style>


<?php
include('includes/footer.php');
?>