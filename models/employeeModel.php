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

