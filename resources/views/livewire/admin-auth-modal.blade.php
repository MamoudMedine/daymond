<div>
    @if($displayAuth == true)
        @if($displayLogin == true)
            <div >
                <div class="fixed z-50 inset-0 overflow-y-auto" >
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    >
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-90"></div>
                        </div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div class="inline-block align-bottom bg-white rounded-3xl text-center overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        >
                            <div class="flex relative flex-col pb-5 md:pb-10 justify-between items-center">
                                <div class="py-3 w-full rounded-t-3xl shadow-md text-center text-gray-500 text-lg">
                                    Se connecter
                                    <a class="absolute right-3 top-3 cursor-pointer ml-auto" wire:click.prevent="closeAdminAuthModal">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </div>
                                <div class="flex flex-col items-center">
                                    <img src="/images/logo.png" alt="Logo" class="h-24 w-auto">
                                    <div>
                                        Espace Administrateur Daymond
                                    </div>
                                </div>
                                @if($login_step == 0)
                                    <form >
                                        {{-- Login --}}
                                        <div class="rounded-full mt-10 mb-3 border-2 border-primary bg-white relative flex">
                                            <div class="rounded-full bg-primary p-2 text-2xl flex-center-center">
                                                <i class="fas fa-phone-alt"></i>
                                                <span class="text-white ml-1 text-xl">225</span>
                                            </div>
                                            <input type="tel" placeholder="0102030405" class="border-none " wire:model.lazy="whatsapp_number">
                                            <div class="p-2 text-2xl">
                                                <i class="fab fa-whatsapp"></i>
                                            </div>
                                        </div>
                                        <div>
                                            @error('whatsapp_number')
                                                <div class="text-red-500 font-semibold text-sm">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <button wire:click.prevent="tryLogin" wire:loading.remove class="rounded-md bg-primary py-2 text-center px-4 my-5">
                                            Se connecter
                                        </button>
                                        <button wire:loading wire:target="tryLogin" wire:target="tryLogin" class="rounded-md bg-primary py-2 text-center px-4 my-5">
                                            Chargement...
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
                                            <input type="text" placeholder="Code de vérification" wire:model.lazy="verification_code" class="rounded-full my-10 border-2 border-primary bg-white text-gray-600" wire:model.lazy="whatsapp_number">
                                            @error('verification_code')
                                                <div class="text-red-500 font-semibold text-sm">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>


                                        @if($can_resend_code == true)
                                            <div class="text-center">
                                                <a wire:click.prevent="resendCode"  wire:loading.remove class="text-center text-xs cursor-pointer text-blue-600 hover:underline mb-5">Renvoyer le code</a>
                                                <a wire:loading wire:target="resendCode" class="text-center text-xs cursor-pointer text-blue-600 hover:underline mb-5">Chargement...</a>
                                            </div>
                                        @endif
                                        <button wire:click.prevent="verifyCode" wire:loading.remove class="rounded-full bg-primary py-2 text-center px-4 mt-2 mb-5">
                                            Vérifier
                                        </button>
                                        <button wire:loading wire:target="verifyCode" wire:target="verifyCode" class="rounded-full bg-primary py-2 text-center px-4 mt-2 mb-5">
                                            Chargement...
                                        </button>
                                    </form>
                                @endif

                                {{-- <a wire:click.prevent="displayRegister" class="text-xs text-blue-600 hover:underline mb-5 cursor-pointer">Inscrivez-vous maintenant !</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($displayRegister == true)
            <div >
                <div class="fixed z-50 inset-0 overflow-y-auto" >
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
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

                        <div class="inline-block align-bottom bg-white rounded-3xl text-center overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        >
                            <div class="flex relative flex-col pb-5 md:pb-10 justify-between items-center">
                                <div class="py-3 w-full rounded-t-3xl shadow-md text-center text-gray-500 text-lg">
                                    Créer un compte
                                    <a class="absolute right-3 top-3 cursor-pointer ml-auto" wire:click.prevent="closeAuthModal">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </div>
                                <div class="flex flex-col items-center">
                                    <img src="/images/logo.png" alt="Logo" class="h-24 w-auto">
                                    <div class="text-sm mb-5 text-gray-500 mx-5">
                                        {{$text_indication}}
                                    </div>
                                </div>
                                @if($register_step == 0)
                                    <form  class="md:mx-10 mb-5" >
                                        {{-- Register Form --}}
                                        <!-- Nom prénom -->
                                        <div class="form-chunk flex px-5">
                                            <input type="text" placeholder="Nom et prénom" wire:model.lazy="name" class="w-full mx-5 rounded-full mb-5 border-2 border-primary bg-white text-gray-600">
                                            @error('name')
                                                <div class="text-red-500 font-semibold text-sm">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- Profession -->
                                        <div class="form-chunk flex px-5">
                                            <input type="text" placeholder="Profession" wire:model.lazy="profession" class="w-full mx-5 rounded-full mb-5  border-2 border-primary bg-white text-gray-600">
                                            @error('profession')
                                                <div class="text-red-500 font-semibold text-sm">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- Phone Number -->
                                        <div class="form-chunk flex px-5">
                                            <div class="rounded-full w-full mb-5 mx-5 border-2 border-primary bg-white relative flex">
                                                <div class="rounded-full bg-primary p-2 text-2xl flex-center-center">
                                                    <i class="fas fa-phone-alt"></i>
                                                    <span class="text-white ml-1 text-xl">225</span>
                                                </div>
                                                <input type="tel" placeholder="NUMERO WHATSAPP" class="w-full border-none " wire:model.lazy="whatsapp_number">
                                                <div class="p-2 text-2xl ml-auto">
                                                    <i class="fab fa-whatsapp"></i>
                                                </div>
                                            </div>
                                            <div>
                                                @error('whatsapp_number')
                                                    <div class="text-red-500 font-semibold text-sm">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Coutry City -->
                                        <div class="form-chunk flex px-5">
                                            <div class="rounded-full mb-5 mx-5 border-2 border-primary bg-white relative flex">
                                                <div class="md:w-6/12">
                                                    <input type="text" placeholder="Ville" class="rounded-full border-none " wire:model.lazy="city">
                                                    <div>
                                                        @error('city')
                                                            <div class="text-red-500 font-semibold text-sm">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="md:w-6/12 mt-2 md:mt-0">
                                                    <input type="text" placeholder="PAYS" class="rounded-full border-none " wire:model.lazy="country">
                                                    <div>
                                                        @error('country')
                                                            <div class="text-red-500 font-semibold text-sm">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <button wire:click.prevent="registerInfo" wire:loading.remove class="rounded-full bg-primary py-2 text-center px-4 mt-2 mb-3">
                                            Suivant
                                        </button>
                                        <button wire:loading wire:target="tryLogin" wire:target="registerInfo" class="rounded-full bg-primary py-2 text-center px-4 mt-2 mb-3">
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
                                            <input type="text" placeholder="Code de vérification" wire:model.lazy="verification_code" class="rounded-full my-10 border-2 border-primary bg-white text-gray-600" wire:model.lazy="whatsapp_number">
                                            @error('verification_code')
                                                <div class="text-red-500 font-semibold text-sm">
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
                                                <a wire:click.prevent="resendCode" wire:loading.remove class="text-center text-xs cursor-pointer text-blue-600 hover:underline mb-5">Renvoyer le code</a>
                                                <a wire:loading wire:target="resendCode" class="text-center text-xs cursor-pointer text-blue-600 hover:underline mb-5">Chargement...</a>
                                            </div>
                                        @endif
                                        <button wire:click.prevent="verifyCode" wire:loading.remove class="rounded-full bg-primary py-2 text-center px-4 mt-2 mb-5">
                                            Vérifier
                                        </button>
                                        <button  wire:loading wire:target="verifyCode" class="rounded-full bg-primary py-2 text-center px-4 mt-2 mb-5">
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

                            <a wire:click.prevent="displayLogin" class="text-xs text-blue-600 hover:underline block mb-3 cursor-pointer">Vous avez un compte ? Connectez-vous ici</a>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
