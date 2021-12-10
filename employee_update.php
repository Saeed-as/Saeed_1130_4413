<?php include "header.php"; ?>

<h1>Update</h1>
<a href="employee.php" class="btn btnHome">Home</a>
<?php


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $id = $_POST['id'];
    $employee_no = $_POST['employee_no'];
    $employee_name_en = $_POST['employee_name_en'];
    $employee_name_ar = $_POST['employee_name_ar'];
    $employee_id = $_POST['employee_id'];
    $birth_date = $_POST['birth_date'];
    $nationality = $_POST['nationality'];
    $mobile_no = $_POST['mobile_no'];
    $active = $_POST['active'];

    $sql= "UPDATE employee set 
                            employee_no = '$employee_no' ,
                            employee_name_en = '$employee_name_en' ,
                            employee_name_ar = '$employee_name_ar' ,
                            employee_id = '$employee_id' ,
                            birth_date = '$birth_date' ,
                            nationality = '$nationality' ,
                            mobile_no = '$mobile_no' ,
                            active = '$active'
                            WHERE id = $id";
    

    if ( $conn->query($sql) === TRUE ) {

        header("location: employee_update.php?msg=Record updating Successfully.&id=".$id);
    } else { 

        echo "<p style='color:red;'>Error: ".$conn->error."</p>";
    }
}

if( $_GET['id'] > 0 &&  is_numeric($_GET['id']) ) { 

    $id = $_GET['id'];
    $sql = "SELECT * FROM employee WHERE id=$id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    $result_nationalities = $conn->query("SELECT * FROM employee_nationality WHERE active='1' ORDER BY nationality ASC;");
    while ( $row_nationalities = $result_nationalities->fetch_assoc() ) { 
        $nationalities[$row_nationalities['id']] = $row_nationalities['nationality'];
    }

    ?>

    <?php if ( $result->num_rows > 0 ):?>

    <form method="post" action="" name="employee_create_form" onsubmit="return validateEmployeeForm()">

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <table class="tblLeft">

            <tr>
                <th>Employee No</th>
                <td><input type="text" name="employee_no" value="<?php echo $row['employee_no']; ?>"></td>
            </tr>
            <tr>
                <th>Employee Name EN</th>
                <td><input type="text" name="employee_name_en" value="<?php echo $row['employee_name_en']; ?>"></td>
            </tr>
            <tr>
                <th>Employee Name AR</th>
                <td><input type="text" name="employee_name_ar" value="<?php echo $row['employee_name_ar']; ?>"></td>
            </tr>
            <tr>
                <th>Employee ID</th>
                <td><input type="number" name="employee_id" value="<?php echo $row['employee_id']; ?>"></td>
            </tr>
            <tr>
                <th>Birth Date</th>
                <td><input type="date" name="birth_date" value="<?php echo $row['birth_date']; ?>"></td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td>
                    <select name="nationality" id="">
                        <?php foreach ($nationalities as $key => $nationality): ?>
                            <option <?php echo $row['nationality'] == "$key" ? "selected" : ""; ?> value="<?php echo $key; ?>"><?php echo $nationality; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            

            <tr>
                <th>Mobile No</th>
                <td><input type="text" name="mobile_no" value="<?php echo $row['mobile_no']; ?>"></td>
            </tr>
            <tr>
                <th>Active</th>
                <td>
                    <select name="active">
                        <option <?php echo $row['active'] == '1' ? "selected" : ""; ?> value="1">Active</option>
                        <option <?php echo $row['active'] == '0' ? "selected" : ""; ?> value="0">Inactive</option>
                    </select>
                </td>
            </tr>
        </table>

        <input type="submit" name="submit" value="Submit" class="btn btnSubmit">

    </form>

    <?php 
    else:
        header("location: employee.php?msg=No result found");
    endif;


} else {

    header("location: employee.php?msg=Invalid data");
    exit;
}
?>
<?php include "footer.php"; ?>