<?php 
session_start();
$connection = mysqli_connect("127.0.0.1","root","","sdd");

if(!$connection)
{
	echo "Database connection faild...";
}

$retrive = mysqli_query($connection, "SELECT * FROM report where rsta = 'In investigation' ");
$row= mysqli_fetch_array($retrive);


$option = mysqli_query($connection, "SELECT * FROM report");

if(count($_POST)>0)
{
    $id = $_POST['id'];
	mysqli_query($connection,"UPDATE report set rsta='" . $_POST['rsta'] . "' WHERE `report`.`id` = $id");
    $update = "Update has been successfully.!";
   
echo '<script>setTimeout(function(){window.location.href = "../../Application Layer/Manage Report/approval.php";},50);</script>';

}

$edit = mysqli_query($connection,"SELECT * FROM report WHERE `report`.`id` = 1");
$row= mysqli_fetch_array($edit);

?>



<!-- /header -->
<?php include '../../x/layout/head.php'; ?>

<!-- /header -->
<?php include '../../x/layout/adminheaderNsidebar.php'; ?>


            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h2>Manage Report</h2>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Reports</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Approval Reports List</h4>
                            <div class="breadcome-heading" style="margin-bottom: 20px;">
                                <form role="search" class="sr-input-func">
                                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search name..." class="search-int form-control">
                                    <a onclick="searchTable()"><i class="fa fa-search"></i></a>
                                </form>
                                
                            </div>
                            <div class="add-product">
                                <a title="Add Stock" href="adminreportview.php">All report </a>
                            </div>
                            <div class="asset-inner">
                                <table id="tableId">
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Report Details</th>
                                        <th>Report Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>

                                    <?php
                                    while($row = mysqli_fetch_array($retrive))
                                    {
                                        ?>

                                    <tr>
                                        <td>&nbsp;<?= $row['rdate'];?></td>
                                        <td><?= $row['rname'];?></td>
                                        <td><?= $row['remail'];?></td>
                                        <td><?= $row['rdesc'];?></td>
                                        <td><?= $row['rsta'];?></td>
                                        <td style="display: flex; justify-content: center;">
                                            
                                            <div>&nbsp;</div>
                                            <form action="approval.php" method="POST">
                                                <div class="form-group">
                                                    <input type="hidden"  name="id" value=<?= $row['id'];?> >
                                                    <input type="hidden"  class="form-control" name="rsta" value="Solved" > 
                                                    <button  data-toggle="tooltip"  type="submit" name="submit"  title="Solved" class="pd-setting-ed" style="background-color: #3CB628;"><i class="fa fa-check" style="color: white;"aria-hidden="true"></i></button>
                                                </div>
                                                
                                            </form>
                                        </td>
                                       
                                    </tr>
                                    <?php
                                    }
                                
                                    ?>
                                    
                                </table>
                            </div>
                            <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a type="button" id="prevBtn" class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a type="button" id="nextBtn"  class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- /header -->
<?php include '../../x/layout/footer.php'; ?>

