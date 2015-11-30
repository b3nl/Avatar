<?php
    use Illuminate\Database\Seeder;
    use Avatar\User;

    class UserTableSeeder extends Seeder
    {
        public function run()
        {
            DB::table('users')->delete();

            User::create([
                'email' => 'foo@bar.com',
                'is_admin' => true,
                'name'  => 'b3nl',
                'password' => Hash::make('root')
            ]);
        }
    }
