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
                                            <div class="flex-center-center">
                                                <select wire:model="utilisateur_id" class="form-input">
                                                    <option value="">Trier par destinataire</option>
                                                    @foreach ($utilisateurs as $utilisateur)
                                                        <option value="{{$utilisateur->id}}">
                                                            {{$utilisateur->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex-center-center">
                                                {{-- <select wire:model="etat_id" class="form-input">
                                                    <option value="">Trier par etat</option>
                                                    @foreach ($etats as $etat)
                                                        <option value="{{$etat->id}}">
                                                            {{$etat->nom}}
                                                        </option>
                                                    @endforeach
                                                </select> --}}
                                            </div>
                                            <div class="flex-center-center">
                                                <a href="{{route('admin.notification.create')}}" class="btn-gradient ml-2">
                                                    Creer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Texte</th>
                                        <th class="py-3 px-6 text-center">Destinataire</th>
                                        {{-- <th class="py-3 px-6 text-center">Etat</th> --}}
                                        {{-- <th class="py-3 px-6 text-center">Nom d'utilisateur</th> --}}
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">

                                    @foreach ($notifications as $notification)
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">

                                                    <span class="font-medium">
                                                        {{$notification->texte}}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                @if ($notification->utilisateur)
                                                    {{$notification->utilisateur->name}}
                                                @endif
                                            </td>
                                            {{-- <td class="py-3 px-6 text-center">
                                                @if ($notification->etat)
                                                    {{$notification->etat}}
                                                @endif
                                            </td> --}}
                                            {{-- <td class="py-3 px-6 text-center">
                                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">
                                                    @if ($notification->admin)
                                                        {{$notification->admin->name}}
                                                    @endif
                                                </span>
                                            </td> --}}
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">

                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <a href="{{route('admin.notification.edit', $notification->id)}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="w-4 mr-2 transform cursor-pointer hover:text-purple-500 hover:scale-110">
                                                        <svg onclick="confirm('Etes vous sur de vouloir supprimer ?');Livewire.emit('deleteNotification', {{$notification->id}});" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </div>
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
