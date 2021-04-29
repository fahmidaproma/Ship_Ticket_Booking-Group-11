<html>
	<head>	
	</head>
	<body>
<?php
	require_once "models/db_config.php";
	$id="";
	$err_id="";	
    $uname="";
	$err_uname="";
	$pass="";
	$err_pass="";	
    $cpass="";
    $err_cpass="";	
	$email="";
	$err_email="";	
	$num="";
	$err_num="";
	$add="";
	$err_add="";
	$birth="";
	$err_birth="";
	$hasError=false;
	$err_message="";
	
	 	
	if($_SERVER["REQUEST_METHOD"] == "POST")
        if(empty($_POST["id"])){
           $err_id="*ID Required";
           $hasError = true;
        }    
        else{
           $id = htmlspecialchars($_POST["id"]);
        }
        
        if(empty($_POST["uname"])){
           $err_uname="*Username Required";
           $hasError = true;
        }
        else if(strlen($_POST["uname"])>0 && strlen($_POST["uname"])<3)
        {
            $err_uname="*Username should contain atleast 3 character";
            $has_error=true;
        }
        else
        {
            $uname=htmlspecialchars($_POST["uname"]);
        }
       
       if(empty($_POST["pass"])){
		   $err_pass="*Password Required";
		   $hasError = true;
		}
		else if(strlen($_POST["pass"])<4)
		{
		  $err_pass="*Password Must Contain At Least 4 Character";
		  $hasError = true;
		}
		else{
		   $pass = htmlspecialchars($_POST["pass"]);
		}
        
        if(empty($_POST["cpass"])){
            $err_cpass="*Confirm your password.";
            $has_error=true;
        }
        else if(($_POST["cpass"])!=($_POST["cpass"]))
        {
            $err_cpass="*wrong Password ";
            $has_error=true;
        }
        else
        {
            $cpass=htmlspecialchars($_POST["cpass"]);
        }
       
        if(empty($_POST["num"])){
           $err_num="*Phone Number";
           $hasError = true;
        }
        else if(is_numeric($_POST["num"])==false)
        {
            $err_num="*Invalid number format";
            $has_error=true;
        }
        else if(strlen($_POST["num"])>0 && strlen($_POST["num"])<5)
        {
            $err_num="*Invalid number format";
            $has_error=true;
        }
        else{
           $num = htmlspecialchars($_POST["num"]);
        }
        
        if(empty($_POST["add"])){
           $err_add="*Please give address";
           $hasError = true;
        }     
        else{
           $add = htmlspecialchars($_POST["add"]);
        }
                                
        if (empty($_POST["email"]))
        {
            $err_email = "*Email is required";
            $hasError = true;
          }    

 

        else if(strpos($_POST["email"],"@")=="" || strpos($_POST["email"],".")=="")
        {
            $err_email="*Invalid Email Format";
            $has_error=true;
        }
        else
        {
            $email=htmlspecialchars($_POST["email"]);
        }
     
       if(empty($_POST["birth"])){
		   $err_birth="*Date Of Birth Required";
		   $hasError = true;
		}	 
		else{
		   $birth = htmlspecialchars($_POST["birth"]);
		
		if($id== "1" && $uname == "jamiul" && $pass=="1234" &&  $email=="aaa@gmail.com" && $num=="11111" && $add=="11/12" && $birth=="10/4/21"){
            //setcookie("username",$username,time()+120);
            session_start();
            $_SESSION["id"]=$id;
			$_SESSION["uname"]=$uname;
			$_SESSION["pass"]=$pass;
			$_SESSION["cpass"]=$cpass;
			$_SESSION["email"]=$email;
			$_SESSION["num"]=$num;
			$_SESSION["add"]=$add;
			$_SESSION["birth"]=$birth;
            header("Location: dashboard.php");
        }
		if(!$hasError){
			$query = "insert into sign_up values('$id','$uname','$pass','$email','$num','$add','$birth')";
			execute($query);							  
		}
	}
	
	
?>
<html>
    <head>
	    <link rel="stylesheet" type="text/css" href="styles/mystyle.css">
			<style>
				.btn-mine{
					background-color:tomato;
					color:white;
					border:none;
					width:40%;
					height:30%;
				}
				.btn-mine:hover{
					background-color:red;
				}
				.btn-mine:active{
					background-color:green;
				}
			</style>
	</head>
    <body>	      	 
		<div class="signupdiv">		 		  		
			<table align="center" >
				<tr>
					<td colspan="2" align="center"><span class="err-msg"><?php echo $err_message;?></span>
					</td>
				</tr>							   
			</table>
			
			<fieldset>
			<legend align="center">
				<tr>				  				    
		            <td><h1 align="center" style="font-family:verdana;">Employee Signup</h1></td>					
				</tr>
			</legend>
			  
			<form action="" method="post" class="form-horizontal form-material" onsubmit="return validate()">
				<div class="form-group">			
				 <table align="center" style="border-collapse:collapse;">
				 <tr>
					<td><span> ID</span></td>
					<td>:
						<input type="text" placeholder="ID" id="id" name="id" value="<?php echo $id?>">
						<span id="err_id"><?php echo $err_id?></span></td>
				</tr>
					<tr>
					<td><span> Username</span></td>
					<td>:
						<input type="text" placeholder="Username" id="uname" name="uname" value="<?php echo $uname?>">
						<span id="err_uname"><?php echo $err_uname?></span></td>
				</tr>
					<tr>
					<td><span>Password</span></td>
					<td>:
						<input type="password" placeholder="Password" id="pass" name="pass" value="<?php echo $pass?>">
						<span id="err_pass"><?php echo $err_pass?></span></td>
				</tr>
				
					<tr>
						<td><span>Confirm Password </span></td>
						<td>:
				     <input type="password" placeholder="Confirm Password"  id="cpass" name="cpass" value="<?php echo $cpass?>">
					 <span id="err_cpass"><?php echo $err_cpass?></span></td>
			</tr>
				<tr>
					<td><span>Email</span></td>
					<td>:
						<input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email?>">
						<span id="err_email"><?php echo $err_email?></span></td>
				</tr>
					   <tr>
					   
				<td><span>Phone Number </span></td>
                <td>:
				     <input type="num" placeholder="Phone Number" id="num" name="num" value="<?php echo $num?>">
					 <span id="err_num"><?php echo $err_num?></span></td>
			</tr> 
	
				<tr>					   
				<td><span>Address </span></td>
                <td>:
				   <input type="add" placeholder="Address" id="add" name="add" value="<?php echo $add?>">
					 <span id="err_add"><?php echo $err_add?></span></td>
			</tr> 
			
				<tr>					   
				<td><span>Date Of Birth </span></td>
                <td>:
				     <input type="text" placeholder="dd/mm/yyyy" id="birth" name="birth" value="<?php echo $birth?>">
					 <span id="err_birth"><?php echo $err_birth?></span></td>
			</tr> 
					   <tr>
					   <td colspan="2" align="center">
						<p><span><input type="checkbox"></span>I agree to the terms of services</p>
						</td>
						</tr>
					    <tr>						
						   <td colspan="2" align="center"><input class="btn-mine my-font" type="submit"  value="Signup" name="signup">	</td>						   
					    </tr>
						
				  </table>
			  
			  </form>
			  </fieldset>
		  </div>
		  </div>
	 </body>
	    <script>
		function get (id){
			return document.getElementById(id);
		}
	   function validate(){
		   
		   //cleanUp();
		   var hasError=false;
		   if(get("id").value == ""){
			   get ("err_id").innerHTML="*ID Required<br>";
			   get ("err_id").style.color="red";
			   hasError=true;			  
		   }
		  
		   if(get("uname").value == ""){
			   get ("err_uname").innerHTML="*Username Required<br>";
			   get ("err_uname").style.color="red";
			   hasError=true;			   
		   }
		   if(get("pass").value == ""){
			   get ("err_pass").innerHTML="*Password Required<br>";
			   get ("err_pass").style.color="red";
			   hasError=true;			   
		   }
		   if(get("cpass").value == ""){
			   get ("err_cpass").innerHTML="*Confirm Password Required<br>";
			   get ("err_cpass").style.color="red";
			   hasError=true;			   
		   }
		   if(get("email").value == ""){
			   get ("err_email").innerHTML="*Email Required<br>";
			   get ("err_email").style.color="red";
			   hasError=true;
			  
		   }
		   if(get("num").value == ""){
			   get ("err_num").innerHTML="*Phone Number Required<br>";
			   get ("err_num").style.color="red";
			   hasError=true;
			   
		   }
		   if(get("add").value == ""){
			   get ("err_add").innerHTML="*Address Required<br>";
			   get ("err_add").style.color="red";
			   hasError=true;
		   }
		   
		   if(get("birth").value == ""){
			   get ("err_birth").innerHTML="*Date Of Birth Required<br>";
			   get ("err_birth").style.color="red";
			   hasError=true;
			   
		   }
		   //alert (err_msg);
		   if(!hasError){
		   return true;
		   }		  
			   return false;
		   
	   }
		function cleanUp(){
			get ("err_id").innerHTML="";
			get ("err_uname").innerHTML="";
			get ("err_pass").innerHTML="";
			get ("err_cpass").innerHTML="";
			get ("err_email").innerHTML="";
			get ("err_num").innerHTML="";
			get ("err_add").innerHTML="";
			get ("err_birth").innerHTML="";
		}
	}
	 </script>
</html>