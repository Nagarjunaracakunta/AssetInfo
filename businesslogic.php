<?php
        include('dbconfig.php');
        if(isset($_FILES['uploaddata']))
        {
            $errors= array();
            $file_name = $_FILES['uploaddata']['name'];
            $file_size =$_FILES['uploaddata']['size'];
            $file_tmp =$_FILES['uploaddata']['tmp_name'];
            $file_type=$_FILES['uploaddata']['type'];
            $arrayVar = explode(".", $_FILES['uploaddata']['name']);
            $file_ext=strtolower(end($arrayVar));
            
            $extensions= array("jpeg","jpg","png","xls","xlsx");
            
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true){
               move_uploaded_file($file_tmp,"manager/".$file_name);
               require 'Classes/PHPExcel/IOFactory.php';
               $inputfilename = 'manager/example.xls';
               $exceldata = array();
               //  Read your Excel workbook
                try
                {
                    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
                    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
                    $objPHPExcel = $objReader->load($inputfilename);
                }
                catch(Exception $e)
                {
                    die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
                }

                //  Get worksheet dimensions
                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();

                //  Loop through each row of the worksheet in turn
                                //  Loop through each row of the worksheet in turn
                for ($row = 1; $row <= 1; $row++)
                { 
                    //  Read a row of data into an array
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                    
                    //  Insert row data array into your database of choice here
                    $sql = "INSERT INTO Employee (emp_id, emp_name, emp_role , emp_won ,emp_manager ,emp_password)
                            VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."', '".$rowData[0][4]."', '".$rowData[0][5]."')";
                    
                    if (mysqli_query($db, $sql))
                    {
                        $exceldata[] = $rowData[0];
                    }
                     else
                    {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                    }
                }

                // Print excel data
                echo "<table>";
                foreach ($exceldata as $index => $excelraw)
                {
                    echo "<tr>";
                    foreach ($excelraw as $excelcolumn)
                    {
                        echo "<td>".$excelcolumn."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($db);




               echo "Success";
            }else{
               print_r($errors);
            }
         }
         if (isset($_POST['downloaddata']))
        {
            $query = "SELECT * FROM Employee";
            $filename = date("Y/m/d"); 
            $result = mysqli_query($db, $query);
            //select database   
            //execute query 
            $file_ending = "xls";
            //header info for browser
            header("Content-Type: application/xls");    
            header("Content-Disposition: attachment; filename=$filename.xls");  
            header("Pragma: no-cache"); 
            header("Expires: 0");
            /*******Start of Formatting for Excel*******/   
            //define separator (defines columns in excel & tabs in word)
            $sep = "\t"; //tabbed character
            //start of printing column names as names of mysqli fields

            $schema_insert = "";
            while ($property = mysqli_fetch_field($result))
            {
                $schema_insert .= "$property->name".$sep;
            }
            $schema_insert = str_replace($sep."$", "", $schema_insert);
            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            print(trim($schema_insert));
            print("\n");    
            //end of printing column names  
            //start while loop to get data
            while($row = mysqli_fetch_row($result))
            {
                $schema_insert = "";
                for($j=0; $j<mysqli_num_fields($result);$j++)
                {
                    if(!isset($row[$j]))
                        $schema_insert .= "NULL".$sep;
                    elseif ($row[$j] != "")
                        $schema_insert .= "$row[$j]".$sep;
                    else
                        $schema_insert .= "".$sep;
                }
                $schema_insert = str_replace($sep."$", "", $schema_insert);
                $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
                $schema_insert .= "\t";
                print(trim($schema_insert));
                print "\n";
            }   

        }
        if (isset($_GET['EmployeeId']))
        {
            $EmployeeId=$_GET['EmployeeId'];
            $result = mysqli_query($db, "SELECT emp_name,emp_role,emp_manager,emp_won FROM Employee where emp_id=$EmployeeId");
            $data = array();
            while ($row = mysqli_fetch_object($result))
            {
              array_push($data, $row);
            }

            echo json_encode($data);
            exit();
        }
        if (isset($_POST['register']))
        {

	        

                // receive all input values from the form
            $EmployeeId = mysqli_real_escape_string($db, $_POST['emp_id']);
            $password1 = mysqli_real_escape_string($db, $_POST['pwd1']);
            $password2 = mysqli_real_escape_string($db, $_POST['pwd2']);

            // form validation: ensure that the form is correctly filled
            if (empty($EmployeeId)) { array_push($errors, "EmployeeId is required"); }
            if (empty($password1)) { array_push($errors, "password is required"); }
            if (empty($password2)) { array_push($errors, "password is required"); }

           

            // register user if there are no errors in the form
            if (count($errors) == 0) 
            {
                $password = md5($password1);//encrypt the password before saving in the database
                $query = "update   Employee  set emp_password='$password' where emp_id='$EmployeeId' ";
                if(!mysqli_query($db, $query))
                {
                    echo("Error description: " . $db -> error);
                    
                }
                header('location: login.php');
            }
            else
            {
                print_r ($errors);
            }
           

        }
        // LOGIN USER
        if (isset($_POST['login_user'])) 
        {

	       
            $errors = array(); 
            $EmployeeId = mysqli_real_escape_string($db, $_POST['emp_id']);
            $password = mysqli_real_escape_string($db, $_POST['pwd']);
            if (empty($EmployeeId)) {
                array_push($errors, "EmployeeId is required");
            }
            if (empty($password)) {
                array_push($errors, "Password is required");
            }

            if (count($errors) == 0) 
            {
                
                $password = md5($password);
                $query = "SELECT * FROM Employee WHERE emp_id='$EmployeeId' AND emp_password='$password'";
                $results = mysqli_query($db, $query);

                if (mysqli_num_rows($results) == 1) 
                {
                    session_start();
                    $_SESSION['success'] = "You are now logged in";
                    foreach($results as $result)
                    {
                        $_SESSION['emp_id']=$result['emp_id'];
                        $_SESSION['emp_name'] = $result['emp_name'];
                        $_SESSION['emp_role']=$result['emp_role'];
                        $_SESSION['emp_won']=$result['emp_won'];
                        $_SESSION['emp_manager']=$result['emp_manager'];
                    }
                    if ($_SESSION['emp_role']=="Manager")
                    {               
                        header('location: manager.php');
                    }
                    else if ($_SESSION['emp_role']=="Developer")
                    {
                        
                        header('location: teammember.php');
                    }
                    else
                    {
                        header('location: supervisor.php');

                    }
                    
                }
                else
                {
                    print_r ($errors);
                }
                    
            }
            else
            {
                
                array_push($errors, "(  Invalid username and password  )");
            }
        }

        if (isset($_POST['fillform'])) 
        {

            $errors = array(); 
                // receive all input values from the form
            $emp_id = mysqli_real_escape_string($db, $_POST['emp_id']);
            $emp_name = mysqli_real_escape_string($db, $_POST['emp_name']);
            $emp_role = mysqli_real_escape_string($db, $_POST['emp_role']);
            $emp_won = mysqli_real_escape_string($db, $_POST['emp_won']);
            $emp_manager = mysqli_real_escape_string($db, $_POST['emp_manager']);
            $asset_id = mysqli_real_escape_string($db, $_POST['asset_id']);
            $access_provider = mysqli_real_escape_string($db, $_POST['access_provider']);
            $ip_address = mysqli_real_escape_string($db, $_POST['ip_address']);
            $date=date("Y/m/d");
            $permanentaddress = mysqli_real_escape_string($db, $_POST['permanent_address']);
            $currentaddress = mysqli_real_escape_string($db, $_POST['current_address']);
            $city = mysqli_real_escape_string($db, $_POST['city']);
            $contact_number = mysqli_real_escape_string($db, $_POST['contact_number']);
            $alt_contact_number = mysqli_real_escape_string($db, $_POST['alt_contact_number']);
            if (count($errors) == 0)
            {
                $query = "INSERT INTO Employee_Info (emp_id, emp_name, emp_role, emp_won , emp_manager, asset_id,asset_type,ip_address,sbws_date,permanent_address,current_address,residing_city,mobile_number,alt_mobile_number) 
                        VALUES('$emp_id','$emp_name', '$emp_role',  '$emp_won', '$emp_manager','$asset_id','$access_provider','$ip_address','$date','$permanentaddress','$currentaddress','$city', '$contact_number',  '$alt_contact_number')";
                if (!mysqli_query($db, $query))
                {
                    echo "Error: " . $query . "<br>" . mysqli_error($db);
                }
                else
                {
                }

            }
            
           



        }
    
        

?>