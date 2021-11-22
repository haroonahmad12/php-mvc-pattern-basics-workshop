<?php
require_once("helpers/dbConnection.php");

function get()
{
    $query = conn()->prepare("SELECT e.emp_no, e.first_name, e.last_name, e.gender, e.hire_date, e.birth_date
    FROM employees e
    
    
    ORDER BY e.emp_no ASC;");

    try {
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}


function send($update, $action)
{

    $name = isset($update["first_name"]) ? $update["first_name"] : "";
    $lastName = isset($update["last_name"]) ? $update["last_name"] : "";
    $gender = isset($update["gender"]) ? $update["gender"] : "";
    $birth = isset($update["birth_date"]) ? $update["birth_date"] : "";
    $hired = isset($update["hire_date"]) ? $update["hire_date"] : "";
    $id = isset($update["id"]) ? $update["id"] : "";

    //new id in case of new employee

    $newId = getMaxEmpNo();



    $sendQuery = "";

    switch ($action) {
        case 'updateEmployee':
            $sendQuery =
                "UPDATE employees SET birth_date = '$birth', first_name = '$name', last_name = '$lastName', gender = '$gender',  hire_date = '$hired' WHERE emp_no = $id;";
            break;

        case 'addNewEmployee':
            $sendQuery = "INSERT INTO employees values ('$newId' ,'$birth' ,'$name','$lastName', '$gender',  '$hired');";
            break;
        case 'deleteEmployee':

            $sendQuery = "DELETE employees FROM employees WHERE emp_no = '$id';";

            break;
        default:
            # code...
            break;
    }

    $query = conn()->prepare($sendQuery);

    try {
        $query->execute();
        $employees = $query->fetchAll();

        foreach ($employees as $e) {
            # code...

            echo $e;
        }
    } catch (PDOException $e) {
        return [];
    }
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
