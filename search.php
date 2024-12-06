<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodDiscuss-Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .search-results {
            min-height: 85vh;
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
    $search=$_GET['search'];
    $page=$_GET['page']; 
    ?>
    <div class="container search-results mt-4 p-3">
        <h2>Search Results for "<?php echo $_GET['search'] ?>"</h2>
        <?php
        $sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$search');";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo '<div class="h-100 p-5 bg-body-tertiary border rounded-3 col-md-10 mx-auto my-3">
          <h3>No results found.</h3>
            </div>';
        } else {
            $count = 0;
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
            href="/coddiscuss/search.php/?search=<?php echo $search;?>&page=<?php echo $page-1;?>" role="button">&lt; Prev</a>
            <div class="border rounded p-1">Page: <?php echo $page;?></div>
            <a class="btn btn-success 
            <?php if(!($row=mysqli_fetch_assoc($result))){
                echo "disabled";
            }
            ?>" href="/coddiscuss/search.php/?search=<?php echo $search;?>&page=<?php echo $page+1;?>" role="button">Next &gt;</a>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>