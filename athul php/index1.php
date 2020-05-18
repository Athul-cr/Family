<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
 $sql = mysqli_query($conn,"SELECT * FROM data ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <p></p>
 <div class="form-group"> 
<a href="add1.php"><button class="btn btn-primary">ADD EVENT</button><a href="home.php"><button class="btn btn-success  float-right">Home</button></a><br>

 </div>

    <table class="table table-bordered table-dark">

    <tr>
        <th>Name</th> <th>location</th> <th>num</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($sql)) {         
        echo "<tr>";
        echo "<td>".$user_data['name']."</td>";
        echo "<td>".$user_data['location']."</td>";
        echo "<td>".$user_data['num']."</td>";    
        echo "<td><a href='edit1.php?id=$user_data[id]'>Edit</a> | <a href='delete1.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>
