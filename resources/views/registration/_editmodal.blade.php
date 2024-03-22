<div id="editModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Actualizar Junta
                </h3>
            </div>
            <!-- Modal body -->
            <form action="{{ route('mjrv.update', $member ?? '') }}" method="POST" enctype="multipart/form-data">
                <div class="p-4 md:p-5 space-y-4">
                    @method('PUT')
                    @csrf

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <input type="hidden" id="id" name="id">
                            <label for="junta"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de
                                Junta</label>
                            <input type="text" id="junta" name="junta"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                minlength="1" maxlength="3" required />
                        </div>
                        <div>
                            <label for="sexo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexo</label>
                            <select id="sexo" name="sexo" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Guardar</button>
                    <button data-modal-hide="editModal" type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    @push('scripts')
        $('[data-modal-target="editModal"]').click(function() {
            var modal = $('#editModal');
            var data = $(this).data();

            modal.find('input[name="id"]').val(data.id);
            modal.find('input[name="junta"]').val(data.junta);
            modal.find('select[name="sexo"]').val(data.sexo);
        });
    @endpush
</script>
