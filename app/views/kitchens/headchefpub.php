<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/system.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/a6a11daad8.js"></script>
  
  <title>Pub</title>
</head>
<body>
  <section class="system">
    <nav class="sys-nav" id="sysnav">
      <a href="<?php echo URLROOT ?>/users/headchef">
          <img src="<?php echo URLROOT ?>/public/img/logo-nav.jpg">
      </a>
      <div class="dropdown">
        <button class="dropbtn"> 
          <i class="fa fa-user-circle-o fa-2x"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo URLROOT?>/kitchens/settings">Settings</a>
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
  <div class="bar-dash-plus1">
      <a href="<?php echo URLROOT ?>/users/headchef">
        <i class="fa fa-home fa-4x" aria-hidden="true"></i>
      </a>
      <p>Dashborad</p>
    </div>

    <div class="bar-dash-plus2">
      <a href="<?php echo URLROOT ?>/kitchens/managefooditems">
        <i class="fa fa-book fa-4x" aria-hidden="true"></i>
      </a>
      <p>View food Items</p>
    </div>

    <div class="bar-dash-plus3">
      <a href="<?php echo URLROOT ?>/kitchens/addsnackitem">
        <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
      </a>
      <p>Add Snack Item</p>
    </div>
  </div>
  <div class="sys-right-col">
        <div class="myDIV">
          <a href="<?php echo URLROOT ?>/users/headchef"><button class="Kitchen-button1">Restaurant</button></a>
          <a href="<?php echo URLROOT ?>/kitchens/headchefroom"><button class="Kitchen-button2">Room</button></a>
          <a href="<?php echo URLROOT ?>/kitchens/headchefpub"><button class="Kitchen-button3">Pub</button></a>
        </div>
                <h5 class="Kitchen-orderlist">ORDER LIST :</h5>
                
                <div class="Kitchen-wrap">
                    <div class="Kitchen-search">
                       <input type="text" class="Kitchen-searchTerm">
                       <a href="#searchorder"><button type="submit" class="Kitchen-searchButton">
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </button></a>
                    </div>
                 </div>

                 
                 <table class="Kitchen-table">
                  <tr>
                    <th>Order No</th>
                    <th>Table No</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                  <?php foreach($data['snackitems'] as $snackitem): ?>
                  <tr>
                    <td><?php echo $snackitem->BarOrderNo?></td>
                    <td><?php echo $snackitem->TableNo?></td>
                    <td><?php echo $snackitem->Status?></td>
                    
                    <td><a href="<?php echo URLROOT?>/kitchens/updateorderstatus"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php endforeach; ?>
              
                </table> 
            

  </div>

</body>
</html>
