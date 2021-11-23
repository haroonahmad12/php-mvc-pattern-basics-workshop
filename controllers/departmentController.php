<?php

require_once MODELS . "departmentModel.php";
$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}


function getAllDepartMents()
{
    //

    $departments = get();
    if (isset($departments)) {
        require_once VIEWS . "/department/departmentDashboard.php";
    } else {
        error("There is a database error, try again.");
    }
}

function changeDepartment()
{
    $EmployeeDepartment = getEmployeeDept();


    if (isset($EmployeeDepartment)) {
        require_once VIEWS . "/department/department.php";
    } else {
        error("There is a database error, try again.");
    }
}

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}

function getEmployeeDept()
{

    $employeeNo = isset($_GET["emp_no"]) ? $_GET["emp_no"] : "";
    $deptNo = isset($_GET["dept_id"]) ? $_GET["dept_id"] : "";


    $data = get();


    foreach ($data as $EmployeeDepartment) {
        if ((int)$employeeNo === $EmployeeDepartment["emp_no"] && $deptNo === $EmployeeDepartment["dept_no"]) {

            return ($EmployeeDepartment);
        }
    }
}
