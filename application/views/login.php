<!DOCTYPE html>
<html>
	<head>
		<title></title>
        <style>
        	fieldset{
        		width:50px;
        		margin-top:15%;
        		margin-left:35%; 
        	}
        	table,td,tr{
        		text-align:center;
        	}
        	
        </style>
	</head>
	<body>
		<form method="post" action="<?php echo base_url()?>main/loginaction ">
			<fieldset>
				<legend>login</legend>
			<table>

			<tr>
				<td><h2>Username:<h2></td>
			    <td><input type="text" name="username"></td>
			<tr>
				<td><h2>Password:</h2></td>
			   <td><input type="password" name="password"></td>
			</tr>  
			<tr>			
				<td ><input type="submit" name="submit" value="login" ></td>
			</tr>
			</table>
            </fieldset>
	</form>
	</body>	
</html>  