<div id="importModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div
            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Importar Usuarios
            </h3>
        </div>
        <!-- Modal body -->
        <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
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