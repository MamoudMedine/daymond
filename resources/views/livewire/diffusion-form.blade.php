    <div>
        {{-- The best athlete wants his opponent at his best. --}}
        <div class="width my-10 pb-10 rounded bg-white p-10">
            <div class="text-lg">
                Creer une diffusion
            </div>
            <form wire:submit.prevent="saveDiffusion" enctype="multipart/form-data">
                <section>
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <div class="flex flex-col justify-between sm:flex-row flex-wrap">
                            <div class="flex flex-col">
                                <label class="leading-loose">Selectionnez le type de diffusion</label>
                                <select wire:model.lazy="diffusion.type_diffusion_id" class="form-input">
                                    <option value=""></option>
                                    {{-- <option value="Article Vendu">Article Vendu</option>
                                    <option value="Disponibilité du produit">Disponibilité du produit</option> --}}

                                    @foreach ($type_diffusions as $type_diffusion)
                                        <option value="{{$type_diffusion->id}}">{{$type_diffusion->nom}}</option>
                                    @endforeach
                                </select>
                                @error('diffusion.type_diffusion_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Entrez le nom de l'utilisateur</label>
                                <select wire:model.lazy="diffusion.admin_id" class="form-input">
                                    <option value=""></option>
                                    @foreach ($admins as $admin)
                                        <option value="{{$admin->id}}">{{$admin->name}}</option>
                                    @endforeach
                                </select>
                                @error('diffusion.admin_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Sélectionner la date</label>
                                <input type="date" wire:model="diffusion.date_vente" class="form-input">
                                @error('diffusion.date_vente') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Selectionnez la disponibilité</label>
                                <input type="number" min="0" wire:model="diffusion.disponibilite" list="disponibilites" class="form-input" />
                                <datalist id="disponibilites">
                                    <option value="0">Indisponible</option>
                                </datalist>
                                @error('diffusion.disponibilite') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="flex flex-col justify-between sm:flex-row w-full">
                            <div class="flex flex-col">
                                <label class="leading-loose">Selectionnez un produit</label>
                                <select class="form-input" wire:model="diffusion.produit_id">
                                    <option value=""></option>
                                    @foreach ($produits as $produit)
                                        <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                    @endforeach
                                </select>
                                @error('type') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Selectionnez le type de fichier</label>
                                <select wire:model.lazy="type" class="form-input">
                                    <option value=""></option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="audio">Audio</option>
                                    <option value="autre">Autre</option>
                                </select>
                                @error('type') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            @if ($type)
                                <div class="flex flex-col">
                                    <label class="leading-loose">Fichier</label>
                                <input type="file" wire:model="file" accept="{{$accepted_files}}">
                                    @error('file') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col justify-between sm:flex-row w-full">
                            <div class="sm:w-12/12 flex flex-col w-full">
                                <label class="leading-loose">Texte </label>
                                <textarea rows="5" wire:model.lazy="diffusion.texte" class="form-input w-full"></textarea>
                                @error('diffusion.texte') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                </section>
                <div class="mb-10">

                    <button class="btn-gradient float-right mb-10">
                        publier
                    </button>
                </div>
            </form>
        </div>

        <div wire:loading wire:target="saveDiffusion">
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
