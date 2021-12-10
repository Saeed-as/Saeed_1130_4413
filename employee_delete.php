<?php include "conDB.php"; ?>



<?php

if( $_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id'] > 0 &&  is_numeric($_GET['id']) ) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM employee  WHERE id=$id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ( $result->num_rows > 0 ){

        $sql = "DELETE FROM employee WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
        header("location: employee.php?msg=Record deleted successfully");
            exit();
        } else {
        header("location: employee.php?msg="."Error deleting record: " . $conn->error);
        }
    } else { 

        header("location: employee.php?msg=No result found");
    }
} else {

    header("location: employee.php?msg=Invalid data or no data found");
}
?>



