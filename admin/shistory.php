<?php
include('db.php')
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Sloth</title>
	<!-- Bootstrap Styles-->
    <link href="assetsX/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assetsX/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assetsX/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assetsX/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    
<div id="wrapper">
   
<nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><?php echo "Book Sloth"; ?> </a>
            </div>
        </nav>
        
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
        <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                    <a  href="index.php"><i class="fa fa-home"></i>Homepage</a>
                    </li>
                    
                </ul>    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Sales History<small> </small>
                        </h1>
                    </div>

                </div> 
                 <!-- /. ROW  -->
				 
				 
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Purchase Date</th>
                                            <th>Invoice Number</th>
                                            <th>Customer ID</th>
                                            <th>Customer First Name</th>
                                            <th>Customer Last Name</th>
                                            <th>ISBN</th>
											<th>Product Name</th>
                                            <th>Product Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										include ('db.php');
										$sql="select inv_no, cus_id, cus_f_name, cus_l_name, ISBN, prod_name, price, p_date from sales_history where inv_no!=0";
										$re = mysqli_query($con,$sql);
                                        if(mysqli_num_rows($re)>0)
                                        {
										    while($row = mysqli_fetch_assoc($re))
										    {
                                                echo"<tr class='gradeC'>
                                                <td>".$row['p_date']."</td>
                                                <td>".$row['inv_no']."</td>
                                                <td>".$row['cus_id']."</td>
                                                <td>".$row['cus_f_name']."</td>
                                                <td>".$row['cus_l_name']."</td>
                                                <td>".$row['ISBN']."</td>
                                                <td>".$row['prod_name']."</td>
                                                <td>".$row['price']."</td>
                                                </tr>";
                                            }    
										}
									?>
                                 
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                </div>
               
            </div>              
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assetsX/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assetsX/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assetsX/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assetsX/js/dataTables/jquery.dataTables.js"></script>
    <script src="assetsX/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assetsX/js/custom-scripts.js"></script>
    
   
</body>
</html>