<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap">

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js "></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

        reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</head>

<body class="dashboard--bg">

    <div class="dashboard-wrapper">
        <div class="dashboard--sidebar">
            <h2><span> < </span>Welcome, Admin<span> /></span></h2>
            <ul>
                <li><a href="events.admin.php">
                    <img class="dashboard--icon" src="assets/icons/calendar.png">
                    <span>events</span>
                </a></li>
                <li><a href="members.php">
                    <img class="dashboard--icon" src="assets/icons/user-pink.png">
                    <span>members</span>
                </a></li>
                <li><a href="blogs.admin.php">
                    <img class="dashboard--icon" src="assets/icons/comment.png">
                    <span>blogposts</span>
                </a></li>
                <li><a href="#">
                    <img class="dashboard--icon" src="assets/icons/bookmark.png">
                    <span>resources</span>
                </a></li>
                <li><a href="index.php">
                    <img class="dashboard--icon" src="assets/icons/home.png">
                    <span>go back to home</span>
                </a></li>
                <li><a href="includes/logout.inc.php">
                    <img class="dashboard--icon" src="assets/icons/logout.png">
                    <span>logout</span>
                </a></li>
            </ul>
        </div>
    </div>

</body>