<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reportes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($membersCount == 0)
                        <div class="text-center font-bold py-3">
                            {{ __('Ninguna asistencia ha sido registrada todavía.') }}
                        </div>
                    @else
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mx-auto">
                            <div class="basis-1/3 text-center md:text-left font-bold pb-5 md:pb-0">
                                {{ __('TOTAL DE MJRV REGISTRADOS:') }} {{ $membersCount }}
                            </div>

                            <div class="flex flex-row justify-center">
                                <a href="{{ route('mjrv.export') }}"
                                    class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Generar Reporte</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
