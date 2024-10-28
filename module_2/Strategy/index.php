<?php
require_once __DIR__ . '/src/Employee.php';
require_once __DIR__ . '/src/SortingStrategy.php';
require_once __DIR__ . '/src/SortBy.php';
require_once __DIR__ . '/src/EmployeeCollection.php';

$collection = new EmployeeCollection();

$collection->addEmployee(new Employee("Andrii", "HR", 45000));
$collection->addEmployee(new Employee("Ihor", "Software", 175000));
$collection->addEmployee(new Employee("Vasyl", "Hardware", 65000));
$collection->addEmployee(new Employee("Ivan", "HR", 55555));

echo "Department ASC:" . PHP_EOL;
$sortedEmployees = $collection->sortEmployees(new SortByDepartmentAsc());
foreach ($sortedEmployees as $employee) {
    echo $employee->getName() . " - " . $employee->getDepartment() . " - " . $employee->getSalary() . PHP_EOL;
}

echo PHP_EOL . "Salary DESC:" . PHP_EOL;
$sortedEmployees = $collection->sortEmployees(new SortBySalaryDesc());
foreach ($sortedEmployees as $employee) {
    echo $employee->getName() . " - " . $employee->getDepartment() . " - " . $employee->getSalary() . PHP_EOL;
}

echo PHP_EOL . "Name ASC:" . PHP_EOL;
$sortedEmployees = $collection->sortEmployees(new SortByNameAsc());
foreach ($sortedEmployees as $employee) {
    echo $employee->getName() . " - " . $employee->getDepartment() . " - " . $employee->getSalary() . PHP_EOL;
}