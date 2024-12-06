<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodDiscuss-Threadlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main-container {
            min-height: 50vh;
        }
        .link :hover{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php include ('partials/dbconnect.php'); ?>
    <?php include ('partials/header.php'); ?>
    <?php
    $category_id = $_GET['categoryId'];
    $page = $_GET['page'];
    if (isset($_SESSION['loggedIn'])) {
        $username = $_SESSION['username'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['threadTitle'];
        $desc = $_POST['threadDesc'];
        $sql = "INSERT INTO `threads`(`thread_title`, `thread_desc`, `category_id`, `asked_by`) VALUES ('$title','$desc','$category_id','$username')";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <?php
    $sql = "SELECT * FROM `categories` WHERE category_id='$category_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $catTitle = $row['category_title'];
    $catDesc = $row['category_desc'];
    echo '<div class="h-100 p-5 bg-body-tertiary border rounded-3 col-md-10 mx-auto my-3">
        <h2>' . $catTitle . '</h2>
        <p>' . $catDesc . '</p>
    </div>';
    ?>
    <?php
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        echo '<div class="container col-md-10 border p-2 rounded">
        <h2>Start a discussion</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="threadTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="threadTitle" name="threadTitle"
                    placeholder="Write the title as short as possible." required>
            </div>
            <div class="mb-3">
                <label for="threadDesc" class="form-label">Description</label>
                <textarea class="form-control" id="threadDesc" name="threadDesc" rows="3" required></textarea>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>';
    }
    ?>
    <div class="main-container"> 
        <?php
        $sql = "SELECT * FROM `threads` WHERE category_id='$category_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo '<div class="h-100 p-5 bg-body-tertiary border rounded-3 col-md-10 mx-auto my-3">
          <h2>No Threads found.</h2>
            </div>';
        } else {
            $count = 0;
            echo '<div class="container mt-5 col-md-10">';
            echo '<h2 class="m-3">Threads</h2>';
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;
                if ($count <= ($page - 1) * 10) {
                    continue;
                }
                $threadId = $row['thread_id'];
                $threadTitle = $row['thread_title'];
                $threadDesc = $row['thread_desc'];
                $askedBy = $row['asked_by'];
                $timestamp = $row['time_stamp'];
                echo '<div class="card mx-auto my-1">
                <div class="card-body">
                    <a href="/coddiscuss/thread.php/?threadId=' . $threadId . '&badge=1#badge1" class="text-dark link text-decoration-none"><h4 class="card-title">' . $threadTitle . '</h4></a>
                    <p class="card-text">' . $threadDesc . '</p>
                    <p class="card-text"><small class="text-muted">Asked by: ' . $askedBy . ' at ' . $timestamp . '</small></p>
                </div>
            </div>';
                if ($count == $page * 10) {
                    break;
                }
            }
            echo '</div>';
        }
        ?>
        <div class="container my-4 d-flex justify-content-center align-items-center gap-4">
            <a class="btn btn-success  
            <?php 
            if($page-1==0){echo "disabled";}?>" 
            href="/coddiscuss/threadlist.php/?categoryId=<?php echo $category_id;?>&page=<?php echo $page-1;?>" role="button">&lt; Prev</a>
            <div class="border rounded p-1">Page: <?php echo $page;?></div>
            <a class="btn btn-success 
            <?php if(!($row=mysqli_fetch_assoc($result))){
                echo "disabled";
            }
            ?>" href="/coddiscuss/threadlist.php/?categoryId=<?php echo $category_id;?>&page=<?php echo $page+1;?>" role="button">Next &gt;</a>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>