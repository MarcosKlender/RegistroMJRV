<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registro de Asistencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form class="max-w-md mx-auto" action="{{ route('registration.search') }}" method="POST">
                        @csrf

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
                            <input type="search" id="idNumber" name="idNumber"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Número de Cédula" minlength="10" maxlength="10" required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                        </div>
                    </form>

                    @empty($mjrv)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <div class="pt-6 text-gray-900 dark:text-gray-100">
                                {{ __('Algo salió mal. Si estás leyendo esto, repórtalo al Administrador."') }}
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
                                        <th scope="col" class="px-6 py-3">
                                            Asistencia
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="px-6 py-4 dark:text-white">
                                            {{ $mjrv->recinto }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white text-center">
                                            {{ $mjrv->junta }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white text-center">
                                            {{ $mjrv->sexo }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white">
                                            {{ $mjrv->cedula }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white">
                                            {{ $mjrv->nombre }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white">
                                            {{ $mjrv->celular }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-white">
                                            @if ($mjrv->asistencia == false)
                                                <form action="{{ route('registration.update', $mjrv) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="id" value="{{ $mjrv->id }}">
                                                    <input type="hidden" name="coordinador_cedula"
                                                        value="{{ Auth::user()->username }}">
                                                    <input type="hidden" name="coordinador_nombre"
                                                        value="{{ Auth::user()->name }}">
                                                    <input type="hidden" name="coordinador_celular"
                                                        value="{{ Auth::user()->phone }}">
                                                    <input type="hidden" name="asistencia" value="true">
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                        onclick="return confirm('¿Está seguro de registrar este MJRV?')">NO</button>

                                                </form>
                                            @elseif ($mjrv->asistencia == true)
                                                <form action="{{ route('registration.update', $mjrv) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="id" value="{{ $mjrv->id }}">
                                                    <input type="hidden" name="coordinador_cedula"
                                                        value="{{ Auth::user()->username }}">
                                                    <input type="hidden" name="coordinador_nombre"
                                                        value="{{ Auth::user()->name }}">
                                                    <input type="hidden" name="coordinador_celular"
                                                        value="{{ Auth::user()->phone }}">
                                                    <input type="hidden" name="asistencia" value="true">
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900"
                                                        onclick="return confirm('Este MJRV ya fue registrado. ¿Está seguro de continuar?')">SI</button>

                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endempty

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
