<?php if (!isset($_SESSION['UserID'])|| $_SESSION["UserTypeID"] != 2){ 
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
  <title>Update KOT</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/receptionist">
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
  </section>
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
  <div class="sys-left-col">
  <div class="recep-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/updatereservation?resno=<?php echo $_GET['resno']?>&roomno=<?php echo $_GET['roomno']?>">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Update Reservation</p>
    </div>

    <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/receptionist">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashboard</p>
    </div>

    <div class="reservation-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/completedreservations">
        <i class="fa fa-list-alt fa-4x" aria-hidden="true"></i>
      </a>
      <p>Completed<br> Reservations</p>
    </div>
  </div>
  
  <div class="sys-right-col">
    <div class="KOT-right">

    <!-- Room KOT Details -->
    <div class="res-kot-detail-heading"><br>   
      <h1 style="color:#01661b">Room Order #<?php echo $_GET['roomorderno']?></h1>
    </div>

    <!-- KOT Item Details -->
             
            <div class="res-kot-details">
            <table>
              
              <tr>
              <th style="width:30%;">Food Item</th>
              <th style="width:30%;">Portion</th>
              <th style="width:20%;">Quantity</th>
              <th style="width:10%;"></th>
              <th style="width:10%;"></th>
              </tr>
            <?php foreach($data['roomorderitems'] as $item): ?>
              <tr>
              <td><?php echo $item->itemName?></td>
              <td><?php echo $item->PortionType?></td>
              <td><?php echo $item->Quantity?></td>
              <td><a href="<?php echo URLROOT ?>/reservations/updateorderitem?roomorderno=<?php echo $_GET['roomorderno']?>&itemno=<?php echo $item->RoomOrderItemNo?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
              <td><a href="<?php echo URLROOT ?>/reservations/deleteorderitem?resno=<?php echo $_GET['resno']?>&roomno=<?php echo $_GET['roomno']?>&roomorderno=<?php echo $_GET['roomorderno']?>&itemno=<?php echo $item->RoomOrderItemNo?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
              </tr>
            <?php endforeach; ?>
            </table><br><br>
                
          </div>



  </div>
  </div>

</body>
</html>
