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
    <title>Asset</title>

</head>
<body>
    <div class="container">
        <div class="page-header bg-success">
            <h1 class="text-white text-center p-2">Nagarjuna Rachakunta</h1>      
          </div>
        <div class="row">
            
            <input type="button" class="btn btn-success show-btn" value="form-fill">
            <input type="button" class="btn btn-success hide-btn" value="view" aria-expanded="false">
            <input type="button" class="btn btn-success show-btn" value="Employee">
            <input type="button" class="btn btn-success hide-btn" value="Export Data" aria-expanded="false">
        </div>
        <div class="row" id="collapseExample">

            <div class="col-md-3" style="margin-top:15%">
                
                <img class="img-fluid" src="/images/signup-image.jpg" alt="Signin"> 
            </div>

            <div class="col-md-9">
                <span class="anchor" id="formComplex"></span>
                <hr class="my-5">
                <h3>Complex Form Example </h3>
                
                <!-- form complex example -->
                <div class="form-row">
                    <div class="col-sm-5 pb-3">
                        <label for="exampleAccount">Account #</label>
                        <input type="text" class="form-control" id="exampleAccount" placeholder="XXXXXXXXXXXXXXXX">
                    </div>
                    <div class="col-sm-3 pb-3">
                        <label for="exampleCtrl">Control #</label>
                        <input type="text" class="form-control" id="exampleCtrl" placeholder="0000">
                    </div>
                    <div class="col-sm-4 pb-3">
                        <label for="exampleAmount">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            <input type="text" class="form-control" id="exampleAmount" placeholder="Amount">
                        </div>
                    </div>
                    <div class="col-sm-6 pb-3">
                        <label for="exampleFirst">First Name</label>
                        <input type="text" class="form-control" id="exampleFirst">
                    </div>
                    <div class="col-sm-6 pb-3">
                        <label for="exampleLast">Last Name</label>
                        <input type="text" class="form-control" id="exampleLast">
                    </div>
                    <div class="col-sm-6 pb-3">
                        <label for="exampleCity">City</label>
                        <input type="text" class="form-control" id="exampleCity">
                    </div>
                    <div class="col-sm-3 pb-3">
                        <label for="exampleSt">State</label>
                        <select class="form-control" id="exampleSt">
                            <option>Pick a state</option>
                        </select>
                    </div>
                    <div class="col-sm-3 pb-3">
                        <label for="exampleZip">Postal Code</label>
                        <input type="text" class="form-control" id="exampleZip">
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="exampleAccount">Color</label>
                        <div class="form-group small">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Blue
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Red
                                </label>
                            </div>
                            <div class="form-check form-check-inline disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled=""> Green
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option4"> Yellow
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option5"> Black
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option6"> Orange
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="exampleMessage">Message</label>
                        <textarea class="form-control" id="exampleMessage"></textarea>
                        <small class="text-info">
                        Add the packaging note here.
                        </small>
                    </div>
                    <div class="col-12">
                        <div class="form-row">
                            <label class="col-md col-form-label"  for="name">Generated Id</label>
                            <input type="text" class="form-control col-md-4" name="gid" id="gid" />
                            <label class="col-md col-form-label"  for="name">Date Assigned</label>
                            <input type="text" class="form-control col-md-4" name="da" id="da" />
                        </div>
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
            <h2>hai</h2>
        </div>
    </div>
</body>
<script>



$(document).ready(function(){
    $(".show-btn").click(function(){
        $("#collapseExample").collapse('show');
        $("#collapseExample2").collapse('hide');
    });
    $(".hide-btn").click(function(){
        $("#collapseExample2").collapse('show');
        $("#collapseExample").collapse('hide');
    });
});
</script>
</html>
