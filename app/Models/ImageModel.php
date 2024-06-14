<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'image_id';
    public $incrementing = false;
    protected $keyType = 'string';

    use HasFactory;
    use HasUuids;
}
