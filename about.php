<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodDiscuss-About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main-container {
            min-height: 85vh;
        }
    </style>
</head>

<body class="bg-secondary .body">
    <?php include ('partials/dbconnect.php'); ?>
    <?php include ('partials/header.php'); ?>
    <div class="main-container">
        <div class="container row py-4 text-light mx-auto rounded my-4 bg-dark bg-gradient">
            <div class="imagecontainer col-md-5">
                <img class="rounded" width="100%" src="programming.jpg" alt="Programming image">
            </div>
            <div class="container col-md-7 mx-auto p-2">
                <h2 class="text-center mb-3">CodDiscuss-Your Coding Community</h2>
                <p>Welcome to CodDiscuss, your ultimate destination for everything related to
                    coding,
                    programming languages, software development, and beyond. Whether you're a seasoned developer, a
                    coding
                    enthusiast, or a curious beginner, CodDiscuss is your go-to forum to explore, learn, and grow.</p>
                <p>At CodDiscuss, we understand the power of collaboration and knowledge sharing in
                    the
                    world of coding. Our platform is designed to be a welcoming space where you can connect with fellow
                    developers, ask questions, share insights, and stay updated with the latest trends and technologies
                    in
                    the coding world.</p>
            </div>
        </div>
        <div class="container row py-4 text-light mx-auto rounded my-4 bg-dark bg-gradient">
            <div class="container col-md-7 mx-auto p-2">
                <h2 class="text-center mb-3">Our Goals</h2>
                <h6 class="mb-3">CodeHub was created with a clear purpose: to facilitate meaningful discussions and foster a
                    supportive community around coding. Our mission is to:</h6>
                <ul>
                    <li>Provide a platform for developers of all levels to exchange ideas, troubleshoot problems, and
                        share their expertise.</li>
                    <li>Help beginners learn the ropes of coding through tutorials, resources, and mentorship from
                        experienced members.</li>
                    <li>Stay current with industry trends, best practices, and emerging technologies through informative
                        discussions and expert insights.</li>
                    <li>Cultivate a respectful and inclusive environment where diversity of thought is celebrated and
                        constructive feedback is encouraged.</li>
                </ul>
            </div>
            <div class="imagecontainer col-md-5">
                <img class="rounded" width="100%" src="coding.jpg" alt="Programming image">
            </div>
        </div>
        <div class="container row py-4 text-light mx-auto rounded my-4 bg-dark bg-gradient">
            <h2 class="text-center mb-3">Developed By:</h2>
            <div class="container">
                <div class="image-container col-md-3 mx-auto">
                <img style="border-radius:50%;" width="100%" src="happy.jpg" alt="developer imgae">
                </div>
                <h3 class="text-center text-secondary">Happy Kumar</h3>
                <p class="text-center text-secondary">(Full Stack Web Developer)</p>
                <div class="mt-3 text-center">
                    <a class="m-1" href="https://www.linkedin.com/in/happy-kumar-1773a228a/"><img width="30" src="linkedin.svg" alt="LinkedIn"></a>
                    <a class="m-1" href="https://www.facebook.com/profile.php?id=100014221995587"><img width="30" src="facebook.svg" alt="Facebook"></a>
                    <a class="m-1" href="https://www.instagram.com/iamhappychauhan/"><img width="30" src="instagram.svg" alt="Instagram"></a>
                    <a class="m-1" href="https://x.com/HappyKu11114713"><img width="30" src="twitter.svg" alt="Twitter"></a>
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