<!--Main Navbar-->
<nav class=" md:block bg-white shadow-md" x-data="{isOpen:false}">
    <div class="width flex-between-center">
        <a href="/admin">
            <img src="/images/logo.png" alt="Daymond Logo" class="h-24 w-auto   ">
        </a>
        <div class="flex items-stretch">
            <a href="/admin" class="hover-bg p-1 md:px-2 rounded-md flex flex-col items-center mr-2 {{ Request::is('admin*') ? 'text-primary' : '' }} {{ Request::is('admin/*') ? 'text-primary' : '' }}">
                <i class="text-lg fas fa-home"></i>
                <span class="hidden md:block">
                    Accueil
                </span>
            </a>
            <a href="{{route('admin.products')}}" class="hover-bg p-1 md:px-2 rounded-md flex flex-col items-center mr-2 {{ Request::is('products*') ? 'text-primary' : '' }} ">
                <i class="text-lg fas fa-store-alt"></i>
                <span class="hidden md:block">
                    Produits
                </span>
            </a>
            <a href="{{route('admin.orders')}}" class="relative hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2  {{ Request::is('admin.orders*') ? 'text-primary' : '' }} ">
                <i class=" text-lg fas fa-shopping-cart">
                </i>
                <livewire:cart-counter-icon />
                <span class="hidden md:block md:text-center">
                    Commandes
                </span>
            </a>
            <a href="{{route('admin.payments')}}" class="relative hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2  {{ Request::is('admin.payments*') ? 'text-primary' : '' }} ">
                <i class=" text-lg fa fa-money-bill-wave">
                </i>
                <livewire:admin-payments-counter />
                <span class="hidden md:block md:text-center">
                    Payments
                </span>
            </a>
            <a href="{{route('admin.diffusions')}}" class="hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2 {{ Request::is('admin.diffusion*') ? 'text-primary' : '' }} ">
                <i class="text-lg fas fa-file-download"></i>
                <span class="hidden md:block">
                    Diffusions
                </span>
            </a>
            <a href="{{route('admin.notifications')}}" class="hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2 {{ Request::is('admin.notifications*') ? 'text-primary' : '' }} ">
                <i class="material-icons">notifications</i>
                <span class="hidden md:block">
                    Notifications
                </span>
            </a>
            <a href="{{route('admin.utilisateurs')}}" class="hover-bg p-1 md:px-2 rounded-md flex flex-col justify-between items-center mr-2 {{ Request::is('admin.utilisateurs*') ? 'text-primary' : '' }} ">
                <i class="material-icons">group</i>
                <span class="hidden md:block">
                    Utilisateurs
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
                        <a href="{{route('profile')}}" class="w-24 h-24 flex justify-center items-center text-2xl p-3 border border-color my-5 mx-auto">
                            <i class="fas  fa-plus mx-auto border-4 border-black rounded-full p-3"></i>
                        </a>
                    </li>
                    <!-- Profile -->

                    <x-drop_item :title="'Nom et Prénom'">
                        <div class="text-center">
                            {{Auth::user()->name}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Profession'">
                        <div class="text-center">
                            {{Auth::user()->profession}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Numéro de téléphone'">
                        <div class="text-center">
                            {{Auth::user()->phone}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Pays et ville'">
                        <div class="flex-between-center">
                            {{-- {{Auth::user()->utilisateur->contact}} --}}
                            Cote d'Ivoire <span>/</span> yamoussoukro
                            {{-- {{Auth::user()->utilisateur->contact}} --}}
                        </div>
                    </x-drop_item>
                    <x-drop_item :title="'Nombre d\'étoile'">

                        <div class="flex-center-center text-lg text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
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
    @endauth
</nav>
