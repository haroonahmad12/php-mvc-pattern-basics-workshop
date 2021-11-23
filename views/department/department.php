<?php

$name = $EmployeeDepartment["first_name"];
$lastName = $EmployeeDepartment["last_name"];
$dept = $EmployeeDepartment["dept_name"];
$start = $EmployeeDepartment["from_date"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h1>Change Employee's Department</h1>
    </header>
    <main class="container mt-5">

        <form class="d-flex row" action="index.php?controller=employee&action=<?= $id == "" ? "addNewEmployee" : "updateEmployee" ?>" method="POST">
            <div class="form-group">
                <div class="form-group col-md-4 mt-2">
                    <label for="employeeName">Employee First Name</label>
                    <input type="text" class="form-control" id="employeeName" placeholder="Employee First Name" value="<?= $name ?>" name="first_name">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="employeeLastName">Last Name</label>
                    <input type="text" class="form-control" id="employeeLastName" placeholder="Employee Last Name" value="<?= $lastName ?>" name="last_name">
                </div>


                <div class="form-group col-md-4 mt-2">
                    <label for="inputNewDepartment">Change Department</label>
                    <select type="text" class="form-control" id="inputNewDepartment" name="newDepartment">
                        <option default> <?= $dept ?></option>

                    </select>
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="inputBirthDate">Start Date</label>
                    <input type="date" class="form-control" id="inputBirthDate" placeholder="$birthDate" value="<?= $start ?>" name="birth_date">
                </div>


                <input name="id" hidden value="<?= $id ?>">
                <div class="form-group col-md-4 mt-2 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mt-2">Change Department</button>
                    <button type="button" class="btn btn-secondary mt-2"><a class="text-decoration-none text-light" href="<?= $_SERVER['HTTP_REFERER'] ?>">Return</a></button>
                </div>
            </div>


        </form>
    </main>
</body>

</html>