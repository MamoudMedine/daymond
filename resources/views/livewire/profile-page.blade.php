<div>
    <!-- component -->
    <!--  Link : https://dribbble.com/shots/10452538-React-UI-Components -->
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 width">
            <div class="relative px-4 py-5 bg-white mx-8 md:mx-0 shadow rounded-md">
                <form wire:submit.prevent="save" class="" enctype="multipart/form-data">
                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="h-24 w-24 object-cover bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                            @else
                                <div class="h-24 w-24 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                                    @if ($profile)
                                        @if ($profile->photo)
                                            <img src="{{ $profile->photo }}" class="h-24 w-24 object-cover bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                                        @else
                                            {{$profile->nom[0]}}
                                        @endif
                                    @endif
                                </div>
                            @endif
                                <div>
                                    <div class="block font-semibold text-xl self-start text-gray-700">
                                        <h2 class="leading-relaxed">
                                            @if ($profile)
                                                {{$profile->nom. " ". $profile->prenom}}
                                            @endif
                                        </h2>
                                        <p class="text-sm text-gray-500 font-normal leading-relaxed">
                                            @if ($user)
                                                {{$user->profession}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="leading-loose">
                                        <label class="">Photo de profil</label>
                                        {{-- <input type="file" id="picture" class="dropify" name="picture" data-max-file-size="2M" data-default-file="{{ asset(old('picture') ? old('picture') : '') }}" wire:model="photo"> --}}

                                        <div
                                            x-data="{ isUploading: false, progress: 0 }"
                                            x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                                        >
                                            <!-- File Input -->
                                            <input type="file" accept="image/*" wire:model="photo">

                                            <!-- Progress Bar -->
                                            <div x-show="isUploading">
                                                <progress max="100" x-bind:value="progress"></progress>
                                            </div>
                                        </div>
                                        @error('photo') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="flex-between-center">
                                    <div class="w-5/12 flex flex-col">
                                        <label class="leading-loose">Nom </label>
                                        <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Nom" wire:model="nom">
                                        @error('nom') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-6/12 flex flex-col">
                                        <label class="leading-loose">Prénoms</label>
                                        <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Prénoms" wire:model="prenom">
                                        @error('prenom') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Profession</label>
                                    <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Profession" wire:model="profession">
                                    @error('profession') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Contact</label>
                                    <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Contact" wire:model="contact">
                                    @error('contact') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Pays</label>
                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                            <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Pays" wire:model="country">
                                            @error('country') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Ville</label>
                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                            <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Ville" wire:model="city">
                                            @error('city') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="divide-y divide-gray-200">
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Mot de passe</label>
                                        <input type="password" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Mot de passe" wire:model="password">
                                        @error('password') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div> --}}
                            </div>
                            <div class="pt-4 flex items-center space-x-4">
                                <a href="/" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Annuler
                                </a>
                                <button class="bg-primary flex justify-center items-center w-full text-black font-semibold px-4 py-3 rounded-md focus:outline-none" type="submit">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    // $('.dropify').dropify({
    //     messages: {
    //         'default': 'Glisser et déposer ici ou cliquer',
    //         'replace': 'Glisser et déposer ici ou cliquer pour remplacer',
    //         'remove': 'Retirer',
    //         'error': 'Ooops, une erreur s\'est produite.'
    //     },
    //     error: {
    //         'fileSize': 'Le fichier est tros gros (2M max).'
    //     }
    // });
</script>
