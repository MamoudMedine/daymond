@section('title', 'Contact')

<div>
    <div class="my-3"></div>
    <x-produits.section :title="'Contacter DAYMOND'">
    </x-produits.section>
    <main class="width">
        <div class=" flex-between-center">
            <a href="tel:{{env('WHATSAPP')}}"  class="block bg-white hover-bg p-3 mx-2 my-1.5 w-full rounded-md text-center text-2xl" <x-tooltips.trigger/>>
                <x-tooltips.tooltip id="addToHistory">
                    Appelez
                </x-tooltips.tooltip>
                <i class="fas fa-phone"></i>
            </a>
            <a href="{{env('WHATSAPP_LINK')}}"  class="block bg-white hover-bg p-3 mx-2 my-1.5 w-full rounded-md text-center text-2xl" <x-tooltips.trigger/>>
                <x-tooltips.tooltip id="addToHistory">
                    Whatsapp
                </x-tooltips.tooltip>
                <i class="fab fa-whatsapp"></i>
            </a>
            <a wire:click="showContactForm" class="block bg-white hover-bg p-3 mx-2 my-1.5 w-full rounded-md text-center text-2xl" <x-tooltips.trigger/>>
                <x-tooltips.tooltip >
                    Mail
                </x-tooltips.tooltip>
                <i class="far fa-envelope"></i>
            </a>
        </div>
        <div class="mt-5">
            @if ($showContactForm)
                <livewire:contact-form />
            @endif
        </div>
    </main>
    <div class="my-96"></div>
    <div class="my-24"></div>
</div>
