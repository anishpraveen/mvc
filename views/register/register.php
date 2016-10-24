<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<script type="text/javascript">
	var checkName = /^[a-zA-Z0-9]{6,12}$/;

	function validateUsername(){
		//alert("Input sdsd");
		if (form.inputUser.value === '' || form.inputUser.value === null) {
			//alert("Input name");
			document.getElementById("spanNameErr").innerHTML = "<br>*Input name";
			document.getElementById("ipSubmit").style.backgroundColor='red';
            document.getElementById("ipSubmit").disabled=true;                           
			return false;
		}

		else if (!checkName.test(form.inputUser.value)) {
			//alert("Input proper name (Only alphanumeric between 6 and 12)");
			document.getElementById("spanNameErr").innerHTML = "<br>*Only alphanumeric between 6 and 12";
			document.getElementById("ipSubmit").style.backgroundColor='red';
            document.getElementById("ipSubmit").disabled=true;  
			return false;
		}
		else{
			document.getElementById("spanNameErr").innerHTML = "";
			document.getElementById("ipSubmit").style.backgroundColor='green';
            document.getElementById("ipSubmit").disabled=false;  
		}
	}
	
	</script>
</head>

<body>
	<div class="container" style="padding:10px;">
		<form name="form" action="index.php?controller=register&action=register" method="POST">
			<input type="text" name="inputUser" onblur="validateUsername(); "  placeholder="Username">
			<input class="input-group-sm" type="password"  required name="inputPassword" placeholder="Password"> <p id="spanNameErr"> </p>
			<input type="submit" id="ipSubmit" name="ipSubmit" value="Register" class="btn btn-primary">
			
		</form>

	</div>

</body>

</html>