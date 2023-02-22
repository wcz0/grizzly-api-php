<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\SlowAdmin\Models\BaseModel as Model;

class User extends Model
{
    use SoftDeletes;
}
