<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('components._messages')

            @include('components._validationerrors')

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mx-auto">
                        <div class="basis-1/3">
                            <form class="max-w-md pb-5 md:pb-0" action="{{ route('user.search') }}" method="POST">
                                @csrf

                                <label for="userSearch"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">User
                                    Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" id="userSearch" name="userSearch"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Número de Cédula" minlength="10" maxlength="10" required />
                                    <button type="submit"
                                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                                </div>
                            </form>
                        </div>

                        <div class="flex flex-row justify-center">
                            <!-- Create modal toggle -->
                            <button data-modal-target="createModal" data-modal-toggle="createModal"
                                class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                type="button">
                                Crear
                            </button>

                            <!-- Import modal toggle -->
                            <button data-modal-target="importModal" data-modal-toggle="importModal"
                                class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                type="button">
                                Importar
                            </button>
                        </div>
                    </div>

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
                                            Rol
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Acciones
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
                                                @if ($user->role == 1)
                                                    {{ 'Administrador' }}
                                                @elseif ($user->role == 2)
                                                    {{ 'Coordinador' }}
                                                @elseif ($user->role == 3)
                                                    {{ 'Supervisor' }}
                                                @endif
                                            </td>
                                            <td class="flex flex-row items-center px-6 py-4 dark:text-white">
                                                <!-- Edit modal toggle -->
                                                <button type="button" data-modal-target="editModal"
                                                    data-modal-toggle="editModal"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                    data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                    data-email="{{ $user->email }}"
                                                    data-username="{{ $user->username }}"
                                                    data-phone="{{ $user->phone }}"
                                                    data-location="{{ $user->location }}"
                                                    data-role="{{ $user->role }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                    <span class="sr-only">Editar</span>
                                                </button>
                                                <form action="{{ route('user.destroy', $user) }}" method="POST"
                                                    class="text-red-400">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                        onclick="return confirm('¿Está seguro de eliminar este usuario?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                        <span class="sr-only">Eliminar</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center font-bold">
                            {{ __('TOTAL DE USUARIOS:') }} {{ $usersCount }}
                        </div>
                    @endif

                    @include('user._importmodal')

                    @include('user._createmodal')

                    @include('user._editmodal')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
