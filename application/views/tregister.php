</!DOCTYPE html>
<html>
<head>
	<title>Teacher register</title>
</head>
<body>
 <form method="post" action="<?php echo base_url()?>main/trinsert">
			<fieldset>
				<legend>Register</legend>
			<table>

			<tr>
				<td><h2>Username<h2></td>
			    <td><input type="text" name="username"></td>
			<tr>
				<td><h2>Password:</h2></td>
			   <td><input type="password" name="password"></td>
			</tr>  
			<tr>			
				<td ><input type="submit" name="submit" value="register" ></td>
			</tr>
			</table>
            </fieldset>
	</form>
</body>
</html>