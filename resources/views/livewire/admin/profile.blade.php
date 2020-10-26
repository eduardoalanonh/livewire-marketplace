<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <!-- component -->
        <div class="bg-gray-200 pt-2 font-mono my-16">
            <div class="container mx-auto">
                <div class="inputs w-full max-w-2xl p-6 mx-auto">
                    <h2 class="text-2xl text-gray-900">Perfil</h2>
                    <form class="mt-6 border-t border-gray-400 pt-4" wire:submit.prevent="creatProduct">
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>
                                Nome</label>
                            <input
                                wire:model="name"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                type='text'>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>
                                Email</label>
                            <input
                                wire:model="name"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                type='text'>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>
                            Senha</label>
                            <input
                                wire:model="name"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                type='text'>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>
                                Endereco</label>
                            <input
                                wire:model="name"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                type='text'>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>
                                Whatsapp/Telefone</label>
                            <input
                                wire:model="name"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                type='text'>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6 grid grid-cols-2'>
                            <div>
                                <label
                                    class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border  cursor-pointer  hover:text-gray-600">
                                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                                    </svg>
                                    <span class="mt-2 text-base leading-normal">Selecione sua foto de perfil</span>
                                    <input type='file' class="hidden" />
                                </label>
                            </div>

                        </div>
                        <div class="flex justify-center">
                            <button
                                class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3 hover:bg-white"
                                type="submit">Atualizar perfil
                            </button>
                        </div>
                    </form>
                </div>
                <div class="items-center" wire:loading wire:target="creatProduct">
                    <div class="fixed top-0 right-0 h-screen w-screen z-50 flex justify-center items-center">
                        <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"></div>
                    </div>
                </div>
                <div class="items-center" wire:loading wire:target="updatedPhoto">
                    <div class="fixed top-0 right-0 h-screen w-screen z-50 flex justify-center items-center">
                        <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


