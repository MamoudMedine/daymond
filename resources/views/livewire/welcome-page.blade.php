<div class="font-medium">
    <div class="">
        <div x-data="{isDown : true}">
            <div class="flex-between-center">
                <a class="px-3 py-2 hover-bg rounded-full mx-auto text-2xl" x-on:click="isDown = true"  x-show="isDown == false" :class="{ 'bg-active': isDown == true }" >
                    <span>
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
            </div>
            <div x-show="isDown == true" @include('components.transitions')
                class="min-w-34 pb-10 bg-white shadow-lg" style="z-index:89;"
                >
                <!-- Icon -->
                <div class="width flex justify-center items-center">
                    <a class="px-3 py-1.5 hover-bg rounded-full mx-auto text-2xl" x-on:click="isDown = !isDown"  x-show="isDown == true" :class="{ '': isDown == true }" >
                        <span>
                            <i class="fas fa-chevron-up"></i>
                        </span>
                    </a>
                </div>
                <!-- Search -->
                <div class="width flex-between-center flex-wrap">
                    <li class="flex-between-center">
                        <div x-data="{ open: false }" style="height: 48px!important;width: auto;"
                             class="rounded-full p-1 pr-3 pt-1 border-2 border-primary bg-white relative flex cursor-pointer">
                            <div class="z-50 mt-1 ml-1">
                                <a class="select-cat-message border-transparent  w-full cursor-pointer" @click="open = true" style="text-transform: capitalize!important;">
                                    @if($categorie_id!='' && $sous_categorie_id != '')
                                        {{ $showSousCat }}
                                    @elseif($categorie_id!='' && $sous_categorie_id == '')
                                        {{ $showCat }}
                                    @else
                                        Sélectionnez la catégorie
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp; &#11163;
                                </a>

                                <ul class="cat-block border-2 border-yellow-400 bg-white p-2 rounded-md" style="width: auto;"
                                    x-show="open"
                                    @click.away="open = false"
                                >
                                    <button @click="open = false" class="opt-categorie font-light p-1">
                                        Sélectionnez la catégorie &nbsp;&nbsp;&nbsp;&nbsp; &#11163;
                                    </button>
                                    @foreach ($categories as $categorie)
                                        <li class="p-1">
                                            <button class="opt-categorie font-bold" data-sc="{{count($categorie->sous_categories)}}"
                                                    data-id="{{$categorie->id}}" style="text-transform: lowercase!important;"
                                                    @if(count($categorie->sous_categories) <= 0)  @click="open = false" @endif>
                                                {{$categorie->nom}}
                                                @if(count($categorie->sous_categories) > 0)
                                                    &nbsp;&nbsp;&nbsp; &#11163;
                                                @endif
                                            </button>
                                            <ul class="sc-{{$categorie->id}}" style="display: none;">
                                                @foreach($categorie->sous_categories as $sc)
                                                    <li class="p-1">
                                                        <button onclick="searchBySousCategorie({{$categorie->id}}, {{$sc->id}})"
                                                                @click="open = false" class=" opt-sc font-light">
                                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;{{$sc->nom}}</span>
                                                        </button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="flex-between-center ml-2">
                        <div class="rounded-full border-2 border-primary bg-white relative flex">
                            <input type="tel" placeholder="Rechercher" class="border-none rounded-full" wire:model.debounce.1s="search">
                            <div class="p-2 text-xl">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </li>
                    <li class="flex">
                        <a href="{{route('historique')}}">
                            Historique
                        </a>
                    </li>
                    <li class="flex">
                        <a href="{{route('aide')}}">
                            Aide
                        </a>
                    </li>
                    <li class="flex">
                        <a href="{{route('contact')}}">
                            Nous contacter
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>

    <!--Collapsible Navbar-->
    <div class="mt-10">
        <x-showcase :images="$images"/>
    </div>
    {{-- Main --}}
    <main>
        {{-- Ventes Flash --}}
        <x-produits.section :title="'Ventes Flash'">
            @forelse ($ventes_flash as $produit)
                <x-produits.card :produit="$produit" :key="$produit->id.time()"/>
            @empty
                <x-empty />
            @endforelse
        </x-produits.section>
        {{-- Plus récents --}}
        <x-produits.section :title="'Plus récents'">
            {{-- <x-produits.card /> --}}
            @forelse ($produits as $produit)
                <x-produits.card :produit="$produit" :key="$produit->id.time()"/>
            @empty
                <x-empty />
            @endforelse
        </x-produits.section>
    </main>
</div>

<script>
    $(document).on('click', '.opt-categorie', function () {
        let id = $(this).attr("data-id");
        let sc_count = $(this).attr("data-sc");
        if(sc_count <= 0){
            searchByCategorie(id);
        }else{
            $('.sc-'+id).toggle();
        }
    });
    $(document).on('click', '.opt-categorie', function () {
        $('.select-cat-message').text($(this).text());
    });
    $(document).on('click', '.opt-sc', function () {
        $('.select-cat-message').text($(this).text());
    });
    function searchByCategorie(cat_id){
        Livewire.emit('getCategorieId', cat_id) ;
    }
    function searchBySousCategorie(cat_id, scat_id){
        Livewire.emit('getSousCategorieId', cat_id, scat_id);
    }
</script>
