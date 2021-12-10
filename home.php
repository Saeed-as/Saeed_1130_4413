<?php include "header.php"; ?>
<?php

$nationalities['active']=0;
$nationalities['inactive']=0;
$result_nationalities = $conn->query("SELECT * FROM employee_nationality;");
while ( $row_nationalities = $result_nationalities->fetch_assoc() ) { 
    
    if( $row_nationalities['active'] == '1' ) { $nationalities['active']++; }
    if( $row_nationalities['active'] == '0' ) { $nationalities['inactive']++; }
}

$employees['active']=0;
$employees['inactive']=0;
$result_employees = $conn->query("SELECT * FROM employee;");
while ( $row_employees = $result_employees->fetch_assoc() ) { 

    if( $row_employees['active'] == '1' ) { $employees['active']++; }
    elseif( $row_employees['active'] == '0' ) { $employees['inactive']++; }

}



?>

<h1>Summary</h1>
<div class="viewCard">
    <div><h3>Employees</h3></div>
    <div>
        <table class="tableCard">
            <tr>
                <th >Active</th>
                <th >Inactive</th>
                <th >Total</th>
            </tr>
            <tr>
                <td><?php echo $employees['active']; ?></td>
                <td><?php echo $employees['inactive']; ?></td>
                <td><?php echo $employees['active']+$employees['inactive']; ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="viewCard">
    <div><h3>Employee Nationalities</h3></div>
    <div>
        <table class="tableCard">
            <tr>
                <th >Active</th>
                <th >Inactive</th>
                <th >Total</th>
            </tr>
            <tr>
                <td><?php echo $nationalities['active']; ?></td>
                <td><?php echo $nationalities['inactive']; ?></td>
                <td><?php echo $nationalities['active']+$nationalities['inactive']; ?></td>
            </tr>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>