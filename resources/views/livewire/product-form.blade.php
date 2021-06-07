{{--<style>--}}
{{--    .hasImage:hover section {--}}
{{--        background-color: rgba(5, 5, 5, 0.4);--}}
{{--    }--}}
{{--    .hasImage:hover button:hover {--}}
{{--        background: rgba(5, 5, 5, 0.45);--}}
{{--    }--}}

{{--    #overlay p,--}}
{{--    i {--}}
{{--        opacity: 0;--}}
{{--    }--}}

{{--    #overlay.draggedover {--}}
{{--        background-color: rgba(255, 255, 255, 0.7);--}}
{{--    }--}}
{{--    #overlay.draggedover p,--}}
{{--    #overlay.draggedover i {--}}
{{--        opacity: 1;--}}
{{--    }--}}

{{--    .group:hover .group-hover\:text-blue-800 {--}}
{{--        color: #2b6cb0;--}}
{{--    }--}}
{{--</style>--}}
    <div>
        {{-- The best athlete wants his opponent at his best. --}}
        <div class="width my-10 pb-10 px-3 md:px-0">
            <div class="text-lg">
                Creer un produit
            </div>
            <form wire:submit.prevent="saveProduct" enctype="multipart/form-data">
                <section >
                    <div class="col-span-12 sm:col-span-5 border border-color">
                     {{-- PHOTOS BLOCK--}}
                        @if($page == 'create')
                          <div class="flex flex-col flex-grow">
                            <div x-data="{ files: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-white appearance-none rounded-md hover:shadow-outline-gray">
                                <input type="file" multiple
                                       wire:model="photos"
                                       class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                       x-on:change="files = $event.target.files; console.log($event.target.files);"
                                       x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')"
                                       x-on:drop="$el.classList.remove('active')"
                                >
                                @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                                <template x-if="files !== null">
                                    @if ($photos)
                                        <div class="flex flex-col justify-between sm:flex-row">
                                            @foreach($photos as $img)
                                                <div class="border w-44 ml-2 object-cover rounded-lg shadow">
                                                    <img src="{{ $img->temporaryUrl() }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </template>
                                <template x-if="files === null">
                                    <div class="flex flex-col space-y-2 items-center justify-center">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                        <p class="text-gray-700">Faites glisser vos images ici ou cliquez dans cette zone.</p>
                                        <a href="javascript:void(0)" class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-blue-700">Sélectionner des images</a>
                                    </div>
                                </template>
                            </div>
                            @error('photos') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        @endif
                     {{-- FIN PHOTOS BLOCK--}}
                    </div>
                </section>
                <section>
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <div class="flex flex-col justify-between sm:flex-row">
                            <div class="sm:w-5/12 flex flex-col">
                                <label class="leading-loose">Nom de l'article </label>
                                <input type="text" class="form-input" wire:model.lazy="input.nom">
                                @error('input.nom') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="sm:w-6/12 flex flex-col">
                                <label class="leading-loose">Sous titre</label>
                                <input type="text" class="form-input" wire:model.lazy="input.sous_titre">
                                @error('input.sous_titre') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label class="leading-loose">Description</label>
                            <textarea wire:model.lazy="input.description" cols="30" rows="5" class="form-input"></textarea>
                            @error('input.description') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col justify-between sm:flex-row flex-wrap">
                            <div class="flex flex-col">
                                <label class="leading-loose">Selectionnez la catégorie</label>
                                <select wire:model.lazy="input.categorie_id" class="form-input" required>
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                    @endforeach
                                </select>
                                @error('input.categorie_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            @if ($categorie_id)
                                @if ($sous_categories)
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Selectionnez la sous catégorie</label>
                                        <select wire:model.lazy="input.sous_categorie_id" class="form-input" required>
                                            @foreach ($sous_categories as $sous_categorie)
                                                <option value="{{$sous_categorie->id}}">{{$sous_categorie->nom}}</option>
                                            @endforeach
                                        </select>
                                        @error('input.sous_categorie_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                            @endif
                            <div class="flex flex-col">
                                <label class="leading-loose">Type de transaction</label>
                                <select wire:model.lazy="input.transaction_id" class="form-input">
                                    @foreach ($transactions as $transaction)
                                        <option value="{{$transaction->id}}">{{$transaction->nom}}</option>
                                    @endforeach
                                </select>
                                @error('input.transaction_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Pays</label>
                                <div class="flex flex-wrap">
                                    @foreach ($pays as $p)
                                        @if ($p->flag != null)
                                            <div class="mr-2">
                                                <label for="#p{{$p->id}}">
                                                    {{-- {{$p->nom}} --}}
                                                    <img title="{{$p->nom}}" src="{{$p->flag}}" class="w-10 h-5" alt="">
                                                </label>
                                                <input id="#p{{$p->id}}" type="checkbox" class="form-input" wire:model="pays_ids" value="{{$p->id}}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                @error('pays_ids') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Etat</label>
                                <select wire:model.lazy="input.etat_id" class="form-input">
                                    @foreach ($etats as $etat)
                                        <option value="{{$etat->id}}">{{$etat->nom}}</option>
                                    @endforeach
                                </select>
                                @error('input.etat_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="flex flex-col justify-between sm:flex-row flex-wrap">
                            <div class="flex flex-col">
                                <label class="leading-loose">Prix</label>
                                <input type="number" min="100"  class="form-input"  wire:model.lazy="input.prix">
                                @error('input.prix') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Prix réduit</label>
                                <input type="number" min="100"  class="form-input"  wire:model.lazy="input.prix_reduction">
                                @error('input.prix_reduction') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Commission</label>
                                <input type="number" min="100" class="form-input"  wire:model.lazy="input.commission">
                                @error('input.commission') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="">
                            <div class="uppercase font-medium text-xl mb-3">Prix Suggestion</div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <label class="leading mr-5">De</label>
                                    <div>
                                        <input type="number" min="100"  class="form-input"  wire:model.lazy="input.prix_suggestion1">
                                        @error('input.prix_suggestion1') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <label class="leading mr-5">A</label>
                                    <div>
                                        <input type="number" min="100" class="form-input"  wire:model.lazy="input.prix_suggestion2">
                                        @error('input.prix_suggestion2') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <label class="leading mr-5">Note</label>
                                    <div>
                                        <input type="hidden" class="etoile_input"  />
                                        <span class="etoile {{$etoile == 1 ? 'text-yellow-400' : ''}} cursor-pointer text-4xl">★</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <button class="btn-gradient btn-publier float-right mb-10">
                    publier
                </button>
            </form>
        </div>

        <div wire:loading wire:target="saveProduct">
            <div class="fixed top-0 left-0 w-full h-full bg-white bg-opacity-50">
                <div>

                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        // SYSTEM DE NOTE
        $(function () {

            $(document).on('click','.etoile', function () {
                if($(this).hasClass("text-yellow-400")){
                    Livewire.emit('addEtoile', 0);
                    $(this).removeClass('text-yellow-400');
                }else{
                    $(this).addClass('text-yellow-400');
                    Livewire.emit('addEtoile', 1);
                }
            });


        })


        // $('#main_photo_input').css("visibility", "hidden");
        //
        // $('#main_photo_trigger').click(function() {
        //     $('#main_photo_input').trigger('click');
        // });
        const fileTempl = document.getElementById("file-template"),
            imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

        // use to store pre selected files
        let FILES = {};

        // check if file is of type image and prepend the initialied
        // template to the target element
        function addFile(target, file) {
            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);

            const clone = isImage
                ? imageTempl.content.cloneNode(true)
                : fileTempl.content.cloneNode(true);

            clone.querySelector("h1").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".delete").dataset.target = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024
                    ? file.size > 1048576
                    ? Math.round(file.size / 1048576) + "mb"
                    : Math.round(file.size / 1024) + "kb"
                    : file.size + "b";

            isImage &&
            Object.assign(clone.querySelector("img"), {
                src: objectURL,
                alt: file.name
            });

            empty.classList.add("hidden");
            target.prepend(clone);

            FILES[objectURL] = file;
        }

        const gallery = document.getElementById("gallery"),
            overlay = document.getElementById("overlay");

        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");
        document.getElementById("button").onclick = () => hidden.click();
        hidden.onchange = (e) => {
            for (const file of e.target.files) {
                addFile(gallery, file);
            }
        };

        // use to check if a file is being dragged
        const hasFiles = ({ dataTransfer: { types = [] } }) =>
            types.indexOf("Files") > -1;

        // use to drag dragenter and dragleave events.
        // this is to know if the outermost parent is dragged over
        // without issues due to drag events on its children
        let counter = 0;

        // reset counter and append file to gallery when file is dropped
        function dropHandler(ev) {
            ev.preventDefault();
            for (const file of ev.dataTransfer.files) {
                addFile(gallery, file);
                overlay.classList.remove("draggedover");
                counter = 0;
            }
        }

        // only react to actual files being dragged
        function dragEnterHandler(e) {
            e.preventDefault();
            if (!hasFiles(e)) {
                return;
            }
            ++counter && overlay.classList.add("draggedover");
        }

        function dragLeaveHandler(e) {
            1 > --counter && overlay.classList.remove("draggedover");
        }

        function dragOverHandler(e) {
            if (hasFiles(e)) {
                e.preventDefault();
            }
        }

        // event delegation to caputre delete events
        // fron the waste buckets in the file preview cards
        gallery.onclick = ({ target }) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                document.getElementById(ou).remove(ou);
                gallery.children.length === 1 && empty.classList.remove("hidden");
                delete FILES[ou];
            }
        };

        // print all selected files
        document.getElementById("submit").onclick = () => {
            alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
            console.log(FILES);
        };

        // clear entire selection
        document.getElementById("cancel").onclick = () => {
            while (gallery.children.length > 0) {
                gallery.lastChild.remove();
            }
            FILES = {};
            empty.classList.remove("hidden");
            gallery.append(empty);
        };


    </script>
@endsection
