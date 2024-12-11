<?php

use Illuminate\Database\Seeder;
use App\MailList;

class MailListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            MailList::create([
                'name' => 'Test User ' . $i,
                'email' => 'testuser' . $i . '@test.com',
            ]);
        }
    }
}
