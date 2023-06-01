<?php

namespace App\Http\Livewire\Admin;

use App\Models\Member;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $members = [];
    public $birthdays = [];
    public $stats;

    public function mount(){
        $this->members = Member::latest()->take(10)->get();
        $this->birthdays = Member::whereMonth('dob', '=', date('m'))->get();
        $currentMonth = Carbon::now()->month;

        $this->stats = Member::select(
            DB::raw("COUNT(*) AS total_members,
                SUM(CASE WHEN department_id IS NULL THEN 1 ELSE 0 END) AS total_null_department,
                SUM(CASE WHEN MONTH(dob) = {$currentMonth} THEN 1 ELSE 0 END) AS total_birthday_month
            ")
      )->first();


    }

    public function render()
    {
        return view('livewire.admin.dashboard')
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
