<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
} else {
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Millen Hair Salon|| Manage Services</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
    <script>
         new WOW().init();
    </script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<!-- Confirmation Script -->
<script type="text/javascript">
    function confirmDelete() {
        return confirm("Do you really want to delete this service?");
    }
</script>
<!-- Custom Table Style -->
<style>
    body {
        background-color: #f7f7f7;
        font-family: 'Roboto Condensed', sans-serif;
    }
    .main-content {
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        border-radius: 10px;
    }
    .table thead th {
        background-color: #5bc0de;
        color: #fff;
        border: none;
    }
    .table tbody tr {
        border-bottom: 1px solid #e7e7e7;
    }
    .btn-primary {
        background-color: #5bc0de;
        border: none;
    }
    .btn-danger {
        background-color: #d9534f;
        border: none;
    }
    .btn-sm {
        padding: 5px 10px;
        border-radius: 5px;
    }
    .dropdown-item {
        color: #333;
    }
</style>
</head> 
<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--left-fixed -navigation-->
         <?php include_once('includes/sidebar.php');?>  
        <!--left-fixed -navigation-->
        <!-- header-starts -->
         <?php include_once('includes/header.php');?>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <h3 class="title1">Manage Services</h3>
                    <div class="table-responsive bs-example widget-shadow">
                        <h4>Update Services:</h4>
                        <table class="table table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Service Name</th> 
                                    <th>Service Price</th> 
                                    <th>Creation Date</th>
                                    <th>Action</th> 
                                </tr> 
                            </thead> 
                            <tbody>
                                <?php
                                $ret=mysqli_query($con,"select *from tblservices order by tblservices.ID desc");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                                ?>
                                <tr> 
                                    <th scope="row"><?php echo $cnt;?></th> 
                                    <td><?php echo $row['ServiceName'];?></td> 
                                    <td><?php echo $row['Cost'];?></td>
                                    <td><?php echo $row['CreationDate'];?></td> 
                                    <td>
                                        <a href="edit-services.php?editid=<?php echo $row['ID'];?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <a href="delete-services.php?deleteid=<?php echo $row['ID'];?>" class="btn btn-danger btn-sm" onclick="return confirmDelete();">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $cnt=$cnt+1;
                                }?>
                            </tbody> 
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        <?php include_once('includes/footer.php');?>
        <!--//footer-->
    </div>
    <!-- Classie -->
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
            showLeftPush = document.getElementById( 'showLeftPush' ),
            body = document.body;
            
        showLeftPush.onclick = function() {
            classie.toggle( this, 'active' );
            classie.toggle( body, 'cbp-spmenu-push-toright' );
            classie.toggle( menuLeft, 'cbp-spmenu-open' );
            disableOther( 'showLeftPush' );
        };
        
        function disableOther( button ) {
            if( button !== 'showLeftPush' ) {
                classie.toggle( showLeftPush, 'disabled' );
            }
        }
    </script>
    <!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>
