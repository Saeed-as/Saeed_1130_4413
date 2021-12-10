<?php include "header.php"; ?>



<h1>List of Nationalities</h1>
<div class="servBar">
    <a href="employee_nationality_create.php" class="btnNewRecord">+ Add New Nationality</a>
</div>


<?php
$sql = "SELECT * FROM employee_nationality ORDER BY nationality ASC;";
$result = $conn->query($sql);
if ( $result->num_rows > 0 ){ ?>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nationality</th>
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
                        <td><?php echo $row['nationality']; ?></td>
                        <td><?php echo $row['active'] == '1' ? 'Active' : 'Inactive'; ?></td>
                        <td class="tdAction">
                            <a href="employee_nationality_view.php?id=<?php echo $row['id']; ?>" class="btnView">View</a>
                            <a href="employee_nationality_update.php?id=<?php echo $row['id']; ?>" class="btnUpdate">Update</a>
                            <a href="employee_nationality_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btnDelete">Delete</a>
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