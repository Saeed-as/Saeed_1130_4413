<?php include "header.php"; ?>

<h1>List of Employees</h1>
<div class="servBar">
    <a href="employee_create.php" class="btnNewRecord">+ Add New Employee</a>
</div>

<?php

$result_nationalities = $conn->query("SELECT * FROM employee_nationality;");
while ( $row_nationalities = $result_nationalities->fetch_assoc() ) { 
    $nationalities[$row_nationalities['id']] = $row_nationalities['nationality'];
}




$sql = "SELECT * FROM employee ORDER BY employee_name_en ASC;";
$result = $conn->query($sql);
if ( $result->num_rows > 0 ){ ?>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee No.</th>
                <th>Employee Name</th>
                <th>Employee Name Ar</th>
                <th>Employee ID</th>
                <th>Birth Date</th>
                <th>Nationality</th>
                <th>Mobile No.</th>
                <th>Active</th>
                <th>Action</th>    
            </tr>
        </thead>
        <tbody>
            <?php
                $counter=1;
                while ( $row = $result->fetch_assoc() ) {
                    ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td>
                            <?php echo $row['employee_no']; ?>
                            
                        </td>
                        <td><?php echo $row['employee_name_en']; ?></td>
                        <td><?php echo $row['employee_name_ar']; ?></td>
                        <td><?php echo $row['employee_id']; ?></td>
                        <td><?php echo $row['birth_date']; ?></td>
                        <td><?php echo array_key_exists($row['nationality'],$nationalities) ? $nationalities[$row['nationality']] : "<small style='color:red;'>undefined</small>"; ?></td>
                        <td><?php echo $row['mobile_no']; ?></td>
                        <td><?php echo $row['active'] == '1' ? 'Active' : 'Inactive'; ?></td>
                        <td class="tdAction">
                            <a href="employee_view.php?id=<?php echo $row['id']; ?>" class="btnView">View</a>
                            <a href="employee_update.php?id=<?php echo $row['id']; ?>" class="btnUpdate">Update</a>
                            <a href="employee_delete.php?id=<?php echo $row['id']; ?>" class="btnDelete" onclick="return confirm('Are you sure you want to delete this item?');" class="btnDelete">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>    
        </tbody>        
    </table>

<?php 
} else {
    
    echo "<p>No result found</p>";
}
?>

<?php include "footer.php"; ?>