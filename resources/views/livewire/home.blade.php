<section class="bg-white py-8">
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <input wire:model="search"
               class="w-full rounded-full py-3 px-6 border border-black border-opacity-25 rounded shadow-lg  bg-gray-100 text-center text-black transition duration-500 ease-in-out   transform hover:-translate-y-1 hover:scale-105"
               type="search" placeholder="Buscar produtos e servicos">

        @if(count($products))
            @foreach($products as $product)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col border-black border-opacity-25 items-center">
                    <div
                        style="background-image: url({{asset('storage/' . str_replace('public','',$product->photo[0]['image']))}}"
                        class="bg-gray-300 h-64 w-full rounded-lg shadow-md bg-cover bg-center" loading="lazy"></div>
                    <div
                        class="w-56 md:w-64 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden hover:grow hover:shadow-lg border-black border-opacity-25">
                        <div
                            class="py-2 text-center font-bold uppercase tracking-wide text-gray-800 bg-gray-100">{{$product->name}}</div>
                        <div class="flex items-center justify-between py-2 px-3 bg-gray-400">
                            <h1 class="text-gray-800 font-bold ">R$ {{$product->price}}</h1>
                            <a href="{{route('single.product',['id' => $product->id])}}"
                                class=" bg-gray-800 text-xs text-white px-2 py-1 font-semibold rounded uppercase hover:bg-gray-700">
                                Comprar
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container mx-auto flex justify-center flex-wrap pt-4 pb-12">
                <div class="bg-red-lightest border border-red text-red-dark pl-4 pr-4 py-3 rounded text-center"
                     role="alert">
                    <strong class="font-bold text-center">Nenhum produto encontrado!</strong>
                </div>
            </div>

        @endif
    </div>
</section>


<footer class="container mx-auto bg-white py-8 border-t border-gray-400">
    <div class="container flex px-3 py-8 ">
        <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full lg:w-1/2 ">
                <div class="px-3 md:px-0">
                    <h3 class="font-bold text-gray-900">Sobre</h3>
                    <p class="py-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo
                        nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                    </p>
                </div>
            </div>
            <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                <div class="px-3 md:px-0">
                    <h3 class="font-bold text-gray-900">Social</h3>
                    <ul class="list-reset items-center pt-3">
                        <li>
                            <a class="inline-block no-underline hover:text-black hover:underline py-1" href="#">Add
                                social links</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
