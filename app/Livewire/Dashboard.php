<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    #[Session]
    public $currentDate;
    public $presenza;
    public function mount()
    {
        //dump(date('Y-m-d H:i:s'));
        if (!$this->currentDate) {
            $this->currentDate = Carbon::now();
        } else {
            $this->currentDate = Carbon::parse($this->currentDate);
        }
        //dump($this->currentDate);
        $user = auth()->user();
        // get presenza
        $this->presenza = DB::table('presenze')
            ->where('user', $user->id)
            ->whereDate('inizio', $this->currentDate)
            ->first();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
    public function decrementDays($days)
    {
        $this->currentDate = $this->currentDate->subDays($days);
        $this->redirect(request()->header('Referer'), navigate: true);
    }
    public function incrementDays($days)
    {
        $this->currentDate = $this->currentDate->addDays($days);
        $this->redirect(request()->header('Referer'), navigate: true);
    }
    public function decrementWeek()
    {
        $this->currentDate = $this->currentDate->subWeek();
        $this->redirect(request()->header('Referer'), navigate: true);
    }
    public function incrementWeek()
    {
        $this->currentDate = $this->currentDate->addWeek();
        $this->redirect(request()->header('Referer'), navigate: true);
    }
}
