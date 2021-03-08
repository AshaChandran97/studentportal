</!DOCTYPE html>
<html>
<head>
	<title>response form</title>
</head>
<body>
<form  action="<?php echo base_url()?>main/response" method="post">
<input type="text" name="response">
<?php
                        if(isset($n))
                          {
                           foreach($n->result() as $row1)
                            {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $row1->id;?>">
                    <?php
                }
            }?>
<input type="submit" name="submit">
</form>
</body>
</html>