<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;


class Scanner extends Component
{
    public function mount()
    {
        // se oggi è sabato o domenica, non è possibile registrare la presenza
        if (now()->isWeekend()) {
            session()->flash('status', 'Non è possibile registrare la presenza durante il weekend.');
            $this->redirect('/dashboard', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.scanner');
    }
    #[On('resetScanner')]
    public function resetScanner()
    {
        $this->redirect(request()->header('Referer'), navigate: true);
    }
    #[On('qrCodeScanned')]
    public function compareQr($decodedText)
    {

        $dbCode = DB::table('qr')->first()->codice;
        if ($decodedText == $dbCode) {
            // codice valido
            // aggiungere qui il codice per registrare la presenza
            // get user
            $user = auth()->user();
            // cerchiamo se l'utente ha già registrato la presenza oggi
            $presence = DB::table('presenze')
                ->where('user', $user->id)
                ->whereDate('inizio', now())
                ->first();
            if (!$presence) {
                // se non ha registrato la presenza, la registriamo
                DB::table('presenze')->insert([
                    'user' => $user->id,
                    'inizio' => now()
                ]);
            } else if (!$presence->uscita) {
                // se ha già registrato la presenza e non ha ancora registrato l'uscita, la registriamo
                DB::table('presenze')
                    ->where('id', $presence->id)
                    ->update([
                        'uscita' => now()
                    ]);
            } else if (!$presence->entrata) {
                // se ha già registrato la presenza e non ha ancora registrato l'entrata, la registriamo
                DB::table('presenze')
                    ->where('id', $presence->id)
                    ->update([
                        'entrata' => now()
                    ]);
            } else if (!$presence->fine) {
                // se ha già registrato la presenza e non ha ancora registrato la fine, la registriamo
                DB::table('presenze')
                    ->where('id', $presence->id)
                    ->update([
                        'fine' => now()
                    ]);
            } else {
                $this->dispatch('endOfTheDay');
            }
            /*  $host = "127.0.0.1";
            $port = 9999;
            $msg = 'changeCode';
            $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            socket_connect($sock, $host, $port);
            socket_write($sock, $msg, strlen($msg));
            socket_close($sock); */
            // generiamo un nuovo codice qr
            $characters = collect(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']);
            $code = $characters->random(16);
            $code = $code->implode('');
            // update the qr code in the database
            DB::table('qr')->updateOrInsert(['id' => 1], ['codice' => $code, 'data' => now()]);
            $this->redirect('/dashboard', navigate: true);
        } else {
            // codice non valido
            $this->dispatch('invalidCode');
        }
    }
}
