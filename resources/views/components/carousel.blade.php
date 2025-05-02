<head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script>
        var cont = 0;

        function loopSlider() {
            var xx = setInterval(function() {
                switch (cont) {
                    case 0: {
                        $("#slider-1").fadeOut(200);
                        $("#slider-2").delay(200).fadeIn(200);
                        $("#sButton1").removeClass("bg-purple-800");
                        $("#sButton2").addClass("bg-purple-800");
                        cont = 1;
                        break;
                    }
                    case 1: {
                        $("#slider-2").fadeOut(200);
                        $("#slider-1").delay(200).fadeIn(200);
                        $("#sButton2").removeClass("bg-purple-800");
                        $("#sButton1").addClass("bg-purple-800");
                        cont = 0;
                        break;
                    }
                }
            }, 8000);
        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }

        function sliderButton1() {
            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 0;
        }

        function sliderButton2() {
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 1;
        }

        $(window).ready(function() {
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-800");
            loopSlider();
        });
    </script>
</head>

<body>
    <div class="sliderAx h-auto">
        <div class="container mx-auto" id="slider-1">
            <div class="h-auto bg-cover bg-center object-fill px-10 py-24 text-white" style="background-image: url({{ asset('images/adBanner/crousal1.jpg') }})">
                <div class="md:w-1/2">
                    <p class="text-sm font-bold uppercase">Exclusive Offer</p>
                    <p class="text-3xl font-bold">Discover Local Stores</p>
                    <p class="mb-10 text-2xl leading-none">Connect with your community and shop locally with Town Kart.</p>
                    <a class="rounded bg-blue-800 px-8 py-4 text-xs font-bold uppercase text-white hover:bg-gray-200 hover:text-gray-800" href="#">Shop Now</a>
                </div>
            </div>
            <br>
        </div>

        <div class="container mx-auto" id="slider-2">
            <div class="h-auto bg-cover bg-top object-fill px-10 py-24 text-white" style="background-image: url({{ asset('images/adBanner/crousal1.jpg') }})">
                <div class="md:w-1/2">
                    <p class="text-sm font-bold uppercase">Support Local Businesses</p>
                    <p class="text-3xl font-bold">Unique Finds Near You</p>
                    <p class="mb-10 text-2xl leading-none">Explore a wide variety of products from your neighborhood stores.</p>
                    <a class="rounded bg-blue-800 px-8 py-4 text-xs font-bold uppercase text-white hover:bg-gray-200 hover:text-gray-800" href="#">Explore Now</a>
                </div>
            </div>
            <br>
        </div>
    </div>
    <div class="mx-auto flex w-12 justify-between pb-2">
        <button class="w-4 rounded-full bg-purple-400 pb-2" id="sButton1" onclick="sliderButton1()"></button>
        <button class="w-4 rounded-full bg-purple-400 p-2" id="sButton2" onclick="sliderButton2()"></button>
    </div>
</body>
