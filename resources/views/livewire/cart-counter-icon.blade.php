<div>
    @if ($cartTotal > 0)
        <span class="absolute top-1 right-2 md:left-2/3 bg-red-500 rounded-full h-5 w-5 flex-center-center font-semibold text-white">
            {{$cartTotal}}
        </span>
    @endif
</div>
