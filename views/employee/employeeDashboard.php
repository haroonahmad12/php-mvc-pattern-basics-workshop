<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <header class=" d-flex justify-content-between">
        <h1>Employee Dashboard page!</h1>
        <button type="button" class="btn btn-success"><a class="text-decoration-none text-light w-100 h-100" href="?controller=employee&action=NewEmployeeForm">Add New Employee</a></button>
    </header>

    <table class="table text-center">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">Name</th>
                <th class="tg-0lax">Last Name</th>
                <th class="tg-0lax">Gender</th>
                <th class="tg-0lax">Hire Date</th>
                <th class="tg-0lax">Department</th>
                <th class="tg-0lax">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($employees as $index => $employee) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $employee["emp_no"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["first_name"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["last_name"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["gender"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["hire_date"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["dept_name"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=employee&action=getEmployee&id=" . $employee["emp_no"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=employee&action=deleteEmployee&id=" . $employee["emp_no"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a id="home" class="btn btn-secondary" href="./">Back</a>
</body>

</html>