<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banking Application</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/b024a0525a.js" crossorigin="anonymous"></script>

</head>

<body>
  <?php
  include 'navbar.php';
  ?>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="insert.php" method="POST">

          <div class="modal-body">
            <div class="form-group">
              <label for="nameid">Name</label>
              <input type="text" class="form-control" id="nameid" placeholder="Enter name" name="name" autocomplete="off"required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" autocomplete="off"  required>
            </div>

            <div class="form-group">
              <label for="phoneid">Phone Number</label>
              <input type="tel" class="form-control" id="phoneid" placeholder="Ex..9786543210" pattern="[789][0-9]{9}" name="phno" autocomplete="off" required>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Balance</label>
              <input placeholder="Balance" type="number" name="balance" min="1000" max="9999999" class="form-control" id="exampleInputPassword1"autocomplete="off" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
          </div>

        </form>

      </div>
    </div>
  </div>


  <!-- TOP CONTAINER -->
  <div class="top-con">
    <p>WELCOME TO
    <h1><span class="bank">THE ELITE BANK</span></h1>
    </p>
    <p class="quote">--"The beginning is always now."</p>
    <!-- <div class="bank-png">
        <img src="images/bank-img.png" alt="bank-img">
        </div> -->
    <div class="logo-img">
      <img src="images/process.gif" alt="bank-img">
    </div>
    <div class="cover-text">
      <p style="color: #FF416C;">Your Cash is waiting!</p>
      <p>Let's</p>
    </div>
    <div class="btn-0">
      <!-- <a class="" href="#" data-toggle="modal" data-target="#exampleModalCenter">REGISTER HERE</a> -->
      <a class="reg-btn" href="#" data-toggle="modal" data-target="#exampleModalCenter">GET STARTED</a>
    </div>
  </div>

  <div class="middle-con middle-cover">
    <div class="container">
      <div class="grid">


        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/user.png" alt="Avatar" style="width:300px;height:300px;" />
            </div>
            <div class="flip-card-back">
              <h1>USER PROFILE</h1>
              <p>Select this option to view the list of all user profiles that you currently have in our system. </p>
            </div>
          </div>
        </div>




        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/transaction.png" alt="Avatar" style="width:300px;height:300px;" />
            </div>
            <div class="flip-card-back">
              <h1>Transfer Amount</h1>
              <p>Select this option to transfer amount from one account to another account </p>
            </div>
          </div>
        </div>

        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/report.png" alt="Avatar" style="width:300px;height:300px;" />
            </div>
            <div class="flip-card-back">
              <h1>Transaction History</h1>
              <p>Select this option to view the transaction history of users. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="btn-1">
    <a class="user-btn" href="viewuser.php">USER PROFILE</a>
    <!-- <button class="user-btn">Create User</button> -->
  </div>

  <div class="btn-2">
    <a class="transact-btn" href="transact.php">TRANSACT AMOUNT</a>
  </div>

  <div class="btn-3">
    <a class="history-btn" href="transactionhistory.php">TRANSACTION HISTORY</a>
  </div>

  <!-- BOTTOM CONTAINER(FOOTER) -->
  <div class="bottom-con">
    <h2>ELITE BANK</h2>
    <p> © 2022. Made by Sathi Prakash</p>
    <div class="social-media">
      <a href="https://github.com/sathi7" target="_blank">
        <i class="fab fa-github"></i>
      </a>
      <a href="https://api.whatsapp.com/send?phone=+919385325614" target="_blank">
        <i class="fab fa-whatsapp"></i>
      </a>
      <a href="https://www.instagram.com/s.a.t.h.i._/" target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://www.linkedin.com/in/sathi-prakash-b-3104041b4" target="_blank">
        <i class="fab fa-linkedin"></i>
      </a>
      
      <a href="mailto:sathiprakash.balasubramani@gmail.com" target="_blank">
        <i class="fas fa-envelope"></i>
      </a>
    </div>
  </div>
 

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>