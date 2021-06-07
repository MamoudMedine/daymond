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
                        @if(request()->route('vente.create'))
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

                        {{--                        <div class="h-screen w-full sm:px-8 md:px-16 sm:py-8">--}}
{{--                            <main class="container pb-2 mx-auto max-w-screen-lg h-full">--}}
{{--                                <!-- file upload modal -->--}}
{{--                                <article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white shadow-xl rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">--}}
{{--                                    <!-- overlay -->--}}
{{--                                    <div id="overlay" class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">--}}
{{--                                        <i>--}}
{{--                                            <svg class="fill-current w-12 h-12 mb-3 text-blue-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">--}}
{{--                                                <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />--}}
{{--                                            </svg>--}}
{{--                                        </i>--}}
{{--                                        <p class="text-lg text-blue-700">Déposer les fichiers à télécharger</p>--}}
{{--                                    </div>--}}

{{--                                    <!-- scroll area -->--}}
{{--                                    <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">--}}
{{--                                        <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">--}}
{{--                                            <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">--}}
{{--                                                <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>--}}
{{--                                            </p>--}}
{{--                                            <input id="hidden-input" type="file" multiple class="hidden" />--}}
{{--                                            <button id="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">--}}
{{--                                                Upload a file--}}
{{--                                            </button>--}}
{{--                                        </header>--}}

{{--                                        <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">--}}
{{--                                            Télécharger--}}
{{--                                        </h1>--}}

{{--                                        <ul id="gallery" class="flex flex-1 flex-wrap -m-1">--}}
{{--                                            <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">--}}
{{--                                                <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />--}}
{{--                                                <span class="text-small text-gray-500">Aucun fichier sélectionné</span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </section>--}}

{{--                                    <!-- sticky footer -->--}}
{{--                                    <footer class="flex justify-end px-8 pb-8 pt-4">--}}
{{--                                        <button id="submit" class="rounded-sm px-3 py-1 bg-blue-700 hover:bg-blue-500 text-white focus:shadow-outline focus:outline-none">--}}
{{--                                            Upload now--}}
{{--                                        </button>--}}
{{--                                        <button id="cancel" class="ml-3 rounded-sm px-3 py-1 hover:bg-gray-300 focus:shadow-outline focus:outline-none">--}}
{{--                                            Cancel--}}
{{--                                        </button>--}}
{{--                                    </footer>--}}
{{--                                </article>--}}
{{--                            </main>--}}
{{--                        </div>--}}
{{--                        <!-- using two similar templates for simplicity in js code -->--}}
{{--                        <template id="file-template">--}}
{{--                            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">--}}
{{--                                <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">--}}
{{--                                    <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />--}}

{{--                                    <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">--}}
{{--                                        <h1 class="flex-1 group-hover:text-blue-800"></h1>--}}
{{--                                        <div class="flex">--}}
{{--                                      <span class="p-1 text-blue-800">--}}
{{--                                        <i>--}}
{{--                                          <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">--}}
{{--                                            <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />--}}
{{--                                          </svg>--}}
{{--                                        </i>--}}
{{--                                      </span>--}}
{{--                                            <p class="p-1 size text-xs text-gray-700"></p>--}}
{{--                                            <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">--}}
{{--                                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">--}}
{{--                                                    <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </section>--}}
{{--                                </article>--}}
{{--                            </li>--}}
{{--                        </template>--}}

{{--                        <template id="image-template">--}}
{{--                            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">--}}
{{--                                <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">--}}
{{--                                    <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />--}}

{{--                                    <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">--}}
{{--                                        <h1 class="flex-1"></h1>--}}
{{--                                        <div class="flex">--}}
{{--                                      <span class="p-1">--}}
{{--                                        <i>--}}
{{--                                          <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">--}}
{{--                                            <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />--}}
{{--                                          </svg>--}}
{{--                                        </i>--}}
{{--                                      </span>--}}

{{--                                            <p class="p-1 size text-xs"></p>--}}
{{--                                            <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">--}}
{{--                                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">--}}
{{--                                                    <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </section>--}}
{{--                                </article>--}}
{{--                            </li>--}}
{{--                        </template>--}}

{{--                        <div class="flex">--}}
{{--                            <!-- single photo area -->--}}
{{--                            <div class="w-full">--}}
{{--                                <div class="w-full" onclick="$('#photo1').trigger('click');">--}}
{{--                                    @if ($photo1)--}}
{{--                                        <img src="{{ $photo1->temporaryUrl() }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >--}}
{{--                                    @else--}}
{{--                                        <div class="border w-full h-28 flex justify-center items-center">--}}
{{--                                            <i class="fas fa-plus text-3xl"></i>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <input type="file" accept="image/*" wire:model="photo1" id="photo1" hidden>--}}
{{--                                @error("photo1") <span class="error">{{ $message }}</span> @enderror--}}
{{--                            </div>--}}
{{--                            <!-- / single photo area -->--}}
{{--                            <!-- single photo area -->--}}
{{--                            <div class="w-full">--}}
{{--                                <div class="w-full" onclick="$('#photo2').trigger('click');">--}}
{{--                                    @if ($photo2)--}}
{{--                                        <img src="{{ $photo2->temporaryUrl() }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >--}}
{{--                                    @else--}}
{{--                                        <div class="border w-full h-28 flex justify-center items-center">--}}
{{--                                            <i class="fas fa-plus text-3xl"></i>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <input type="file" accept="image/*" wire:model="photo2" id="photo2" hidden>--}}
{{--                                @error("photo2") <span class="error">{{ $message }}</span> @enderror--}}
{{--                            </div>--}}
{{--                            <!-- / single photo area -->--}}
{{--                            <!-- single photo area -->--}}
{{--                            <div class="w-full">--}}
{{--                                <div class="w-full" onclick="$('#photo3').trigger('click');">--}}
{{--                                    @if ($photo3)--}}
{{--                                        <img src="{{ $photo3->temporaryUrl() }}" alt="" class="w-full border h-28 object-cover cursor-pointer" >--}}
{{--                                    @else--}}
{{--                                        <div class="border w-full h-28 flex justify-center items-center">--}}
{{--                                            <i class="fas fa-plus text-3xl"></i>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <input type="file" accept="image/*" wire:model="photo3" id="photo3" hidden>--}}
{{--                                @error("photo3") <span class="error">{{ $message }}</span> @enderror--}}
{{--                            </div>--}}
                            <!-- / single photo area -->
{{--                        </div>--}}
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
                            {{-- <div class="flex flex-col">
                                <label class="leading-loose">Localisation</label>
                                <select wire:model.lazy="input.localisation_id" class="form-input">
                                    <option value=""></option>
                                </select>
                                @error('input.localisation_id') <span class="error">{{ $message }}</span> @enderror
                            </div> --}}
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
                            </div>
                        </div>
                        {{-- <div class="">
                            <div class="uppercase font-medium text-xl mb-3">Prix Livraison</div>
                            <div class="flex-between-center">
                                <div class="flex flex-col">
                                    <label class="leading-loose mr-5">Abidjan</label>
                                    <input type="text" class="form-input"  wire:model.lazy="input.delivery_abj">
                                    @error('input.delivery_abj') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose mr-5">Hors d'Abidjan</label>
                                    <input type="text" class="form-input"  wire:model.lazy="input.delivery_hors_abj">
                                    @error('input.delivery_hors_abj') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </section>
                <button class="btn-gradient float-right mb-10">
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
