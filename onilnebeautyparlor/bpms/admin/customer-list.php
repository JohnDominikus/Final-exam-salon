<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']) == 0) {
    header('location:logout.php');
} else {

    // Read operation to fetch data from the database
    

    $search_query = "";
    if (isset($_GET['customer_search']) && !empty($_GET['customer_search'])) {
        $customer_search = mysqli_real_escape_string($con, $_GET['customer_search']);
        $search_query = "WHERE Name LIKE '%$customer_search%'";
    }

    $query = "SELECT * FROM `tblcustomers` $search_query";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($con));
    }

    ?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Millen Hair Salon || Customer List</title>

        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
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
        <style>
            .action-buttons a {
                margin: 0 5px;
            }
            .search-container {
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body class="cbp-spmenu-push">
        <div class="main-content">
            <!--left-fixed -navigation-->
            <?php include_once('includes/sidebar.php'); ?>
            <!--left-fixed -navigation-->
            <!-- header-starts -->
            <?php include_once('includes/header.php'); ?>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="tables">
                        <h3 class="title1">Customer List</h3>

                        <form action="" method="GET" class="search-container">
                            <label for="customer_search">Search Customer:</label>
                            <input type="text" id="customer_search" name="customer_search" value="<?php echo isset($_GET['customer_search']) ? $_GET['customer_search'] : ''; ?>" placeholder="Enter customer name" class="form-control" style="width: auto; display: inline-block;">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        </form>

                        <div class="table-responsive bs-example widget-shadow">
                            <h4>Customer List:</h4>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Creation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM tblcustomers $search_query ORDER BY ID DESC");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>

                                        <tr>
                                            <th scope="row"><?php echo $cnt; ?></th>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['MobileNumber']; ?></td>
                                            <td><?php echo $row['CreationDate']; ?></td>
                                            <td class="action-buttons">
                                                <a href="edit-customer-detailed.php?editid=<?php echo $row['ID']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a> 
                                                <a href="add-customer-services.php?addid=<?php echo $row['ID']; ?>" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Assign Services</a> 
                                                <a href="customer-list-delete.php?deleteid=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm delete-btn" data-delete-link="customer-list-delete.php?deleteid=<?php echo $row['ID']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        
                                    <?php
                                        $cnt = $cnt + 1;
                                    } ?>

                                    
                                </tbody>
                            </table>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Customer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this customer? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a id="delete-link" href="" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>    

                        </div>
                    </div>
                </div>
            </div>
            <!--footer-->
            <?php include_once('includes/footer.php'); ?>
            <!--//footer-->
        </div>
        <!-- Classie -->
        <script src="js/classie.js"></script>
        <script>
            var menuLeft = document.getElementById('cbp-spmenu-s1'),
                showLeftPush = document.getElementById('showLeftPush'),
                body = document.body;

            showLeftPush.onclick = function() {
                classie.toggle(this, 'active');
                classie.toggle(body, 'cbp-spmenu-push-toright');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
                disableOther('showLeftPush');
            };

            function disableOther(button) {
                if (button !== 'showLeftPush') {
                    classie.toggle(showLeftPush, 'disabled');
                }
            }
        </script>
        <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $('.table').on('click', '.delete-btn', function(e){
                e.preventDefault();
                var deleteLink = $(this).data('delete-link');
                $('#deleteModal #delete-link').attr('href', deleteLink);
                $('#deleteModal').modal('show');
            });
        });
        </script>
    
    </body>

    </html>
<?php } ?>
