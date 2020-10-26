<section class="bg-white py-8">
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <input wire:model="search"
               class="w-full rounded-full py-3 px-6 border border-black border-opacity-25 rounded shadow-lg  bg-gray-100 text-center text-black transition duration-500 ease-in-out   transform hover:-translate-y-1 hover:scale-105"
               type="search" placeholder="Buscar produtos e servicos">

        @if(count($products))
            @foreach($products as $product)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col border-black border-opacity-25">
                    <a href="#">
                        <img class="hover:grow hover:shadow-lg border-black border-opacity-25"
                             src="{{asset('storage/' . str_replace('public','',$product->photo[0]['image']))}}">
                        <div class="pt-3 flex items-center justify-between">
                            <p class="font-black hover:font-hairline">{{$product->name}}</p>
                        </div>
                        <p class="pt-1 text-gray-900">R$ {{$product->price}}</p>
                    </a>
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
