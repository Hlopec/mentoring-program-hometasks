<?php
class NumberOfEmployeePerDepartmentReport implements ReportVisitor
{
    private array $departmentCount = [];

    public function visitCompany(Company $company): void
    {
        foreach ($company->getEmployees() as $employee) {
            $department = $employee->getDepartment();
            if (!isset($this->departmentCount[$department])) {
                $this->departmentCount[$department] = 0;
            }
            $this->departmentCount[$department]++;
        }

        echo "Employees per Department:" . PHP_EOL;
        foreach ($this->departmentCount as $department => $count) {
            echo $department . ": " . $count . PHP_EOL;
        }
    }
}