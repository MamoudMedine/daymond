
<div id="notification" class="fixed transition-all
toastClosed
duration-200 ease-out right-16 h-16 transform translate-x-16 w-96  p-5" style="z-index: 99">
    <div class="bg-primary text-white rounded-md shadow-md">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">

                    <p class="ml-3 font-medium text-white truncate">
                        <span class="md:hidden text-xs notificationText">
                            {{-- {{$message}} --}}
                        </span>
                        <span class="hidden md:inline notificationText">
                            {{-- {{$message}} --}}
                        </span>
                    </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">

                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button" class="hidden -mr-1  p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
