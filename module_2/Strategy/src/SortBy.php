<?php
class SortByDepartmentAsc implements SortingStrategy
{
    public function sort(array $employees): array
    {
        usort($employees, fn($a, $b) => strcmp($a->getDepartment(), $b->getDepartment()));
        return $employees;
    }
}

class SortByDepartmentDesc implements SortingStrategy
{
    public function sort(array $employees): array
    {
        usort($employees, fn($a, $b) => strcmp($b->getDepartment(), $a->getDepartment()));
        return $employees;
    }
}

class SortByNameAsc implements SortingStrategy
{
    public function sort(array $employees): array
    {
        usort($employees, fn($a, $b) => strcmp($a->getName(), $b->getName()));
        return $employees;
    }
}

class SortByNameDesc implements SortingStrategy
{
    public function sort(array $employees): array
    {
        usort($employees, fn($a, $b) => strcmp($b->getName(), $a->getName()));
        return $employees;
    }
}

class SortBySalaryAsc implements SortingStrategy
{
    public function sort(array $employees): array
    {
        usort($employees, fn($a, $b) => $a->getSalary() <=> $b->getSalary());
        return $employees;
    }
}

class SortBySalaryDesc implements SortingStrategy
{
    public function sort(array $employees): array
    {
        usort($employees, fn($a, $b) => $b->getSalary() <=> $a->getSalary());
        return $employees;
    }
}