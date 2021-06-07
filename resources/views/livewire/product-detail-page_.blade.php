
<section>
    <div class="pt-10">
        <nav class="w-full border-t border-b border-color bg-white">
            <div class="width flex-between-center" x-data="{ tooltip: false }">
                <a href="" class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl ">
                    <i class="fas fa-chevron-left"></i>
                    Details
                </a>
                <a href=""  class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl ">
                    <i class="fas fa-file-download"></i>
                </a>
                <a id="copyToClipboardButton" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl ">
                    <div class="relative" x-cloak x-show.transition.origin.top="tooltip" id="copyTooltip">
                        <div id="copyTooltipContent" class="absolute top-0 left-1/2 z-10 w-32 p-2 -mt-1 text-sm leading-tight bg-white transform -translate-x-1/2 -translate-y-full bg-orange-500 rounded-lg shadow-lg">
                            Copier infos produits
                        </div>
                    </div>
                    <i class="far fa-copy"></i>
                </a>
                <a href=""  class="block hover-bg p-3 my-1.5 w-full rounded-md text-center text-2xl ">
                    <i class="far fa-shopping-cart"></i>
                </a>
            </div>
        </nav>
        <div class="bg-white">
            <div class="width md:grid grid-cols-12">
                <div class="col-span-12 sm:col-span-5 border-l border-color">
                    <div class="h-56 border-b border-color">
                        <img src="{{$produit->medias->first()->src ?? '/img/bg/img_mountains_wide.jpg'}}" alt="" class="h-56 w-auto object-contain">
                    </div>
                    <div class="flex">
                        @foreach($produit->medias as $media)
                            <div>
                                <img src="{{$media->src ?? '/img/bg/lights.jpg'}}" alt="" class="w-full h-auto" >
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-7 border-l border-r">
                    <div class="flex-between-center mt-1 pr-3">
                        <span class="bg-primary p-0.5 pl-1 py-0.5 pr-3 rounded-r-full uppercase font-semibold">
                            {{$produit->etat->nom}}
                        </span>
                        <span>
                            {{$produit->localisation->nom}}
                        </span>
                    </div>
                    <div class="p-5">
                        <div class="text-gray-500 text-2xl font-semibold">
                            {{$produit->nom ?? "DELL OptiPlex 3060"}}
                        </div>
                        <div class="text-sm">
                            {{$produit->sous_titre ?? " elit. Ab, facilis porro! Excepturoluptatem! Quia?"}}
                        </div>
                    </div>
                    <div class="py-2 px-5 bg-gray-100 uppercase w-full relative text-sm">
                        Caractéristiques principales
                    </div>
                    <div class="py-3 px-5">
                        {{$produit->description ?? "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, facilis porro! Excepturi, quas voluptatem! Quia?"}}
                        {{-- <ul class="px-5 list-disc">
                            @for ($i = 0; $i < 3; $i++)
                                <li class="text-sm">
                                    Lorem ipsum dolor sit, amet consectetur
                                </li>
                            @endfor
                        </ul> --}}
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
                    <div class="border-b flex-between-center p-5">
                        <span class="">
                            Prix grossiste:
                        </span>
                        <span class="text-primary">450.000 FCFA</span>
                        <span class="line-through text-gray-400">510.000</span>
                    </div>
                    <div class="border-b flex-between-center p-5">
                        <span class="">
                            Commission:
                        </span>
                        <span class="text-primary">450.000 FCFA</span>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-7 border-l border-r">
                    <div class="border-b flex-between-center p-5">
                        <span class="">
                            Prix suggestions:
                        </span>

                            de <span class="text-primary"> {{$produit->prix_suggestion1}} </span>
                            à <span class=""> {{$produit->prix_suggestion2}} </span>

                    </div>
                    <div class="border-b flex-between-center p-5">
                        <span class="">
                            Livraison:
                        </span>
                        <div>
                            {{$produit->livraison->lieu ?? 'Abidjan'}}
                            <span class="text-primary">
                                {{$produit->livraison->lieu ?? '1500 FCFA'}}
                            </span>
                        </div>
                        --
                        <div>
                            Hors d'Abidjan <span class="text-primary"> 3500 FCFA </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Order Buttons-->
    <div class="">
        <div class="bg-gray-100 py-3">
            <div class="width md:grid grid-cols-12">
                <div class="col-span-12 sm:col-span-5 flex-between-center">
                    <a href="https://api.whatsapp.com/send/?phone=+22574936826&text=Hi+there%2C+hello" class="text-4xl mx-auto px-5">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-7">
                    <div class="flex justify-center items-center">
                        <a href="/" class="border transition-ease border-white uppercase rounded-md bg-gradient-to-r from-yellow-400 to-red-500 text-white font-semibold py-2 px-3 hover:shadow-md hover:to-yellow-400">
                            Je passe la commande
                        </a>
                        <a href="" class="ml-3 flex-between-center p-3 bg-white rounded-md shadow text-gray-500 hover-bg">
                            <i class="fas fa-cart-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Similar products-->
    <x-products.section :title="'Produits Similaires'" :class="'bg-gray'" :titleClass="'bg-white py-3 font-semibold'">
        @forelse ($similar_products as $produit)
            <x-products.card :product="$produit" :key="$produit->id.time()"/>
        @empty
            <x-empty />
        @endforelse
    </x-products.section>

</section>

@section('scripts')
<script>
    $("#copyToClipboardButton").click(function(){
        copyToClipBoard(`{{$produit->copy}}`);
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
