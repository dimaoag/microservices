<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionTable extends Migration
{
    public function up(): void
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');

            $table
                ->foreign('role_id', 'role_permission_role_id_fk')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table
                ->foreign('permission_id', 'role_permission_permission_id_fk')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_permission');
    }
}
