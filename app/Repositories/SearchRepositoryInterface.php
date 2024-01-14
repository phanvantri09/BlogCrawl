<?php

namespace App\Repositories;

interface SearchRepositoryInterface
{
    public function searchAll(string $query);
}