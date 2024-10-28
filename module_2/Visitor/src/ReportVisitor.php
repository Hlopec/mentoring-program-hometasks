<?php
interface ReportVisitor
{
    public function visitCompany(Company $company): void;
}