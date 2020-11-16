<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <head>
                <style>
                    @foreach($product->photo as $key => $photo)
                    .image{{$key}}             {
                        content: url(" {{ $s3Photo . $photo->image}}")
                    }
                    @endforeach
                </style>
            </head>

            <body>
            <section class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200">
                <div class="shadow-2xl relative">
                    <!-- large image on slides -->
                    @foreach($product->photo as $key => $photo)
                        <div class="mySlides hidden">
                            <div class="image{{$key}} w-full object-cover"></div>
                        </div>
                @endforeach

                <!-- butttons -->
                    <a class="absolute left-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold"
                       onclick="plusSlides(-1)">❮</a>
                    <a class="absolute right-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold"
                       onclick="plusSlides(1)">❯</a>

                    <!-- image description -->
                    <div class="text-center text-white font-light tracking-wider bg-gray-800 py-2">
                        <p id="caption"></p>
                    </div>

                    <!-- smaller images under description -->
                    <div class="flex">
                        @foreach($product->photo as $key => $photo)
                            <div>
                                <img class="image{{$key}} description h-24 opacity-50 hover:opacity-100 cursor-pointer"
                                     src="#"
                                     onclick="currentSlide(1)" alt="Dog's Nose">
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <script>
                //JS to switch slides and replace text in bar//
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("description");
                    var captionText = document.getElementById("caption");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" opacity-100", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " opacity-100";
                    captionText.innerHTML = dots[slideIndex - 1].alt;
                }
            </script>
            </body>

            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>

                <p class="leading-relaxed">{{$product->description}}</p>
                <div class="mt-2">
                </div>
                <div class="flex mt-5">

                    <span class="title-font font-medium text-2xl text-gray-900">R$ {{$product->price}}</span>
                    <button
                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">
                        Comprar no cartao
                    </button>

                </div>
                <div class="mt-5 bg-gray-100 p-3 rounded">
                    <div>
                        <h2 class="text-sm title-font text-black tracking-widest">Vendedor: {{$user->name}}</h2>
                    </div>
                    <div class="mt-3">
                        <div class="inline-block">
                            Peca direto pelo Whatsapp
                        </div>
                        <div class="inline-block"><a
                                href="https://api.whatsapp.com/send?phone=51{{$user->address->phone}}&text=Gostaria de pedir um {{$product->name}}"
                                target="_blank">
                                <svg enable-background="new 0 0 512 512" width="20" height="20" version="1.1"
                                     viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path
                                        d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z"
                                        fill="#4CAF50"
                                    />

                                    <path
                                        d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z"
                                        fill="#FAFAFA"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
