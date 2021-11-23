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
        <h1>Departments Dashboard page!</h1>
        <div>
            <button type="button" class="btn btn-success"><a class="text-decoration-none text-light" href="?controller=department&action=newDepartment">Create New Department</a></button>
            <button class="btn btn-secondary"><a id="home" class="text-decoration-none text-light" href="./">Go Back</a></button>
        </div>
    </header>

    <table class="table text-center">
        <thead>
            <tr>
                <th class="tg-0pky">Dept No.</th>
                <th class="tg-0pky">Department Name</th>
                <th class="tg-0pky">Employee Name</th>

                <th class="tg-0lax">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($departments as $index => $d) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $d["dept_no"] . "</td>";
                echo "<td class='tg-0lax'>" . $d["dept_name"] . "</td>";
                echo "<td class='tg-0lax'>" . $d["first_name"] . " " . $d["last_name"] . "</td>";


                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=department&action=changeDepartment&dept_id=" . $d["dept_no"] . "&emp_no=" . $d["emp_no"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=employee&action=deleteDepartment&id=" . $d["dept_no"] . "&emp_no=" . $d["emp_no"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


</body>

</html>