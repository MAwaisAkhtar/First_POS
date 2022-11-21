<?php
require('db.php');
session_start();
require("log_sess.php");

require('navbar.php');

$select="SELECT * FROM `EXPENSES`";
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
                        <h4 class="page-title"><i class="fab fa-bimobject" aria-hidden="true"></i>  MANAGE EXPENSES</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <form action="" method="GET">
                        <div class="d-md-flex">
                            <ol>
                                <label>DATE FROM:</label><br>
                                <input type="date" name="from_date" value="">
                            </ol>
                            <ol>
                                <label>DATE TO:</label><br>
                                <input type="date" name="to_date" value="">
                            
                                <input class="btn btn-success text-white" type="submit" name="filter" value="Filter">
                                </ol>
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form action="insertexp.php" method="post">
                            <input type="submit" name="" value="Add Expense" class="btn btn-success text-white"><br>
                            </form>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">EXPENSE TYPE</th>
                                            <th class="border-top-0">AMOUNT</th>
                                            <th class="border-top-0">EXPENSE DATE</th>
                                            <th class="border-top-0">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    
                                    
                                    $ad=0;

                                    
                                    if (isset($_GET["from_date"]) && isset($_GET["to_date"])) {
                                        $from_date=$_GET["from_date"];
                                        $to_date=$_GET["to_date"];
                                        $sel_filter="SELECT * FROM expenses WHERE EXPENSE_DATE between '$from_date' AND '$to_date'";
                                        $frun=mysqli_query($con,$sel_filter);
                                        if(mysqli_num_rows($frun)>0){
                                        while($row=mysqli_fetch_assoc($frun)){ 
                                        
                                            ?>
                                        
                                        <tr>
                                            <td><?php echo $row["EXPENSE_TYPE"]  ?></td>
                                            <td><?php echo $row["AMOUNT"];
                                             $b=$row["AMOUNT"]; 
                                             $ad=$b+$ad;
                                             ?></td>
                                            <td><?php echo $row["EXPENSE_DATE"]  ?></td>
                                            <td><a href="updateexp.php?id=<?php echo $row['id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>  <a href="deleteexp.php?id=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>  </td>
                                        </tr>
                                        
                                        <?php

                                        }
                                       
                                        
                                    }else {
                                           echo "<script>alert('No Record Found')</script>" ;
                                        }
                                    }else { 
                                        if(mysqli_num_rows($srun)>0){
                                            while($row=mysqli_fetch_assoc($srun)){ 
                                        ?>

                                        <tr>
                                            <td><?php echo $row["EXPENSE_TYPE"]  ?></td>
                                            <td><?php echo $row["AMOUNT"];
                                             $b=$row["AMOUNT"]; 
                                             $ad=$b+$ad;
                                             ?></td>
                                            <td><?php echo $row["EXPENSE_DATE"]  ?></td>
                                            <td><a href="updateexp.php?id=<?php echo $row['id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>  <a href="deleteexp.php?id=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>  </td>

                                        </tr>

                                    <?php }}   
                                    }
                                        
                                        ?>
                            
                            </tbody>
                                </table>
                                <label for="">Total Expendetures</label>
                                <input type="text" name="" value="<?php echo $ad     ?>" class=""><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>


            </body>

</html>