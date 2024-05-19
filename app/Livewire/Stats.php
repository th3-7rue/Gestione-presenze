<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;


class Stats extends Component
{
    #[Session]
    public $currentDate;

    public $presenze;
    public $lavoro;
    public $pausa;
    public $straordinari;
    public $target;
    public function mount()
    {
        if (!$this->currentDate) {
            $this->currentDate = Carbon::now();
        } else {
            $this->currentDate = Carbon::parse($this->currentDate);
        }
        $user = auth()->user();
        // same month
        $this->presenze = DB::table('presenze')
            ->where('user', $user->id)
            ->whereMonth('inizio', $this->currentDate->month)
            ->get();
        //dump($this->presenze);
        // somma ore e minuti di lavoro, ovvero tra inizio e uscita + entrata e fine
        $this->lavoro = 0;
        $this->pausa = 0;
        $this->straordinari = 0; // minuti in più rispetto alle 8 ore
        foreach ($this->presenze as $presenza) {
            $inizio = Carbon::parse($presenza->inizio);
            $uscita = Carbon::parse($presenza->uscita);
            $entrata = Carbon::parse($presenza->entrata);
            $fine = Carbon::parse($presenza->fine);
            $this->lavoro += $uscita->diffInMinutes($inizio, true) + $fine->diffInMinutes($entrata, true);
            $this->pausa += $entrata->diffInMinutes($uscita, true);
            $this->straordinari +=
                ($uscita->diffInMinutes($inizio, true) + $fine->diffInMinutes($entrata, true)) - 8 * 60;
        }
        // conta giorni lavorativi (no sabato e domenica)
        $this->target = 0;
        $currentDate = Carbon::parse($this->currentDate);
        $daysInMonth = $currentDate->daysInMonth;
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $date = Carbon::createFromDate($currentDate->year, $currentDate->month, $i);
            if ($date->isWeekend()) {
                continue;
            }
            $this->target++;
        }
        $this->target *= 8;

        //dump($this->lavoro);
    }
    public function render()
    {
        return view('livewire.stats');
    }
    public function decrementMonth()
    {
        $this->currentDate = $this->currentDate->subMonth();
        $this->redirect(request()->header('Referer'), navigate: true);
    }
    public function incrementMonth()
    {
        $this->currentDate = $this->currentDate->addMonth();
        $this->redirect(request()->header('Referer'), navigate: true);
    }
}
