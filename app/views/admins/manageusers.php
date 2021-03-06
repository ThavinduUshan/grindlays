<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 1){ 
      header('location: ' . URLROOT .  '/users/login');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/stylen.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Manage Users</title>
</head>
<body>
  <section class="system-single">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/admin">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
      <a href="javascript:void(0);" style="width:15px;" class="icon" onclick="dropdown()">&#9776;</a>
    </nav>
   
  <script>
    function dropdown() {
      var x = document.getElementById("sysnav");
      if (x.className === "sys-nav") {
        x.className += " responsive";
      } else {
        x.className = "sys-nav";
      }
    }
  </script>

  <!-- System Block -->
    <br><br>
  <div class="single-color-dashborad">
    <div class="admin-dash-button">
      <a href="<?php echo URLROOT ?>/users/register">Add Users</a>
      <a href="<?php echo URLROOT ?>/users/admin">Go Back to Dashboard</a>
        
    </div><br>
    <div class="rest-man-head">
      <p>Users List</p>
    </div>

    <div class="rest-man-food">
      <table>
        <tr>
          <th style="width: 15%;">First Name</th>
          <th style="width: 25%;">Email</th>
          <th style="width: 20%;">Mobile</th>
          <th style="width: 15;">Username</th>
          <th style="width: 10%;">UserTypeID</th>

        </tr>

        <?php foreach($data['users'] as $user): ?>
        <tr>
          <td style="width: 15%;"><?php echo $user->FirstName?></td>
          <td style="width: 25%;"><?php echo $user->Email?></td>
          <td style="width: 20%;"><?php echo $user->Mobile?></td>
          <td style="width: 15%;"><?php echo $user->UserName?></td>
          <td style="width: 10%;"><?php echo $user->UserTypeID?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  </section>
</body>
</html>
