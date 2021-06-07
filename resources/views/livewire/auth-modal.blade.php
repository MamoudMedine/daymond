<div>
    @if($displayAuth == true)
        @if($displayLogin == true)
            <div >
                <div class="fixed inset-0 z-50 overflow-y-auto" >
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        >
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div class="inline-block overflow-hidden text-center align-bottom transition-all transform bg-white shadow-xl rounded-3xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        >
                            <div class="relative flex flex-col items-center justify-between pb-5 md:pb-10">
                                <div class="w-full py-3 text-lg text-center text-gray-500 shadow-md rounded-t-3xl">
                                    Se connecter
                                    <a class="absolute ml-auto cursor-pointer right-3 top-3" wire:click.prevent="closeAuthModal">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </div>
                                <div class="flex flex-col items-center">
                                    <img src="/images/logo.png" alt="Logo" class="w-auto h-24">
                                    <div>
                                        Bienvenue sur Daymond distribution
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Ici c'est vous qui gagnez
                                    </div>
                                </div>
                                @if($login_step == 0)
                                    <form >
                                        {{-- Login --}}
                                        <div class="relative flex mt-10 mb-3 bg-white border-2 rounded-full border-primary">
                                            <div class="p-2 text-2xl rounded-full bg-primary flex-center-center">
                                                <i class="fas fa-phone-alt"></i>
                                                <span class="ml-1 text-xl text-white">225</span>
                                            </div>
                                            <input type="tel" placeholder="0102030405" class="border-none " wire:model.lazy="whatsapp_number">
                                            <div class="p-2 text-2xl">
                                                <i class="fab fa-whatsapp"></i>
                                            </div>
                                        </div>
                                        <div>
                                            @error('whatsapp_number')
                                                <div class="text-sm font-semibold text-red-500">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <button wire:click.prevent="tryLogin"  class="px-4 py-2 my-5 text-center rounded-md bg-primary">
                                            Se connecter
                                            <div wire:loading>
                                                ...
                                            </div>
                                        </button>
                                    </form>
                                @endif
                                @if($login_step == 1)
                                    <form>
                                        {{-- Verification Code --}}
                                        <div class="text-center">
                                            Saisissez le code de vérification que vous avez reçu au {{$whatsapp_number}}
                                        </div>
                                        <div class="text-center">
                                            <a wire:click="loginBack" class="text-blue-500 hover:underline">
                                                Modifier le numéro
                                            </a>
                                        </div>
                                        <!-- Code -->
                                        <div class="form-chunk">
                                            <input type="text" placeholder="Code de vérification" wire:model.lazy="verification_code" class="my-10 text-gray-600 bg-white border-2 rounded-full border-primary" wire:model.lazy="whatsapp_number">
                                            @error('verification_code')
                                                <div class="text-sm font-semibold text-red-500">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>


                                        @if($can_resend_code == true)
                                            <div class="text-center">
                                                <a wire:click.prevent="resendCode"  wire:loading.remove class="mb-5 text-xs text-center text-blue-600 cursor-pointer hover:underline">Renvoyer le code</a>
                                                <a wire:loading wire:target="resendCode" class="mb-5 text-xs text-center text-blue-600 cursor-pointer hover:underline">Chargement...</a>
                                            </div>
                                        @endif
                                        <button wire:click.prevent="verifyCode" wire:loading.remove class="px-4 py-2 mt-2 mb-5 text-center rounded-full bg-primary">
                                            Vérifier
                                        </button>
                                        <button wire:loading wire:target="verifyCode" wire:target="verifyCode" class="px-4 py-2 mt-2 mb-5 text-center rounded-full bg-primary">
                                            Chargement...
                                        </button>
                                    </form>
                                @endif
                                <a wire:click.prevent="displayRegister" class="mb-5 text-xs text-blue-600 cursor-pointer hover:underline">Inscrivez-vous maintenant !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($displayRegister == true)
            <div >
                <div class="fixed inset-0 z-50 overflow-y-auto" >
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    >
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div class="inline-block overflow-hidden text-center align-bottom transition-all transform bg-white shadow-xl rounded-3xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        >
                            <div class="relative flex flex-col items-center justify-between pb-5 md:pb-10">
                                <div class="w-full py-3 text-lg text-center text-gray-500 shadow-md rounded-t-3xl">
                                    Créer un compte
                                    <a class="absolute ml-auto cursor-pointer right-3 top-3" wire:click.prevent="closeAuthModal">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </div>
                                <div class="flex flex-col items-center">
                                    <img src="/images/logo.png" alt="Logo" class="w-auto h-24">
                                    <div class="mx-5 mb-5 text-sm text-gray-500">
                                        {{$text_indication}}
                                    </div>
                                </div>
                                @if($register_step == 0)
                                    <form  class="mb-5 md:mx-10" >
                                        {{-- Register Form --}}
                                        <!-- Nom prénom -->
                                        <div class="flex px-5 form-chunk">
                                            <input type="text" placeholder="Nom et prénom" wire:model.lazy="name" class="w-full mx-5 mb-5 text-gray-600 bg-white border-2 rounded-full border-primary">
                                            @error('name')
                                                <div class="text-sm font-semibold text-red-500">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- Profession -->
                                        <div class="flex px-5 form-chunk">
                                            <input type="text" placeholder="Profession" wire:model.lazy="profession" class="w-full mx-5 mb-5 text-gray-600 bg-white border-2 rounded-full border-primary">
                                            @error('profession')
                                                <div class="text-sm font-semibold text-red-500">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- Phone Number -->
                                        <div class="flex px-5 form-chunk">
                                            <div class="relative flex w-full mx-5 mb-5 bg-white border-2 rounded-full border-primary">
                                                <div class="p-2 text-2xl rounded-full bg-primary flex-center-center pr-5">
                                                    <i class="fas fa-phone-alt"></i>
                                                    {{-- <span class="ml-1 text-xl text-white">225</span> --}}

                                                </div>
                                                <input type="tel" placeholder="NUMERO WHATSAPP" class="w-full border-none " wire:model.lazy="whatsapp_number">
                                                <div class="p-2 ml-auto text-2xl">
                                                    <i class="fab fa-whatsapp"></i>
                                                </div>
                                            </div>
                                            <div>
                                                @error('whatsapp_number')
                                                    <div class="text-sm font-semibold text-red-500">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Coutry City -->
                                        <div class="flex px-5 form-chunk">
                                            <div class="relative flex mx-5 mb-5 bg-white border-2 rounded-full border-primary">
                                                <div class="md:w-6/12">
                                                    <input type="text" placeholder="Ville" class="border-none rounded-full " wire:model.lazy="city">

                                                    <div>
                                                        @error('city')
                                                            <div class="text-sm font-semibold text-red-500">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mt-2 md:w-6/12 md:mt-0">
                                                    {{-- <input type="text" placeholder="PAYS" class="border-none rounded-full " wire:model.lazy="country"> --}}
                                                    <select wire:model="country" class="rounded-full w-52 border-none">
                                                        @foreach ($pays as $p)
                                                            <option class="bg-white text-black rounded" value="{{$p->id}}">{{$p->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div>
                                                        @error('country')
                                                            <div class="text-sm font-semibold text-red-500">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <button wire:click.prevent="registerInfo" wire:loading.remove class="px-4 py-2 mt-2 mb-3 text-center rounded-full bg-primary">
                                            Suivant
                                        </button>
                                        <button wire:loading wire:target="tryLogin" wire:target="registerInfo" class="px-4 py-2 mt-2 mb-3 text-center rounded-full bg-primary">
                                            Chargement...
                                        </button>
                                    </form>
                                @endif
                                @if($register_step == 1)
                                    <form>
                                        {{-- Verification Code --}}
                                        <div class="text-center">
                                            Saisissez le code de vérification que vous avez reçu
                                        </div>

                                        <!-- Code -->
                                        <div class="form-chunk">
                                            <input type="text" placeholder="Code de vérification" wire:model.lazy="verification_code" class="my-10 text-gray-600 bg-white border-2 rounded-full border-primary" wire:model.lazy="whatsapp_number">
                                            @error('verification_code')
                                                <div class="text-sm font-semibold text-red-500">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <a wire:click="registerBack" class="text-blue-500 hover:underline">
                                                Modifier mes informations
                                            </a>
                                        </div>

                                        @if($can_resend_code == true)
                                            <div class="text-center">
                                                <a wire:click.prevent="resendCode" wire:loading.remove class="mb-5 text-xs text-center text-blue-600 cursor-pointer hover:underline">Renvoyer le code</a>
                                                <a wire:loading wire:target="resendCode" class="mb-5 text-xs text-center text-blue-600 cursor-pointer hover:underline">Chargement...</a>
                                            </div>
                                        @endif
                                        <button wire:click.prevent="verifyCode" wire:loading.remove class="px-4 py-2 mt-2 mb-5 text-center rounded-full bg-primary">
                                            Vérifier
                                        </button>
                                        <button  wire:loading wire:target="verifyCode" class="px-4 py-2 mt-2 mb-5 text-center rounded-full bg-primary">
                                            Chargement...
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <div class="flex-center-center">
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="h-5 w-5 mx-1 border-2 rounded-full @if($i == $register_step) bg-black @endif border-black"></div>
                                @endfor
                            </div>

                            <a wire:click.prevent="displayLogin" class="block mb-3 text-xs text-blue-600 cursor-pointer hover:underline">Vous avez un compte ? Connectez-vous ici</a>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
