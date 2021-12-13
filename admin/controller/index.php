
<?php include_once '../model/db_config.php'; ?> 
<?php 
  
        // Define variables and initialize with empty values
        $name = $code = "";
        $name_err = $code_err =$success= "";
        
        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $input_name = trim($_POST["cat_name"]);
            $input_code = trim($_POST["cat_code"]);
            
            // Check input errors before inserting in database
            if(empty($name_err) && empty($code_err)){ 
                $sql = "INSERT INTO categoryType (cat_type_name, cat_type_code) VALUES (?, ?)";
                
                    if($statement = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($statement, "ss", $param_name, $param_code);

                        // Set parameters
                        $param_name = $input_name;
                        $param_code =  $input_code; 
                        if(mysqli_stmt_execute($statement)){
                            $cat_type_name='';
                            $cat_type_code='';
                            $success = "Successfully Inserted";
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                }  
                // Close statement
                mysqli_stmt_close($statement);
            }            
            // Close connection
            mysqli_close($link); 
        
?>
<!DOCTYPE html>
<html>
<?php include '../view/layout/header.php'; ?>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include '../view/layout/side_navbar.php'; ?>
        <!-- Page Content  -->
        <div id="content">
        <?php include '../view/layout/content_navbar.php'; ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-5 col-sm-6">
                        <div class="mb-3">
                            <h3 style="text-align: center;">Category Add Form</h3>                            
                        </div>
                        <form accept="" class="shadow p-4">
                            <div class="mb-3">
                                <span style="color:green;" id="success"></span>
                                <span style="color:red;" id="both_err"></span>
                                <label for="cat_type_name">Category Type Name</label>
                                <input type="text" class="form-control" name="cat_type_name" id="cat_type_name" placeholder="Category Type Name" value="<?php echo $name;?>">
                                <span style="color:red;" id="name_err"></span>
                            </div>
                            <div class="mb-3">
                                <label for="cat_type_code">Category Type Code</label>
                                <input type="text" class="form-control" name="cat_type_code" id="cat_type_code" placeholder="Category Type Code" value="<?php echo $code;?>">
                                <span style="color:red;" id="code_err"></span>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="button" class="btn btn-primary" onclick="AddCategory()">Add Category</button>
                            </div>
                        </form>
                    </div> 
                    <div class="col-md-7 col-sm-6" id="data_show"> 
                        <div class="mb-3">
                            <h3 style="text-align: center;">Show Data</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>                                
                                <th scope="col">Category Type Name</th>
                                <th scope="col">Category Type Code</th>
                                <th colspan="2" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="show_data"></tbody>
                        </table>                        
                    </div>             
                </div>
            </div>
        </div>
    </div>
    <?php include '../js/js_library.php'; ?>   
</body>
</html>