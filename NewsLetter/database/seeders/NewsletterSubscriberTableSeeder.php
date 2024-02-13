<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newsletter;
class NewsletterSubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subscribersRecords = [
            ['id' => 1,'email'=>'anas500.diabi@gmail.com','status' =>1 ],
            ['id' => 2,'email'=>'anas600.diabi@gmail.com','status' =>1 ],
        ];
        // NewsletterSubscriber::insert($subscribersRecords);
    }
}
