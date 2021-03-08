<!DOCTYPE html>
<html>
<head>
<title>file upload</title>

<meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">

             <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

            <style>
            	.bi{

			background-image: url("../img/n1.jpeg");
		
            	}
            </style>
</head>
<body class="bi">
<div class="container">	
<form enctype="multipart/form-data" action="<?php echo base_url()?>main/fileupload" method="post" class="mt-5 py-5" >
<center>
	<input type="text" name="subject"placeholder="Subject name"required>
	<input type="date" name="date"placeholder="date"required>

	<label class="form-label text-white h1" for="customFile">Course material</label>
		<div class="col-6">
		<input type="file"name="file" class="form-control py-2">
			<div class="mt-5">	
				<a href="<?php echo base_url()?>main/adminhome" class="btn btn-primary me-3 ">Back</a>
				<input type="submit" value="upload" class="  btn btn-warning">
			</div>	
		</div>
</center>
</form>
<div>
</body>
</html>
