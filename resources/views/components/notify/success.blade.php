
<div id="" class="fixed transition-all duration-200 ease-out bottom-10 transform  width p-5" style="z-index: 99">
    <div class="bg-green-500 text-white rounded-md shadow-md">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                    <span class="hidden sm:flex p-2 rounded-lg bg-white">
                        <svg class="w-6 text-green-500 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </span>
                    <p class="ml-3 font-medium text-black truncate">

                    <span class="md:inline">
                        {{$message ?? 'Success'}}
                    </span>
                    </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                    {{-- <a href="#" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-red-500 bg-white hover:bg-indigo-50">
                    Action
                    </a> --}}
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    {{-- <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>

</div>
