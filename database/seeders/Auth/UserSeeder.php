<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Models\UserDetails;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        $user = User::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'email_verified_at' => now(),
            'active' => true,
        ]);

		UserDetails::create([
			'user_id'=>$user->id,
			'firstname'=>"Super",
			'lastname'=>"Admin",
		]);

        if (app()->environment(['local', 'testing'])) {
           	$user = User::create([
                'type' => User::TYPE_USER,
                'name' => 'Test User',
                'email' => 'user@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
                'active' => true,
            ]);

			UserDetails::create([
				'user_id'=>$user->id,
				'firstname'=>"Test",
				'lastname'=>"User",
			]);

        }

        $this->enableForeignKeys();
    }
}
