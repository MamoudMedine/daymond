
<div id="notification" class="fixed p-5 transition-all duration-200 ease-out transform translate-x-1/2 notificationClosed right-1/2 width" style="z-index: 99">
    <div class="text-white rounded-md shadow-md bg-primary">
        <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex items-center flex-1 w-0">
                    {{-- <span class="hidden p-2 bg-white rounded-lg sm:flex">
                        <!-- Heroicon name: outline/speakerphone -->
                        <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </span> --}}
                    <p class="ml-3 font-medium text-black truncate">
                    <span class="text-xs md:hidden notificationText">
                        {{-- {{$message}} --}}
                    </span>
                    <span class="hidden md:inline notificationText">
                        {{-- {{$message}} --}}
                    </span>
                    </p>
                </div>
                <div class="flex-shrink-0 order-3 w-full mt-2 sm:order-2 sm:mt-0 sm:w-auto">
                    <a class="items-center justify-center hidden px-4 py-2 text-sm font-medium text-red-500 bg-white border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-indigo-50 notificationAction">
                    Action
                    </a>
                </div>
                <div class="flex-shrink-0 order-2 sm:order-3 sm:ml-3">
                    <button type="button" class="flex p-2 -mr-1 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" onclick="$('#notification').removeClass('notificationOpen');$('#notification').addClass('notificationClosed');">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
