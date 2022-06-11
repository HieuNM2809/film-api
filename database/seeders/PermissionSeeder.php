<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('name', 255)->nullable();
    // $table->bigInteger('id_group_permission')->nullable();
    // $table->boolean('create')->nullable()->default(false);
    // $table->boolean('edit')->nullable()->default(false);
    // $table->boolean('view')->nullable()->default(false);
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('permissions')->insert([
                'name' => 'permissions name '.$i,
                'id_group_permission' => $i,
                'create' => rand(0,1),
                'edit' => rand(0,1),
                'view' => rand(0,1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
