<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        $permissions = [
            [
                'id' => 1,
                'name' => 'view_users'
            ],
            [
                'id' => 2,
                'name' => 'edit_users'
            ],
            [
                'id' => 3,
                'name' => 'view_roles'
            ],
            [
                'id' => 4,
                'name' => 'edit_roles'
            ],
            [
                'id' => 5,
                'name' => 'view_products'
            ],
            [
                'id' => 6,
                'name' => 'edit_products'
            ],
            [
                'id' => 7,
                'name' => 'view_orders'
            ],
            [
                'id' => 8,
                'name' => 'edit_orders'
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }

    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
}
