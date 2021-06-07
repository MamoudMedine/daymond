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

                                        </div>
                                    </div>
                                </div>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Photo</th>
                                    <th class="py-3 px-6 text-left">Nom</th>
                                    <th class="py-3 px-6 text-center">Profession</th>
                                    <th class="py-3 px-6 text-center">Contact</th>
                                    <th class="py-3 px-6 text-center">Pays</th>
                                    <th class="py-3 px-6 text-center">Ville</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @forelse ($users as $user)
                                <div>
                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-center cursor-pointer" onclick="show('{{$user->id}}');">
                                            <div class="flex flex-col">
                                                <img class="h-20 w-20 rounded-3xl" src=""  alt="Photo">
                                                @if($user->etoile > 0)
                                                    <div class="flex">
                                                        @if($user->etoile == 7)
                                                            @for($cpt = 0 ; $cpt < $user->etoile; $cpt++)
                                                                <span class="text-yellow-400 cursor-pointer text-xl">★</span>
                                                            @endfor
                                                        @else
                                                            @for($cpt = 0 ; $cpt < $user->etoile; $cpt++)
                                                                <span class="text-yellow-400 cursor-pointer text-xl">★</span>
                                                            @endfor
                                                            @for($cpt = 0 ; $cpt < 7 - $user->etoile; $cpt++)
                                                                <span class="cursor-pointer text-xl">★</span>
                                                            @endfor
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left cursor-pointer"  onclick="show('{{$user->id}}');">
                                            <div class="flex items-center">
                                                <span class="font-medium">
                                                    {{$user->nom.' '.$user->prenom}}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$user->profession??''}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$user->contact??''}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$user->pays->pluck('nom')->first()??''}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                           ABIDJAN
                                        </td>
                                    {{--- ACTIONS SUR UTILISATEUR----}}
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <div onclick="show('{{$user->id}}');" class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                                <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a href="{{route('admin.vente.edit', $user->id)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg onclick="deleteProduct({{$user->id}});" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                                <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    @if ($user->etat)
                                                        @if ($user->etat->nom == "Invisible")
                                                            <a title="Marquer Visible" wire:click="toggleVisibility({{$user->id}})">
                                                                <svg  class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                            </a>
                                                        @else
                                                            <a title="Marquer Invisible" wire:click="toggleVisibility({{$user->id}})">
                                                                <svg  class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="w-6 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    @if ($user->etat)
                                                        @if ($user->etat->nom == "Indisponible")
                                                            <a title="Marquer Disponible" wire:click="toggleAvailability({{$user->id}})">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                            </a>
                                                        @else
                                                            <a title="Marquer Indispponible" wire:click="toggleAvailability({{$user->id}})">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    {{---FIN ACTIONS SUR UTILISATEUR----}}
                                    </tr>
                                    {{--BLOC INFOS UTILISATEUR --}}
                                    <tr id="tr-{{$user->id}}" style="display:none;">
                                        <td colspan="6" >
                                            <div class="flex-col bg-white shadow-sm mt-2 hover:bg-white cursor-pointer p-2 rounded">
                                                <div class="pl-2 w-full flex flex-col justify-between">
                                                    <div class="grid grid-rows-1 pl-3">
                                                        <div class="text-xl">
                                                           <span class="font-bold">Nombres de commandes:</span> {{count($user->commandes)??0}}
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="py-2 px-3"><span class="font-semibold">Nouvelles:</span> {{count($user->commandes()->where('status', 'LANCEE')->get())}}</div>
                                                        <div class="py-2 px-3"><span class="font-semibold">En cours:</span> {{count($user->commandes()->where('status', 'EN_COURS')->get())}}</div>
                                                        <div class="py-2 px-3"><span class="font-semibold">Validée:</span> {{count($user->commandes()->where('status', 'VALIDEE')->get())}}</div>
                                                        <div class="py-2 px-3"><span class="font-semibold">Annulées:</span> {{count($user->commandes()->where('status', 'ANNULEE')->get())}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{--FIN BLOC INFOS UTILISATEUR --}}
{{--                                    <tr id="tr-2-{{$user->id}}" style="display:none;" class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">--}}
{{--                                        <td colspan="2" class="py-3 px-6 text-center">--}}
{{--                                            Nb vues : 0--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
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
    function deleteProduct(userId) {
        if (confirm('Etes-vous sure de vouloir supprimer ce user ?')){
            Livewire.emit('deleteProduct', userId);
        }
    }
    // GET IMAGE ID
    function getImageId(imageId) {
        Livewire.emitTo('admin.user-manage', 'getImageId', imageId);
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
