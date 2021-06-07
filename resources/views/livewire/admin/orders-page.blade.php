    <div>

        <!-- component -->
        <div class="">
            <div class="overflow-x-auto">
                <div class="min-w-screen min-h-screen flex justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="w-full table-auto">
                                <thead>
                                    <div class="p-3 flex justify-between flex-wrap bg-gray-200 text-gray-600 text-sm leading-normal">
                                        {{-- <x-form.search :placeholder="'Chercher'" class="bg-gray-200 mr-10" /> --}}
                                        <div class="flex">
                                            <div class="py-3 text-center mr-3">
                                                <div class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded text-sm font-semibold">
                                                    Nouvelles : {{$count_nouvelles}}
                                                </div>
                                            </div>
                                            <div class="py-3 text-center mr-3">
                                                <div class="bg-blue-200 text-blue-600 py-1 px-3 rounded text-sm font-semibold">
                                                    En cours : {{$count_en_cours}}
                                                </div>
                                            </div>
                                            <div class="py-3 text-center mr-3">
                                                <div class="bg-green-200 text-green-600 py-1 px-3 rounded text-sm font-semibold">
                                                    Validées : {{$count_validees}}
                                                </div>
                                            </div>
                                            <div class="py-3 text-center mr-3">
                                                <div class="bg-red-200 text-red-600 py-1 px-3 rounded text-sm font-semibold">
                                                    Annulées : {{$count_annulees}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="flex-center-center">
                                                <span class="text-sm font-semibold mx-2">
                                                    Trier par Etat
                                                </span>
                                                <select wire:model="status" class="form-input">

                                                    <option value="LANCEE">Nouvelles Commandes</option>
                                                    <option value="EN_COURS">Commandes en cours</option>
                                                    <option value="VALIDEE">Commandes validées</option>
                                                    <option value="ANNULEE">Commandes annulées</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Ref</th>
                                        <th class="py-3 px-6 text-left">Produit</th>
                                        <th class="py-3 px-6 text-center">Client</th>
                                        <th class="py-3 px-6 text-center">Livraison</th>
                                        <th class="py-3 px-6 text-center">Montant</th>
                                        <th class="py-3 px-6 text-center">Etat</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach ($commandes as $commande)
                                        <div>
                                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-center">
                                                    {{$commande->reference}}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    @if ($commande->produit)
                                                        {{$commande->produit->nom}}
                                                    @endif
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        @if ($commande->client)
                                                            <span class="font-medium">
                                                                {{$commande->client->nom}}
                                                                <br/>
                                                                {{$commande->client->contact}}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    @if ($commande->client)

                                                        {{$commande->client->adresse}}
                                                        {{$commande->date_livraison}}
                                                    @endif
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    {{$commande->amount}}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="bg-{{$commande->color}}-200 text-{{$commande->color}}-600 py-1 px-3 rounded-full text-xs">
                                                        {{$commande->status}}
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6">
                                                    <div class="flex item-center justify-around">

                                                        <div onclick="show('tr-{{$commande->id}}')" class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>

                                                        {{-- <div class="flex item-center justify-between cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110"> --}}
                                                            @if ($commande->status == "LANCEE")
                                                                <div class="hover:text-blue-500">
                                                                    <a title="Marquer En cours" wire:click="toggleStatus({{$commande->id}}, 'EN_COURS')">
                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            @if($commande->status == "EN_COURS")
                                                                <div class="hover:text-green-500">
                                                                    <a title="Marquer validée" wire:click="toggleStatus({{$commande->id}}, 'VALIDEE')" class="">
                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            @if($commande->status == "LANCEE" || $commande->status == "EN_COURS")
                                                                <div class="hover:text-red-500">
                                                                    <a title="Marquer Annulée" wire:click="toggleStatus({{$commande->id}}, 'ANNULEE')" class="">
                                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        {{-- </div> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="tr-{{$commande->id}}" style="display:none;">
                                                <td colspan="6" >
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
                                                                    {{$commande->prix_vente}} CFA
                                                                </span>
                                                                <span class="ml-10 bg-{{$commande->color}}-200 text-{{$commande->color}}-600 font-semibold rounded-md px-2 py-1">
                                                                    {{$commande->status}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function show(id){
            var details = document.getElementById(id);
            console.log(details);
            console.log(details.style.display);
            details.style.display = details.style.display == "none" ? "table-row" : "none";
        }
    </script>
