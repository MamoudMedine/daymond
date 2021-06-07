<div>
    @if($displayCommandeModal == true)
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
                                Terminer la commande
                                <a class="absolute right-3 top-3 cursor-pointer ml-auto" wire:click.prevent="closeCommandeFormModal">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>
                            </div>
                            <div class="flex flex-col items-center">
                                <img src="/images/logo.png" alt="Logo" class="h-24 w-auto">

                            </div>
                            <form wire:submit.prevent="save">

                                <div>
                                    <div class="w-12/12 flex flex-col">
                                        <label class="leading-loose">Nom client </label>
                                        <input  wire:model.lazy="client.nom" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        @error('client.nom') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-12/12 flex flex-col">
                                        <label class="leading-loose">Contact client </label>
                                        <input  wire:model.lazy="client.contact" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        @error('client.contact') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-12/12 flex flex-col">
                                        <label class="leading-loose">Localisation client </label>
                                        <input  wire:model.lazy="client.localisation" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        @error('client.localisation') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-12/12 flex flex-col">
                                        <label class="leading-loose">Prix vente </label>
                                        <input  wire:model.lazy="client.prix_vente" type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        @error('client.prix_vente') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-12/12 flex flex-col">
                                        <label class="leading-loose">Date livraison </label>
                                        <input  wire:model.lazy="client.date_livraison" type="date" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        @error('client.date_livraison') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-12/12 flex flex-col">
                                        <label class="leading-loose">Details </label>
                                        <textarea wire:model.lazy="client.details" rows="4" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">

                                        </textarea>
                                        @error('client.details') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <button class="rounded-full bg-primary py-2 text-center px-4 mt-2 mb-5">
                                    Terminer la commande
                                    <div  wire:loading wire:target="save">
                                        ...
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
