<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Marco', 'surname' => 'Grandi', 'date_of_birth' => '1998-05-22', 'email' => 'marcograndi98@gmail.com', 'password' => 'ciaobelli'],
            ['name' => 'Giovanni', 'surname' => 'Verdi', 'date_of_birth' => '1995-07-12', 'email' => 'giovanniverdi95@gmail.com', 'password' => 'novantacinque*8'],
            ];

        foreach ($users as $user){
            $new_user=new User();
            $new_user->name=$user['name'];
            $new_user->surname=$user['surname'];
            $new_user->date_of_birth=$user['date_of_birth'];
            $new_user->email=$user['email'];
            $new_user->password=bcrypt($user['password']);

            $new_user->save();
        }
    }
}
