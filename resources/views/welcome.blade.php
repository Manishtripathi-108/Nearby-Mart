<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Near-by Mart</title>

    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @livewireStyles
</head>

<body class="h-full w-full bg-gradient-to-r from-blue-200 to-purple-200">
    <main>

        <section>

            <div class="inset-y-0 right-0 top-0 z-0 mx-auto w-full max-w-xl px-4 md:px-0 lg:absolute lg:mx-0 lg:mb-0 lg:w-7/12 lg:max-w-full lg:pr-0 xl:px-0">
                <img class="h-56 w-full rounded object-cover shadow-lg lg:h-full lg:rounded-none lg:shadow-none" src="images/Online-Shopping.png" alt="" height="750px" width="890px" />
            </div>
            <div class="md:item-center relative mx-auto max-w-screen-xl px-4 py-32 sm:px-3 lg:flex lg:h-screen lg:items-center lg:px-8">
                <div class="max-w-xl bg-white/30 p-10 text-center backdrop-invert backdrop-opacity-10 ltr:sm:text-left rtl:sm:text-right">
                    <h1 class="text-3xl font-extrabold sm:text-5xl">
                        Welcome to

                        <strong class="block font-extrabold text-blue-700"> Nearby Mart. </strong>
                    </h1>

                    <p class="mt-4 max-w-lg text-center sm:text-xl/relaxed">
                        Your one-stop destination for digital commerce where you can sell and shop with ease.Turn your products into profits by setting up your digital store on Nearby Mart. Reach a wider audience and showcase your offerings effortlessly.From everyday essentials to unique finds, explore a vast array of products from sellers near and far. Find what you need, when you need it.
                    </p>

                    <div class="mt-8 flex flex-wrap items-center justify-center gap-4 text-center">
                        <a class="block w-full rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white shadow transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto" href="/login">
                            Login
                        </a>

                        <a class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-blue-600 shadow transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:text-blue-700 focus:outline-none focus:ring active:text-blue-500 sm:w-auto" href="/home">
                            Skip
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </main>

</body>

</html>
