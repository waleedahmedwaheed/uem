<?php include("../../conn/db.php"); 
				
				if(isset($_GET["p_id"]))
				{
				$insertSQL = "SELECT * FROM product where p_id = '".$_GET["p_id"]."'";
				mysql_select_db($database_dbconfig, $dbconfig);
				$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
				$row = mysql_fetch_assoc($Result1);
				$c_ids = $row["c_id"];
				$p_ids = $row["p_id"];
				$image = $row["image"];
				$detail = $row["detail"];
				$color = $row["color"];
				$sizes = $row["size"];
				$status = $row["status"];
				}
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Trend</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Trend</a>
            </div>
            <!-- /.navbar-header -->

           <?php include("topbar.php") ?>
           
		<?php include("sidebar.php"); ?>
		
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bag</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Bag
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="save_prod.php" enctype='multipart/form-data'>
										<div class="form-group">
                                                <label for="Select">Select Category</label>
                                                <select id="Select" name="c_id" class="form-control">
                                                    <option value="">--Select--</option>
													<?php
													$insertSQL = "SELECT * FROM category";
													mysql_select_db($database_dbconfig, $dbconfig);
													$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
													while($row = mysql_fetch_assoc($Result1))
													{
													$c_id = $row["c_id"];	
													$cname = $row["cname"];	
													
													?>
													<option value="<?php echo $c_id; ?>" <?php if($c_id==$c_ids){ echo "selected"; } ?>> <?php echo $cname;  ?> </option>
													<?php
													}
													?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Color</label>
                                            <input class="form-control" name="color" value="<?php echo $color; ?>" placeholder="Enter Color">
                                        </div>
                                        <div class="form-group">
                                                <label for="Select">Select Size</label>
                                                <select id="Select" name="size" class="form-control">
                                                    <option value="">--Select--</option>
													<option value="1" <?php if($sizes==1){ echo "selected"; } ?>> Small </option>
													<option value="2" <?php if($sizes==2){ echo "selected"; } ?>> Medium </option>
													<option value="3" <?php if($sizes==3){ echo "selected"; } ?>> Large </option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name="image1">
                                        </div>
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea name="detail" class="form-control" rows="3"><?php echo $detail; ?></textarea>
                                        </div>
                                       
									    <?php if(isset($_GET["p_id"]))
										{ ?>
                                            <input type="hidden" name="opt" value="update">
                                            <input type="hidden" name="p_id" value="<?php echo $_GET["p_id"]; ?>">
										<?php } else { ?>
                                             <input type="hidden" name="opt" value="add">
										<?php } ?>	
										
                                       <?php if(isset($_GET["p_id"]))
										{ ?>
                                        <button type="submit" class="btn btn-default">Update </button>
										<?php } else { ?>
                                        <button type="submit" class="btn btn-default">Insert </button>
										<?php } ?>	
                                   </form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
