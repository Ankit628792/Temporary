<!DOCTYPE html>
<html>
<head>
	<title>KR | LogIn</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    
	<script>console.log('connection Successful');</script>

		<img class="wave" src="wave.png">
	<div class="container">
		<div class="img">
			<img src="bg.svg">
		</div>
		<div class="login-content">
			<form action="/kr/login/login.php" method="POST">
				<img src="avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="user">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="pass">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" name="Login">
            </form>
        </div>
    </div>
    <script>const inputs=document.querySelectorAll(".input");function addCl(){let par=this.parentNode.parentNode;par.classList.add("focus");}function remCl(){let par=this.parentNode.parentNode;if(this.value=="")par.classList.remove("focus");}inputs.forEach(input=>{input.addEventListener("focus",addCl);input.addEventListener("blur",remCl);})</script>
</body>
</html>