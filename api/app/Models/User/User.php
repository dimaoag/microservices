<?php

declare(strict_types=1);

namespace App\Models\User;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = ['password'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function permissions(): array
    {
        return $this->role->permissions->pluck('name')->toArray();
    }

    public function isHasAccess(string $permission): bool
    {
        return in_array($permission, $this->permissions(), true);
    }
}
