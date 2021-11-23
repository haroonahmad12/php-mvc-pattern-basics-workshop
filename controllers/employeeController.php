<?php

require_once MODELS . "employeeModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic


/* ~~~ CONTROLLER FUNCTIONS ~~~ */
$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllEmployees()
{
    //

    $employees = get();
    if (isset($employees)) {
        require_once VIEWS . "/employee/employeeDashboard.php";
    } else {
        error("There is a database error, try again.");
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{

    $employee = getEmployeeData();

    if (isset($employee)) {
        require_once VIEWS . "/employee/employee.php";
    } else {
        error("There is a database error, try again.");
    }
}

function getEmployeeData()
{

    $employeeNo = isset($_GET["id"]) ? $_GET["id"] : "";
    $employees = get();

    foreach ($employees as $employee) {
        if ($employeeNo == $employee["emp_no"]) {

            return $employee;
        }
    }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}


function NewEmployeeForm()
{
    require_once VIEWS . "/employee/employee.php";
}


function updateEmployee()
{
    $name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
    $lastName = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $birth = isset($_POST["birth_date"]) ? $_POST["birth_date"] : "";
    $hired = isset($_POST["hire_date"]) ? $_POST["hire_date"] : "";
    $id = isset($_POST["id"]) ? $_POST["id"] : "";

    $sendQuery = "UPDATE employees SET birth_date = ?, first_name = ?, last_name = ?, gender = ?,   hire_date = ? WHERE emp_no = ?;";

    $query = conn()->prepare($sendQuery);
    try {
        $query->execute([$birth, $name, $lastName, $gender, $hired, $id]);
        $query->fetchAll();
    } catch (PDOException $e) {
        return [];
    }

    header("Location: ./index.php?controller=employee&action=getAllEmployees");
}

function addNewEmployee()
{
    $name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
    $lastName = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $birth = isset($_POST["birth_date"]) ? $_POST["birth_date"] : "";
    $hired = isset($_POST["hire_date"]) ? $_POST["hire_date"] : "";
    $newId = getMaxEmpNo();

    $sendQuery = "INSERT INTO employees values (?,?,?,?,?,?);";
    $query = conn()->prepare($sendQuery);

    try {
        $query->execute([$newId, $birth, $name, $lastName, $gender,  $hired]);
        $query->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
    header("Location: ./index.php?controller=employee&action=getAllEmployees");
}


function deleteEmployee()
{
    $id = $_GET["id"];
    $sendQuery = "DELETE employees FROM employees WHERE emp_no = ?;";
    $query = conn()->prepare($sendQuery);

    try {
        $query->execute([$id]);
        $query->fetchAll();
    } catch (PDOException $e) {
        return [];
    }

    header("Location: ./index.php?controller=employee&action=getAllEmployees");
}


//Function to get highest employee number in order to add a new one!

function getMaxEmpNo()
{
    $employees = get();

    $numArray = [];
    foreach ($employees as $emp_no) {
        # code...

        $numArray[] = $emp_no['emp_no'];
    }

    return (max($numArray) + 1);
}
