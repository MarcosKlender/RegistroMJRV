<div id="phoneModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Editar Usuario
                </h3>
            </div>
            <!-- Modal body -->
            <form action="{{ route('registration.update', $mjrv) }}" method="POST">
                <div class="p-4 md:p-5">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id">
                    <input type="hidden" name="coordinador_cedula" value="{{ Auth::user()->username }}">
                    <input type="hidden" name="coordinador_nombre" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="coordinador_celular" value="{{ Auth::user()->phone }}">
                    <input type="hidden" name="asistencia" value="true">
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Celular</label>
                        <input type="tel" id="celular" name="celular"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            minlength="10" maxlength="10" required />
                        <p id="floating_helper_text" class="mt-2 text-xs text-yellow-500 dark:text-yellow-400">
                            *Registrar el celular del MJRV es OBLIGATORIO.</p>
                    </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Guardar</button>
                    <button data-modal-hide="phoneModal" type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-auto dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    @push('scripts')
        $('[data-modal-target="phoneModal"]').click(function() {
            var modal = $('#phoneModal');
            var data = $(this).data();

            modal.find('input[name="id"]').val(data.id);
        });
    @endpush
</script>
