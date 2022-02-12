<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function myFn() {
            swal({
                title: "Success",
                text: "Your data has been successfully saved!",
                icon: "success"
            }).then(function() {
                window.location = "create.php";
            });
        }
    </script>

</head>

<body>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "banking";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $balance = $_POST['balance'];

    $sql = "INSERT INTO users(name,email,phno,balance) VALUES ('$name','$email','$phno',$balance)";
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
       myFn();
      </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    ?>

</body>

</html>