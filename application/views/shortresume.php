<!DOCTYPE html>
<html>
    <head>
        <title>short resume</title>
            <meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <!---custom style---->
            <link rel="stylesheet" href="../css/style.css">
     </head>
     <body>
        <form>
        <h1>Resume</h1>
          <?php
                        if(isset($user_data))
                          {
                           foreach($user_data->result() as $row1)
                            {
                    ?>
     <table>
        <tr>
            <td>Admission Number:</td>
            <td><?php echo $row1->ad_no;?></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><?php echo $row1->name;?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $row1->email;?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?php echo $row1->gender;?></td>
        </tr>
        <tr>
            <td>Date of birth:</td>
            <td><?php echo $row1->dob;?></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo $row1->address;?></td>
        </tr>
        <tr>
            <td>Phone number:</td>
            <td><?php echo $row1->phone;?></td>
        </tr>
        <tr>
            <td>Skills:</td>
            <td><?php echo $row1->skills;?></td>
        </tr>
     </table>
     <?php 
 }
}
?>
    </form>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous">
</script>

<!---Popper---->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>

<!---Custom Js-->
<script src="js/script.js">
</script>

     </body>
     </html>
