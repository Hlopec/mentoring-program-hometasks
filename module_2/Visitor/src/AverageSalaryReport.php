<?php
class AverageSalaryReport implements ReportVisitor
{
    private float $averageSalary = 0;

    public function visitCompany(Company $company): void
    {
        $employees = $company->getEmployees();
        $totalSalary = 0;

        foreach ($employees as $employee) {
            $totalSalary += $employee->getSalary();
        }

        if (count($employees) > 0) {
            $this->averageSalary = $totalSalary / count($employees);
        }

        echo "Average Salary: " . $this->averageSalary . PHP_EOL;
    }
}