<?php include "header.php"; ?>

<h1>Update</h1>
<a href="employee_nationality.php" class="btn btnHome">Home</a>
<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $nationality = $_POST['nationality'];
    $active = $_POST['active'];
    $id = $_POST['id'];

    $sql= "UPDATE employee_nationality set 
                            nationality='$nationality', 
                            active='$active'
                            WHERE id = $id";
    
    if ( $conn->query($sql) === TRUE ) {

        header("location: employee_nationality_update.php?msg=Record updating Successfully.&id=".$id);
    } else { 

        echo "<p style='color:red;'>Error: ".$conn->error."</p>";
    }


    
}


if( $_GET['id'] > 0 &&  is_numeric($_GET['id']) ) { 

    $id = $_GET['id'];
    $sql = "SELECT * FROM employee_nationality WHERE id=$id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    ?>

    <?php if ( $result->num_rows > 0 ):?>

    <form method="post" action="" name="employee_nationality_create_form" onsubmit="return validateEmployeeNationalityForm()">

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <table class="tblLeft">
            <tr>
                <th>Nationality</th>
                <td><input type="text" name="nationality" value="<?php echo $row['nationality']; ?>"></td>
                <td><small id="nationality_msg" class="msgDanger"></small></td>
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
        header("location: employee_nationality.php?msg=No result found");
    endif; 
    

    

} else {

    header("location: employee_nationality.php?msg=Invalid data");
    exit;
}
?>


<?php include "footer.html"; ?>