<?php

namespace App\Services;

use App\Models\User;
use Slowlyo\SlowAdmin\Services\AdminService;

class UserService extends AdminService
{
    protected string $modelName = User::class;
}
