<?php
interface SortingStrategy
{
    public function sort(array $employees): array;
}