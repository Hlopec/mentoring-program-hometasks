<?php
class TotalNumberOfEmployeesReport implements ReportVisitor
{
    private int $totalEmployees = 0;

    public function visitCompany(Company $company): void
    {
        $this->totalEmployees = count($company->getEmployees());
        echo "Total Number of Employees: " . $this->totalEmployees . PHP_EOL;
    }
}