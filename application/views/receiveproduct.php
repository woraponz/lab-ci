<!DOCTYPE HTML>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>SlideShow</title>
      <link href="css/style.css" rel="stylesheet" type="text/css" />
<head>    
    
</head>
<body>

<center>

<?php 

	
		foreach($order->result() as $orderall)
			{	
			?>	
				รหัสสินค้า : <?php echo $orderall->idProduct ;echo"<br />"; ?> 
							
				ชื่อสินค้า : <?php echo $orderall->nameProduct;echo"<br />"; ?>
							
				ประเภทสินค้า : <?php echo $orderall->typeProduct;echo"<br />"; ?>

				จำนวน : <?php echo $orderall->amountProduct;echo"<br />"; ?>

				ชื่อพนักงานขนส่ง : <?php echo $orderall->nameTransporter;echo"<br />"; ?>

				ทะเบียนรถ : <?php echo $orderall->nameVehicle;echo"<br />"; ?>

				ศูนย์ที่ส่งสินค้า : <?php echo $orderall->sendCC;echo"<br />"; ?>

				ศูนย์ที่รับสินค้า : <?php echo $orderall->receiveCC;echo"<br />"; ?>
 
				วันที่จัดส่งสินค้า : <?php echo $orderall->sendDate;echo"<br />"; ?>

				วันที่รับสินค้า : <?php echo $orderall->receiveDate;echo"<br />"; ?>

				สถานะของสินค้า : <?php echo $orderall->statusProduct;echo"<br />";


								echo"<br />";
				
			}
?>
	
   
		<a href="<?=base_url()?>index.php">Logout</a>
	
</body>
</html>