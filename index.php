<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Form</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PHP Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Creator
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Created By Prajwal</a>

                    </div>
                </li>

            </ul>

        </div>
    </nav>

    <!-- php -->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $desc = $_POST["desc"];

        //submit to database

        $servername = "localhost:3307";
        $username = "root";
        $password = '';
        $database = "form_contacts";
        $conn = mysqli_connect($servername, $username, $password, $database);

        //checking if connection is sucessfull or not
        if (!$conn) {
            die("Sorry we failed to connect: " . mysqli_connect_error() . "<br>");
        } else {
            // ! TODO: remember this echo was intended to know whether connection with db is sucessfull or not, don't write echo in production.
            // echo "Connection was successful with database <br>";

            //inserting values
            // insertion query
            $sql = "INSERT INTO `contacts_table_1` (`name`, `email`, `concern`, `date`) VALUES ('$name', '$email', '$desc', current_timestamp())";

            // Inserting the record into table of database using mysqli extension
            $result = mysqli_query($conn, $sql);

            //checking if insertion is successfull or not
            if ($result) {
                echo '<div class=" mt-3 ml-3 mr-3 alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Entry has been submitted successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            } else {
                // ! TODO: Change this echo with faliure alert in production.
                // echo "Error occured while inserting the record into table <br>" . mysqli_error($conn);
                echo '<div class="mt-3 ml-3 mr-3  alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed! </strong> Some error occured while submitting the entry.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        }
    }
    ?>

    <!-- form -->
    <div class="container mt-3 mb-3 pl-5 pr-5 pb-5 pt-2">
        <h2>Contact Us.</h2>
        <form action="/28-form-saving-data.php" method="post">

            <div class="form-group ">
                <label for="name">Name</label>
                <input type="text" required class="form-control" id="name" aria-describedby="nameHelp" name="name" value="">
            </div>

            <div class="form-group ">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="desc">Desciption</label>
                <textarea type="text" required cols="30" rows="5" class="form-control" id="desc" name="desc" value=""></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>