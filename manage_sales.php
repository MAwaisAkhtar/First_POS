<?php
require('db.php');
session_start();
require("log_sess.php");
require('navbar.php');

$pur_select="SELECT * FROM `billing_data`";
$pur_run=mysqli_query($con,$pur_select);


$exp_select="SELECT * FROM `EXPENSES`";
$exp_run=mysqli_query($con,$exp_select);

$select="SELECT * FROM `billing_data`";
$srun=mysqli_query($con,$select);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
   <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

<div class="page-wrapper">
            
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><i class="fas fa-shopping-bag" aria-hidden="true"></i>  Manage Sales</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form action="billing.php" method="post">
                            <input type="submit" name="" value="Add New Sales" class="btn btn-success text-white"><br>
                            </form>
                            <div class="table-responsive">
                                <table class="table text-nowrap" border='2'>
                                    <thead>
                                        <tr>
                                            
                                            <th class="border-top-0">CUSTOMER NAME</th>
                                            <th class="border-top-0">CUSTOMER NUMBER</th>
                                            <th class="border-top-0">SALEMAN</th>
                                            <th class="border-top-0">PRODUCT NAME</th>
                                            <th class="border-top-0">QUANTITY</th>
                                            <th class="border-top-0">AMOUNT</th>
                                            <th class="border-top-0">SALE DATE</th>
                                            <th class="border-top-0">SALE TIME</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $amo_ad=0;
                                        while($row=mysqli_fetch_assoc($srun)){ ?>
                                        
                                            <tr>
                                            <td><?php echo $row["CUSTOMER_NAME"]  ?></td>
                                            <td><?php echo $row["CUSTOMER_NUMBER"]  ?></td>
                                            <td><?php echo $row["SALESMAN"]  ?></td>
                                            <td><?php echo $p=$row["PRODUCT_NAME"] ?></td>
                                            <td><?php echo $q=$row["QUANTITY"];
                                           
                                            ?></td>
                                            <td><?php echo $row["AMOUNT"];
                                            $amount=$row["AMOUNT"];
                                            $amo_ad=$amount+$amo_ad;
                                            ?></td>
                                            <td><?php echo $row["SALE_DATE"]  ?></td>
                                            <td><?php echo $row["SALE_TIME"]  ?></td>
                                            </tr>
                                        <?php    }    ?>   
                                    </tbody>
                                </table><br><br>

                                <?php
                                // Expenses
                                $ad=0;
                                while($row=mysqli_fetch_assoc($exp_run)){
                                $row["AMOUNT"];
                                $b=$row["AMOUNT"];
                                $ad=$b+$ad;
                                }
                                // PURCHASE
                                $pur_ad=0;
                                while($row=mysqli_fetch_assoc($pur_run))
                                {
                                
                                    $row['PURCHASE_AMOUNT'];
                                    $pur_amo=$row['PURCHASE_AMOUNT'];
                                    $pur_ad=$pur_amo+$pur_ad;    
                                }

                                $profit=$amo_ad-($ad+$pur_ad);



                                ?>

                                <label><b>Expenses</b></label>  
                                <input type="text" name="" class="text-danger" value="<?php echo $ad.'/-Rs';   ?>"><br><br>
                                <label><b>Total Sales</b></label>
                                <input type="text" name="" value="<?php echo $amo_ad.'/-Rs';  ?>"><br><br>
                                <label><b>Purchase</b></label>
                                <input type="text" name="" value="<?php echo $pur_ad.'/-Rs';  ?>"><br><br>
                                <label><b>Profit</b></label>
                                <input type="text" name="" class="text-success" value="<?php echo $profit.'/-Rs';  ?>">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
</div>
</div>

            </body>

</html>