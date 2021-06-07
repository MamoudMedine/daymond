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
                                        <div class="flex">

                                            {{-- <div class="flex-center-center">
                                                <span class="text-sm font-semibold mx-2">
                                                    Categorie
                                                </span>
                                                <select wire:model="categorie_id" class="form-input">
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{$categorie->id}}">
                                                            {{$categorie->nom}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Nom</th>
                                        <th class="py-3 px-6 text-center">Contact</th>
                                        <th class="py-3 px-6 text-center">Email</th>
                                        <th class="py-3 px-6 text-center">Objet</th>
                                        <th class="py-3 px-6 text-center">Message</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($messages as $message)
                                        <tr class="border-b {{$message->is_read ? '' : 'bg-green-100'}} border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span class="font-medium">
                                                        {{$message->nom}}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                {{$message->contact}}
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                {{$message->email}}
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                {{$message->objet}}
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                {{$message->contenu}}
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    {{-- <div class="w-4 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </div> --}}
                                                    <div class="w-4 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg onclick="confirm('Etes vous sur de vouloir supprimer ?');Livewire.emit('deleteMessage', {{$message->id}});" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        {{-- <form id="deleteForm" action="/products/{{$message->id}}/delete" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form> --}}
                                                    </div>
                                                    {{-- <div class="w-4 cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        @if ($message->etat->nom == "Indisponible")
                                                            <a title="Marquer Disponible" wire:click="toggleAvailability({{$message->id}})">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                            </a>
                                                        @else
                                                            <a title="Marquer Indispponible" wire:click="toggleAvailability({{$message->id}})">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                                            </a>
                                                        @endif
                                                    </div> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-3 text-md font-medium">
                                                --Aucun Enregistrement--
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            setTimeout(() => {
                Livewire.emit('markMessagesAsRead');
                console.log("Messages lus");
            }, 10000);
        });
    </script>
