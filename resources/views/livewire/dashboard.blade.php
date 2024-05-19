<div class="dark:bg-gray-900 flex flex-col bg-gray-100 text-center">
    <!-- CALENDAR -->
    @if (session('status'))
        <div class="dark:bg-gray-800 dark:text-yellow-300 mb-4 rounded-lg bg-yellow-50 p-4 text-sm text-yellow-800"
            role="alert">
            <span class="font-medium">Attenzione!</span> {{ session('status') }}
        </div>
    @endif
    <div class="flex flex-col gap-4">
        <h2 class="dark:text-gray-200 font-sans font-bold capitalize text-gray-800">
            {{ Carbon\Carbon::now()->locale(app()->getLocale())->monthName }} {{ Carbon\Carbon::now()->year }}
        </h2>

        <div class="mx-1 flex items-center justify-between capitalize">
            <svg wire:click="decrementWeek" class="size-4 dark:fill-white" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
            <div wire:click="decrementDays(2)"
                class="dark:bg-primary-extra-light/30 flex h-[75px] w-14 flex-col place-content-center rounded-full bg-primary-extra-light/70 text-center text-white">
                <div>{{ Carbon\Carbon::createFromDate($currentDate)->subDays(2)->day }}</div>
                <div class="capitalize">
                    {{ Carbon\Carbon::createFromDate($currentDate)->subDays(2)->locale(app()->getLocale())->shortDayName }}
                </div>
            </div>
            <div wire:click="decrementDays(1)"
                class="dark:bg-primary-extra-light/30 flex h-[75px] w-14 flex-col place-content-center rounded-full bg-primary-extra-light/70 text-center text-white">
                <div>{{ Carbon\Carbon::createFromDate($currentDate)->subDay()->day }}</div>
                <div>
                    {{ Carbon\Carbon::createFromDate($currentDate)->subDay()->locale(app()->getLocale())->shortDayName }}
                </div>

            </div>

            <div
                class="flex h-[75px] w-14 flex-col place-content-center rounded-full bg-primary text-center text-white">
                <div>{{ $currentDate->day }}</div>
                <div>{{ $currentDate->locale(app()->getLocale())->shortDayName }}</div>
            </div>
            <div wire:click="incrementDays(1)"
                class="dark:bg-primary-extra-light/30 flex h-[75px] w-14 flex-col place-content-center rounded-full bg-primary-extra-light/70 text-center text-white">
                <div>{{ Carbon\Carbon::createFromDate($currentDate)->addDay()->day }}</div>
                <div>
                    {{ Carbon\Carbon::createFromDate($currentDate)->addDay()->locale(app()->getLocale())->shortDayName }}
                </div>
            </div>

            <div wire:click="incrementDays(2)"
                class="dark:bg-primary-extra-light/30 flex h-[75px] w-14 flex-col place-content-center rounded-full bg-primary-extra-light/70 text-center text-white">
                <div>{{ Carbon\Carbon::createFromDate($currentDate)->addDays(2)->day }}</div>
                <div>
                    {{ Carbon\Carbon::createFromDate($currentDate)->addDays(2)->locale(app()->getLocale())->shortDayName }}
                </div>
            </div>

            <svg wire:click="incrementWeek" class="size-4 dark:fill-white" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
            </svg>
        </div>
        <!-- ORARIO LAVORATIVO -->
        <div class="mx-3">
            <div
                class="flex w-full flex-col rounded-b-[50px] rounded-t-[25px] bg-footer/90 px-4 pb-4 pt-3 text-left text-white">
                @if ($currentDate->dayOfWeekIso < 6)
                    <h1 class="mb-5 text-2xl font-semibold">Orario lavorativo</h1>
                    <p class="text mb-1 text-xs capitalize tracking-wide text-gray-200">
                        {{ $currentDate->locale('it')->dayName }} {{ $currentDate->day }}
                        {{ $currentDate->monthName }}
                        {{ $currentDate->year }}
                    </p>
                    <p class="text-5xl font-semibold tracking-wide">8:00 - 17:00</p>
                @else
                    <h1 class="mb-5 text-2xl font-semibold">Giornata di riposo</h1>
                    <p class="text mb-1 text-xs capitalize tracking-wide text-gray-200">
                        {{ $currentDate->locale('it')->dayName }} {{ $currentDate->day }}
                        {{ $currentDate->monthName }}
                        {{ $currentDate->year }}
                    </p>
                @endif
            </div>
            <div class="text-left">
                @if ($currentDate->dayOfWeekIso < 6)
                    <!-- ATTIVITA -->
                    @if ($presenza)
                        <h2 class="dark:text-gray-200 mb-4 text-gray-800">Attività:</h2>
                        <div
                            class="dark:bg-gray-600/60 mb-4 flex h-16 w-full items-center rounded-[25px] bg-gray-300/60">
                            <div class="h-full w-5 rounded-l-[25px] bg-primary-light">
                            </div>
                            <div class="flex w-full flex-col">
                                <p class="dark:text-gray-200 ml-4 text-left font-semibold text-gray-800">Inizio
                                    giornata
                                </p>
                                <div class="mt-auto flex items-center gap-1 self-end pr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="dark:stroke-gray-200 h-5 w-5 stroke-gray-700">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <p class="dark:text-gray-200 text-sm text-gray-700">
                                        {{ date('H:i', strtotime($presenza->inizio)) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if ($presenza->uscita)
                            <div
                                class="dark:bg-gray-600/60 mb-4 flex h-16 w-full items-center rounded-[25px] bg-gray-300/60">
                                <div class="h-full w-5 rounded-l-[25px] bg-primary-light">
                                </div>
                                <div class="flex w-full flex-col">
                                    <p class="dark:text-gray-200 ml-4 text-left font-semibold text-gray-800">Uscita
                                        dal lavoro
                                    </p>
                                    <div class="mt-auto flex items-center gap-1 self-end pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="dark:stroke-gray-200 h-5 w-5 stroke-gray-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <p class="dark:text-gray-200 text-sm text-gray-700">
                                            {{ date('H:i', strtotime($presenza->uscita)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($presenza->entrata)
                            <div
                                class="dark:bg-gray-600/60 mb-4 flex h-16 w-full items-center rounded-[25px] bg-gray-300/60">
                                <div class="h-full w-5 rounded-l-[25px] bg-primary-light">
                                </div>
                                <div class="flex w-full flex-col">
                                    <p class="dark:text-gray-200 ml-4 text-left font-semibold text-gray-800">Rientro
                                        a lavoro
                                    </p>
                                    <div class="mt-auto flex items-center gap-1 self-end pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="dark:stroke-gray-200 h-5 w-5 stroke-gray-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <p class="dark:text-gray-200 text-sm text-gray-700">
                                            {{ date('H:i', strtotime($presenza->entrata)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($presenza->fine)
                            <div
                                class="dark:bg-gray-600/60 flex h-16 w-full items-center rounded-[25px] bg-gray-300/60">
                                <div class="h-full w-5 rounded-l-[25px] bg-primary-light">
                                </div>
                                <div class="flex w-full flex-col">
                                    <p class="dark:text-gray-200 ml-4 text-left font-semibold text-gray-800">Fine
                                        giornata
                                    </p>
                                    <div class="mt-auto flex items-center gap-1 self-end pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="dark:stroke-gray-200 h-5 w-5 stroke-gray-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <p class="dark:text-gray-200 text-sm text-gray-700">
                                            {{ date('H:i', strtotime($presenza->fine)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="dark:bg-gray-900 h-24 w-full bg-gray-100">
                                {{-- spazio footer --}}
                            </div>
                        @endif
                    @else
                        <div class="dark:text-gray-200 mt-3 text-center font-semibold text-gray-800">Inizia la tua
                            giornata!
                        </div>
                    @endif
                @else
                    <div class="w-full text-center">
                        <p class="dark:text-gray-200 font-semibold text-gray-800">Nessuna attività per oggi</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <style>
        div.loader {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>



</div>
