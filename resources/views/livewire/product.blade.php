<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <head>
                <style>
                    /*each image is referenced twice in the HTML, but each image only needs to be updated in the CSS*/
                    .image1 {
                        content: url("https://randomwordgenerator.com/img/picture-generator/52e4d7434f51a914f1dc8460962e33791c3ad6e04e5074417d2c7ed09f4acc_640.jpg")
                    }

                    .image2 {
                        content: url("https://randomwordgenerator.com/img/picture-generator/55e8d146425bb10ff3d8992cc12c30771037dbf852547848702a7fd19545_640.jpg")
                    }

                    .image3 {
                        content: url("https://randomwordgenerator.com/img/picture-generator/55e8d24b4257ac14f1dc8460962e33791c3ad6e04e507440752972d3924cc6_640.jpg")
                    }

                    .image4 {
                        content: url("https://randomwordgenerator.com/img/picture-generator/55e0d44b4b56a414f1dc8460962e33791c3ad6e04e5074417c2d78d2954bcd_640.jpg")
                    }

                    .image5 {
                        content: url("https://randomwordgenerator.com/img/picture-generator/5ee3dc414954b10ff3d8992cc12c30771037dbf85254794e732f7ad7934e_640.jpg")
                    }
                </style>
            </head>

            <body>
            <section class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200">
                <div class="shadow-2xl relative">
                    <!-- large image on slides -->
                    <div class="mySlides hidden">
                        <div class="image1 w-full object-cover"></div>
                    </div>
                    <div class="mySlides hidden">
                        <div class="image2 w-full object-cover"></div>
                    </div>
                    <div class="mySlides hidden">
                        <div class="image3 w-full object-cover"></div>
                    </div>
                    <div class="mySlides hidden">
                        <div class="image4 w-full object-cover"></div>
                    </div>
                    <div class="mySlides hidden">
                        <div class="image5 w-full object-cover"></div>
                    </div>

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
                        <div>
                            <img class="image1 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#"
                                 onclick="currentSlide(1)" alt="Dog's Nose">
                        </div>
                        <div>
                            <img class="image2 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#"
                                 onclick="currentSlide(2)" alt="Lawnmower">
                        </div>
                        <div>
                            <img class="image3 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#"
                                 onclick="currentSlide(3)" alt="Globe">
                        </div>
                        <div>
                            <img class="image4 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#"
                                 onclick="currentSlide(4)" alt="Optical Illusion">
                        </div>
                        <div>
                            <img class="image5 description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#"
                                 onclick="currentSlide(5)" alt="Lips">
                        </div>
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
                <h2 class="text-sm title-font text-gray-500 tracking-widest">Vendedor: {{$user->name}}</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>


                <p class="leading-relaxed">{{$product->description}}</p>
                <div class="mt-2">
                    <label class="text-gray-700 text-sm" for="count">Quantidade</label>
                    <div class="flex items-center mt-1">
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600" wire:click="upQuantity">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span class="text-gray-700 text-lg mx-2">{{$quantity}}</span>
                        <button class="text-gray-500 focus:outline-none focus:text-gray-600" wire:click="downQuantity">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="flex mt-5">

                    <span class="title-font font-medium text-2xl text-gray-900">R$ {{$product->price}}</span>
                    <button
                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">
                        Comprar
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
