<?php include "header.php"; ?>

<h1>New Nationality</h1>
<a href="employee_nationality.php" class="btn btnHome">Home</a>

<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    

    $nationality = $_POST['nationality'];
    $active = $_POST['active'];
    $create_by = 1;
    $create_at = date("Y-m-d H:i");


    $sql = "INSERT INTO employee_nationality (nationality, active, create_by,create_at)
    VALUES ('$nationality', '$active', '$create_by', '$create_at')";


    if ($conn->query($sql) === TRUE) {

        $last_id = $conn->insert_id;

        if( $_POST['submit'] == "Save & Create Another Record" ):
            header("location: employee_nationality_create.php?msg=New record created successfully.");
        else:
            header("location: employee_nationality_view.php?msg=New record created successfully&id=".$last_id);
        endif;

    } else {
        echo "<p style='color:red;'>Error: ".$conn->error."</p>";
    }
}

?>

<form method="post" action="" name="employee_nationality_create_form" onsubmit="return validateEmployeeNationalityForm()">

    <table class="tblLeft">
        <tr>
            <th>Nationality</th>
            <td><input type="text" name="nationality"></td>
            <td><small id="nationality_msg" class="msgDanger"></small></td>
        </tr>
        <tr>
            <th>Active</th>
            <td>
                <select name="active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </td>
        </tr>
    </table>

    
    <input type="submit" name="submit" value="Save & View" class="btn btnSubmit">
    <input type="submit" name="submit" value="Save & Create Another Record" class="btn btnSubmit">

</form>


<?php include "footer.html"; ?>