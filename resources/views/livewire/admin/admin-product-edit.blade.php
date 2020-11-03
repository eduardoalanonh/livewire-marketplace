<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <!-- component -->
        <div class="bg-gray-200 pt-2 font-mono my-16">
            <div class="container mx-auto">
                <div class="inputs w-full max-w-2xl p-6 mx-auto">
                    <h2 class="text-2xl text-gray-900">Editar produto</h2>
                    <form class="mt-6 border-t border-gray-400 pt-4" wire:submit.prevent="updateProduct">
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'> Nome do
                                Produto</label>
                            <input
                                wire:model="name"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                type='text'>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label
                                class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Descricao</label>
                            <textarea
                                wire:model="description"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                required></textarea>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>
                                Preco</label>
                            <input
                                wire:model="price"
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                type='text'>
                            @error('price') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class='w-full md:w-full px-3 mb-6'>
                            <label class="inline-flex items-center mt-3">
                                <input  wire:model="unique_product" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Marque esse campo se vai ser um produto unico</span>
                            </label>

                        </div>
                        <div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
                            <template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">
                                <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-on:click.away="imgModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
                                    <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
                                        <div class="z-50">
                                            <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                                                <svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="p-2">
                                            <img :alt="imgModalSrc" class="object-contain h-1/2-screen" :src="imgModalSrc">
                                            <p x-text="imgModalDesc" class="text-center text-white"></p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <div x-data="{}" class="px-2">
                            <div class="flex -mx-2">
                                <div class="w-1/6 px-2">
                                    <div class="bg-gray-400">
                                        <a @click="$dispatch('img-modal', {  imgModalSrc: 'https://picsum.photos/640/480', imgModalDesc: 'Random Image One Description' })" class="cursor-pointer">
                                            <img alt="Placeholder" class="object-fit w-full" src="https://picsum.photos/640/480">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='w-full md:w-full px-3 mb-6 grid grid-cols-2 mt-5'>
                            <div>
                                <label
                                    class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border  cursor-pointer  hover:text-gray-600">
                                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                                    </svg>
                                    <span class="mt-2 text-base leading-normal">Selecione uma foto</span>
                                    <input type='file' class="hidden" wire:model="photo"/>
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button
                                class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3 hover:bg-white"
                                type="submit">Atualizar Produto
                            </button>
                        </div>
                    </form>
                </div>
                <div class="items-center" wire:loading wire:target="updateProduct">
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


