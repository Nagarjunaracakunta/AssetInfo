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
        <!--First Part-->
        <div class="row offset-md-3">
            <div class="col-md-4" style="margin-top:28%">
                <img class="img-fluid" src="/AssetInfo/images/signin-image.jpg" alt="Signin"> 
            </div>
            <!--Second Part--->
            <div class="col-md-6" style="margin-top:25%">
                <span class="anchor" id="formLogin"></span>
                <!-- form card login with validation feedback -->
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="mb-0 text-white">Login</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" role="form" autocomplete="off" id="loginForm" novalidate="" method="POST">
                            <div class="form-group">
                                <label for="employee_id">Employee Id</label>
                                <input type="text" class="form-control" name="emp_id" id="employee_id" required="">
                                <div class="invalid-feedback">Please enter your Employee Id</div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="pwd1" required="" autocomplete="new-password">
                                <div class="invalid-feedback">Please enter a password</div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-success float-left" value="Sign Up" id="signup">
                                    <input type="button" class="btn btn-success float-right" value="Sign In">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--/card-body-->
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    $("#btnLogin").click(function(event) {
    
    var form = $("#loginForm");
    
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    
    // if validation passed form
    // would post to the server here
    
    form.addClass('was-validated');
});
$('#signup').click(function() {
    window.location.href = 'signup.php';
    return false;
});
</script>
</html>