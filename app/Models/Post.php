<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property Carbon $created_at
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    const SORTABLE_COLUMNS = [
        'title',
        'created_at'
    ];
}
