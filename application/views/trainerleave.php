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
    <title>Apply for leave</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <form action=<?php echo base_url()?>main/tr_leave_action method="post" enctype="multipart/form-data">
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Leave Application</h2>
                </div>
                <div class="card-body">
                    <form method="POST">

                        <div class="form-row">
                            <div class="name">Leave Type</div>
                            <div class="value">
                                <select class="input--style-6" name="leavetype">
                                  <option value="general">General
                                    <option value="exam">Exam leave
                                    <option value="sickleave">Sick leave
                                </select>
                               
                            </div>
                        </div>
                       
                    <div class="form-row">
                            <div class="name">Leave On</div>
                            <div class="value">
                                <input class="input--style-6" type="date" name="fromdate">From date
                                <input class="input--style-6" type="date" name="todate">To date
                               
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Leave Reason</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="reason" placeholder="Reason for leave">
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="name">Upload documents</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_upload" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                               
                                </div>
                                <div class="label--desc">Upload relevant proof. Max file size 50 MB</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Send Application</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>
</form>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

