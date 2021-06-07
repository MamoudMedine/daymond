<div class="w-full">
    <div class="w-full" onclick="$('#{{$input_id ?? 'image'}}').trigger('click');">
        @if ($model)
            <img src="{{ $model->temporaryUrl() }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >
        @else
            {{-- @if(isset($slot))
                {{$slot}}
            @else --}}
            <div class="border w-full h-28 flex justify-center items-center">
                <i class="fas fa-plus text-3xl"></i>
            </div>
            {{-- @endif --}}
        @endif
    </div>
    <input type="file" accept="image/*" {!!$wire!!} id="{{$input_id ?? 'image'}}" hidden>
    @error("model") <span class="error">{{ $message }}</span> @enderror
</div>
