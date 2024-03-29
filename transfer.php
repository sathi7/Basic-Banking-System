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
                text: "Amount Successfully transferred",
                icon: "success"
            }).then(function() {
                window.location = "transact.php";
            });
        }

        function insufficient() {
            swal({
                title: "OOPS",
                text: "Insuffcient balance! Cannot be transferred...!",
                icon: "error"
            }).then(function() {
                window.location = "transact.php";
            });
        }
    </script>

</head>

<body>
    <?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        $from = $_GET['id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from users where id=$from";
        $query = mysqli_query($conn, $sql);
        $sql1 = mysqli_fetch_array($query);

        $sql = "SELECT * from users where id=$to";
        $query = mysqli_query($conn, $sql);
        $sql2 = mysqli_fetch_array($query);

        // constraint to check insufficient balance.
        if ($amount > $sql1['balance']) {

            echo '<script type="text/javascript">
        insufficient();
       </script>';
        } else {

            // deducting amount from sender's account
            $newbalance = $sql1['balance'] - $amount;
            $sql = "UPDATE users set balance=$newbalance where id=$from";
            mysqli_query($conn, $sql);


            // adding amount to reciever's account
            $newbalance = $sql2['balance'] + $amount;
            $sql = "UPDATE users set balance=$newbalance where id=$to";
            mysqli_query($conn, $sql);

            $sender = $sql1['name'];
            $receiver = $sql2['name'];
            $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo '<script type="text/javascript">
            myFn();
           </script>';
            }

            $newbalance = 0;
            $amount = 0;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>

        <?php
        include 'navbar.php';
        ?>

        <div class="container">
            <h2 class="text-center pt-4">TRANSACTION</h2>
            <?php
            include 'db.php';
            $sid = $_GET['id'];
            $sql = "SELECT * FROM  users where id=$sid";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext"><br>
                <div>
                    <table class="table table-striped table-condensed table-bordered trans-tab">
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Balance</th>
                        </tr>
                        <tr>
                            <td class="py-2"><?php echo $rows['id'] ?></td>
                            <td class="py-2"><?php echo $rows['name'] ?></td>
                            <td class="py-2"><?php echo $rows['email'] ?></td>
                            <td class="py-2"><?php echo $rows['balance'] ?></td>
                        </tr>
                    </table>
                </div>
                <br><br><br>
                <label>Transfer To:</label>
                <select name="to" class="form-control" required>
                    <option value="" disabled>Choose</option>
                    <?php
                    include 'db.php';
                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM users where id!=$sid";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        echo "Error " . $sql . "<br>" . mysqli_error($conn);
                    }
                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option class="table options" value="<?php echo $rows['id']; ?>">
                            <?php echo $rows['name']; ?>

                        </option>
                    <?php
                    }
                    ?>
                    <div>
                </select>
                <br>
                <br>
                <label>Amount:</label>
                <input type="number" class="form-control" name="amount" min="1" max="9999999" required>
                <br><br>
                <div class="text-center">
                    <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

    </html>