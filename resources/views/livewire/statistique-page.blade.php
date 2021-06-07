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

                                    </div>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Vus</th>
                                        <th class="py-3 px-6 text-left">Téléchargés</th>
                                        <th class="py-3 px-6 text-center">Copiés</th>
                                        <th class="py-3 px-6 text-center">Paniers</th>
                                        <th class="py-3 px-6 text-center">Commandés</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-center">
                                            {{$saw}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$downloaded}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$copied}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$carts}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$ordered}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
