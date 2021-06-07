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
                                        <x-form.search :placeholder="'Chercher'" class="bg-gray-200 mr-10" />
                                        {{-- <div class="flex">
                                            <div class="flex-center-center">
                                                <span class="text-sm font-semibold mx-2">
                                                    Etat
                                                </span>
                                                <select wire:model="etat_id" class="form-input">
                                                    <option value="">
                                                    </option>
                                                    @foreach ($etats as $etat)
                                                        <option value="{{$etat->id}}">
                                                            {{$etat->nom}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="flex-center-center">
                                            <a href="{{route('payment.create')}}" class="btn-gradient ml-2">
                                                Creer
                                            </a>
                                        </div> --}}
                                    </div>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Commande</th>
                                        <th class="py-3 px-6 text-left">Produit</th>
                                        {{-- <th class="py-3 px-6 text-left">Sous titre</th>
                                        <th class="py-3 px-6 text-center">Description</th> --}}
                                        <th class="py-3 px-6 text-center">Client</th>
                                        <th class="py-3 px-6 text-center">Livraison</th>
                                        <th class="py-3 px-6 text-center">Montant à payer</th>
                                        <th class="py-3 px-6 text-center">Etat</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach ($payments as $payment)
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-center">
                                                {{$payment->commande->reference}}
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                @if ($payment->commande->produit)
                                                    {{$payment->commande->produit->nom}}
                                                @endif
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    @if ($payment->commande->client)
                                                        <span class="font-medium">
                                                            {{$payment->commande->client->nom}}
                                                            <br/>
                                                            {{$payment->commande->client->contact}}
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                @if ($payment->commande->client)

                                                    {{$payment->commande->client->adresse}}
                                                    {{$payment->commande->date_livraison}}
                                                @endif
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                {{$payment->commande->payment_amount}}
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="{{$payment->is_paid ? 'bg-green-200 text-green-600' : 'bg-red-200 text-red-600'}}  py-1 px-3 rounded-full text-xs">
                                                    {{$payment->is_paid ? "PAYEE" : "NON PAYEE"}}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center cursor-pointer">
                                                    @if (!$payment->is_paid)
                                                        <div wire:click="markPaid({{$payment->id}})" class="bg-purple-100 font-semibold text-purple-500 rounded p-2 transform hover:text-purple-500 hover:scale-110">
                                                            Marquer payée
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
