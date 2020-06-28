<?php
    session_start();
    include('dbconfig.php');
    if (!isset($_SESSION['success'])) 
    {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
    }
    if (isset($_POST['logout'])) {
		
		session_destroy();
		unset($_SESSION['emp_name']);
		header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/AssetInfo/CSS/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Main Javascript-->
    <title>Document</title>

</head>
<body>
    <div class="container">
        <div class="page-header bg-success">
             <h2 class="text-white text-center p-3"><?php echo $_SESSION['emp_name']; ?></h2>       
          </div>
        <div class="row offset-md-3">
            
            <div class="d-flex p-3 bg-white text-white">
                 <input type="button" class="btn btn-outline-success mx-3 p-3 form-btn" value="Form-Fill">
                <input type="button" class="btn btn-outline-success mx-3 p-3 view-btn" value="View" aria-expanded="false">
                <input type="button" class="btn btn-outline-success mx-3 p-3 employee-btn" value="Manager Data">
                <input type="button" class="btn btn-outline-success mx-3 p-3 export-btn" value="Export Data" aria-expanded="false">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                            <input  class="btn-outline-success mx-3 p-3" type="submit" name="logout" value="logout"/>
                </form>
            </div>
        </div>
        <div class="row">

            <div class="col-md-3" style="margin-top:15%">
                
                <img class="img-fluid" src="/AssetInfo/images/signup-image.jpg" alt="Signin"> 
            </div>

            <div  class="col-md-9" style="margin-bottom:15%" id="collapseExample">
                <form action="businesslogic.php" class="form" role="form" autocomplete="off" id="Formfill" novalidate="" method="POST">
                    <span class="anchor" id="formComplex"></span>
                    <hr class="my-5">
                    <input type="hidden" id="emp_id" value="<?php echo $_SESSION['emp_id']; ?>" name="emp_id"> 
                    
                    <input type="hidden" id="emp_name" value="<?php echo $_SESSION['emp_name']; ?>" name="emp_name"> 
                    <div class="form-row">
                        <div class="col-sm-3 pb-3">
                            <label for="exampleAccount">Employee Role</label>
                            <input type="text" class="form-control" id="exampleAccount" name="emp_role" placeholder="" value="<?php echo $_SESSION['emp_role']; ?>">
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label for="exampleCtrl">Employee Won</label>
                            <input type="text" class="form-control" id="exampleCtrl"  name="emp_won"  placeholder="" value="<?php echo $_SESSION['emp_won']; ?>">
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label for="exampleAmount">Manager</label>
                            <input type="text" class="form-control" id="exampleAmount"  name="emp_manager"  placeholder="" value="<?php echo $_SESSION['emp_manager']; ?>">
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label for="exampleAmount">Access Provider</label>
                            <select class="form-control" id="exampleSt" name="access_provider">
                                <option>Select---</option>
                                <option value="laptop">Laptop</option>
                                <option value="desktop">Desktop</option>
                            </select>
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="exampleFirst">Asset ID</label>
                            <input type="text" class="form-control" id="exampleFirst" name="asset_id" placeholder="">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="exampleLast">IP Address</label>
                            <input type="text" class="form-control" id="exampleLast" name="ip_address" placeholder="">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="exampleLast">SBWS Arrangement Start Date</label>
                            <input type="date" class="form-control" id="exampleLast" name="sbws_date" placeholder="">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="exampleCity">City</label>
                            <input type="text" class="form-control" id="exampleCity" name="city" placeholder="">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="exampleSt">Contact Number</label>
                            <input type="text" class="form-control" id="exampleZip" name="contact_number" placeholder="">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="exampleZip">Alternate Contact Number</label>
                            <input type="text" class="form-control" id="exampleZip" name="alt_contact_number" placeholder="">
                        </div>
                        <div class="col-md-6 pb-3">
                            <label for="exampleMessage">Current Address</label>
                            <textarea class="form-control" id="exampleMessage" name="current_address"></textarea>
                        </div>
                        <div class="col-md-6 pb-3">
                            <label for="exampleMessage">Permanent Address</label>
                            <textarea class="form-control" id="exampleMessage" name="permanent_address"></textarea>
                        </div>
                            <div class="col-12">
                            <div class="form-row">
                                <button type="submit" class="btn btn-success btn-lg float:right" name="fillform" id="btnLogin">Save</button>
                            </div>
                            </div>
                    </div>
                </form>
            </div>
            
            <div class="col-md-9" style="margin-bottom:15%;margin-top:6%"  id="collapseExample2">
                <?php 
                    $name=$_SESSION['emp_name'];
                    $sql = "select * from Employee_Info where emp_name='$name'";
                    $results = mysqli_query($db, $sql);
                    $result = mysqli_fetch_array($results);
                
                ?>
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="row">Employee Role</th>
                        <td><?php echo $result['emp_role']; ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Employee Won</th>
                        <td><?php echo $result['emp_won']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Manager</th>
                        <td><?php echo $result['emp_manager']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Access Provider</th>
                        <td><?php echo $result['asset_type']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Asset ID</th>
                        <td><?php echo $result['asset_id']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">IP Address</th>
                        <td><?php echo $result['ip_address']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">SBWS Arrangement Date</th>
                        <td><?php echo $result['sbws_date']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Residing City</th>
                        <td><?php echo $result['residing_city']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Contact Number</th>
                        <td><?php echo $result['mobile_number']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Alternate Contact Number</th>
                        <td><?php echo $result['alt_mobile_number']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Current Address</th>
                        <td><?php echo $result['current_address']; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Permanent Address</th>
                        <td><?php echo $result['permanent_address']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9" id="collapseExample3" style="margin-bottom:15%;;margin-top:10%">
                <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-success">Download Sample File</h4>
                            <form action="businesslogic.php" method="POST" enctype="multipart/form-data">
                                <input type="submit" class="btn btn-success" name="downloaddata" value="download" />
                            </form>
                    </div>
                    
                    <form action="businesslogic.php" method="POST" enctype="multipart/form-data">
                        <div class="form row m-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Update Employee List</label>
                                    
                                </div>        
                            </div>
                            <div class="form row m-5 ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Delete Employee List</label>
                                    
                                </div>        
                            </div>
                            <div class="form row m-5 ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Add Employee List</label>
                                    
                                </div>        
                            </div>
                    </form>
                </div>
            </div>
            <div  class="col-md-9" style="margin-bottom:15%;margin-top:15%" id="collapseExample4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-success">Download Managers Data</h4>
                        <form action="businesslogic.php" method="POST" enctype="multipart/form-data">
                            <input type="submit" class="btn btn-success" name="downloaddata" value="download" />
                        </form>
                   </div>
                 </div>
            </div>
        </div>  
        <div class="page-header bg-success">
            <h2 class="text-white text-center p-3"></h2>      
        </div>  
    </div>
</body>
<script>


$(document).ready(function(){
         $("#collapseExample").collapse('show');
        $("#collapseExample2").collapse('hide');
        $("#collapseExample3").collapse('hide');
        $("#collapseExample4").collapse('hide');

    $(".form-btn").click(function(){
        $("#collapseExample").collapse('show');
        $("#collapseExample2").collapse('hide');
        $("#collapseExample3").collapse('hide');
        $("#collapseExample4").collapse('hide');
    });
    $(".view-btn").click(function(){
        $("#collapseExample2").collapse('show');
        $("#collapseExample").collapse('hide');
        $("#collapseExample3").collapse('hide');
        $("#collapseExample4").collapse('hide');
    });

    $(".employee-btn").click(function(){
        $("#collapseExample2").collapse('hide');
        $("#collapseExample").collapse('hide');
        $("#collapseExample3").collapse('show');
        $("#collapseExample4").collapse('hide');
    });

    $(".export-btn").click(function(){
        $("#collapseExample2").collapse('hide');
        $("#collapseExample").collapse('hide');
        $("#collapseExample3").collapse('hide');
        $("#collapseExample4").collapse('show');
    });
});
</script>
</html>
