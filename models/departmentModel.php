<?php


require_once("helpers/dbConnection.php");

function get()
{
    $query = conn()->prepare("SELECT employees.first_name, employees.last_name, employees.emp_no, departments.dept_name, departments.dept_no, dept_emp.from_date, dept_emp.to_date
    FROM employees
    INNER JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
    INNER JOIN departments ON dept_emp.dept_no = departments.dept_no
    ORDER BY departments . dept_no;");

    try {
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}
