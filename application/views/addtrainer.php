<!---------------
    add trainer  form
       @asha
       @5/03/2021
       @module admin
    ---->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add trainers</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <form action="<?php echo base_url()?>main/addtraineraction" method="post">
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">ADD TRAINERS</h2>
                </div>
                <div class="card-body">
                    <form method="POST">

                        <div class="form-row">
                            <div class="name">Trainer Name</div>
                            <div class="value">
                                <input type="text" class="input--style-6" name="name" placeholder="add trainer name">
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="address" placeholder="Address"></textarea>
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">Phonenumber</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="phoneno">
                                </div>
                            </div>
                        </div>
            
                        
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Gender</div>
                            <div class="value">
                                <div class="input-group">
                                    female<input class="input--style-6" type="radio" name="gender" value="female">
                                     male<input class="input--style-6" type="radio" name="gender" value="male">
                                     others<input class="input--style-6" type="radio" name="gender" value="others">

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date Of Birth</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="date" name="dob">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Qualification</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="qualification">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Certification</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="certifications">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Skills</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="skills">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="username">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="password" name="password">
                                </div>
                            </div>
                        </div>
                        
            
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Add Trainers</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->