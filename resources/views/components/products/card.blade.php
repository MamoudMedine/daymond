@if(isset($product))
    <a href="/products/{{$product->id}}" class="block ">
        <div class="relative hover:shadow-md cursor-pointer rounded border border-gray-300 bg-white py-3 px-2">
            @if ($product->condition)
                <span class="absolute top-0 left-2 bg-primary z-30 p-1 font-semibold text-xs uppercase">
                    {{$product->condition ?? 'Importé'}}
                </span>
            @endif
            <div class="relative">
                <img src="{{$product->cover_url ?? '/img/bg/img_snow.jpg'}}" alt="" class="object-cover">
                @if ($product->is_sold)
                    <span class="w-full py-2 text-red-500 bg-white bg-opacity-90 absolute top-1/2 transform -translate-y-1/2 text-center font-bold ">
                        Vendu
                    </span>
                @endif
                @if ($product->is_unavailable)
                    <span class="w-full h-1/2 py-2 bg-gradient-to-t from-blue-500 to-transparent bg-opacity-90 absolute bottom-0 text-center font-semibold flex flex-col justify-end text-sm uppercase text-white">
                        Indisponible
                    </span>
                @endif
                @if ($product->is_soldout)
                    <span class="w-full h-1/2 py-2 bg-gradient-to-t from-red-500 to-transparent bg-opacity-90 absolute bottom-0 text-center font-semibold flex flex-col justify-end text-sm uppercase text-white">
                        Stock épuisé
                    </span>
                @endif
            </div>
            <div>
                <div class="text-sm pt-1 pb-3">
                    {{$product->title ?? "Ordinateur portable HP FOLIO"}}
                </div>
                <div class="flex flex-wrap sm:flex-nowrap justify-between items-center text-xs md:text-md 2xl:text-xs">
                    <span class="text-blue-700">
                        {{($product->price ?? "149 000"). ' FCFA'}}
                    </span>
                    <span class="text-blue-700">
                        -
                    </span>
                    <span>
                        (180 000)
                    </span>
                </div>
            </div>
        </div>
    </a>
@else
    <div class="relative rounded border border-gray-300 bg-white py-3 px-2">
        <x-empty :message="'Produit Introuvable'"/>
    </div>
@endif
@if(isset($product))
    <a href="/products/{{$product->id}}" class="block ">
        <div class="relative hover:shadow-md cursor-pointer rounded border border-gray-300 bg-white py-3 px-2">
            @if ($product->condition)
                <span class="absolute top-0 left-2 bg-primary z-30 p-1 font-semibold text-xs uppercase">
                    {{$product->condition ?? 'Importé'}}
                </span>
            @endif
            <div class="relative">
                <img src="{{$product->cover_url ?? '/img/bg/img_snow.jpg'}}" alt="" class="object-cover">
                @if ($product->is_sold)
                    <span class="w-full py-2 text-red-500 bg-white bg-opacity-90 absolute top-1/2 transform -translate-y-1/2 text-center font-bold ">
                        Vendu
                    </span>
                @endif
                @if ($product->is_unavailable)
                    <span class="w-full h-1/2 py-2 bg-gradient-to-t from-blue-500 to-transparent bg-opacity-90 absolute bottom-0 text-center font-semibold flex flex-col justify-end text-sm uppercase text-white">
                        Indisponible
                    </span>
                @endif
                @if ($product->is_soldout)
                    <span class="w-full h-1/2 py-2 bg-gradient-to-t from-red-500 to-transparent bg-opacity-90 absolute bottom-0 text-center font-semibold flex flex-col justify-end text-sm uppercase text-white">
                        Stock épuisé
                    </span>
                @endif
            </div>
            <div>
                <div class="text-sm pt-1 pb-3">
                    {{$product->title ?? "Ordinateur portable HP FOLIO"}}
                </div>
                <div class="flex flex-wrap sm:flex-nowrap justify-between items-center text-xs md:text-md 2xl:text-xs">
                    <span class="text-blue-700">
                        {{($product->price ?? "149 000"). ' FCFA'}}
                    </span>
                    <span class="text-blue-700">
                        -
                    </span>
                    <span>
                        (180 000)
                    </span>
                </div>
            </div>
        </div>
    </a>
@else
    <div class="relative rounded border border-gray-300 bg-white py-3 px-2">
        <x-empty :message="'Produit Introuvable'"/>
    </div>
@endif
