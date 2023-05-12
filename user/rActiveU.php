<?php
session_start();
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
    <link  rel="stylesheet" href="css/linkbtn.css"/>

</head>
<body>  
<div id="wrapper">
<nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="perinfo.php"><?php echo "Book Sloth"; ?> </a>
            </div>
        </nav>
        
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
        <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                    <a  href="index.php"><i class="fa fa-home"></i>Homepage</a>
                    </li>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Active Rents<small> </small>
                           
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
                                            <th>Invoice Number</th>
                                            <th>ISBN</th>
											<th>Product Name</th>
                                            <th>Rented On</th>
                                            <th>Return Due On</th>
                                            <th>Return Book</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										include ('db.php');
										$sql="select inv_no, ISBN, prod_name, rent_date, return_due from rent_history where cus_id='".$_SESSION['user']."' && rent_date!='0000-00-00' && return_date='0000-00-00'";
										$re = mysqli_query($con,$sql);
                                        if(mysqli_num_rows($re)>0)
                                        {
										    while($row = mysqli_fetch_assoc($re))
										    {
                                                $inv_no = $row['inv_no'];
                                                $ISBN = $row['ISBN'];
                                                $prod_name = $row['prod_name'];
                                                $rent_date = $row['rent_date'];
                                                $return_due= $row['return_due'];
                                                


                                                if($ISBN!="Null")
                                                {
                                                    echo"<tr class='gradeC'>
                                                    <td>".$row['inv_no']."</td>
                                                    <td>".$row['ISBN']."</td>
                                                    <td>".$row['prod_name']."</td>
                                                    <td>".$row['rent_date']."</td>
                                                    <td>".$row['return_due']."</td>
                                                    <td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>Return </button></td>
                                                    </tr>";
                                                }
                                                else
                                                {
                                                    echo"<tr class='gradeU'>
                                                    <td>".$row['inv_no']."</td>
                                                    <td>".$row['ISBN']."</td>
                                                    <td>".$row['prod_name']."</td>
                                                    <td>".$row['rent_date']."</td>
                                                    <td>".$row['return_due']."</td>
                                                    <td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>Return </button></td>
                                                    </tr>";
                                                }    
                                            }    
										}
									?>
<!-- UPDATE USER  -->
<div class="panel-body">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Confirm Purchase</h4>
                                    </div>
                                    <form method="post">
									<div class="modal-body">
                                            <div class="form-group">
                                                    <label>Invoice No.</label>
                                            <?php
                                                require('db.php');
                                                $sql = "select inv_no FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                                                $rs = mysqli_query($con, $sql);
                                                $inv_no = mysqli_fetch_assoc($rs)['inv_no'];
                                                echo "<p class='sn'>$inv_no</p>";
                                            ?>
                                            </div>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>Product Name</label>
                                            <?php
                                                require('db.php');
                                                $sql = "select prod_name FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                                                $rs = mysqli_query($con, $sql);
                                                $prod_name = mysqli_fetch_assoc($rs)['prod_name'];
                                                echo "<p class='sn'>$prod_name</p>";
                                            ?>
                                            </div>
                                    </div>    
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>ISBN</label>
                                            <?php
                                                require('db.php');
                                                $sql = "select ISBN FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                                                $rs = mysqli_query($con, $sql);
                                                $ISBN = mysqli_fetch_assoc($rs)['ISBN'];
                                                echo "<p class='sn'>$ISBN</p>";
                                            ?>
                                            </div>
                                    </div> 
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>Rent Date</label>
                                            <?php
                                                require('db.php');
                                                $sql = "select rent_date FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                                                $rs = mysqli_query($con, $sql);
                                                $rent_date = mysqli_fetch_assoc($rs)['rent_date'];
                                                echo "<p class='sn'>$rent_date</p>";
                                            ?>
                                            </div>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>Return Due On</label>
                                            <?php
                                                require('db.php');
                                                $sql = "select return_due FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                                                $rs = mysqli_query($con, $sql);
                                                $return_due = mysqli_fetch_assoc($rs)['return_due'];
                                                echo "<p class='sn'>$return_due</p>";
                                            ?>
                                            </div>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>Return Date</label>
                                            <?php
                                                $return_date = date("Y-m-d");
                                                echo "<p class='sn'>$return_date</p>";
                                            ?>
                                            </div>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>Late Return Penalty</label>
                                            <?php
                                                $ret_date = date("Y-m-d");
                                                require('db.php');
                                                $sql = "select return_due FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                                                $rs = mysqli_query($con, $sql);
                                                $return_due = mysqli_fetch_assoc($rs)['return_due'];
                                                $f_ret_date = strtotime($ret_date);
                                                $f_return_due = strtotime($return_due);
                                                $secs_diff=$f_ret_date-$f_return_due;
                                                $secs_to_days=$secs_diff/86400;
                                                $penalty=10*$secs_to_days;
                                                echo "<p class='sn'>$penalty</p>";
                                            ?>
                                            </div>
                                    </div>      
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        
                                        <input type="submit" name="ret" value="Confirm" class="btn btn-primary">
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
           
            <?php
            if(isset($_POST['ret']))
            {
                require('db.php');

                $ret_date = date("Y-m-d");

                $sql = "select return_due FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                $rs = mysqli_query($con, $sql);
                $return_due = mysqli_fetch_assoc($rs)['return_due'];
                
                $sql1 = "select inv_no FROM rent_history WHERE cus_id = '".$_SESSION['user']."' && return_date='0000-00-00'";
                $rs1 = mysqli_query($con, $sql1);
                $inv_no = mysqli_fetch_assoc($rs1)['inv_no'];

                $f_ret_date = strtotime($ret_date);
                $f_return_due = strtotime($return_due);
                $secs_diff=$f_ret_date-$f_return_due;
                $secs_to_days=$secs_diff/86400;
                $penalty=10*$secs_to_days;

                $upsql = "UPDATE `rent_history` SET `return_date`='$ret_date',`penalty`='$penalty' WHERE inv_no = '$inv_no'";
                $uprs = mysqli_query($con,$upsql);
                
            }
            ob_end_flush();
            ?>
            </div>                                    
                                 
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