<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="header">
        <a href="employeesTable.php">Employees</a>
        <a href="pt.php">Positions</a>
        <a href="">Employees in departments</a>
    </div>

<?php
require 'conn.php';

$table_sql = "SELECT employee_id, name, lastname, age, phone_number, positions FROM employees_table
    LEFT JOIN pt
    ON pt.id = employees_table.position_id
    order by name asc";

$result = mysqli_query($conn, $table_sql);

if (mysqli_num_rows($result) > 0) { ?>
    <table id="customers">
    <th>ID</th>
    <th>Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Contact Number</th>
    <th>Position</th>
    <th>Actions</th><?php
    while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row["employee_id"]?></td>
        <td><?php echo $row["name"]?></td>
        <td><?php echo $row["lastname"]?></td>
        <td><?php echo $row["age"]?></td>
        <td><?php echo $row["phone_number"]?></td>
        <td><?php echo $row["positions"]?></td>
        <td> 
        <button><a href='delEmpl.php?id="<?php echo $row['employee_id']?>"'>Delete</a></button>
        <button><a href='upEmpl.php?id="<?php echo $row['employee_id']?>"'>Update</a></button>
        </td>
    </tr>
        <?php
    } 
    print("</table>");
}

 else {
    echo "0 results";
}

mysqli_close($conn);

?>

<button><a href="addEmp.php">Add new Employee</a></button>


</body>
</html>