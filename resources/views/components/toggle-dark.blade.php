    <button x-data="{darkMode: document.cookie.includes('theme=dark')}" @click="darkMode = !darkMode" type="button" onclick="toggleDarkMode()">
        <span class="sr-only">Toggle Dark Mode</span>
        <div class="rounded-full flex items-center p-1 bg-footer dark:bg-white">
            <svg x-show="darkMode === false" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white ring-1 ring-transparent transition hover:fill-white/70 focus:outline-none focus-visible:ring-[#FF2D20]" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
            </svg>
            <svg x-show="darkMode === true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" dark:fill-footer dark:hover:fill-footer/80 dark:focus-visible:ring-footer h-6 w-6 ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20]">
                <path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" />
            </svg>
        </div>
    </button>
    <script>
        /* if (localStorage.getItem('theme') === 'dark') {
                document.querySelector('html').classList.add('dark');
            }

            function toggleDarkMode() {
                if (document.querySelector('html').classList.contains('dark')) {
                    document.querySelector('html').classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.querySelector('html').classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }; */

        // same but with cookies instead
        if (document.cookie.includes('theme=dark')) {
            document.querySelector('html').classList.add('dark');
        }

        function toggleDarkMode() {
            if (document.querySelector('html').classList.contains('dark')) {
                document.querySelector('html').classList.remove('dark');
                document.cookie = 'theme=light;max-age=31536000';
            } else {
                document.querySelector('html').classList.add('dark');
                document.cookie = 'theme=dark;max-age=31536000';
            }
        };
    </script>