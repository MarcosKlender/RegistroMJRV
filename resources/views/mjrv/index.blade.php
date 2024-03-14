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

                    <form action="{{ route('mjrv.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-col md:flex-row md:justify-between items-center">
                            <div>
                                <label class="block mb-2 text-gray-900 dark:text-white" for="file_input">Carga de la
                                    nómina de MJRV:</label>
                                <input
                                    class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file" name="file"
                                    required>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Sólo ser
                                    permiten archivos Excel con extensión .xlsx</p>
                            </div>

                            <div class="md:mt-0 mt-5">
                                <button type="submit" id="file_submit"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Importar
                                    MJRV</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
