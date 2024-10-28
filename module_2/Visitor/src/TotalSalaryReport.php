<?php
class TotalSalaryReport implements ReportVisitor
{
    private int $totalSalary = 0;

    public function visitCompany(Company $company): void
    {
        foreach ($company->getEmployees() as $employee) {
            $this->totalSalary += $employee->getSalary();
        }
        echo "Total Salary: " . $this->totalSalary . PHP_EOL;
    }
}