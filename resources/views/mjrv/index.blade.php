<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MJRV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('components._messages')

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (Auth::user()->role == 1)
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mx-auto">
                            <div class="basis-1/3">
                                <form class="max-w-md pb-5 md:pb-0" action="{{ route('mjrv.search') }}" method="POST">
                                    @csrf

                                    <label for="mjrvSearch"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">MJRV
                                        Search</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                        </div>
                                        <input type="search" id="mjrvSearch" name="mjrvSearch"
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center font-bold">
                                {{ __('TOTAL DE MJRV:') }} {{ $membersCount }}
                            </div>
                        @endif

                        @include('mjrv._importmodal')
                    @else
                        <div class="py-3 text-center">
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-3 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                Restablecer Tabla MJRV</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
