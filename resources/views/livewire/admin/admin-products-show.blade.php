<div class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        @if(count($products))
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Produtos e servicos</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nome
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Preco
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Editar
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Excluir
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Criado em
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                @foreach($product->photo as $photo)
                                                <img class="w-full h-full rounded-full"
                                                     src="{{$s3Photo .$photo->image}}"
                                                     alt=""/>
                                                @endforeach
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$product->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            R$ {{$product->price}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="{{route('admin.product.edit',['id' => $product->id])}}"
                                            class="relative inline-block px-3 py-1 font-semibold text-black leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-blue-300 opacity-50 rounded-full"></span>
                                            <span class="relative">Editar</span>
                                        </a>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button wire:click="destroyProduct({{$product->id}})"
                                                class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                            <span class="relative">Excluir</span>
                                        </button>
                                    </td>
                                    <div class="items-center" wire:loading wire:target="destroyProduct">
                                        <div
                                            class="fixed top-0 right-0 h-screen w-screen z-50 flex justify-center items-center">
                                            <div
                                                class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"></div>
                                        </div>
                                    </div>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$product->created_at->locale('pt')->diffForHumans()}}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        <div class="inline-flex mt-2 xs:mt-0">
                            {{$products->links()}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
