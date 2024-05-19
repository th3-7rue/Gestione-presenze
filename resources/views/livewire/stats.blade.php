<div class="grid h-full w-full grid-cols-1 place-content-between px-6 pb-24">

    <div class="flex w-full flex-row items-center justify-center gap-2">
        <svg wire:click='decrementMonth' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="dark:stroke-white h-5 w-5 stroke-gray-800">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
        <p class="dark:text-gray-200 font-sans font-bold capitalize text-gray-800">
            {{ $currentDate->locale('it')->monthName }} {{ $currentDate->year }}</p>
        <svg {{ // if the current date is the current month, disable the increment button
            $currentDate->isCurrentMonth() ? 'disabled' : '' }}
            wire:click='incrementMonth' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="dark:stroke-white h-5 w-5 stroke-gray-800">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </div>
    <div class="text-left">
        <p class="dark:text-gray-200 font-sans font-bold capitalize text-gray-800">Ore lavorative</p>
        <p class="dark:text-gray-200 text-gray-800"><span
                class="font-bold">{{ round(($lavoro - ($lavoro % 60)) / 60) }}</span> ore
            e <span class="font-bold">{{ $lavoro % 60 }}</span>
            minuti</p>
    </div>
    <div class="mx-auto w-[180px] self-center"><canvas id="grafico"></canvas></div>
    <div class="flex flex-col gap-4">
        <div
            class="dark:bg-black-light/30 flex h-16 items-center justify-between rounded-[25px] bg-black-light/10 px-4 shadow-md">
            <div class="flex items-center gap-2">
                <div class="flex h-10 w-10 items-center justify-center bg-work"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="h-6 w-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <p class="dark:text-gray-200 font-semibold text-gray-800">Lavoro</p>
                    <p class="text-xs text-gray-500">Target {{ $target }}h</p>
                </div>
            </div>
            <p class="font-semibold text-green-500">{{ round(($lavoro - ($lavoro % 60)) / 60) }}h</p>
        </div>
        <div
            class="dark:bg-black-light/30 flex h-16 items-center justify-between rounded-[25px] bg-black-light/10 px-4 shadow-md">
            <div class="flex items-center gap-2">
                <div class="flex h-10 w-10 items-center justify-center bg-pause"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="h-6 w-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.25 9v6m-4.5 0V9M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <p class="dark:text-gray-200 font-semibold text-gray-800">Pausa</p>
            </div>
            <p class="dark:text-gray-200 font-semibold text-gray-800">{{ round(($pausa - ($pausa % 60)) / 60) }}h</p>
        </div>
        <div
            class="dark:bg-black-light/30 flex h-16 items-center justify-between rounded-[25px] bg-black-light/10 px-4 shadow-md">
            <div class="flex items-center gap-2">
                <div class="flex h-10 w-10 items-center justify-center bg-straordinari"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.25 7.756a4.5 4.5 0 1 0 0 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <p class="dark:text-gray-200 font-semibold text-gray-800">Straordinari</p>
                    <p class="text-xs text-gray-500">15€/ora</p>
                </div>
            </div>
            <p class="dark:text-gray-200 font-semibold text-gray-800">
                {{ round(($straordinari - ($straordinari % 60)) / 60) < 0 ? '0' : round(($straordinari - ($straordinari % 60)) / 60) }}h
            </p>
        </div>
    </div>
    @script
        <script>
            const data = {
                datasets: [{
                    label: 'Ore totali',
                    data: [{{ $lavoro }}, {{ $pausa }}, {{ $straordinari < 0 ? 0 : $straordinari }}],
                    backgroundColor: [
                        '#2F8FFF',
                        '#B75CFF',
                        '#FF00D6'
                    ],
                    borderWidth: 0,
                }]
            };
            new Chart(
                document.getElementById('grafico'), {
                    type: 'doughnut',
                    data: data,
                    options: {

                    }
                }
            );
        </script>
    @endscript
    <style>
        [disabled] {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
</div>
