<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('user._messages')

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-col md:flex-row md:justify-between items-center">
                            <div>
                                <label class="block mb-2 text-gray-900 dark:text-white" for="file_input">Importación de Usuarios</label>
                                <input
                                    class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file" name="file"
                                    required>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Sólo archivos Excel (.xlsx)</p>
                            </div>

                            <div class="md:mt-0 mt-5">
                                <button type="submit" id="file_submit"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Importar
                                    Usuarios</button>
                            </div>
                        </div>
                    </form>

                    @if ($users->isEmpty())
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
                                            Cédula
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombres
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Celular
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Recinto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Rol
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td scope="row" class="px-6 py-4 dark:text-white">
                                                {{ $user->username }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white">
                                                {{ $user->name }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white">
                                                {{ $user->phone }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white">
                                                {{ $user->location }}
                                            </td>
                                            <td class="px-6 py-4 dark:text-white">
                                                {{ $user->role == 1 ? "Administrador" : "Coordinador" }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center font-bold">
                            {{__('TOTAL DE USUARIOS REGISTRADOS:')}} {{ $usersCount }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
