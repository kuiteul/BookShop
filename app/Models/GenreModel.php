<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class GenreModel extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'genre_id';
    public $incrementing = false;
    protected $keyType = 'string';

    use HasFactory;
    use HasUuids;
}
