<!DOCTYPE html>
<html>
<head>
<title>	Profile Update </title>
<style>
body
{
    
}
table{
	margin-top:80px;
	border:1px solid black;
	border-collapse: collapse;
	background-color:rgba(0,0,0,0.8);
	width:400px;
	height:auto;

	margin-left:400px;
	}
  td{
	text-align:center;
	padding:8px;
	margin:10px;
	color:white;
	
}
.btn{
	border:1px solid black;
	border-radius:5px;
	margin-left:10px;
	text-align:center;
	font-size:22px;
}

</style>
</head>
<body>
<form action="<?php echo base_url()?>main/updtdtls" method="post">
	<?php
	if(isset($userdata))
	{
		foreach($userdata->result() as $row)
		{
			?>
<table>
<tr>
	
	<td><input type="text" name="name"placeholder="first name"value="<?php echo $row->name;?>">
</td></tr>
<tr>
	
	<td><input type="text" name="lname"placeholder="last name"value="<?php echo $row->lastname;?>">
</td></tr>
<tr>
	
	<td><textarea name="address" placeholder="Address"><?php echo $row->address;?></textarea>
</td></tr>
<tr>
	<td>
	<input list="district" name="district"id="district"value="<?php echo $row->district;?>" placeholder="District" required >
      <datalist id="district">
      <option value="Trivandrum">
      <option value="kollam">
      <option value="pathanamthitta">
      <option value="Alapuzha">
      <option value="Idukki">
      <option value="kottayam">
      </datalist>
	
</td></tr>

	<td><input type="date" name="dob"placeholder="DOB"value="<?php echo $row->dob;?>"></td></tr>
<tr>
	
	<td><input type="text" name="email"placeholder="email"value="<?php echo $row->email;?>"></td>
</tr>
<tr>
	
	<td><input type="password" name="password"placeholder="password"value="<?php echo $row->password;?>">
</td></tr>
<tr>
	
	<td><input type="text" name="mobile"placeholder="mobile"value="<?php echo $row->mobile;?>">
</td></tr>
<tr>
	
	<td><input type="text" name="pincode"placeholder="pincode"value="<?php echo $row->pincode;?>">
</td></tr>
<tr>
	
	<td><input type="text" name="uname"placeholder="user name"value="<?php echo $row->username;?>">
</td></tr>
<tr><td><input class="btn" type="submit" name="update" value="update"></td></tr>
<?php
		}
	}
	else
	{
		?>
	<tr>
		<td>no data found </td></tr>
		<?php

}

		?>
</form>

</body>
</html>
