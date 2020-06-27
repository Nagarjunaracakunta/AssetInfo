<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/CSS/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Main Javascript-->
<script src="/Javascript/script.js"></script>
    <title>Document</title>

</head>
<body>
    <div class="container">
        <div class="page-header bg-success">
            <h1 class="text-white text-center p-2">Nagarjuna Rachakunta</h1>      
          </div>
        <div class="row">
            
        <input type="button" class="btn btn-success form-btn" value="Form-Fill">
            <input type="button" class="btn btn-success view-btn" value="View" aria-expanded="false">
            <input type="button" class="btn btn-success employee-btn" value="Manager Data">
            <input type="button" class="btn btn-success export-btn" value="Export Data" aria-expanded="false">
        </div>
        <div class="row" id="collapseExample">

            <div class="col-md-3" style="margin-top:15%">
                
                <img class="img-fluid" src="/AssetInfo/images/signup-image.jpg" alt="Signin"> 
            </div>

            <div class="col-md-9">
                <span class="anchor" id="formComplex"></span>
                <hr class="my-5">
                <div class="form-row">
                    <div class="col-sm-3 pb-3">
                        <label for="exampleAccount">Employee Role</label>
                        <input type="text" class="form-control" id="exampleAccount" placeholder="">
                    </div>
                    <div class="col-sm-3 pb-3">
                        <label for="exampleCtrl">Employee Won</label>
                        <input type="text" class="form-control" id="exampleCtrl" placeholder="">
                    </div>
                    <div class="col-sm-3 pb-3">
                        <label for="exampleAmount">Manager</label>
                        <input type="text" class="form-control" id="exampleAmount" placeholder="">
                    </div>
                    <div class="col-sm-3 pb-3">
                        <label for="exampleAmount">Access Provider</label>
                        <select class="form-control" id="exampleSt">
                            <option>Select---</option>
                            <option>Laptop</option>
                            <option>Desktop</option>
                        </select>
                    </div>
                    <div class="col-sm-4 pb-3">
                        <label for="exampleFirst">Asset ID</label>
                        <input type="text" class="form-control" id="exampleFirst">
                    </div>
                    <div class="col-sm-4 pb-3">
                        <label for="exampleLast">IP Address</label>
                        <input type="text" class="form-control" id="exampleLast">
                    </div>
                    <div class="col-sm-4 pb-3">
                        <label for="exampleLast">SBWS Arrangement Start Date</label>
                        <input type="date" class="form-control" id="exampleLast">
                    </div>
                    <div class="col-sm-4 pb-3">
                        <label for="exampleCity">City</label>
                        <input type="text" class="form-control" id="exampleCity">
                    </div>
                    <div class="col-sm-4 pb-3">
                        <label for="exampleSt">Contact Number</label>
                        <input type="number" class="form-control" id="exampleZip">
                    </div>
                    <div class="col-sm-4 pb-3">
                        <label for="exampleZip">Alternate Contact Number</label>
                        <input type="number" class="form-control" id="exampleZip">
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="exampleMessage">Current Address</label>
                        <textarea class="form-control" id="exampleMessage"></textarea>
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="exampleMessage">Permanent Address</label>
                        <textarea class="form-control" id="exampleMessage"></textarea>
                    </div>
                        <div class="col-12">
                        <div class="form-row">
                            <button type="submit" class="btn btn-success btn-lg float:right" id="btnLogin">Save</button>
                        </div>
                        </div>
                </div>
            </div>

            </div>
            <div class="row" id="collapseExample2">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="row">Employee Role</th>
                    <td>WWWWWWWWW</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Employee Won</th>
                    <td>Mark</td>
                    </tr>
                    <tr>
                    <th scope="row">Manager</th>
                    <td>Jacob</td>
                    </tr>
                    <tr>
                    <th scope="row">Access Provider</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">Asset ID</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">IP Address</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">SBWS Arrangement Date</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">City</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">Contact Number</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">Alternate Contact Number</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">Current Address</th>
                    <td>Larry</td>
                    </tr>
                    <tr>
                    <th scope="row">Permanent Address</th>
                    <td>Larry</td>
                    </tr>
                </tbody>
                </table>
            </div>
        <div class="row" id="collapseExample3">
        <!--Card-->
                <div class="row">
                    <div class="input-group m-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Update Employee Data</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <div class="form-group rw ml-4">      
                         <input type="button" class="btn btn-success " value="Submit" id="updatedata">        
                        </div>
                    </div>
                    <div class="input-group m-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Delete Employee Data</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                        <div class="form-group  ml-4">      
                         <input type="button" class="btn btn-success " value="Submit" id="deletedata">        
                        </div>
                    </div>
                    <div class="input-group m-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Add Employee Data</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                        <div class="form-group  ml-4">      
                         <input type="button" class="btn btn-success" value="Submit" id="adddata" >        
                        </div>
                    </div>
                    <!--/.Card-->
        </div>
    </div>
</body>
<script>


$(document).ready(function(){
    $(".form-btn").click(function(){
        $("#collapseExample").collapse('show');
        $("#collapseExample2").collapse('hide');
        $("#collapseExample2").collapse('hide');
        $("#collapseExample2").collapse('hide');
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
