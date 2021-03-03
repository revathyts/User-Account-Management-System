<!DOCTYPE html>
<html>
<head>
<title>Admin Home</title>

<style>
*
{
    padding: 0px;
    margin:0px;
}
body
{
    
}

.a
{
    
    width:450px;
    height:500px;
    padding:20px;
    text-align:center;
    position:relative;
    left:400px;
    
}

.menubar
{
    background-color:black;
    text-align:center;
}
.menubar ul
{
    list-style:none;
    display:inline-flex;
}
.menubar ul li a
{
    color:white;
    text-decoration:none;
}
.submenu
{
    display:none;
}
.menubar ul li
{
    padding:15px;
}
.menubar ul li:hover
{
    background-color:#ff0000;
    border-radius:10px;
}
.menubar ul li:hover .submenu
{
    display:block;
    position:absolute;
    background-color:black;
    margin-top:15px;
    margin-left:-20px;
    border-radius:10px;
    padding:15px;
    
}
.menubar ul li:hover .submenu ul
{
    display:block;
    margin-left:-20px;
}
.menubar ul li:hover .submenu ul li
{
    padding:10px;
    border-bottom:1px solid #ff0000;
}
h1{ 
  position:absolute;
  font-size:40;
  color:red;
  margin-top:200px;
  margin-left:500px;
  text-align: center;
}
body{
  background-image: url("../img/im3.png");
      background-size: cover; 
      background-attachment: fixed;
</style>



</head>
<body>
<nav class="menubar">
    <ul>
        <li><a href="<?php echo base_url()?>main/index">Home</a></li>
        <li><a href="<?php echo base_url()?>main/view_table"> Manage users</a>
            
                <li><a href="<?php echo base_url()?>main/logout">Logout</a></li>
            </div>
        </li>
    </ul>
</nav>
<h1>Admin Home</h1>

</body>
</html>