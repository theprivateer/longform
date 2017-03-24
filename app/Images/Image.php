<?php

namespace App\Images;

use App\Images\Imageable;
use Illuminate\Database\Eloquent\Model;
use Privateer\Uuid\EloquentUuid;

class Image extends Model
{
    use EloquentUuid, Imageable;

    protected $guarded = [];
}
