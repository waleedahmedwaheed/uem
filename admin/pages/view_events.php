<?php require_once('../../conn/db.php'); 

$id 	= $_GET["id"];
$e_ids  = $_GET["e_id"];

if($id==1)
{
		$qrys = "UPDATE event set status='1' where e_id='$e_ids'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
}
else if($id==0)
{
		$qrys = "UPDATE event set status='0' where e_id='$e_ids'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
}
else if($id==3)
{
		$qrys = "UPDATE event set result='1' where e_id='$e_ids'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
}
else if($id==4)
{
		$qrys = "UPDATE event set result='0' where e_id='$e_ids'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
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

    <title> Admin UEM</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php"> Admin UEM</a>
            </div>
            <!-- /.navbar-header -->

             <?php include("topbar.php") ?>
           
		<?php include("sidebar.php"); ?>
		
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Event</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Event Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="20%">#</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Teams</th>
                                            <th>Result</th>
                                          </tr>
                                    </thead>
                                    <tbody>
									                 <?php
				$insertSQL = "SELECT * FROM event";
				mysql_select_db($database_dbconfig, $dbconfig);
				$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
				while($row = mysql_fetch_assoc($Result1))
				{
				$e_id = $row["e_id"];
				$e_name = $row["e_name"];
				$e_date = $row["e_date"];
				$status = $row["status"];
				$result = $row["result"];
						?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $c = $c + 1; ?></td>
                                            <td><a href="../../single-event.php?e_id=<?php echo $e_id; ?>"><?php echo $e_name; ?></a></td>
                                            <td><?php echo $e_date; ?></td>
                                            <td><?php switch ($status) {
							case 0: ?>
								<a style="color:green;"href="?id=1&e_id=<?php echo $e_id; ?>"> Active </a>
								<?php break;
							case 1: ?>
								<a style="color:red;" href="?id=0&e_id=<?php echo $e_id; ?>"> Block </a>
								<?php break; 
											} ?></td>
										<td><?php 
				$insertSQL = "SELECT count(t_id) as total FROM team where e_id='$e_id'";
				mysql_select_db($database_dbconfig, $dbconfig);
				$Result1c = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
				$rowc = mysql_fetch_assoc($Result1c);
				$total = $rowc["total"];
										?>
								<a href="view_teams.php?e_id=<?php echo $e_id; ?>"> <?php echo $total; ?> </a> 		
										</td>	
										<td><?php switch ($result) {
							case 0: ?>
								<a style="color:red;" href="?id=3&e_id=<?php echo $e_id; ?>"> Not Announced </a>
								<?php break;
							case 1: ?>
								<a style="color:green;" href="?id=4&e_id=<?php echo $e_id; ?>"> Announced </a>
								<?php break; 
											} ?>
										</td>	
                                            </tr>
                                        
				<?php } ?>					
                                     </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
