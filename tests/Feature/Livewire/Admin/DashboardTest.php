<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\Dashboard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use Carbon\Carbon;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

  
    public function it_displays_recent_members()
    {
        $members = Member::factory()->count(5)->create();

        Livewire::test(Dashboard::class)
            ->assertSet('members', $members->reverse()->take(10))
            ->assertSeeInOrder($members->pluck('name')->reverse()->toArray());
    }

  
    public function it_displays_birthdays_of_current_month()
    {
        $currentMonth = Carbon::now()->month;
        $birthdays = Member::factory()->count(3)->create([
            'dob' => Carbon::now()->month($currentMonth)->day(1),
        ]);

        Livewire::test(Dashboard::class)
            ->assertSet('birthdays', $birthdays)
            ->assertSeeInOrder($birthdays->pluck('name')->toArray());
    }

  
    public function it_displays_statistics()
    {
        $totalMembers = 10;
        $totalNullDepartment = 3;
        $totalBirthdayMonth = 2;

        Member::factory()->count($totalMembers - $totalNullDepartment)->create();
        Member::factory()->count($totalNullDepartment)->create(['department_id' => null]);
        Member::factory()->count($totalBirthdayMonth)->create([
            'dob' => Carbon::now()->day(1),
        ]);

        Livewire::test(Dashboard::class)
            ->assertSet('stats', [
                'total_members' => $totalMembers,
                'total_null_department' => $totalNullDepartment,
                'total_birthday_month' => $totalBirthdayMonth,
            ]);
    }
}
