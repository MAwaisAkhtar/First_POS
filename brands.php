<?php
require('db.php');
session_start();
require("log_sess.php");

require('navbar.php');

$select="SELECT * FROM `BRAND`";
$srun=mysqli_query($con,$select);
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    

    <!-- Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
   <link href="css/style.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
   <script type="text/javascript" src="js/jquery.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha256-56zsTlMwzGRtLC4t51alLh5cKYvi0hnbhEXQTVU/zZQ=" crossorigin="anonymous"></script>
   



   <!-- bootstrap -->




   <!-- Bootstrap CDN links -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        #toast-container > .customer-info {            
            background-color: black;
            
           }
    </style>

    <!-- Toaster library cdn -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
</head>

<body>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

<div class="page-wrapper">
            
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><i class="fab fa-bimobject" aria-hidden="true"></i>  BRANDS</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                to Pro</a>
                        </div>
                    </div>
                </div>
                
            </div>
            
<div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form action="insertbr.php" method="post">
                            <input type="submit" name="" value="Add Brand" class="btn btn-success text-white"><br>
                            </form>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">SR NO.</th>
                                            <th class="border-top-0">BRAND NAME</th>
                                            <th class="border-top-0">EDIT</th>
                                            <th class="border-top-0">DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row=mysqli_fetch_assoc($srun)){ ?>
                                        
                                        <tr>
                                            <td><?php echo $row["SR"]  ?></td>
                                            <td><?php echo $row["BRAND_NAME"]  ?></td>
                                            <td><a href="updatebr.php?SR=<?php echo $row['SR'] ?>" ><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                            
                                            <td> <a href="deletebr.php?SR=<?php echo $row['SR'] ?>" onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                            

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>

            <script type="text/javascript">
               
                
            function checkDelete(){
                return confirm('Are you sure?');

            }

            
            </script>
             <?php if (isset($_SESSION['toast'])) {
                                echo '<script>
                                toastr.success("data successfully deleted","DELETE",{"iconClass": "customer-info"});
                                </script>';
                            } 
                            unset($_SESSION['toast']); 
                            ?>
            </body>

</html>