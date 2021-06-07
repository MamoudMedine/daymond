    <div>
        {{-- The best athlete wants his opponent at his best. --}}
        <div class="width my-10 pb-10 rounded bg-white p-10">
            <div class="text-lg">
                Creer une notification
            </div>
            <form wire:submit.prevent="saveNotification" enctype="multipart/form-data">
                <section>
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <div class="flex flex-col justify-between sm:flex-row flex-wrap">
                            <div class="flex flex-col">
                                <label class="leading-loose">Selectionnez l'abonné</label>
                                    {{-- <input wire:model.lazy="user_search" type="text" class="form-input">
                                        @foreach ($utilisateurs as $user)
                                            <a wire:click.prevent="selectUser($user->id)">{{$user->name}}</a>
                                        @endforeach
                                    <input wire:model.lazy="notification.utilisateur_id" type="text" class="hidden"> --}}
                                    {{-- <input type="text" wire:model="notification.utilisateur_id" class="form-input" list="users">
                                    <datalist id="users">
                                        @foreach ($utilisateurs as $user)
                                            <option value="{{$user->id}}">
                                                {{$user->name}}
                                            </option>
                                        @endforeach
                                    </datalist> --}}
                                    <select wire:model.lazy="notification.utilisateur_id" class="form-input" id="">
                                        <option value=""></option>
                                        @foreach ($utilisateurs as $user)
                                            <option value="{{$user->id}}">
                                                {{$user->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                @error('notification.utilisateur_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Selectionnez le type</label>
                                    <select wire:model.lazy="notification.type_id" class="form-input" id="">
                                        <option value=""></option>
                                        @foreach ($utilisateurs as $user)
                                            <option value="{{$user->id}}">
                                                {{$user->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                @error('notification.type_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="flex flex-col justify-between sm:flex-row w-full">
                            <div class="sm:w-12/12 flex flex-col w-full">
                                <label class="leading-loose">Texte </label>
                                <textarea rows="5" wire:model.lazy="notification.texte" class="form-input w-full"></textarea>
                                @error('notification.texte') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                </section>
                <div class="mb-10">
                    <button class="btn-gradient float-right mb-10">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
        <div wire:loading wire:target="saveNotification">
            <div class="fixed top-0 left-0 w-full h-full bg-white bg-opacity-50">
                <div>

                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        $('#main_photo_input').css("visibility", "hidden");

        $('#main_photo_trigger').click(function() {
            $('#main_photo_input').trigger('click');
        });
    </script>
    @endsection
