<section class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
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
                            <p class="">{{$product->name}}</p>
                        </div>
                        <p class="pt-1 text-gray-900">{{$product->price}}</p>
                    </a>
                </div>
            @endforeach
        @else
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col content-center border-black border-opacity-25">
                <div class="bg-red-lightest border border-red text-red-dark pl-4 pr-8 py-3 rounded content-center"
                     role="alert">
                    <strong class="font-bold">Nenhum produto encontrado!</strong>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="bg-white py-8">
    <div class="container py-8 px-6 mx-auto">

        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8"
           href="#">
            Sobre
        </a>

        <p class="mt-8 mb-8">This template is inspired by the stunning nordic minamalist design - in particular:
            <br>
            <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/" target="_blank">Savoy
                Theme</a> created by <a class="text-gray-800 underline hover:text-gray-900"
                                        href="https://nordicmade.com/">https://nordicmade.com/</a> and <a
                class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/" target="_blank">https://www.metricdesign.no/</a>
        </p>

        <p class="mb-8">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan
            lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis mattis
            aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam vehicula ipsum
            a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed faucibus turpis in. Hac
            habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum quisque non tellus orci ac
            auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas dui id. At tempor commodo
            ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu consequat ac.</p>

    </div>

</section>

<footer class="container mx-auto bg-white py-8 border-t border-gray-400">
    <div class="container flex px-3 py-8 ">
        <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full lg:w-1/2 ">
                <div class="px-3 md:px-0">
                    <h3 class="font-bold text-gray-900">About</h3>
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
