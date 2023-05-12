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
    <link  rel="stylesheet" href="css/linkbtn.css"/>

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
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Book Catalogue<small> </small>
                           
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
                                            <th>ISBN</th>
                                            <th>Title</th>
											<th>Price (TK.)</th>
                                            <th>Authors</th>
                                            <th>Genre</th>
                                            <th>Product Page</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										include ('db.php');
										$sql="select ISBN, title, price, authors, genre, link from book where ISBN!=''";
										$re = mysqli_query($con,$sql);
                                        if(mysqli_num_rows($re)>0)
                                        {
										    while($row = mysqli_fetch_assoc($re))
										    {
                                                $ISBN = $row['ISBN'];
                                                $Title = $row['title'];
                                                $Price = $row['price'];
                                                $Authors= $row['authors'];
                                                $Genre = $row['genre'];
                                                $Link = $row['link'];


                                                if($ISBN!="Null")
                                                {
                                                    echo"<tr class='gradeC'>
                                                    <td>".$row['ISBN']."</td>
                                                    <td>".$row['title']."</td>
                                                    <td>".$row['price']."</td>
                                                    <td>".$row['authors']."</td>
                                                    <td>".$row['genre']."</td>
                                                    <td><a href='".$row['link']."' class='btn btn-info' role='button'>Link Button</a></td>
                                                    </tr>";
                                                }
                                                else
                                                {
                                                    echo"<tr class='gradeU'>
                                                    td>".$row['ISBN']."</td>
                                                    <td>".$row['title']."</td>
                                                    <td>".$row['price']."</td>
                                                    <td>".$row['authors']."</td>
                                                    <td>".$row['genre']."</td>
                                                    <td><a href='".$row['link']."' class='btn btn-info' role='button'>Link Button</a></td>
                                                    </tr>";
                                                }    
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