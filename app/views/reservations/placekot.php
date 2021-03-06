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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    function add_row()
      {
      $rowno=$("#dynamic_table tr").length;
      $rowno=$rowno+1;
      $("#dynamic_table tr:last").after("<tr id='row"+$rowno+"'><td><select id='itemName' name='itemName[]'><option value='select an option' select='selected'>--select an item--</option><?php foreach($data['fooditems'] as $fooditems): ?><option value='<?php echo $fooditems->itemName; ?>'><?php echo $fooditems->itemName; ?></option><?php endforeach; ?></select></td><td><select id='portion' name='portion[]'><option value='select an option' select='selected'>--select an item--</option><option value='Small'>Small</option><option value='Regular'>Regular</option><option value='Large'>Large</option></select></td><td><input type='number' placeholder='Quantity' id='quantity' name='quantity[]' min='1'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
      }
      function delete_row(rowno)
      {
      $('#'+rowno).remove();
      }
  </script>
<title>Place KOT</title>
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

  <!-- System Block -->
  <div class="sys-left-col">
  <div class="recep-dash-plus1">
      <a href="<?php echo URLROOT ?>/reservations/updatereservation?resno=<?php echo $data['resno']?>&roomno=<?php echo $data['roomno']?>">
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
      
  <div class="kot-div">

    <div class="dynamic_form">
      <form method="post" action="<?php echo URLROOT; ?>/reservations/placekot?resno=<?php echo $_GET['resno']?>&roomno=<?php echo $data['roomno']?>">
      <h1>Place Room Order</h1><br><br>
      <input type="button" onclick="add_row();" value="ADD ROW"><br><br>

        <table id="dynamic_table" align=center>
        <tr id="row1">
          <td>
              <select id="itemName" name="itemName[]">
              <option value="select an option" select="selected">--select an option--</option>
              <?php foreach($data['fooditems'] as $fooditems): ?>
              <option value="<?php echo $fooditems->itemName; ?>"><?php echo $fooditems->itemName; ?></option>
              <?php endforeach; ?>
              </select>
          </td>
          <td>
              <select id="portion" name="portion[]">
                <option value="select an option" selected>--select an option--</option>
                <option value="Small">Small</option>
                <option value="Regular">Regular</option>
                <option value="Large">Large</option>
              </select>
          </td>
          <td>
              <input type="number" id="quantity" name="quantity[]" placeholder="Quantity" min="1">
          </td>
        </tr>
        </table><br>
        <input type="hidden" name="status" value="Pending">
        <input type="submit" name="submit_row" value="SUBMIT">
      </form>
      <?php if(!empty($data['isbaritemfilled'])){?>
      <h3 class="error"><?php echo $data['isbaritemfilled']?></h3>
      <?php
      }
      ?>
    </div>

  </div>

  </div>

</body>
</html>