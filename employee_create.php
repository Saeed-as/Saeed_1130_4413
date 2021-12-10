<?php include "header.php"; ?>

<h1>New Employee</h1>
<a href="employee.php" class="btn btnHome">Home</a>
<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    

    $employee_no = $_POST['employee_no'];
    $employee_name_en = $_POST['employee_name_en'];
    $employee_name_ar = $_POST['employee_name_ar'];
    $employee_id = $_POST['employee_id'];
    $birth_date = $_POST['birth_date'];
    $nationality = $_POST['nationality'];
    $mobile_no = $_POST['mobile_no'];
    $active = $_POST['active'];
    $create_by = 1;
    $create_at = date("Y-m-d H:i");


    $sql = "INSERT INTO employee (employee_no, employee_name_en, employee_name_ar, employee_id, birth_date, nationality, mobile_no, active, create_by,create_at)
    
    
    VALUES ('$employee_no' ,'$employee_name_en' ,'$employee_name_ar' ,'$employee_id' ,'$birth_date' ,'$nationality' ,'$mobile_no' ,'$active', '$create_by', '$create_at')";


    if ($conn->query($sql) === TRUE) {

        $last_id = $conn->insert_id;

        if( $_POST['submit'] == "Save & Create Another Record" ):
            header("location: employee_create.php?msg=New record created successfully.");
        else:
            header("location: employee_view.php?msg=New record created successfully&id=".$last_id);
        endif;

    } else {
        echo "<p style='color:red;'>Error: ".$conn->error."</p>";
    }
}


$result_nationalities = $conn->query("SELECT * FROM employee_nationality WHERE active='1' ORDER BY nationality ASC;");
while ( $row_nationalities = $result_nationalities->fetch_assoc() ) { 
    $nationalities[$row_nationalities['id']] = $row_nationalities['nationality'];
}
?>

<form method="post" action="" name="employee_create_form" onsubmit="return validateEmployeeForm()">

    <table class="tblLeft">

        <tr>
            <th>Employee No</th>
            <td><input type="text" name="employee_no"></td>
            <td><small id="employee_no_msg" class="msgDanger"></small></td>
        </tr>
        
        <tr>
            <th>Employee Name EN</th>
            <td><input type="text" name="employee_name_en"></td>
            <td><small id="employee_name_en_msg" class="msgDanger"></small></td>
        </tr>
        <tr>
            <th>Employee Name AR</th>
            <td><input type="text" name="employee_name_ar"></td>
            <td><small id="employee_name_ar_msg" class="msgDanger"></small></td>
        </tr>
        <tr>
            <th>Employee ID</th>
            <td><input type="number" name="employee_id"></td>
            <td><small id="employee_id_msg" class="msgDanger"></small></td>
        </tr>
        <tr>
            <th>Birth Date</th>
            <td><input type="date" name="birth_date"></td>
            <td><small id="birth_date_msg" class="msgDanger"></small></td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td>
                <select name="nationality" id="">
                    <?php foreach ($nationalities as $key => $nationality): ?>
                        <option value="<?php echo $key; ?>"><?php echo $nationality; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        

        <tr>
            <th>Mobile No</th>
            <td><input type="number" name="mobile_no"></td>
            <td><small id="mobile_no_msg" class="msgDanger"></small></td>
        </tr>
        <tr>
            <th>Active</th>
            <td>
                <select name="active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </td>
            <td><small id="active_msg" class="msgDanger"></small></td>
        </tr>
    </table>

    <input type="submit" name="submit" value="Save & View" class="btn btnSubmit">
    <input type="submit" name="submit" value="Save & Create Another Record" class="btn btnSubmit">

</form>


<?php include "footer.html"; ?>