<!--Main Navbar-->
<nav class=" md:block bg-white shadow-md" x-data="{isOpen:false}">
    <div class="width flex-between-center">
        <a href="/">
            <img src="/images/logo.png" alt="Daymond Logo" class="h-24 w-auto   ">
        </a>
        <div class="flex items-stretch">
            <a href="/" class="hover-bg p-1 md:px-2 rounded-md flex flex-col items-center mr-2 {{ Request::is('welcome*') ? 'text-primary' : '' }} {{ Request::is('/*') ? 'text-primary' : '' }}">
                <i class="text-lg fas fa-home"></i>
                <span class="hidden md:block">
                    Accueil
                </span>
            </a>
            <a href="/products" class="hover-bg p-1 md:px-2 rounded-md flex flex-col items-center mr-2 {{ Request::is('products*') ? 'text-primary' : '' }} ">
                <i class="text-lg fas fa-store-alt"></i>
                <span class="hidden md:block">
                    Produits
                </span>
            </a>
            <a href="/myorders" class="relative hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2  {{ Request::is('myorders*') ? 'text-primary' : '' }} ">
                <i class=" text-lg fas fa-shopping-cart">
                </i>
                <livewire:cart-counter-icon />
                <span class="hidden md:block md:text-center">
                    Mes commandes
                </span>
            </a>
            <a href="/diffusion" class="hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2 {{ Request::is('diffusion*') ? 'text-primary' : '' }} ">
                <i class="text-lg fas fa-file-download"></i>
                <span class="hidden md:block">
                    Diffusion
                </span>
            </a>
            <a href="/notifications" class="hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2 {{ Request::is('notifications*') ? 'text-primary' : '' }} ">
                <i class="material-icons">notifications</i>
                <span class="hidden md:block">
                    Notifications
                </span>
            </a>
        </div>
        @auth
            <a class="flex flex-col justify-between items-center hover-bg cursor-pointer rounded-md p-1 md:px-2  {{ Request::is('profile*') ? 'text-primary' : '' }}" x-on:click="isOpen = !isOpen"  :class="{ 'text-primary': isOpen == true }" >
                <i class="material-icons">account_circle</i>
                <span class="hidden md:block md:text-center">
                    Mon profil
                </span>
            </a>
        @else
            <a class="flex flex-col justify-between items-center hover-bg cursor-pointer rounded-md py-1 px-2 authBtn {{ Request::is('profile*') ? 'text-primary' : '' }}">
                <i class="material-icons">account_circle</i>
                <span class="hidden md:block">
                    Mon profil
                </span>
            </a>
        @endauth
    </div>
    @auth
    {{--CARD AFFICHAGE PROFIL USER--}}
        <div
            x-show="isOpen == true"
            @include('components.transitions')
            class="absolute min-w-34 bg-white top-0 right-0  border shadow-lg" style="z-index:99;  transform: translateX(-3rem) !important;"
                >
            <div class="min-w-34">
                <ul>
                    <li class="flex-between-center p-3 shadow-md">
                        <a class="block hover-bg p-2 cursor-pointer" @click="isOpen = false">
                            <i class="fas fa-chevron-left"></i>
                            Profil
                        </a>
                        <div class="w-20"></div>
                        <span>
                            {{date('d/m/Y')}}
                        </span>
                    </li>
                    <li class="block w-full">
                        <a href="{{route('profile')}}" class="w-24 h-24 overflow-hidden flex justify-center items-center text-2xl p-3 border border-color my-5 mx-auto">
                            @if(Auth::user()->utilisateur)
                                @if(Auth::user()->utilisateur->photo)
                                    <img src="{{asset('storage/users/'.Auth::user()->utilisateur->photo)}}" class="h-full w-full" alt="">
                                @else
                                    <i class="fas  fa-plus mx-auto border-4 border-black rounded-full p-3"></i>
                                @endif
                            @else
                                <i class="fas  fa-plus mx-auto border-4 border-black rounded-full p-3"></i>
                            @endif
                        </a>
                    </li>
                    <!-- Profile -->

                    {{-- <x-drop_item :title="'Administration'">
                        <a href="/admin">Accès administrateur</a>
                    </x-drop_item> --}}
                    <x-drop_item :title="'Nom et Prénom'">
                        <div class="text-center">
                            {{Auth::user()->utilisateur->nom.' '.Auth::user()->utilisateur->prenom}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Profession'">
                        <div class="text-center">
                            {{Auth::user()->utilisateur->profession}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Numéro de téléphone'">
                        <div class="text-center">
                            {{Auth::user()->utilisateur->contact}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Pays et ville'">
                        <div class="flex-between-center">
                            {{-- {{Auth::user()->utilisateur->contact}} --}}
                            {{\App\Models\Adresse::find(Auth::user()->utilisateur->adresse_id)->pays??''}} <span>/</span> {{\App\Models\Adresse::find(Auth::user()->utilisateur->adresse_id)->ville??''}}
                            {{-- {{Auth::user()->utilisateur->contact}} --}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Nombre d\'étoile'">
                        <div class="flex-center-center text-lg text-primary">
                            @if(Auth::user()->utilisateur->etoile > 0)
                                <div class="flex">
                                    @if(Auth::user()->utilisateur->etoile == 7)
                                        @for($cpt = 0 ; $cpt < Auth::user()->utilisateur->etoile; $cpt++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    @else
                                        @for($cpt = 0 ; $cpt < Auth::user()->utilisateur->etoile; $cpt++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @for($cpt = 0 ; $cpt < 7 - Auth::user()->utilisateur->etoile; $cpt++)
                                                <i class="far fa-star"></i>
                                        @endfor
                                    @endif
                                </div>
                            @endif
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Déconnexion'">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-red-500 text-lg text-center p-1">
                                Déconnexion
                            </button>
                        </form>
                    </x-drop_item>
                    <!-- Messages -->
                    <!-- Logout -->

                </ul>
            </div>
        </div>
    {{--CARD AFFICHAGE PROFIL USER--}}
    @endauth
</nav>
