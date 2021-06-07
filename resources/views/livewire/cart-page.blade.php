

<div>
    <div class="width">
        <div class="bg-white shadow-md rounded my-6 transition-ease">
            @if(Cart::itemsCount() > 0)
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Prix unitaire</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Quantité</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Montant</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::items() as $item)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="/products/{{$item->produit->id}}">
                                        {{ $item->produit->nom }}
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $item->produit->prix }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a wire:click="reduceFromCart({{ $item->produit->id }})" class="p-0.5 hover:text-primary font-bold py-1 px-3 rounded text-lg cursor-pointer">
                                        <i class="fas fa-minus"></i>
                                    </a>
                                    {{ $item->quantite }}
                                    <a wire:click="addToCart({{ $item->produit->id }})" class="p-0.5 hover:text-primary font-bold py-1 px-3 rounded text-lg cursor-pointer">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $item->montant }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">

                                    <a wire:click="removeFromCart({{ $item->produit->id }})" class="text-red-600 hover:text-red-300 font-bold py-1 px-3 rounded text-lg cursor-pointer">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" align="right" class="p-5">
                                Total
                                <span class="font-semibold">
                                    {{ Cart::total() }}
                                </span>
                                XOF
                            </td>
                        </tr>
                    </tbody>
                </table>


                <div class="text-right w-full p-6">
                    <button wire:click="clearCart()" class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded">
                        Vider le panier
                    </button>
                    <button wire:click="checkout()" class="bg-primary hover:bg-yellow-200 text-white font-bold py-2 px-4 rounded">
                        Passer votre commande
                    </button>
                </div>
            @else
                <div class="text-center w-full border-collapse p-6">
                    <span class="text-lg">Panier vide</span>
                </div>
            @endif
        </div>
    </div>
</div>
