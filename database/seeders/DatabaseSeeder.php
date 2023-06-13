<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\Campaign;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Member::factory(100)->create();
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\Event::factory(10)->create();
        \App\Models\Partner::factory(25)->create();

        Department::insert([ 
            ['name'=>'Alive Welfare'],
            ['name'=>'Children of Destiny'],
            ['name'=>'Alive Intelligence Unit'],
            ['name'=>'Alive Teens'],
            ['name'=>'Alive Maintenance'],
            ['name'=>'Alive Evangelism'],
            ['name'=>'Splendour'],
            ['name'=>'Alive Greeters'],
            ['name'=>'Alive Traffic'],
            ['name'=>'Alive Protocol'],
            ['name'=>'Alive Citizens'],
            ['name'=>'Alive Ushers'],
            ['name'=>'Alive Victory Force'],
            ['name'=>'Alive Theatre'],
            ['name'=>'Alive Media'],
            ['name'=>'Alive Sanctuary'],
            ['name'=>'Alive Decorations'],
        ]);

        Campaign::insert([ 
            ['name' => 'Building Fund'],
            ['name' => 'Missions'],
            ['name' => 'Youth Ministry'],
            ['name' => 'Community Outreach'],
            ['name' => 'Worship Experience'],
            ['name' => 'Children\'s Ministry'],
            ['name' => 'Small Group'],
            ['name' => 'Scholarship Fund'],
        ]);

        \App\Models\Donation::factory(10)->create();

        \App\Models\PartnerDonation::factory(205)->create();
    }
}
