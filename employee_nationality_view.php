<?php include "header.php"; ?>

<h1>View</h1>
<a href="employee_nationality.php" class="btn btnHome">Home</a>
<?php



if( $_GET['id'] > 0 &&  is_numeric($_GET['id']) ) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM employee_nationality  WHERE id=$id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>



    <?php if ( $result->num_rows > 0 ):?>

    <table class="tblLeft">
        <tr>
            <th>Nationality</th>
            <td><?php echo $row['nationality']; ?></td>
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
        header("location: employee_nationality.php?msg=No result found");
    endif; 


} else {

    header("location: employee_nationality.php?msg=Invalid data");
    exit;
}
?>



<?php include "footer.php"; ?>

