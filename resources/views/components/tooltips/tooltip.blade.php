<div x-cloak x-show.transition.origin.top="tooltip"  class="relative">
    <div {{$attributes->merge(['id' => '', 'class' => "absolute top-0 left-1/2 z-10 w-32 p-2 -mt-1 text-sm leading-tight bg-white transform -translate-x-1/2 -translate-y-full bg-orange-500 rounded-lg shadow-lg"])}}>
        {{$slot}}
    </div>
</div>

