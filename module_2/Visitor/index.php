<?php

require_once __DIR__ . '/src/Employee.php';
require_once __DIR__ . '/src/Company.php';
require_once __DIR__ . '/src/ReportVisitor.php';
require_once __DIR__ . '/src/TotalSalaryReport.php';
require_once __DIR__ . '/src/TotalNumberOfEmployeesReport.php';
require_once __DIR__ . '/src/AverageSalaryReport.php';
require_once __DIR__ . '/src/NumberOfEmployeePerDepartmentReport.php';

$company = new Company("Tech Corp");

$company->addEmployee(new Employee("Andrii", 80000, "DevOps"));
$company->addEmployee(new Employee("Ihor", 100000, "Manager"));
$company->addEmployee(new Employee("Vasyl", 55000, "Delivery"));

$company->accept(new TotalSalaryReport());
$company->accept(new TotalNumberOfEmployeesReport());
$company->accept(new AverageSalaryReport());
$company->accept(new NumberOfEmployeePerDepartmentReport());