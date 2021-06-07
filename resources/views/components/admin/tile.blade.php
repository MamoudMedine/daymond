<div class="border-4 border-red-500 rounded-xl shadow relative">
    @if(isset($count))
        @if ($count > 0)
            <span class="absolute w-10 h-10 -right-5 -top-5 border-4 border-white bg-red-500 rounded-full text-white flex-center-center text-xl">
                {{$count ?? '0'}}
            </span>
        @endif
    @endif
    <a href="{{$url ?? '#'}}" class="cursor-pointer">
        <div class="p-5 text-center">
            @if(isset($icon))
                {!! $icon !!}
            @else
                <i class="fas fa-{{$fa ?? 'shopping-cart'}} text-5xl"></i>
            @endif

        </div>
        <div class="rounded-xl border shadow-md text-lg p-3 text-center capitalize font-semibold">
            {{$title ?? 'Title'}}
        </div>
    </a>
</div>
