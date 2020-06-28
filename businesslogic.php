<?php
        include('dbconfig.php');
        if(isset($_FILES['uploaddata'])){
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
                    
                    if (mysqli_query($db, $sql)) {
                        $exceldata[] = $rowData[0];
                    } else {
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
        

?>