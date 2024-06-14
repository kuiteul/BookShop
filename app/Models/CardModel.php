<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CardModel extends Model
{
    protected $table = "basket";
    protected $primaryKey = "basket_id";
    public $incrementing = false;
    protected $keyType = "string";

    use HasFactory;
    use HasUuids;
}
