<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $table = "book";
    protected $primaryKey = "book_id";
    public $incrementing = false;
    protected $keyType = "string";

    use HasFactory;
    use HasUuids;
}
