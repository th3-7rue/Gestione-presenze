<?php

namespace App\Livewire;


use Illuminate\Support\Facades\DB;

use Livewire\Component;



class Qr extends Component
{

    public $code;
    public function mount()
    {
        $user = auth()->user();
        if ($user->matricola != '123') {
            return redirect()->route('dashboard');
        }
        $this->code = DB::table('qr')->first()->codice ?? $this->generateQrCode();
    }

    public function render()
    {
        return view('livewire.qr');
    }

    public function generateQrCode()
    {
        $characters = collect(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']);
        $this->code = $characters->random(16);
        $this->code = $this->code->implode('');
        // update the qr code in the database
        DB::table('qr')->updateOrInsert(['id' => 1], ['codice' => $this->code, 'data' => now()]);
        return $this->code;
    }
}
