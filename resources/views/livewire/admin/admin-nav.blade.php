<nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
        <div class="w-1/2 pl-2 md:pl-0">
            <a class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
                <i class="fas fa-sun text-orange-600 pr-3"></i> Painel de controle
            </a>
        </div>
        <div class="w-1/2 pr-0">
            <div class="flex relative inline-block float-right">
                <div class="relative text-sm">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </div>

            </div>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20"
             id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{route('admin.home')}}" data-turbolinks="true"
                       class="block py-1 md:py-3 pl-1 align-middle text-orange-600 no-underline hover:text-gray-900 border-b-2 border-orange-600 hover:border-orange-600">
                        <i class="fas fa-home fa-fw mr-3 text-orange-600"></i><span
                            class="pb-1 md:pb-0 text-sm">Inicio</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{route('admin.product')}}" data-turbolinks="true"
                       class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                        <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Produtos</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="#"
                       class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                        <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Pedidos</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="#"
                       class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                        <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Analytics</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="#"
                       class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                        <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Payments</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


