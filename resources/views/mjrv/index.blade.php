<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MJRV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('mjrv._messages')

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mx-auto">
                        <div class="basis-1/3">
                            <form class="max-w-md pb-5 md:pb-0">
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" id="default-search"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Número de Cédula" minlength="10" maxlength="10" required />
                                    <button type="submit"
                                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                                </div>
                            </form>
                        </div>


                        <div class="flex flex-row justify-center">
                            <!-- Import modal toggle -->
                            <button data-modal-target="importModal" data-modal-toggle="importModal"
                                class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                type="button">
                                Importar
                            </button>
                        </div>
                    </div>

                    @if ($members->isEmpty())
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <div class="pt-6 text-gray-900 dark:text-gray-100">
                                {{ __('¡No se han encontrado MJRV registrados!') }}
                            </div>
                        </div>
                    @else
                        <div class="pt-6 relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                            <table class="w-full text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Recinto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Junta
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Sexo
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Cédula
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombres
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Celular
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td scope="row" class="px-6 py-4 dark:text-white">
                                                {{ $member->recinto }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white text-center">
                                                {{ $member->junta }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white text-center">
                                                {{ $member->sexo }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white">
                                                {{ $member->cedula }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white">
                                                {{ $member->nombre }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white">
                                                {{ $member->celular }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center font-bold">
                            {{ __('TOTAL DE MJRV REGISTRADOS:') }} {{ $membersCount }}
                        </div>
                    @endif

                    <!-- Import modal -->
                    <div id="importModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Importar MJRV
                                    </h3>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('mjrv.import') }}" method="POST" enctype="multipart/form-data">
                                    <div class="p-4 md:p-5 space-y-4">
                                        @csrf

                                        <div>
                                            <input
                                                class="block px-4 w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="file_input_help" id="file_input" type="file"
                                                name="file" required>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                id="file_input_help">Sólo archivos Excel (.xlsx)</p>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="submit" id="file_submit"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Importar</button>
                                        <button data-modal-hide="importModal" type="button"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
