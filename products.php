<?php
require('db.php');
session_start();
// session_destroy();
require("log_sess.php");
require('navbar.php');

$select="SELECT * FROM `PRODUCTS`";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
                        <h4 class="page-title"><i class="fa fa-lock" aria-hidden="true"></i>  Products</h4>
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
                            
                            <input  type="text" placeholder="Search here" id="search" autocomplete="off"><br><br>
    
                            <form action="insertpro.php" method="post">
                            <input type="submit" name="" value="Add Product" class="btn btn-success text-white"><br>
                            </form>
                            <div class="table-responsive">
                                <table class="table text-nowrap" border='2'>
                                    <thead>
                                        <tr>
                                            
                                            <th class="border-top-0">PRODUCT NAME</th>
                                            <th class="border-top-0">CATEGORY</th>
                                            <th class="border-top-0">BRAND</th>
                                            <th class="border-top-0">SELL PRICE</th>
                                            <th class="border-top-0">PURCHASE PRICE</th>
                                            <th class="border-top-0">QUANTITY</th>
                                            <th class="border-top-0">EDIT</th>
                                            <th class="border-top-0">DELETE</th>
                                            <th class="border-top-0">DESCRIPTION</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="output">

                                    <?php 
                                     while($row=mysqli_fetch_assoc($srun)){ ?>
                                        
                                        <tr>
                                         
                                            <td><?php echo $row["PRODUCT_NAME"]  ?></td>
                                            <td><?php echo $row["CATEGORY"]  ?></td>
                                            <td><?php echo $row["BRAND"]  ?></td>
                                            <td><?php echo $row["SALE_PRICE"]  ?></td>
                                            <td><?php echo $row["PURCHASE_PRICE"]  ?></td>
                                            <td><?php echo $row["QUANTITY"]  ?></td>
                                            <td><a href="updatepro.php?id=<?php echo $row['ID'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                            <td> <a href="deletepro.php?id=<?php echo $row['ID'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                            <td><?php echo $row["DESCRIPTION"]  ?></td>
                                            <td>

                                            </td>
                                           
                                        </tr>
                                        <?php    }    ?>
                                        
                                    </tbody>
                                </table>



                                
                                


                                <script type="text/javascript" src="js/jquery.js"></script>
                                <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#search").on("keyup",function(){
                                var search_term = $(this).val();
                                $.ajax({
                                    url: 'product_search.php',
                                    type: "POST",
                                    data : {search:search_term },
                                    success: function(data){
                                    $("#output").html(data);
                                    }
                                });
                                });
                                });
                                </script>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>

            </body>

</html>