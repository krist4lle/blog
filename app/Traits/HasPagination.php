<?php

namespace App\Traits;

trait HasPagination
{
    public function getPagination(array $data): array
    {
        return [
            'page' => $data['page'] ?? 1,
            'per_page' => $data['per_page'] ?? 9
        ];
    }
}
