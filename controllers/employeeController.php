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
    send($_POST, $_REQUEST["action"]);

    header("Location: ./index.php?controller=employee&action=getAllEmployees");
}

function addNewEmployee()
{
    send($_POST, $_REQUEST["action"]);
    header("Location: ./index.php?controller=employee&action=getAllEmployees");
}


function deleteEmployee()
{
    send($_GET, $_REQUEST["action"]);
    header("Location: ./index.php?controller=employee&action=getAllEmployees");
}
