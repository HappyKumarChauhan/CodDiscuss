<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodDiscuss-Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .handles {
            border-top-right-radius: 60px;
            border-bottom-left-radius: 60px;
            padding: 40px 0px;
        }
    </style>
</head>

<body class="bg-secondary">
    <?php include ('partials/dbconnect.php'); ?>
    <?php include ('partials/header.php'); ?>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $message=$_POST['message'];
        $sql="INSERT INTO `messages` (`Name`, `Email`, `Phone`, `Message`, `time_stamp`) VALUES ('$name', '$email', '$phone', '$message', current_timestamp());";
        $result=mysqli_query($conn,$sql);
    }
    ?>
    <div class="container row mx-auto my-4">
        <div class="col-md-6 bg-dark d-flex bg-gradient p-4 text-light align-items-center">
            <div class="container text-center border border-secondary m-5 handles">
                <h6><img width="20" src="callicon.svg" alt="Call Icon"> 6398012742</h6>
                <h6><img width="20" src="emailicon.svg" alt="Email Icon"> kumarhappy42000@gmail.com</h6>
                <h6><img width="20" src="locationicon.svg" alt="location Icon"> Hasanpur, Afzalgarh, Uttar Pradesh
                    246722</h6>
                <div class="mt-3">
                    <a class="m-1" href="https://www.linkedin.com/in/happy-kumar-1773a228a/"><img width="30" src="linkedin.svg" alt="LinkedIn"></a>
                    <a class="m-1" href="https://www.facebook.com/profile.php?id=100014221995587"><img width="30" src="facebook.svg" alt="Facebook"></a>
                    <a class="m-1" href="https://www.instagram.com/iamhappychauhan/"><img width="30" src="instagram.svg" alt="Instagram"></a>
                    <a class="m-1" href="https://x.com/HappyKu11114713"><img width="30" src="twitter.svg" alt="Twitter"></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 bg-light">
            <div class="row justify-content-center">
                <div class="col-md-10 p-4">
                    <h2 class="text-center mb-4">Get in touch with us</h2>
                    <form action="" method="POST">
                        <div class="mb-1">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-1">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-1">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>