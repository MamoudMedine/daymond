<div>

    <div class="">
        <div x-data="{isDown : true}">
            <div class="flex-between-center">
                <a class="px-3 py-2 hover-bg rounded-full mx-auto text-2xl" x-on:click="isDown = true"
                   x-show="isDown == false" :class="{ 'bg-active': isDown == true }" >
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
                        <div class="rounded-full border-2 border-primary bg-white relative flex">
                            <select wire:model="categorie_id" class="rounded-full border-none ">
                                <option value="">
                                    Sélectionnez la catégorie
                                </option>
                                @foreach ($categories as $categorie)
                                    <option value="{{$categorie->id}}">
                                        {{$categorie->nom}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    @if ($categorie_id)
                        <li class="flex-between-center">
                            <div class="rounded-full border-2 border-primary bg-white relative flex">
                                <select wire:model="sous_categorie_id" class="rounded-full border-none ">
                                    <option value="">
                                        Sélectionnez la sous catégorie
                                    </option>
                                    @foreach ($sous_categories as $sous_categorie)
                                        <option value="{{$sous_categorie->id}}">
                                            {{$sous_categorie->nom}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                    @endif
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


    <div class="font-medium">
        <!--Collapsible Navbar-->
        {{-- Main --}}
        <main>
            @if ($searching == true)
            <div class="mb-96">
                <x-produits.section :title="$produits->count().' Resultats'">
                    @forelse ($produits as $produit)
                        <x-produits.card :produit="$produit" :key="$produit->id.time()"/>
                    @empty
                        <x-empty />
                    @endforelse
                </x-produits.section>
            </div>
            @endif
            <div class="@if($searching == true) hidden @endif">
                {{-- Ventes Flash --}}
                {{-- <x-produits.section :title="'Ventes Flash'">
                    @forelse ($ventes_flash as $produit)
                        <x-produits.card :produit="$produit" :key="$produit->id.time()"/>
                    @empty
                        <x-empty />
                    @endforelse
                </x-produits.section> --}}
                    {{-- Plus récents --}}
                <x-produits.section :title="'Plus récents'">
                    @forelse ($produits as $produit)
                        <x-produits.card :produit="$produit" :key="$produit->id.time()"/>
                    @empty
                        <x-empty />
                    @endforelse
                </x-produits.section>
            </div>
        </main>
    </div>
</div>
