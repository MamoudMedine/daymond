    <div>

        <!-- component -->
        <div class="">
            <div class="overflow-x-auto">
                <div class="min-w-screen min-h-screen flex justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded my-6">
                            <h3 class="p-3">Logo</h3>
                            <div class="flex flex-wrap mx-auto p-5">

                                <div class="w-32">
                                    <div class="w-full" onclick="$('#logo').trigger('click');save();">
                                        @if ($logo)
                                            <img src="{{ $logo->temporaryUrl() }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >
                                        @else
                                            @if ($current_logo)
                                                <img src="{{ $current_logo->src }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >
                                            @else
                                                <div class="border w-full h-28 flex justify-center items-center">
                                                    <i class="fas fa-plus text-3xl"></i>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <input type="file" accept="image/*" wire:model="logo" id="logo" hidden>
                                    @error("logo") <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow-md rounded my-6">
                            <h3 class="p-3">Carousel</h3>
                            <div class="flex flex-wrap mx-auto p-5">
                                @foreach ($media as $medium)
                                    <div class="w-32 relative">
                                        <div class="w-full">
                                            <img src="{{ $medium->src }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >
                                        </div>
                                        <a title="Supprimer photo" wire:click="removePhoto({{$medium->id}})" class="cursor-pointer w-6 h-6 absolute -top-3 -right-3 bg-red-500 rounded-full z-50 flex justify-center items-center text-white">x</a>
                                    </div>
                                @endforeach
                                <div class="w-32">
                                    <div class="w-full" onclick="$('#photo').trigger('click');save();">
                                        @if ($photo)
                                            <img src="{{ $photo->temporaryUrl() }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >
                                        @else
                                            <div class="border w-full h-28 flex justify-center items-center">
                                                <i class="fas fa-plus text-3xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <input type="file" accept="image/*" wire:model="photo" id="photo" hidden>
                                    @error("photo") <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function save(){
            Livewire.emit('savePhoto');
        }
    </script>
