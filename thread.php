<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodDiscuss-Thread</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include ('partials/dbconnect.php'); ?>
    <?php include ('partials/header.php'); ?>
    <?php
    $thread_id = $_GET['threadId'];
    $badge = $_GET['badge'];
    if (isset($_SESSION['loggedIn'])) {
        $username = $_SESSION['username'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $comment = $_POST['comment'];
        $sql = "INSERT INTO `comments`(`comment`, `thread_id`, `posted_by`) VALUES ('$comment','$thread_id','$username')";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <?php
    $sql = "SELECT * FROM `threads` WHERE thread_id='$thread_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $threadTitle = $row['thread_title'];
    $threadDesc = $row['thread_desc'];
    $askedBy = $row['asked_by'];
    $timestamp = $row['time_stamp'];
    echo '<div class="h-100 p-5 bg-body-tertiary border rounded-3 col-md-10 mx-auto my-3">
        <h2>' . $threadTitle . '</h2>
        <p>' . $threadDesc . '</p>
        <p class="card-text"><small class="text-muted">Asked by: ' . $askedBy . ' at ' . $timestamp . '</small></p>
        </div>';
    ?>
    <?php
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        echo '<div class="container col-md-10 border p-2 rounded">
        <h2>Post a Comment</h2>
        <form action="" method="post">
            <div class="form-group">
                <textarea class="form-control" id="comment" name="comment" rows="3"
                    placeholder="Enter your comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-2">Submit</button>
        </form>
    </div>';
    }
    ?>
    <?php
    $sql = "SELECT * FROM `comments` WHERE thread_id='$thread_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo '<div class="h-100 p-5 bg-body-tertiary border rounded-3 col-md-10 mx-auto my-3">
          <h2>No comments found.</h2>
            </div>';
    } else {
        echo '<div class="container mt-5 bg-body-tertiary col-md-10 p-4">
        <div class="row">';
        $count = 0;
        echo '<h2 class="mb-3 text-center">Comments</h2>';
        while ($row = mysqli_fetch_assoc($result)) {
            if($count==$badge*25-25){
                echo '<div class="row" id="badge' . $badge . '"></div>';
            }
            $count++;
            $comment = $row['comment'];
            $postedBy = $row['posted_by'];
            $timestamp = $row['timestamp'];
            echo '<div class="media mb-4 border p-2 border">
                    <img src="/coddiscuss/user.png" class="mr-3 rounded-circle" alt="User Image"
                        style="width: 50px;">
                        <h5 class="mt-0 d-inline">' . $postedBy . '</h5>
                        <small class="text-muted ml-2">Posted on: ' . $timestamp . '</small>
                    <div class="media-body">
                        <p class="ml-2">' . $comment . '</p>
                    </div>
                </div>';
            if ($count == $badge * 25) {
                break;
            }
        }
        echo '</div>
        </div>';
        $badge++;
    }
    ?>
    <div class="text-center">
        <a href="/coddiscuss/thread.php/?threadId=<?php echo $thread_id; ?>&badge=<?php echo $badge; ?>#badge<?php echo $badge; ?>"
            class="btn btn-success btn-lg m-3 
            <?php if(!($row=mysqli_fetch_assoc($result))){
                echo "disabled";
            }
            ?>
            ">Load More</a>
    </div>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>