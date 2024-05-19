<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div id="reader"></div>
    <div id="result"></div>
    @script
        <script>
            document.addEventListener('livewire:navigated', () => {
                // Triggered as the final step of any page navigation...

                // Also triggered on page-load instead of "DOMContentLoaded"...
                $wire.on('invalidCode', () => {
                    //
                    //html5QrCode.pause();
                    alert('Invalid code');
                    $wire.dispatch('resetScanner');

                });

                const html5QrCode = new Html5Qrcode(
                    "reader", {

                    });
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    /* handle success */
                    html5QrCode.pause();
                    $wire.dispatch('qrCodeScanned', {
                        decodedText
                    });
                };
                const config = {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                };


                html5QrCode.start({
                    facingMode: "environment" // rear camera
                }, config, qrCodeSuccessCallback);

            })
        </script>
    @endscript
</div>
