
<section>
    <div class="pt-10">
        <nav class="w-full border-t border-b border-color bg-white">
            <div class="width flex-between-center" >
                <a href="" class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl ">
                    <i class="fas fa-chevron-left"></i>
                    Details
                </a>
                <a href="/products/{{$produit->id}}/download"  class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl" <x-tooltips.trigger/>>
                    <x-tooltips.tooltip>
                        Télécharger images produit
                    </x-tooltips.tooltip>
                    <i class="fas fa-file-download"></i>
                </a>
                <a id="copyToClipboardButton"  class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl" <x-tooltips.trigger/>>
                    <x-tooltips.tooltip id="copyTooltipContent">
                        Copier information produit
                    </x-tooltips.tooltip>
                    <i class="far fa-copy"></i>
                </a>
                <a wire:click="toggleAddToHistory({{$produit->id}})"  class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl" <x-tooltips.trigger/>>
                    <x-tooltips.tooltip id="addToHistory">
                        {{$produit->isInHistorique ? 'Retirer de ' : "Ajouter à " }} l'historique
                    </x-tooltips.tooltip>
                    <i class="fas fa-history {{$produit->isInHistorique ? 'text-primary' : '' }}"></i>
                </a>
                @if ($produit->can_order)
                    <a  wire:click="addToCart({{ $produit->id }})" class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl cursor-pointer" <x-tooltips.trigger/>>
                        <x-tooltips.tooltip>
                            Ajouter au panier
                        </x-tooltips.tooltip>
                        <i class="far fa-shopping-cart"></i>
                    </a>
                @endif
            </div>
        </nav>
        @if ($produit->is_unavailable)
            <div class="bg-primary py-3 text-center">
                Produit Indisponible
            </div>
        @endif
        <div class="bg-white">
            <div class="width md:grid grid-cols-12">
                <livewire:product-images :prodId="$produit->id" />
                <div class="col-span-12 sm:col-span-7 border-l border-r">
                    <div class="flex-between-center mt-1 pr-3">
                        <span class="bg-primary p-0.5 pl-1 py-0.5 pr-3 rounded-r-full uppercase font-semibold">
                            {{$produit->transaction->nom}}
                        </span>
                        <span>
                            @if($produit->localisation)
                            {{$produit->localisation->nom}}
                            @endif
                        </span>
                    </div>
                    <div class="p-5">
                        <div class="text-gray-500 text-2xl font-semibold">
                            {{$produit->nom}}
                        </div>
                        <div class="text-sm">
                            {{$produit->sous_titre }}
                        </div>
                    </div>
                    <div class="py-2 px-5 bg-gray-100 uppercase w-full relative text-sm">
                        Caractéristiques principales
                    </div>
                    <div class="py-3 px-5">
                        <p class="px-5 list-disc">
                            {{$produit->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Prices Details-->
    <div class="pt-5">
        <div class="bg-white">
            <div class="width md:grid grid-cols-12">
                <div class="col-span-12 sm:col-span-5 border-l border-color uppercase ">
                    @if($produit->prix)
                        <div class="border-b flex-between-center p-5">
                            <span class="">
                                Prix grossiste:
                            </span>
                            <span class="text-primary">{{$produit->prix_reduction}} FCFA</span>
                            <span class="line-through text-gray-400">{{$produit->prix}} FCFA</span>
                        </div>
                    @endif
                    @if($produit->commission)
                        <div class="border-b flex-between-center p-5">
                            <span class="">
                                Commission:
                            </span>
                            <span class="text-primary">{{$produit->commission}} FCFA</span>
                        </div>
                    @endif
                </div>
                <div class="col-span-12 sm:col-span-7 border-l border-r">
                    @if($produit->prix_suggestion1 && $produit->prix_suggestion2)
                        <div class="border-b flex-between-center p-5">
                            <span class="">
                                Suggestion prix vente:
                            </span>
                            de <span class="text-primary"> {{$produit->prix_suggestion1}} CFA </span>
                            à <span class=""> {{$produit->prix_suggestion2}} FCFA </span>
                        </div>
                    @endif
                    @if($produit->livraison_abidjan || $produit->livraison_hors_abidjan)
                        <div class="border-b flex-between-center p-5">
                            <span class="">
                                Livraison:
                            </span>
                            @if($produit->livraison_abidjan)
                                <div>
                                    Abidjan <span class="text-primary"> 1500 FCFA </span>
                                </div>
                            @endif
                            --
                            @if($produit->livraison_hors_abidjan)
                                <div>
                                    Hors d'Abidjan <span class="text-primary"> 3500 FCFA </span>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Order Buttons-->
    <div class="">
        <div class="bg-gray-100 py-3">
            <div class="width md:grid grid-cols-12">
                <div class="col-span-12 sm:col-span-5 flex-between-center">
                    @if ($produit->can_order)
                        <a href="https://api.whatsapp.com/send/?phone={{env('WHATSAPP') ?? '+22574936826'}}&text=Hi+there%2C+hello" class="text-4xl mx-auto px-5">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    @endif
                </div>
                <div class="col-span-12 sm:col-span-7">
                    <div class="flex justify-center items-center">
                        @if ($produit->can_order)
                            <a href="/myorders" class="btn-gradient">
                                Je passe la commande
                            </a>
                        @endif
                        @if ($produit->can_order)
                            <a wire:click="addToCart({{ $produit->id }})" class="ml-3 flex-between-center p-3 bg-white rounded-md shadow text-gray-500 hover-bg"><i class="ml-2 fas fa-cart-plus"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Similar produits-->
    <x-produits.section :title="'Produits Similaires'" :class="'bg-gray'" :titleClass="'bg-white py-3 font-semibold'">
        @forelse ($produits_similaires as $produit_similaire)
            <x-produits.card :produit="$produit_similaire" :key="$produit_similaire->id.time()"/>
        @empty
            <x-empty />
        @endforelse
    </x-produits.section>

</section>


<x-lightbox :images="$produit->media"/>


@section('scripts')
<script>
    $("#copyToClipboardButton").click(function(){
        copyToClipBoard(`{{$produit->copy}}`);
        Livewire.emit('productCopied', '{{$produit->id}}');
    });

    function copyToClipBoard(txt) {
        try {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(txt).select();
            var retVal = document.execCommand("copy");
            var tooltip = document.getElementById("copyTooltipContent");
            tooltip.innerHTML = "Produit copié";
            console.log('Copied Product: ' + retVal);
            console.log(txt);
            $temp.remove();
            setInterval(() => {
                tooltip.innerHTML = "Copier infos produit";
            }, 10000);

        } catch (err) {
            console.log('Could not copy Product: ' + err);
        }
    }
</script>

@endsection
