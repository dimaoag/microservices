<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const ADMIN = 1;
    public const MODERATOR = 2;
    public const USER = 3;

    protected $guarded = ['id'];

    public $timestamps = false;

    public static function getList(): array
    {
        return [self::ADMIN, self::MODERATOR, self::USER];
    }
}
