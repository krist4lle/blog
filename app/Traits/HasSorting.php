<?php

namespace App\Traits;

trait HasSorting
{
    public function getSort(array $data): array
    {
        return [
            'column' => $data['column'] ?? 'created_at',
            'direction' => $data['direction'] ?? 'desc'
        ];
    }
}
