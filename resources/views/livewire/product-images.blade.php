<div class="col-span-12 sm:col-span-5 border-l border-color">
    <div class="h-56 border border-white">
        <img src="{{$main ?? '/img/bg/img_mountains_wide.jpg'}}" alt="" class="w-full max-h-56 object-cover cursor-pointer" onclick="openModal();currentSlide(1)">
    </div>
    <div class="flex">
        @foreach ($media as $medium)
            <div class="border border-white">
                <img src="{{$medium->src ?? '/img/bg/lights.jpg'}}" alt="" class="w-full max-h-28 object-cover cursor-pointer" wire:click="display('{{$medium->src}}');openModal();currentSlide({{$loop->index+1}});" >
            </div>
        @endforeach
    </div>
</div>
