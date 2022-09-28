<?php
include "code.php";
?>

<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet" /><link> 
<link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body
{
font-family: "Times New Roman", Times, serif;
color: white;
}
.background {
background: url('lpimg.jpg') rgba(0, 0, 0, 0.61);
background-repeat: no-repeat;
background-size: cover;
position: absolute;
top: 0;
bottom: 0;
left: 0;
right: 0;
width: 1488px;
height: 750px;
fill-layer-image-opacity: 0.3;
opacity: 0.75;
}
.container {
position:absolute;
width: 667px;
height: 500px;
left: 386px;
top: 70px;
display: flex;
flex-direction: column;
text-align: center;
margin: 10vh auto;
background: rgba(241, 235, 237, 0.6);
box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 50px;
font-family: 'Alegreya Sans';
font-style: normal;
font-weight: 400;
font-size: 15px;
line-height: 25px;
text-align: center;
color: #000000;

}
form {
padding: 10px;
display: flex;
flex-direction: column;
width: 85%;
}
input[type=text], input[type=password] {
width: 50%;
padding: 15px;
margin: 5px 0 22px 0;
display: inline-block;
border: none;
background: #f1f1f1;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
input[type=text]:focus, input[type=password]:focus {
background-color: #ddd;
outline: none;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
hr {
border: 0.5px solid black;
margin-bottom: 30px;
margin-top: 15px;
margin-left: 100px;
margin-right: 100px;
}
.registerbtn {
background: #313030;
border-radius: 30px;
font-family: 'Almendra';
color: white;
padding: 16px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 40%;
opacity: 0.9;

}
.registerbtn:hover {
opacity: 1;
}
a {
color: dodgerblue;
}

.error-message {
	  color: red;
	  margin-top: -25px;
	  margin-bottom: 0px;
	  font-size: 15px;
	}
	
	
	#header {
		-moz-align-items: center;
		-webkit-align-items: center;
		-ms-align-items: center;
		align-items: center;
		background: #fff;
		cursor: default;
		height: 6em;
		left: 0;
		line-height: 6em;
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 10001;
		box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.075);
		text-align: left;
	}

		#header .logo {
			color: rgba(205,78,163,1);
			font-family: "Audiowide";
			font-size: 2.5em;
			letter-spacing: 2px;
			margin-top: -5px;
			text-decoration: none;
			display: inline-block;
			margin-left: 125px;
		}
		
		#header .logodes{
			display: flex;
			justify-content: center;
			align-items: center;
			left: 10px;
		}
		
		#header .logodes img{
			width: 70px;
			border-radius: 50px;
		}
		

		#header nav {
			position: absolute;
			top: 0;
			height: inherit;
			line-height: inherit;
		}

			#header nav.left {
				left: 2em;
			}

			#header nav.right {
				right: 2em;
			}

			#header nav .button {
				padding: 0 2em;
				height: 3.25em;
				line-height: 3.25em;
			}

			#header nav a {
				text-decoration: none;
				display: inline-block;
			}

				#header nav a[href="#menu"] {
					text-decoration: none;
					-webkit-tap-highlight-color: transparent;
					font-size: 2em;
					color: #dee1e3;
					z-index: 10005;
				}

					#header nav a[href="#menu"]:before {
						content: "";
						-moz-osx-font-smoothing: grayscale;
						-webkit-font-smoothing: antialiased;
						font-family: FontAwesome;
						font-style: normal;
						font-weight: normal;
						text-transform: none !important;
					}

					#header nav a[href="#menu"] span {
						display: none;
					}

					#header nav a[href="#menu"]:before {
						margin: 0 0.5em 0 0;
					}

	@media screen and (max-width: 980px) {

		body {
			padding-top: 44px;
		}

		#header {
			height: 44px;
			line-height: 44px;
		}

			#header .logo {
				font-size: 1.25em;
				text-align: center;
			}

			#header nav a[href="#menu"] {
				font-size: 1.5em;
			}

			#header nav.left {
				left: 1em;
			}

			#header nav.right {
				display: none;
			}

	}

	@media screen and (max-width: 480px) {

		#header {
			min-width: 320px;
		}

	}

</style>
</head>
<body>

<!-- Header -->
			<header id="header">
				<nav class="left">
					<div class="logodes">
						<img src= "logo.jpg">
					</div>
				</nav>
				
				<a href="index.html" class="logo">NEOMETER</a>
				
			</header>
			
			
<form action="code.php" method="POST">
<div class="background">
<div class="container" >
<br></br>
<h1><b>SIGN IN<b></h1>
<hr>
<label for="email"><b>EMAIL</b></label><br>
<input type="text" placeholder="Enter Email" name="email" id="email" required><br>
<label for="psw"><b>PASSWORD</b></label><br>
<input type="password" placeholder="Enter Password" name="psw" id="psw" required><br>
<p class="error-message">
<?php echo $role;?><br>
<button type="submit" class="registerbtn" name="btn">SIGN IN</button><br>

<p>New user? <a href="regp.php">Sign up</a>.</p></center>
</div>
</div>
</form>



</body>
</html>