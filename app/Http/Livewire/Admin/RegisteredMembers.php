<?php

namespace App\Http\Livewire\Admin;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use DB;

class RegisteredMembers extends Component
{
    protected $listeners = [
        'memberUpdated' => 'newMemberCreated',
        'removeSelectedMember' => 'deleteMember'
    ];

    use  WithPagination;

    public $search;
    public $area;
    public $marital_status;
    public $stats;
    public $gender;
    public $month;
    public $noOfRecords = 20;
    public $recordId;
    public $actions = ['action' => 'removeSelectedMember'];
    protected $resetProperties = ['search', 'gender', 'noOfRecords', 'month'];

    public function mount()
    {
        $startDate = Carbon::now()->subDays(30);

        $this->stats = Member::select(
            DB::raw("COUNT(*) AS total_members,
                SUM(CASE WHEN gender = 'male' THEN 1 ELSE 0 END) AS total_male,
                SUM(CASE WHEN marital_status = 'married' THEN 1 ELSE 0 END) AS total_married,
                SUM(CASE WHEN marital_status = 'single' THEN 1 ELSE 0 END) AS total_single,
                COUNT(CASE WHEN created_at >= '{$startDate}' THEN 1 ELSE NULL END) AS new_members_days,
                COUNT(CASE WHEN gender = 'male' AND created_at >= '{$startDate}' THEN 1 ELSE NULL END) AS new_male_days,
                COUNT(CASE WHEN marital_status = 'single' AND created_at >= '{$startDate}' THEN 1 ELSE NULL END) AS new_single_days,
                COUNT(CASE WHEN marital_status = 'married' AND created_at >= '{$startDate}' THEN 1 ELSE NULL END) AS new_married_days
            ")
        )->first();

        $percentageIncreaseMembers = 0;
        $percentageMaleIncreaseMembers = 0;
        $percentageSingleIncreaseMembers = 0;
        $percentageMarriedIncreaseMembers = 0;

        if ($this->stats->total_members > 0) {
            $percentageIncreaseMembers = ($this->stats->new_members_days / $this->stats->total_members) * 100;
            $percentageMaleIncreaseMembers = ($this->stats->new_male_days / $this->stats->total_members) * 100;
            $percentageSingleIncreaseMembers = ($this->stats->new_single_days / $this->stats->total_members) * 100;
            $percentageMarriedIncreaseMembers = ($this->stats->new_married_days / $this->stats->total_members) * 100;
        }

        $this->stats->new_members_days = round($percentageIncreaseMembers, 2);
        $this->stats->new_male_days = round($percentageMaleIncreaseMembers, 2);
        $this->stats->new_single_days = round($percentageSingleIncreaseMembers, 2);
        $this->stats->new_married_days = round($percentageMarriedIncreaseMembers, 2);


    }


    public function resetParameters()
    {
        $this->resetPage();
        //$this->reset($this->resetProperties);
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, $this->resetProperties)) {
            $this->resetPage();
        }
    }

    public function confirmDelete(Member $member)
    {
        $this->recordId = $member->id;
        $this->dispatchBrowserEvent('delete-notify', $this->actions);
    }

    public function deleteMember()
    {
        Member::findOrFail($this->recordId)->delete();
        session()->flash('message', 'Record deleted successfully from database.');

        $this->reset('recordId');
    }

    public function newMemberCreated($msg){
        session()->flash('message', $msg);
    }

    public function render()
    {
        $members = Member::query()
                    ->when(!empty($this->search), function ($q) {
                        $q->where('name', 'LIKE', "%{$this->search}%") 
                        ->orWhere('address', 'LIKE', "%{$this->search}%")
                        ->orWhere('email', 'LIKE', "%{$this->search}%");
                    })
                    ->when(!empty($this->gender), function ($q) {
                        return $q->where('gender', '=', $this->gender);
                    })
                    ->when(!empty($this->area), function ($q) {
                        return $q->where('area', '=', $this->area);
                    })
                    ->when(!empty($this->marital_status), function ($q) {
                        return $q->where('marital_status', '=', $this->marital_status);
                    })
                    ->when(!empty($this->month), function ($q) {
                        return $q->whereMonth('dob', '=', $this->month);
                    })
                    ->paginate($this->noOfRecords);

        return view('livewire.admin.registered-members', ['members' => $members]) 
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
