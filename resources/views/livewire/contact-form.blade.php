<div>
    @if ($message_sent)
        <div class="px-2">
            <div class="bg-green-200 w-full rounded p-10 text-center">
                <div class="text-2xl text-green-600 font-semibold">
                    Mail Envoyé
                </div>
                <div class="text-lg text-green-500 font-medium">
                    Nous avons reçu votre message, nous vous reviendrons sous peu
                </div>
            </div>
        </div>
    @else
        <form wire:submit.prevent="save">
            <div class="flex items-center space-x-5">
                <div class="w-full divide-y divide-gray-200 px-10 bg-gray-50 rounded pb-5">
                <div class="w-full py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                    <div class="gap-3 sm:grid sm:grid-cols-2 md:grid-cols-4 w-full">
                        <div class=" flex flex-col">
                            <label class="leading-loose">Nom </label>
                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Nom" wire:model="contact.nom">
                            @error('contact.nom') <span class="error text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class=" flex flex-col">
                            <label class="leading-loose">Email</label>
                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Adresse email" wire:model="contact.email">
                            @error('contact.email') <span class="error text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class=" flex flex-col">
                            <label class="leading-loose">Contact</label>
                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="+22501010101" wire:model="contact.contact">
                            @error('contact.contact') <span class="error text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class=" flex flex-col">
                            <label class="leading-loose">Objet</label>
                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Objet du mail" wire:model="contact.objet">
                            @error('contact.objet') <span class="error text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose">Message</label>
                        <textarea rows="3" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Message" wire:model="contact.contenu"></textarea>
                        @error('contact.contenu') <span class="error text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="pt-4 flex items-center space-x-4">
                    <a  class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                        {{-- <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Annuler --}}
                    </a>
                    <button wire.loading.atrr="disabled" class="bg-primary flex justify-center items-center w-full text-black font-semibold px-4 py-3 rounded-md focus:outline-none" type="submit">
                        Envoyer
                        <div wire.loading wire.target="save">...</div>
                    </button>
                </div>
            </div>
        </form>
    @endif
</div>
