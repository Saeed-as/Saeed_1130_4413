<?php include "header.php"; ?>

<h1>View</h1>
<a href="employee.php" class="btn btnHome">Home</a>
<?php


if( $_GET['id'] > 0 &&  is_numeric($_GET['id']) ) {

    $result_nationalities = $conn->query("SELECT * FROM employee_nationality;");
    while ( $row_nationalities = $result_nationalities->fetch_assoc() ) { 
        $nationalities[$row_nationalities['id']] = $row_nationalities['nationality'];
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM employee WHERE id=$id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

    <?php if ( $result->num_rows > 0 ):?>

        <table class="tblLeft">
            <tr>
                <th>Employee No.</th>
                <td><?php echo $row['employee_no']; ?></td>
            </tr>
            <tr>
                <th>Employee Name En</th>
                <td><?php echo $row['employee_name_en']; ?></td>
            </tr>
            <tr>
                <th>Employee Name Ar</th>
                <td><?php echo $row['employee_name_ar']; ?></td>
            </tr>
            <tr>
                <th>Employee ID</th>
                <td><?php echo $row['employee_id']; ?></td>
            </tr>
            <tr>
                <th>Birth Date</th>
                <td><?php echo $row['birth_date']; ?></td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td><?php echo array_key_exists($row['nationality'],$nationalities) ? $nationalities[$row['nationality']] : "<small style='color:red;'>undefined</small>"; ?></td>
            </tr>
            <tr>
                <th>Mobile No.</th>
                <td><?php echo $row['mobile_no']; ?></td>
            </tr>
            <tr>
                <th>Active</th>
                <td><?php echo $row['active'] == '1' ? 'Active' : 'Inactive'; ?></td>
            </tr>
            <tr>
                <th>Create By</th>
                <td><?php echo $row['create_by']; ?></td>
            </tr>
            <tr>
                <th>Create At</th>
                <td><?php echo $row['create_at']; ?></td>
            </tr>
        </table>

    <?php 
    else:
        header("location: employee.php?msg=No result found");
    endif; 

} else {

    header("location: employee.php?msg=Invalid data");
    exit;
}
?>

<?php include "footer.html"; ?>