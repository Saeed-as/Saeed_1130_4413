
<?php include "conDB.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycss.css">
    <title>Employee</title>
</head>
<body>
    
    <div class="container-full">

    <?php include "nav.html"; ?>

    <?php if( !empty($_GET['msg']) ): ?>

        <div class="msgAlert">
            <span class="btnC" onclick="this.parentElement.style.display='none';">&times;</span> 
            <?php echo $_GET['msg']; ?>
        </div>
    
    <?php endif; ?>
    

