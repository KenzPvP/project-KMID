<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepengurusan extends Model
{
    use HasFactory;

    protected $table = 'kepengurusans';

    protected $fillable = [
        'name',
        'email',
        'department',
        'group',
        'position',
        'period',
        'order',
        'status',
        'photo_url',
    ];
}
