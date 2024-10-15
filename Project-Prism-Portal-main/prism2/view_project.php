<?php
include("includes/header.php");
include("includes/navbar.php");
include("includes/form.php");
include("config.php");
?>
<!-- addinal links section -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS and dependencies (Popper.js) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<!-- addinal links section -->

<!-- styling -->
<style>
    /* overlay */
    .video-container {
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .video-container:hover .overlay {
        opacity: 1;
    }

    .overlay a {
        color: #fff;
        text-decoration: none;
    }

    /* overlay */


    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 Aspect Ratio */
        height: 0;
        overflow: hidden;
        background: #000;
        margin-bottom: 20px;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .video-description {
        margin-bottom: 20px;
    }

    .video-description h3 {
        font-size: 1.5rem;
    }

    .video-description p {
        font-size: 1rem;
    }

    .btn-custom {
        background-color: #ff0000;
        color: #fff;
        margin-right: 10px;
    }

    .btn-custom:hover {
        background-color: #cc0000;
    }

    .like-btn {
        background-color: red;
        color: #fff;
    }

    .like-btn i {
        margin-right: 5px;
    }

    .comment-section {
        margin-top: 40px;
    }

    .comment-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .comment-item:last-child {
        border-bottom: none;
    }

    .comment-item img {
        max-width: 40px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .comment-item strong {
        display: block;
        margin-bottom: 5px;
    }

    .comment-input {
        display: flex;
        align-items: start;
        margin-bottom: 20px;
    }

    .comment-input img {
        max-width: 40px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .comment-input .form-control {
        border-radius: 20px;
        border: 1px solid #ddd;
        resize: none;
    }

    .comment-input .btn-primary {
        border-radius: 20px;
        padding: 5px 20px;
        font-weight: bold;
    }

    .comment-actions {
        margin-top: 10px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<section class="popular-categories">
    <div class="container my-5">
        <div class="row">
            <?php
            if (isset($_GET['p-id'])) {
                $pro_id = $_GET['p-id'];
                $fetch_project = "SELECT p.*, u.u_name, u.u_img, u.u_id FROM `project` p INNER JOIN `users` u ON p.user_id = u.u_id WHERE p.project_id = '$pro_id'";
                // $fetch_project = "SELECT * FROM `project` where `project_id` = '$pro_id'";
                $fetch_result = mysqli_query($connection, $fetch_project);
                if (mysqli_num_rows($fetch_result) > 0) {
                    while ($row = mysqli_fetch_assoc($fetch_result)) {
                        ?>
                        <!-- Main Video -->
                        <div class="col-lg-8 col-md-7">
                            <a href="user_copy.php?u-id=<?php echo $row["u_id"] ?>" style="color: #000;">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <?php
                                        // Set the user image path
                                        $userImage = './User-Dashboard/assets/images/user_img/' . $row['u_img'];

                                        // Check if the image file exists, otherwise use the default avatar
                                        if (!file_exists($userImage) || empty($row['u_img'])) {
                                            $userImage = './User-Dashboard/assets/images/user_img/default-avatar.png';
                                        }
                                        ?>

                                        <img src="<?php echo $userImage; ?>" height="50px" width="50px" alt="User Avatar"
                                            class="rounded-circle me-2" style="width: 38px; height: 38px; border-radius: 50%;">

                                    </div>
                                    <div class="col">
                                        <strong class="d-block"><?php echo htmlspecialchars($row['u_name']); ?></strong>
                                    </div>
                                    <!-- <div class="col-auto">
                                    <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-circle me-2">
                                </div>
                                <div class="col">
                                    <strong class="d-block">User Name</strong>
                                </div> -->
                                </div>
                            </a>

                            <div class="video-container position-relative">
                                <img src="<?php echo './User-Dashboard/assets/images/project_img/' . $row["project_img"]; ?>" alt=""
                                    class="img-fluid w-100">

                                <style>

                                </style>
                                <!-- Overlay with Live Preview Button -->
                                <div class="overlay d-flex justify-content-center align-items-center">
                                    <a href="<?php echo ($row['project_url']); ?>" class="btn btn-primary btn-lg" target="_blank">
                                        <i class="bi bi-eye me-2"></i> Live Preview
                                    </a>
                                </div>
                            </div>
                            <!-- Video Description -->
                            <div class="video-description d-flex align-items-center">
                                <h3 class="me-auto"><?php echo ($row['project_name']); ?></h3>
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <?php
                                        // Get project ID
                                        $pro_id = $_GET['p-id'];

                                        // Query to count likes for the post
                                        $like_count_query = "SELECT COUNT(*) AS total_likes FROM `like` WHERE project_id = '$pro_id'";
                                        $like_count_result = mysqli_query($connection, $like_count_query);
                                        $like_count_row = mysqli_fetch_assoc($like_count_result);
                                        $total_likes = $like_count_row['total_likes'];

                                        // Default icon class (unfilled heart)
                                        $like_icon_class = 'far fa-heart';

                                        // Check if user is logged in
                                        if (isset($_SESSION['userid'])) {
                                            $user_id = $_SESSION['userid'];

                                            // Query to check if the user has liked the post
                                            $user_liked_query = "SELECT COUNT(*) AS has_liked FROM `like` WHERE project_id = '$pro_id' AND user_id = '$user_id'";
                                            $user_liked_result = mysqli_query($connection, $user_liked_query);
                                            $user_liked_row = mysqli_fetch_assoc($user_liked_result);
                                            $user_liked = $user_liked_row['has_liked'] > 0;

                                            // If the user has liked the post, change the icon to a filled heart
                                            if ($user_liked) {
                                                $like_icon_class = 'fas fa-heart'; // Filled heart
                                            }
                                        } else {
                                            $user_id = null;
                                        }
                                        ?>

                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button class="btn btn-outline-danger btn-sm" id="likeButton"
                                                data-postid="<?php echo $pro_id; ?>" data-userid="<?php echo $user_id; ?>">
                                                <i id="likeIcon" class="<?php echo $like_icon_class; ?>"></i>
                                                <span id="likeCount"><?php echo $total_likes; ?></span>
                                            </button>
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            $('#likeButton').click(function () {
                                                var postId = $(this).data('postid');
                                                var userId = $(this).data('userid');

                                                if (!userId) {
                                                    $('#loginModal').modal('show'); // Show the login modal
                                                    return;
                                                }

                                                var likeIcon = $('#likeIcon');
                                                var likeCountElement = $('#likeCount');
                                                var likeCount = parseInt(likeCountElement.text());

                                                $.ajax({
                                                    url: 'like_post.php',
                                                    type: 'POST',
                                                    data: {
                                                        post_id: postId,
                                                        user_id: userId
                                                    },
                                                    success: function (response) {
                                                        if (response == 'liked') {
                                                            likeCountElement.text(likeCount + 1);
                                                            likeIcon.removeClass('far').addClass('fas');
                                                        } else if (response == 'unliked') {
                                                            likeCountElement.text(likeCount - 1);
                                                            likeIcon.removeClass('fas').addClass('far');
                                                        } else {
                                                            console.log('Error:', response);
                                                        }
                                                    }
                                                });
                                            });
                                        });
                                    </script>



                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                                        integrity="sha384-7y6XU7ZoX08eG0iA0MB1/FR1L+0e1f9yA00si5OsJNGxCk/MH5d46d71Kh9KH1"
                                        crossorigin="anonymous"></script>

                                    <!-- Login Modal -->
                                    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You must be logged in to like or comment on this project.</p>
                                                    <a href="form.php" class="btn btn-primary">Login</a>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>

                            </div>
                            <p><?php echo ($row['project_desc']); ?></p>

                            <!-- /\\\\\\\\\/ Comments section Start /\\\\\\\\\\\\/ -->

                            <?php
                            $is_logged_in = isset($_SESSION['userid']); // Check if user is logged in
                            $user_id = $is_logged_in ? $_SESSION['userid'] : null; // Safely access user_id only if logged in
                
                            ?>

                            <!-- Display All Comments Section -->

                            <div class="mt-4">
                                <?php if ($is_logged_in): ?>
                                    <h5><span id="commentCount">
                                            <?php
                                            $pid = $_GET['p-id'];
                                            $count_query = "SELECT COUNT(*) AS total_comments FROM `comment` WHERE projid = '$pid'";
                                            $count_result = mysqli_query($connection, $count_query);
                                            $count_row = mysqli_fetch_assoc($count_result);
                                            echo $count_row['total_comments'];
                                            ?>
                                        </span> Comments</h5>
                                <?php else: ?>
                                    <h5><span id="commentCount" style="display: none;">
                                            <?php
                                            $pid = $_GET['p-id'];
                                            $count_query = "SELECT COUNT(*) AS total_comments FROM `comment` WHERE projid = '$pid'";
                                            $count_result = mysqli_query($connection, $count_query);
                                            $count_row = mysqli_fetch_assoc($count_result);
                                            echo $count_row['total_comments'];
                                            ?>
                                        </span> Comments</h5>
                                <?php endif; ?>

                                <!-- Show Comment Input Section Only if User is Logged In -->
                                <?php if ($is_logged_in): ?>
                                    <?php
                                    if (isset($_POST['addcomment'])) {
                                        $comment_message = $_POST['comment-message'];
                                        $user_id = $_POST['user_id'];
                                        $prid = $_GET['p-id'];

                                        if (!empty($comment_message)) {
                                            // Check if the comment already exists
                                            $check_comment = "SELECT COUNT(*) AS existing_comments FROM `comment` 
                                  WHERE comment_message = '$comment_message' 
                                  AND user_id = '$user_id' 
                                  AND projid = '$prid'";
                                            $check_result = mysqli_query($connection, $check_comment);
                                            $check_row = mysqli_fetch_assoc($check_result);

                                            if ($check_row['existing_comments'] == 0) {
                                                // Insert the comment if it does not exist
                                                $insert_comment = "INSERT INTO `comment` (`comment_id`, `comment_message`, `status`, `user_id`,`projid`) 
                    VALUES (NULL, '$comment_message', 1, '$user_id','$prid')";
                                                $comment_result = mysqli_query($connection, $insert_comment);
                                            } else {
                                                echo '<p class="text-warning">This comment already exists.</p>';
                                            }
                                        }
                                    }
                                    ?>
                                    <!-- Comment Input Section -->
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="comment-section">
                                            <!-- Comment Input -->
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid']; ?>">
                                            <div class="comment-input d-flex align-items-start">
                                                <?php
                                                if (isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])) {
                                                    $userImage = './User-Dashboard/assets/images/user_img/' . $_SESSION['user_image'];
                                                } else {
                                                    // Set a default avatar if user image is not available
                                                    $userImage = './User-Dashboard/assets/images/user_img/default-avatar.png';
                                                }
                                                ?>
                                                <img src="<?php echo $userImage; ?>" alt="User Avatar" class="rounded-circle me-3"
                                                    height="40px" width="40px">
                                                <div class="w-100">
                                                    <textarea class="form-control" rows="3" name="comment-message" id="comment-message"
                                                        placeholder="Add a comment..." required></textarea>
                                                    <div class="comment-actions mt-2">
                                                        <input type="submit" name="addcomment" class="btn btn-primary" value="Post">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <p class="text-danger">Please login to post a comment.</p>
                                <?php endif; ?>

                                <?php
                                $fetch_comment = "SELECT c.*, u.u_name, u.u_img 
        FROM `comment` c 
        INNER JOIN `users` u ON c.user_id = u.u_id 
        WHERE c.projid = '$pid' 
        ORDER BY c.comment_id DESC";

                                $fetch_result = mysqli_query($connection, $fetch_comment);

                                if (mysqli_num_rows($fetch_result) > 0) {
                                    while ($row = mysqli_fetch_assoc($fetch_result)) {
                                        ?>
                                        <div class="comment-item d-flex mb-3">
                                            <img src="<?php echo './User-Dashboard/assets/images/user_img/' . $row['u_img']; ?>"
                                                class="rounded-circle me-3" height="40px" width="40px" alt="User Avatar">
                                            <div class="flex-grow-1">
                                                <strong><?php echo htmlspecialchars($row['u_name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                                <p class="comment-text" data-id="<?php echo $row['comment_id']; ?>">
                                                    <?php echo htmlspecialchars($row['comment_message'], ENT_QUOTES, 'UTF-8'); ?>
                                                </p>
                                            </div>
                                            <?php if ($row['user_id'] == $user_id): ?>
                                                <!-- Edit and Delete Icons -->
                                                <div class="ms-3 d-flex align-items-center">
                                                    <!-- Edit Icon -->
                                                    <button class="btn btn-outline-success me-2 edit-comment"
                                                        data-id="<?php echo $row['comment_id']; ?>" title="Edit">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                    <!-- Delete Icon -->
                               <a href="delete_comment.php?comment_id=<?php echo $row['comment_id']?>">                     
    <button class="btn btn-outline-danger">
        <i class="fa-solid fa-trash"></i>
    </button>
    </a>
</div>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo "<p>No comments yet.</p>";
                                }
                                ?>
                            </div>



                            <!-- AJAX for comments edit or delete -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    // Existing JavaScript code for editing and deleting comments
                                    $('.edit-comment').click(function () {
                                        var commentId = $(this).data('id');
                                        var commentTextElement = $('.comment-text[data-id="' + commentId + '"]');
                                        var originalComment = commentTextElement.text();

                                        // Replace the comment text with a textarea for editing
                                        commentTextElement.html('<textarea class="form-control edit-textarea" data-id="' + commentId + '">' + originalComment + '</textarea>');

                                        // Replace the Edit button with a Save button
                                        $(this).replaceWith('<button class="btn btn-outline-primary save-comment me-2" data-id="' + commentId + '" title="Save"><i class="fa-solid fa-save"></i></button>');

                                        // Handle the Save button click
                                        $('.save-comment').click(function () {
                                            var newComment = $('.edit-textarea[data-id="' + commentId + '"]').val();

                                            $.ajax({
                                                url: 'edit_comment.php',
                                                type: 'POST',
                                                data: {
                                                    comment_id: commentId,
                                                    comment_message: newComment
                                                },
                                                success: function (response) {
                                                    if (response == 'success') {
                                                        // Update the comment text and replace the textarea with plain text
                                                        commentTextElement.text(newComment);

                                                        // Replace the Save button with an Edit button
                                                        $('.save-comment[data-id="' + commentId + '"]').replaceWith('<button class="btn btn-outline-success me-2 edit-comment" data-id="' + commentId + '" title="Edit"><i class="fa-solid fa-pencil"></i></button>');
                                                    } else {
                                                        console.log('Error:', response);
                                                    }
                                                }
                                            });
                                        });
                                    });



                               

                                    // Handle the Delete button click
//                                     $('.delete-comment').click(function () {
//                                         let commentId= $(this).attr('data-id');

//     if (confirm('Are you sure you want to delete this comment?')) {
//         $.ajax({
//             url: 'delete_comment.php',
//             method : 'POST',

//             data : {
//              comment_id : commentId
     
//          },
//          success: function(data){
       
       
//        console.log(data)
       
//    }
//   })
//   }
// })

  
  


                                });
                            </script>




                        </div>
                        <!-- </div> -->
                        <!-- Related Videos -->
                        <div class="col-lg-4 col-md-5">
                            <h4>Related Projects</h4>
                            <div class="list-group">
                                <?php
                                $pro_id = $_GET['p-id'];
                                $current_project_query = "SELECT category FROM `project` WHERE project_id = '$pro_id'";
                                $current_project_result = mysqli_query($connection, $current_project_query);
                                $current_project_row = mysqli_fetch_assoc($current_project_result);
                                $current_category_id = $current_project_row['category'];

                                // Fetch projects from the same category
                                $fetch_project = "SELECT * FROM `project` AS p 
                        INNER JOIN `project_category` AS c 
                        ON p.category = c.c_id 
                        WHERE p.status = 1 AND p.category = '$current_category_id' 
                        AND p.project_id != '$pro_id'
                        ORDER BY p.project_id DESC"; // Limiting the number of related projects displayed
                    
                                $fetch_result = mysqli_query($connection, $fetch_project);
                                if (mysqli_num_rows($fetch_result) > 0) {
                                    while ($row = mysqli_fetch_assoc($fetch_result)) {
                                        ?>
                                        <!-- Example Related Video -->
                                        <a href="view_project.php?p-id=<?php echo $row["project_id"] ?>"
                                            class="list-group-item list-group-item-action d-flex align-items-start">
                                            <!-- <img src="https://via.placeholder.com/150x90" alt="Video Thumbnail" class="me-3"> -->
                                            <img src="<?php echo './User-Dashboard/assets/images/project_img/' . $row["project_img"]; ?>"
                                                alt="" class="me-3">
                                            <div class="w-100">
                                                <h5 class="mb-1"><?php echo ($row['project_name']); ?></h5>
                                                <p class="mb-1"><?php echo ($row['c_name']); ?></p>
                                            </div>
                                        </a>
                                        <!-- More related videos can be added here -->
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>

</section>

<script>
    document.getElementById('likeButton').addEventListener('click', function () {
        const heartIcon = this.querySelector('i');
        if (heartIcon.classList.contains('far')) {
            heartIcon.classList.remove('far');
            heartIcon.classList.add('fas');
        } else {
            heartIcon.classList.remove('fas');
            heartIcon.classList.add('far');
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
include("includes/footer.php");
?>