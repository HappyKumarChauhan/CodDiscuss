<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to CodDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include ('partials/dbconnect.php'); ?>
    <?php include ('partials/header.php'); ?>
    <div id="carouselExample" class="carousel slide col-md-11 mx-auto mt-1">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img height="450" width="100%" src="slide1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img height="450" src="slide2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img height="450" src="slide3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container my-4 mx-auto">
        <h1 class="text-center my-4">CodDiscuss-Categories</h1>
        <div class="row mx-auto">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo '<div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>No categories found.</h2>
                        </div>';
            }else{
                while($row=mysqli_fetch_assoc($result)){
                    $catId=$row['category_id'];
                    $catTitle=$row['category_title'];
                    $catDesc=$row['category_desc'];
                    echo '<div class="col-md-4 my-1">
                        <div class="card" style="width: 18rem;">
                            <img src="cardimage.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$catTitle.'</h5>
                                <p class="card-text">'.substr($catDesc,0,100).'...</p>
                                <a href="/coddiscuss/threadlist.php/?categoryId='.$catId.'&page=1" class="btn btn-success">View Threads</a>
                            </div>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>