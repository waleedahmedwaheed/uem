<?php require_once('../../conn/db.php'); 
 require_once('../../functions.php'); 

$id 	= $_GET["id"];
$t_ids  = $_GET["t_id"];
$pos  = $_REQUEST["pos"];

if($id==1)
{
		$qrys = "UPDATE team set t_fee='1' where t_id='$t_ids'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
}
else if($id==0)
{
		$qrys = "UPDATE team set t_fee='0' where t_id='$t_ids'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
}
else if($id==2)
{
		 $qrys = "UPDATE team set position='$pos' where t_id='$t_ids'";
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
                            Participants Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="20%">#</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Team</th>
                                            <th>Score</th>
                                          </tr>
                                    </thead>
                                    <tbody>
									<?php
				if(isset($_GET["t_id"]))
				{
				$insertSQL = "SELECT * FROM participants where t_id='".$_GET["t_id"]."'";	
				}
				else
				{
				$insertSQL = "SELECT * FROM participants";	
				}					
				mysql_select_db($database_dbconfig, $dbconfig);
				$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
				while($row = mysql_fetch_assoc($Result1))
				{
				$p_id = $row["p_id"];
				$p_name = $row["p_name"];
				$p_contact = $row["p_contact"];
				$p_email = $row["p_email"];
				$t_id = $row["t_id"];
				$score = $row["score"];
									?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $c = $c + 1; ?></td>
                                            <td><?php echo $p_name; ?></td>
                                            <td><?php echo $p_contact; ?></td>
                                            <td><?php echo $p_email; ?></td>
                                            <td><?php echo $t_id; ?></td>
                                            <td><a href="vote_hist.php?e_id=<?php echo get_title(e_ids,$t_id); ?>"><?php echo $score; ?></td>
                                           
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
