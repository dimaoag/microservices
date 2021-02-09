<?php

declare(strict_types=1);

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }
}
