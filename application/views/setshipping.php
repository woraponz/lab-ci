<!DOCTYPE HTML>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>SlideShow</title>
      <link href="css/style.css" rel="stylesheet" type="text/css" />

	  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-darkness/jquery-ui.css"/>


<head>    
    
</head>
<body>

<script type="text/javascript">
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: "yy-mm-dd",
				onSelect: function(dateText, inst) {
					var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat,dateText,inst.settings);
					var dateText1 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					date.setDate(date.getDate()+7);
					var dateText2 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					$("#dateoutput").html("Chosen date is <b>" + dateText1 + "</b>; chosen date + 7 days yields <b>" + dateText2 + "</b>");
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(function() {
			$("#datepicker2").datepicker({
				dateFormat: "yy-mm-dd",
				onSelect: function(dateText, inst) {
					var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat,dateText,inst.settings);
					var dateText1 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					date.setDate(date.getDate()+7);
					var dateText2 = $.datepicker.formatDate("D,d M yy", date, inst.settings);
					$("#dateoutput").html("Chosen date is <b>" + dateText1 + "</b>; chosen date + 7 days yields <b>" + dateText2 + "</b>");
				}
			});
		});
	</script>


<form action="/~b552535009/index.php/homeshipping/addorder" method="post">

	<tr>
		<td>
			รหัสสินค้า
			<br><input type="text" name='idProduct' id="id" required/><br>
		</td>
	</tr>

	<td>
			ชื่อสินค้า
			<br><input type="text" name='nameProduct' id="id" required/><br>
		</td>
	</tr>
	
	ประเภทสินค้า<br>
	<select name="typeProduct">
		<?php
			$con = mysql_connect("localhost","root","");
			mysql_select_db("shipping",$con);
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM typeorder";
			$result = mysql_query($sql);
			while ($data = mysql_fetch_array($result) ) {
			echo "<option value=$data[typeorder]>$data[typeorder]</option>";
			}
		?>
	</select><br>

	<td>
			จำนวน
			<br><input type="text" name='amountProduct' id="id" required/><br>
		</td>
	</tr>

	<td>
			ชื่อลูกค้าที่ส่งสินค้า
			<br><input type="text" name='customerSend' id="id" required/><br>
		</td>
	</tr>

	<td>
			ชื่อลูกค้าที่รับสินค้า
			<br><input type="text" name='customerReceive' id="id" required/><br>
		</td>
	</tr>

	ชื่อเจ้าหน้าที่ศูนย์ควบคุม<br>
	<select name="nameCCO">
		<?php
			$con = mysql_connect("localhost","root","");
			mysql_select_db("shipping",$con);
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM controlcenterofficer";
			$result = mysql_query($sql);
			while ($data = mysql_fetch_array($result) ) {
			echo "<option value=$data[nameCCO]>$data[nameCCO]</option>";
			}
		?>
	</select><br>

	ชื่อพนักงานขนส่ง<br>
	<select name="nameTransporter">
		<?php
			$con = mysql_connect("localhost","root","");
			mysql_select_db("shipping",$con);
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM transporter";
			$result = mysql_query($sql);
			while ($data = mysql_fetch_array($result) ) {
			echo "<option value=$data[name]>$data[name]</option>";
			}
		?>
	</select><br>

	ยานพาหนะ<br>
	<select name="nameVehicle">
		<?php
			$con = mysql_connect("localhost","root","");
			mysql_select_db("shipping",$con);
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM vehicle";
			$result = mysql_query($sql);
			while ($data = mysql_fetch_array($result) ) {
			echo "<option value=$data[nameVehicle]>$data[nameVehicle]</option>";
			}
		?>
	</select><br>

		ศูนย์ที่ส่งสินค้า<br>
	<select name="sendCC">
		<?php
			$con = mysql_connect("localhost","root","");
			mysql_select_db("shipping",$con);
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM controlcenter";
			$result = mysql_query($sql);
			while ($data = mysql_fetch_array($result) ) {
			echo "<option value=$data[name]>$data[name]</option>";
			}
		?>
	</select><br>

			ศูนย์ที่รับสินค้า<br>
	<select name="receive" width="200">
		<?php
			$con = mysql_connect("localhost","root","");
			mysql_select_db("shipping",$con);
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM controlcenter";
			$result = mysql_query($sql);
			while ($data = mysql_fetch_array($result) ) {
			echo "<option value=$data[name]>$data[name]</option>";
			}
		?>
	</select><br>

        
		วันที่จัดส่งสินค้า<br>
		<td><input id="datepicker" type="text" name="sendDate"/>
           <br>

		   วันที่รับสินค้า<br>
		<td><input id="datepicker2" type="text" name="receiveDate"/>
           <br>

		สถานะของสินค้า<br>
	<select name="statusProduct" width="200">
		<?php
			$con = mysql_connect("localhost","root","");
			mysql_select_db("shipping",$con);
			mysql_query("SET NAMES utf8");
			$sql = "SELECT * FROM status";
			$result = mysql_query($sql);
			while ($data = mysql_fetch_array($result) ) {
			echo "<option value=$data[statusProduct]>$data[statusProduct]</option>";
			}
		?>
	</select><br>


<input type="submit" name="button" id="button" value="  เพิ่ม  ">
<a href="Shipping">กลับ</a>
</body>
</html>