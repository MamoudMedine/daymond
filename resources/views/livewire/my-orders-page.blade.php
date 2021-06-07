<div class="pb-96">
    <div class="py-10">
        <x-section :title="'Panier'">
            <div>
                <livewire:cart-page />
            </div>
        </x-section>
        <x-section :title="'Mes commandes'">
            @forelse ($commandes as $commande)
                <div class="flex bg-white shadow-sm mt-2 hover:bg-white cursor-pointer p-2 rounded">
                    @if ($commande->produit)
                        @if ($commande->produit->media)
                            <img src="{{$commande->produit->media->first()->src}}" alt="" class="border w-32 h-32 object-cover rounded-lg shadow">
                        @endif
                    @endif
                    <div class="pl-2 w-full flex flex-col justify-between">
                        <div class="flex-between-center">
                            <span class="text-lg font-semibold">
                                @if ($commande->produit)
                                    {{$commande->produit->nom}}
                                @endif
                            </span>
                            <span class="ml-auto text-sm">
                                {{$commande->created_at->diffForHumans()}}
                            </span>
                        </div>
                        <div class="my-1">
                            @if ($commande->client)
                                <div>
                                    {{"Client: ".$commande->client->nom}}
                                    {{$commande->client->contact}}
                                </div>
                            @endif
                            <div>
                                {{"Reference:#".$commande->id}}
                            </div>
                        </div>
                        <div class="my-1">
                            <div>
                                {{"Livraison: le ".$commande->date_livraison}}
                                @if ($commande->client)
                                    {{" à ". $commande->client->adresse}}
                                @endif
                            </div>
                        </div>
                        <div>
                            {{"Details : ". $commande->autre_details}}
                        </div>
                        <div сlass="flex justify-content-end">
                            <span class=" bg-gray-200 rounded-md px-2 py-1">
                                {{$commande->prix_vente}} XOF
                            </span>
                            <span class="ml-10 bg-{{$commande->color}}-200 text-{{$commande->color}}-600 font-semibold rounded-md px-2 py-1">
                                {{$commande->status}}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center w-full border-collapse p-6 bg-white">
                    <span class="text-lg">Aucune commande</span>
                </div>
            @endforelse
        </x-section>
        <div class="mt-4 ">
            {{ $commandes->links() }}
        </div>
    </div>
</div>
