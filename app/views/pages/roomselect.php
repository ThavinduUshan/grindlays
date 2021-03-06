<?php
if(empty($data['checkin']) && empty ($data['checkout'])){
  header('location: '. URLROOT . '/pages/selectdate');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/stylen.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  <title>Room Select</title>
</head>
<body>
  <section class="roomselect">
    <nav>
      <a href="<?php echo URLROOT ?>/pages/">
        <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="nav-links" id="navLinks">
          <ul>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages">Home</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/about">About</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/facilities">Facilities</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/gallery">Gallery</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
          <li><a style="color:green;" href="<?php echo URLROOT; ?>/pages/issues">Complains</a></li>
          </ul>
        </div>
    </nav><br><br>
    <div class="rooms-section">
      <?php foreach($data['results'] as $room):?>
        <?php 
          $checkin = strtotime($data['checkin']);
          $checkout = strtotime($data['checkout']);
          $datediff = ($checkout - $checkin) / (60*60*24);
          $datediff = ceil($datediff);
          $calculatedprice = $datediff * intval($room->Price);
        ?>
      <div class="room-card">
        <form action="<?php echo URLROOT?>/pages/placereservation" method="post">
          <h2><?php echo $room->Name?></h2>
          <h5>Available</h5>
          <img src="<?php echo URLROOT?>/public/img<?php echo $room->Image?>" alt="Room Image">
          <h2><?php echo "Rs. " . $calculatedprice . ".00" ?></h2>
          <input type="hidden" name="packagetypeid" value="<?php echo $room->PackageTypeId?>">
          <input type="hidden" name="roomno" value="<?php echo $room->RoomNo?>">
          <input type="hidden" name="checkin" value="<?php echo $data['checkin'] ?>">
          <input type="hidden" name="checkout" value="<?php echo $data['checkout'] ?>">
          <input type="hidden" name="peoplecount" value="<?php echo $data['peoplecount'] ?>">
          <input type="submit" value="Book Now">
        </form>
      </div>
      <?php endforeach ?>
    </div>
  </section>
</body>
</html>