
{{------MODAL EDIT --}}
<style>
    .modal {
        transition: opacity 0.25s ease;
    }
    body.modal-active {
        overflow-x: hidden;
        overflow-y: visible !important;
    }
</style>

<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Modification d'image</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>
            <img id="img-content" src="" alt="" class="rounded shadow mb-1">
            @livewire('admin.produit-manage')
        </div>
    </div>
</div>
{{-----MODAL EDIT END--}}
<div>
        <!-- component -->
        <div class="">
            <div class="overflow-x-auto">
                <div class="min-w-screen min-h-screen flex justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="w-full table-auto">
                                <thead>
                                    <div class="p-3 flex justify-between flex-wrap bg-gray-200 text-gray-600 text-sm leading-normal">
                                        <x-form.search :placeholder="'Chercher'" class="bg-gray-200 mr-10" />
                                        <div class="flex">
                                            <div class="flex-center-center">
                                                <span class="text-sm font-semibold mx-2">
                                                    Etat
                                                </span>
                                                <select wire:model="etat_id" class="form-input">
                                                    @foreach ($etats as $etat)
                                                        <option value="{{$etat->id}}">
                                                            {{$etat->nom}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="flex-center-center">
                                                <span class="text-sm font-semibold mx-2">
                                                    Categorie
                                                </span>
                                                <select wire:model="categorie_id" class="form-input">
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{$categorie->id}}">
                                                            {{$categorie->nom}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="flex-center-center">
                                                <a href="{{route('admin.vente.create')}}" class="btn-gradient ml-2">
                                                    Creer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Image</th>
                                        <th class="py-3 px-6 text-left">Nom</th>
                                        {{-- <th class="py-3 px-6 text-left">Sous titre</th>
                                        <th class="py-3 px-6 text-center">Description</th> --}}
                                        <th class="py-3 px-6 text-center">Prix</th>
                                        <th class="py-3 px-6 text-center">Prix Réduit</th>
                                        <th class="py-3 px-6 text-center">Prix Suggestion</th>
                                        <th class="py-3 px-6 text-center">Etat</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($produits as $produit)
                                        <div>
                                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-center cursor-pointer" onclick="show('{{$produit->id}}');">
                                                    <div class="flex">
                                                        <img class="h-20 w-20 rounded-3xl" src="{{asset('prod_img/'.$produit->media->pluck('src')->first())}}"  alt="Image">
                                                        @if($produit->etoile==1)
                                                            <span class="text-yellow-400 cursor-pointer text-2xl">★</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left cursor-pointer"  onclick="show('{{$produit->id}}');">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">
                                                            {{$produit->nom.' '}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    {{$produit->prix}}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    {{$produit->prix_reduction}}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    {{$produit->prix_suggestion1." à ".$produit->prix_suggestion2}}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <span class="bg-{{$produit->color}}-200 text-{{$produit->color}}-600 py-1 px-3 rounded-full text-xs">
                                                        @if ($produit->etat)
                                                            {{$produit->etat->nom}}
                                                        @endif
                                                    </span>
                                                </td>
                                               {{-- ACTIONS BUTTONS--}}
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <div onclick="show('{{$produit->id}}');" class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                        {{-- <div class="w-4 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div> --}}
                                                        <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a href="{{route('admin.vente.edit', $produit->id)}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg onclick="deleteProduct({{$produit->id}});" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            {{-- <form id="deleteForm" action="/products/{{$produit->id}}/delete" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form> --}}
                                                        </div>
                                                        <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            @if ($produit->etat)
                                                                @if ($produit->etat->nom == "Invisible")
                                                                    <a title="Marquer Visible" wire:click="toggleVisibility({{$produit->id}})">
                                                                        <svg  class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                                    </a>
                                                                @else
                                                                    <a title="Marquer Invisible" wire:click="toggleVisibility({{$produit->id}})">
                                                                        <svg  class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            @if ($produit->etat)
                                                                @if ($produit->etat->nom == "Indisponible")
                                                                    <a title="Marquer Disponible" wire:click="toggleAvailability({{$produit->id}})">
                                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                                    </a>
                                                                @else
                                                                    <a title="Marquer Indispponible" wire:click="toggleAvailability({{$produit->id}})">
                                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                              {{--FIN ACTIONS BUTTONS--}}
                                            </tr>
                                            <tr id="tr-{{$produit->id}}" style="display:none;">
                                                <td colspan="6" >
                                                    <div class="flex-col bg-white shadow-sm mt-2 hover:bg-white cursor-pointer p-2 rounded">
                                                        <div class="pl-2 w-full flex flex-col justify-between">
                                                            <div class="flex-between-center">
                                                                <span class="text-lg font-semibold">{{$produit->nom}}</span>
                                                                <div>
                                                                    <span class="rounded bg-primary text-white p-1 font-normal mx-2">
                                                                        {{$produit->transaction->nom}}
                                                                    </span>
                                                                    <span class="ml-auto text-sm flex-col">Créé {{$produit->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                            {{-- Affichage des images --}}
                                                            <div class="flex px-2 mt-2 mb-5">
                                                                @if ($produit->media)
                                                                    @foreach ($produit->media as $img)
                                                                        <div class="flex flex-col">
                                                                            <img id="img-{{$img->id??''}}" src="{{asset('prod_img/'.$img->src)}}" alt="" class="border w-44 h-32 ml-2 object-cover rounded-lg shadow">
                                                                            <div class="block ml-2 mt-2">
                                                                                <button type="button" data-id="{{$img->id??''}}"  title="Modifier" onclick="getImageId({{$img->id}})"
                                                                                        class="modal-open btn-show-edit-img-modal bg-blue-500 hover:bg-blue-700 text-white rounded p-1">
                                                                                    <i class="fa fa-pencil"></i>
                                                                                </button>
                                                                                <button type="button"  title="Supprimer" onclick="deleteImage({{$img->id}});"
                                                                                   class="btn-del-img bg-red-500 hover:bg-red-700 text-white ml-2 rounded p-1">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div class="mb-2 font-semibold flex">
                                                                <div>
                                                                    @if ($produit->categorie)
                                                                        Catégorie
                                                                        <span class="p-1 font-normal bg-gray-100 rounded">{{$produit->categorie->nom}}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="mx-3">
                                                                    @if ($produit->sous_categorie)
                                                                        Sous Catégorie
                                                                        <span class="p-1 font-normal bg-gray-200 rounded">{{$produit->sous_categorie->nom}}</span> :
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <div>
                                                                    <div>
                                                                        <span class="font-semibold mr-2">Sous titre</span>
                                                                        {{$produit->sous_titre}} <br>
                                                                    </div>
                                                                    <div>
                                                                        <span class="font-semibold mr-2">Description</span>
                                                                        {{$produit->description}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <div сlass="flex justify-content-end my-2">
                                                                    <span class="font-semibold mr-2">Prix</span>
                                                                    <span class=" bg-gray-200 rounded-md p-1 font-normal">
                                                                        {{$produit->prix}} CFA
                                                                    </span>
                                                                    <span class="font-semibold mx-2">Prix réduit</span>
                                                                    <span class=" bg-green-200 rounded-md p-1 font-normal">
                                                                        {{$produit->prix_reduction}} CFA
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <div сlass="flex justify-content-end my-2">
                                                                    <span class="font-semibold mr-2">Prix de suggestion</span>
                                                                    <span class=" bg-green-200 rounded-md p-1 font-normal">
                                                                        {{$produit->prix_suggestion1}} CFA
                                                                    </span>
                                                                    <span class="mx-2">-</span>
                                                                    <span class=" bg-red-200 rounded-md p-1 font-normal">
                                                                        {{$produit->prix_suggestion2}} CFA
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <div сlass="flex justify-content-end my-2">
                                                                    {{-- <span class="font-semibold mr-2">Pays</span>
                                                                    @foreach ($produit->pays as $pay)
                                                                        <span class=" bg-green-200 rounded-md p-1 font-normal">
                                                                            {{$produit->prix_suggestion1}}
                                                                        </span>
                                                                    @endforeach --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="tr-2-{{$produit->id}}" style="display:none;" class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                                <td colspan="2" class="py-3 px-6 text-center">
                                                    Nb vues : {{$produit->nombre_vues ?? 0}}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    Nb téléchargements : {{$produit->nombre_telechargements ?? 0}}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    Nb copies : {{$produit->nombre_copies ?? 0}}
                                                </td>
                                                <td colspan="2" class="py-3 px-6 text-center">
                                                    Nb commandes {{$produit->commandes->count()}}
                                                </td>
                                            </tr>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-3 text-md font-medium">
                                                --Aucun Enregistrement--
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
{{--                        <div class="mb-2">--}}
{{--                            {{$produits->links('admin.products-pagination-links')}}--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // AFFICHAGE DETAIL PRODUIT
        function show(id){
            var details = document.getElementById('tr-'+id);
            details.style.display = details.style.display == "none" ? "table-row" : "none";
            var details = document.getElementById('tr-2-'+id);
            details.style.display = details.style.display == "none" ? "table-row" : "none";
        }
        // reload Page
        function reloadPage() {
            Livewire.on('productModified', function (){
                window.location.reload(true);
            });
        }
        // DELETE IMAGE
        function deleteImage(imageId) {
            if (confirm('Etes-vous sure de vouloir supprimer cette image ?')){
                Livewire.emit('deleteImage', imageId);
            }
        }
        // DELETE PRODUCT
        function deleteProduct(produitId) {
            if (confirm('Etes-vous sure de vouloir supprimer ce produit ?')){
                Livewire.emit('deleteProduct', produitId);
            }
        }
        // GET IMAGE ID
        function getImageId(imageId) {
            Livewire.emitTo('admin.produit-manage', 'getImageId', imageId);
        }
        // AFFICHER IMAGE A MODIFIER
        $(document).on('click', '.btn-show-edit-img-modal', function () {
            let id = $(this).attr('data-id');
            $('.imgId').attr('value', id);
            $('#img-content').attr('src', $('#img-'+id).attr('src'));
        });
        // CHOIX D'UNE NOUVELLE IMAGE
        $(document).on('change', '.image', function(){
            previewImage(this, '#img-content');
            Livewire.emit('updateImage');
        });
        // IMAGE PREVIEW
        function previewImage(input, img) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(img).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // OPEN AND CLOSE MODAL
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event){
                event.preventDefault()
                toggleModal()
            })
        }
        // GET IMAGE ID WHEN MODAL SHOW
        $('.modal-open').on('click', function (event) {
            // getImageId($(this).data('id'));
            event.preventDefault();
            $('.currentImageId').val($(this).data('id'));
            // Livewire.emit('updateImage');
        });

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };


        function toggleModal () {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
        // OPEN AND CLOSE MODAL END
    </script>
