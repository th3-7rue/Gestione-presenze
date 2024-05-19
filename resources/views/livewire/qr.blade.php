<div class="flex justify-center">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if (date('N') == 6 || date('N') == 7)
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Attenzione!</h4>
            <p>Non è possibile registrare la presenza in data odierna.</p>
            <hr>
            <p class="mb-0">Si prega di riprovare in un giorno lavorativo.</p>
        </div>
    @else
        <div class="size-[500px] justify-self-center">
            <?php
            include app_path() . '../../qr/phpqrcode/qrlib.php';
            
            $item = $code;
            $file = app_path() . '../../public/' . $item . '.png';
            //dump($file);
            $ecc = 'H';
            $pixel_size = '100';
            $frame_size = '2';
            QRcode::png($item, $file, $ecc, $pixel_size, $frame_size);
            echo '<img class="object-scale-down"  src="' . asset($item . '.png') . '">';
            header('Refresh: 2');
            ?></div>
    @endif
</div>
