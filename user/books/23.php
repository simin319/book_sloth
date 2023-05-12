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
    <link href="assetsY/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assetsY/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assetsY/css/custom-styles.css" rel="stylesheet" />
    <link href="css/psDecor.css" rel="stylesheet" />
    <link href="css/updbtn.css" rel="stylesheet" />
    <link href="css/snfmDecor.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://localhost/LMS/user/index.php"><?php echo "Book Sloth"; ?> </a>
            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li>
                        <a  href="http://localhost/LMS/user/index.php"><i class="fa fa-home"></i>Homepage</a>
                    </li>
                    <li>
                        <a  href="http://localhost/LMS/user/book.php"><i class="fa fa-book fa-fw"></i>Book Catalogue</a>
                    </li>
                </ul>
            </div>
        </nav>
        
          
        <div id="page-wrapper" >
            <div id="page-inner">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            <strong>Himu Shamagra</strong>
                            <hx>
                            <button class='btn btn-success' data-toggle='modal' data-target='#pModal'><i class="fa-thin fa-badge-dollar"></i> Purchase</button>
                            </hx>
                            <hx>
                            <button class='btn btn-primary' data-toggle='modal' data-target='#rModal'><i class="fa-thin fa-badge-percent"></i> Rent</button>
                            </hx>
                            
                        </h1>
                        
                    </div>
                    
                </div>  

            
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            PRODUCT INFORMATION
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
							    <div class="form-group">
                                        <label>AUTHOR(S) </label>
                                <?php
                                    require('db.php');
                                    $sql = "select authors FROM book WHERE idx = 23";
                                    $rs = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_assoc($rs))
                                    {
                                        $authors = $row['authors'];
                                        echo "<p class='oinfo'>$authors</p>";
                                    } 
                                ?>        
                                </div>
							    <div class="form-group">
                                        <label>GENRE</label>
                                <?php
                                    require('db.php');
                                    $sql = "select genre FROM book WHERE idx = 23";
                                    $rs = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_assoc($rs))
                                    {
                                        $genre = $row['genre'];
                                        echo "<p class='oinfo'>$genre</p>";
                                    } 
                                ?>      
                               </div>
							    <div class="form-group">
                                        <label>ISBN</label>
                                <?php
                                    require('db.php');
                                    $sql = "select ISBN FROM book WHERE idx = 23";
                                    $rs = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_assoc($rs))
                                    {
                                        $ISBN = $row['ISBN'];
                                        echo "<p class='oinfo'>$ISBN</p>";
                                    } 
                                ?>      
                                </div>
							    <div class="form-group">
                                        <label>PRICE (TK.)</label>
                                <?php
                                    require('db.php');
                                    $sql = "select price FROM book WHERE idx = 23";
                                    $rs = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_assoc($rs))
                                    {
                                        $price = $row['price'];
                                        echo "<p class='oinfo'>$price</p>";
                                    } 
                                ?>
                                    
                                </div>    
                                 <div class="form-group"> 
                                        
                            </div>
                        </div>
                    </div>
                </div>
                
    
            
            
        <!-- /. PAGE WRAPPER  -->
        </div>
        <div class="panel-body">
                                <div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="pmyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="pmyModalLabel">Purchase Confirmation</h4>
                                            </div>
                                            <form method="post">
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Customer ID</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql = "select ID FROM user WHERE ID = '".$_SESSION['user']."'";
                                                        $rs = mysqli_query($con, $sql);
                                                        $ID = mysqli_fetch_assoc($rs)['ID'];
                                                        echo "<p class='sn'>$ID</p>";
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Customer First Name</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql = "select f_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                                        $rs = mysqli_query($con, $sql);
                                                        $f_name = mysqli_fetch_assoc($rs)['f_name'];
                                                        echo "<p class='sn'>$f_name</p>";
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Customer Last Name</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql = "select l_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                                        $rs = mysqli_query($con, $sql);
                                                        $l_name = mysqli_fetch_assoc($rs)['l_name'];
                                                        echo "<p class='sn'>$l_name</p>";
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Product Name</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql = "select title FROM book WHERE idx = 23";
                                                        $rs = mysqli_query($con, $sql);
                                                        $title = mysqli_fetch_assoc($rs)['title'];
                                                        echo "<p class='sn'>$title</p>";
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>ISBN</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql = "select ISBN FROM book WHERE idx = 23";
                                                        $rs = mysqli_query($con, $sql);
                                                        $ISBN = mysqli_fetch_assoc($rs)['ISBN'];
                                                        echo "<p class='sn'>$ISBN</p>";
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Product Price</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql = "select price FROM book WHERE idx = 23";
                                                        $rs = mysqli_query($con, $sql);
                                                        $price = mysqli_fetch_assoc($rs)['price'];
                                                        echo "<p class='sn'>$price</p>";
                                                    ?>
                                                    </div>
                                            </div>     
                                                                                   
                                                
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                
                                                <input type="submit" name="purchase" value="Confirm" class="btn btn-primary">
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            if(isset($_POST['purchase']))
                            {
                                require('db.php');
                                
                                $p_date = date("Y-m-d");

                                $sql = "select ID FROM user WHERE ID = '".$_SESSION['user']."'";
                                $rs = mysqli_query($con, $sql);
                                $ID = mysqli_fetch_assoc($rs)['ID'];

                                $sql2 = "select f_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                $rs2 = mysqli_query($con, $sql2);
                                $f_name = mysqli_fetch_assoc($rs2)['f_name'];
                                
                                $sql3 = "select l_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                $rs3 = mysqli_query($con, $sql3);
                                $l_name = mysqli_fetch_assoc($rs3)['l_name'];

                                $sql4 = "select ISBN FROM book WHERE idx = 23";
                                $rs4 = mysqli_query($con, $sql4);
                                $ISBN = mysqli_fetch_assoc($rs4)['ISBN'];

                                $sql5 = "select price FROM book WHERE idx = 23";
                                $rs5 = mysqli_query($con, $sql5);
                                $price = mysqli_fetch_assoc($rs5)['price'];

                                $sql6 = "select title FROM book WHERE idx = 23";
                                $rs6 = mysqli_query($con, $sql6);
                                $title = mysqli_fetch_assoc($rs6)['title'];

                                $inssql = "INSERT INTO sales_history (cus_id, cus_f_name, cus_l_name, ISBN, prod_name, price, p_date) VALUES ('$ID', '$f_name', '$l_name', '$ISBN', '$title', '$price', '$p_date')";
                                mysqli_query($con,$inssql);
                
                                
                                
                            }
                            elseif(isset($_POST['rent']))
                            {
                                require('db.php');

                                $rent_date = date("Y-m-d");
                                $return_due = date("Y-m-d", strtotime($rent_date . "+1 week"));

                                $sql7 = "select ID FROM user WHERE ID = '".$_SESSION['user']."'";
                                $rs7 = mysqli_query($con, $sql7);
                                $ID = mysqli_fetch_assoc($rs7)['ID'];

                                $sql8 = "select f_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                $rs8 = mysqli_query($con, $sql8);
                                $f_name = mysqli_fetch_assoc($rs8)['f_name'];

                                $sql9 = "select l_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                $rs9 = mysqli_query($con, $sql9);
                                $l_name = mysqli_fetch_assoc($rs9)['l_name'];

                                $sql10 = "select ISBN FROM book WHERE idx = 23";
                                $rs10 = mysqli_query($con, $sql10);
                                $ISBN = mysqli_fetch_assoc($rs10)['ISBN'];

                                $sql11 = "select title FROM book WHERE idx = 23";
                                $rs11 = mysqli_query($con, $sql11);
                                $title = mysqli_fetch_assoc($rs11)['title'];
                                

                                $inssql2 = "INSERT INTO rent_history (cus_id, cus_f_name, cus_l_name, ISBN, prod_name, rent_date, return_due, return_date, penalty) VALUES ('$ID', '$f_name', '$l_name', '$ISBN', '$title', '$rent_date', '$return_due', 'Null', 'Null')";
                                mysqli_query($con,$inssql2);
                            }
                            ob_end_flush();
                            ?>
                            
                            
        
        <div class="panel-body">
                                <div class="modal fade" id="rModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">+
                                       
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="rmyModalLabel">Rent Confirmation</h4>
                                            </div>
                                            <form method="post">
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label></label>
                                                        <?php
                                                            require('db.php');
                                                            $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                            $rs0 = mysqli_query($con, $sql0);
                                                            $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                            if($cus_id!=Null)
                                                            {
                                                                echo "<p class='sn'>You have an active rental. Multiple book rentals are not allowed at once.</p>";
                                                            }
                                                        ?>    
                                                    </div>
                                            </div>     
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Customer ID</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                        $rs0 = mysqli_query($con, $sql0);
                                                        $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                        if($cus_id!=Null)
                                                        {
                                                            echo "<p class='sn'>—</p>";
                                                        }
                                                        else
                                                        {
                                                            $sql = "select ID FROM user WHERE ID = '".$_SESSION['user']."'";
                                                            $rs = mysqli_query($con, $sql);
                                                            $ID = mysqli_fetch_assoc($rs)['ID'];
                                                            echo "<p class='sn'>$ID</p>";
                                                        }    
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Customer First Name</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                        $rs0 = mysqli_query($con, $sql0);
                                                        $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                        if($cus_id!=Null)
                                                        {
                                                            echo "<p class='sn'>—</p>";
                                                        }
                                                        else
                                                        {
                                                            $sql = "select f_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                                            $rs = mysqli_query($con, $sql);
                                                            $f_name = mysqli_fetch_assoc($rs)['f_name'];
                                                            echo "<p class='sn'>$f_name</p>";
                                                        }    
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Customer Last Name</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                        $rs0 = mysqli_query($con, $sql0);
                                                        $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                        if($cus_id!=Null)
                                                        {
                                                            echo "<p class='sn'>—</p>";
                                                        }
                                                        else
                                                        {
                                                            $sql = "select l_name FROM user WHERE ID = '".$_SESSION['user']."'";
                                                            $rs = mysqli_query($con, $sql);
                                                            $l_name = mysqli_fetch_assoc($rs)['l_name'];
                                                            echo "<p class='sn'>$l_name</p>";
                                                        }
                                                    ?>
                                                    </div>
                                            </div>
                                                  
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Product Name</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                        $rs0 = mysqli_query($con, $sql0);
                                                        $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                        if($cus_id!=Null)
                                                        {
                                                            echo "<p class='sn'>—</p>";
                                                        }
                                                        else
                                                        {
                                                            $sql = "select title FROM book WHERE idx = 23";
                                                            $rs = mysqli_query($con, $sql);
                                                            $title = mysqli_fetch_assoc($rs)['title'];
                                                            echo "<p class='sn'>$title</p>";
                                                        } 
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>ISBN</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                        $rs0 = mysqli_query($con, $sql0);
                                                        $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                        if($cus_id!=Null)
                                                        {
                                                            echo "<p class='sn'>—</p>";
                                                        }
                                                        else
                                                        {
                                                            $sql = "select ISBN FROM book WHERE idx = 23";
                                                            $rs = mysqli_query($con, $sql);
                                                            $ISBN = mysqli_fetch_assoc($rs)['ISBN'];
                                                            echo "<p class='sn'>$ISBN</p>";
                                                        }
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Rent Date</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                        $rs0 = mysqli_query($con, $sql0);
                                                        $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                        if($cus_id!=Null)
                                                        {
                                                            echo "<p class='sn'>—</p>";
                                                        }
                                                        else
                                                        {
                                                            $rent_date = date("Y-m-d");
                                                            echo "<p class='sn'>$rent_date</p>";
                                                        }
                                                        
                                                    ?>
                                                    </div>
                                            </div>    
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Return Due Date</label>
                                                    <?php
                                                        require('db.php');
                                                        $sql0 = "select cus_id from rent_history where cus_id='".$_SESSION['user']."' && return_date='0000-00-00'";
                                                        $rs0 = mysqli_query($con, $sql0);
                                                        $cus_id = isset(mysqli_fetch_assoc($rs0)['cus_id']);
                                                        if($cus_id!=Null)
                                                        {
                                                            echo "<p class='sn'>—</p>";
                                                        }
                                                        else
                                                        {
                                                            $rent_date = date("d M Y");
                                                            $return_due = date("Y-m-d", strtotime($rent_date . "+1 week"));
                                                            echo "<p class='sn'>$return_due</p>";
                                                        }
                                                    ?>
                                                    </div>
                                            </div>                                       
                                                
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                
                                                <input type="submit" name="rent" value="Confirm" class="btn btn-primary">
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                    
                    </div>          

        
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assetsY/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assetsY/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assetsY/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assetsY/js/custom-scripts.js"></script>
    
            
</body>
</html>
