<! DOCTYPE html>
<html>
<head>
<title>Registeration </title>
<style>
h1{
    color:red;
    text-decoration: underline;
    text-align: center;
  }
input{
padding:10px;
margin:10px;
}
fieldset
{
/*padding: 30px;*/
margin-left: 500px;
text-align: center;
background-color: rgba(0,0,0,0.8);
}
 </style>
</head>
<body>
  <h1> Registeration Form</h1>
 <!---form starts---->
 <fieldset style="width:20%;"  >
  <form name="myform" action="<?php echo base_url()?>main/reg_access" method="POST" >
       
        <input type="text" name="name"  placeholder="firstname" pattern=".{3,}"   required title="3 characters minimum" maxlength="25"></br>
     
      <input type="text" name="lname"  placeholder="lastname" pattern=".{1,}"   required title="1 character minimum"  maxlength="25"></br>
      
      <textarea name="address" placeholder="Address"required ></textarea>

      
      <input list="district" name="district" placeholder="District" required >
      <datalist id="district">
      
      <option value="Trivandrum">
      <option value="kollam">
      <option value="pathanamthitta">
      <option value="Alapuzha">
      <option value="Idukki">
      <option value="kottayam">
      </datalist>
    </br>
    <input type="date" name="dob"  placeholder="Date of Birth" required> </br>
      <input type="email" name="email"  placeholder="email" id="email"required><span id="email_result"></span> </br>
      
      <input type="password" name="password" placeholder="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"> </br>
       
      <input type="text" name="mobile"  placeholder="mobile no" required minlength="10"maxlength="10"id="mobile"><span id="phno_result"></span></br> 
      <input type="text" name="pincode"  placeholder="pincode" required> </br>
      <input type="text" id="uname" name="uname"  placeholder="username" required pattern=".{3,}"   required title="3 characters minimum" maxlength="10" ><span id="uname_result"></span></br>

   
    <input type="submit" name="submit" >
</fieldset>
</form>
           

 <!----form ends----->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/email_availibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  

      $('#mobile').change(function(){  
           var mobile = $('#mobile').val();  
           if(mobile != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/phno_availability",  
                     method:"POST",  
                     data:{mobile:mobile},  
                     success:function(data){  
                          $('#phno_result').html(data);  
                     }  
                });  
           }  
      });  
       $('#uname').change(function(){  
           var uname = $('#uname').val();  
           if(uname != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/uname_availability",  
                     method:"POST",  
                     data:{uname:uname},  
                     success:function(data){  
                          $('#uname_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  

</body>
</html>




 

