<div class="pb-96">
    <div class="py-10">
        <x-section :title="'Notifications'">
            @forelse ($notifications as $notification)
                <div class="flex mb-3 p-3 rounded hover:bg-gray-50">
                    @if ($notification->utilisateur)
                        @if ($notification->utilisateur->utilisateur)
                            @if ($notification->utilisateur->utilisateur->photo)
                                {{-- <img src="{{$notification->utilisateur->photo}}" alt="" class="border w-16 h-16 object-cover rounded-lg shadow"> --}}
                                <img src="/images/logo.png" alt="" class="border w-16 h-16 object-cover rounded-lg shadow">
                            @else
                                <img src="images/logo.png" alt="" class="border w-16 h-16 object-cover rounded-lg shadow">
                            @endif
                        @else
                            <img src="images/logo.png" alt="" class="border w-16 h-16 object-cover rounded-lg shadow">
                        @endif
                    @else
                        <img src="images/logo.png" alt="" class="border w-16 h-16 object-cover rounded-lg shadow">
                    @endif
                    <div class="pl-2 w-full">
                        <div class="flex-between-center">
                            <span class="text-lg font-semibold">
                                @if ($notification->utilisateur)
                                    {{$notification->utilisateur->name}}
                                @endif
                            </span>
                            <span class="ml-auto text-sm">
                                {{$notification->created_at->diffForHumans()}}
                            </span>
                        </div>
                        <div>
                            {{$notification->texte}}
                        </div>
                        <div>
                            <div class="">
                                <!-- Mobile votes -->
                                {{-- <x-votes_md :vote="5" :votes="5"/> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-0.5 mx-10 w-full rounded bg-gray-200"></div>
            @empty
                <div class="text-center w-full border-collapse p-6 bg-white">
                    <span class="text-lg">Aucune notification</span>
                </div>
            @endforelse
        </x-section>
        <div class="mt-4 ">
            {{ $notifications->links() }}
        </div>
    </div>

</div>
