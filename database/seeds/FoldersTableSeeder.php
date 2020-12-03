<?php

use Illuminate\Database\Seeder;
use App\Folder;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['プライベート', '仕事', '旅行'];
        $user = DB::table('users')->first();

        foreach ($titles as $title) {
            Folder::create([
                'title' => $title,
                'user_id' => $user->id,
            ]);
        }
    }
}
