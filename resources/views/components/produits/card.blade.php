{{--{{dd($produit)}}--}}
@if(isset($produit))
    <a href="/products/{{$produit->id}}" class="block ">
        <div class="relative px-2 py-3 bg-white border border-gray-300 rounded cursor-pointer hover:shadow-md">
            @if ($produit->transaction)
                <span class="absolute top-0 z-10 p-1 text-xs font-semibold uppercase left-2 bg-primary">
                    {{$produit->transaction->nom}}
                </span>
            @endif
            {{-- <button class="">
                <span class="absolute top-0 right-0 z-30 w-10 h-10 p-1 text-lg font-semibold uppercase cursor-pointer bg-primary hover:bg-yellow-200 flex-center-center addProductToCartBtn" data-prodId="{{$produit->id}}">
                    <i class="far fa-cart-plus"></i>
                </span>
            </button> --}}
            <div class="relative">
                @if ($produit->media)
                    @foreach($produit->media as $media)
                        @if($loop->index==0)
                            <img src="{{$media->src}}" alt="" class="object-cover w-full max-h-52">
                        @endif
                    @endforeach
                @endif
                @if ($produit->is_sold)
                    <span class="absolute w-full py-2 font-bold text-center text-red-500 transform -translate-y-1/2 bg-white bg-opacity-90 top-1/2 ">
                        Vendu
                    </span>
                @endif
                @if ($produit->is_unavailable)
                    <span class="absolute bottom-0 flex flex-col justify-end w-full py-2 text-sm font-semibold text-center text-white uppercase h-1/2 bg-gradient-to-t from-blue-500 to-transparent bg-opacity-90">
                        Indisponible
                    </span>
                @endif
                @if ($produit->is_soldout)
                    <span class="absolute bottom-0 flex flex-col justify-end w-full py-2 text-sm font-semibold text-center text-white uppercase h-1/2 bg-gradient-to-t from-red-500 to-transparent bg-opacity-90">
                        Stock épuisé
                    </span>
                @endif
            </div>
            <div>
                <div class="pt-1 pb-3 text-sm">
                    {{$produit->nom ?? "Ordinateur portable HP FOLIO"}}
                </div>
                <div class="flex flex-wrap items-center justify-between text-xs sm:flex-nowrap md:text-md 2xl:text-xs">
                    <span class="text-blue-700">
                        {{($produit->prix_reduction ?? ""). ' FCFA'}}
                    </span>
                    <span class="text-blue-700">
                        -
                    </span>
                    <span>
                        ({{$produit->prix}} FCFA)
                    </span>
                </div>
            </div>
        </div>
    </a>
@else
    <div class="relative px-2 py-3 bg-white border border-gray-300 rounded">
        <x-empty :message="'Produit Introuvable'"/>
    </div>
@endif
