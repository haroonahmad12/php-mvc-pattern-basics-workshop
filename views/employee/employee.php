<?php

$id =  isset($employee["emp_no"]) ? $employee["emp_no"] : "";
$name =  isset($employee["first_name"]) ? $employee["first_name"] : "";
$lastName = isset($employee["last_name"]) ? $employee["last_name"] : "";
$gender = isset($employee["gender"]) ? $employee["gender"] : "";
$hireDate = isset($employee["hire_date"]) ? $employee["hire_date"] : "";
$birthDate = isset($employee["birth_date"]) ? $employee["birth_date"] : "";

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
        <h1>Employee Info Page</h1>
    </header>
    <main class="container mt-5">

        <form class="d-flex row" action="index.php?controller=employee&action=<?= $id == "" ? "addNewEmployee" : "updateEmployee" ?>" method="POST">
            <div class="form-group">
                <div class="form-group col-md-4 mt-2">
                    <label for="inputFirstName">Name</label>
                    <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" value="<?= $name ?>" name="first_name">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" value="<?= $lastName ?>" name="last_name">
                </div>


                <div class="form-group col-md-4 mt-2">
                    <label for="inputGender">Gender</label>
                    <select type="text" class="form-control" id="inputGender" name="gender">
                        <option default> <?= $gender ?></option>
                        <option>M</option>
                        <option>F</option>
                    </select>
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="inputBirthDate">Birth Date</label>
                    <input type="date" class="form-control" id="inputBirthDate" placeholder="$birthDate" value="<?= $birthDate ?>" name="birth_date">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="inputHireDate">Hire Date</label>
                    <input type="date" class="form-control" id="inputHireDate" value="<?= $hireDate ?>" name="hire_date">
                </div>

                <input name="id" hidden value="<?= $id ?>">
                <div class="form-group col-md-4 mt-2 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mt-2"><?= ($id == "") ? "Add Employee" : "Save Changes" ?></button>
                    <button type="button" class="btn btn-secondary mt-2"><a class="text-decoration-none text-light" href="?controller=employee&action=getAllEmployees">Return</a></button>
                </div>
            </div>


        </form>
    </main>
</body>

</html>