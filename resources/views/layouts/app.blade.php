<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Nearby Mart') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

       
        <!-- Scripts -->
        <style>body{

background-color: #eee;
}
.container{
width: 900px;
}

.card{

background-color: #fff;
border:none;
border-radius: 10px;
width: 190px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.image-container{

position: relative;
}

.thumbnail-image{
border-radius: 10px !important;
}


.discount{

background-color: red;
padding-top: 1px;
padding-bottom: 1px;
padding-left: 4px;
padding-right: 4px;
font-size: 10px;
border-radius: 6px;
color: #fff;
}

.wishlist{

height: 25px;
width: 25px;
background-color: #eee;
display: flex;
justify-content: center;
align-items: center;
border-radius: 50%;
box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.first{

position: absolute;
width: 100%;
    padding: 9px;
}


.dress-name{
font-size: 13px;
font-weight: bold;
width: 75%;
}


.new-price{
font-size: 13px;
font-weight: bold;
color: red;

}
.old-price{
font-size: 8px;
font-weight: bold;
color: grey;
}


.btn{
width: 14px;
height: 14px;
border-radius: 50%;
padding: 3px;
}

.creme{
background-color: #fff;
border: 2px solid grey;


}
.creme:hover {
border: 3px solid grey;
}

.creme:focus {
background-color: grey;

}


.red{
background-color: #fff;
border: 2px solid red;

}


.red:hover {
border: 3px solid red;
}
.red:focus {
background-color: red;
}



.blue{
background-color: #fff;
border: 2px solid #40C4FF;
}

.blue:hover {
border: 3px solid #40C4FF;
}
.blue:focus {
background-color: #40C4FF;
}
.darkblue{
background-color: #fff;
border: 2px solid #01579B;
}
.darkblue:hover {
border: 3px solid #01579B;
}
.darkblue:focus {
background-color: #01579B;
}
.yellow{
background-color: #fff;
border: 2px solid #FFCA28;
}
.yellow:hover {
border-radius: 3px solid #FFCA28;
}
.yellow:focus {
background-color: #FFCA28;
}


.item-size{
width: 15px;
height: 15px;
border-radius: 50%;
background: #fff;
border: 1px solid grey;
color: grey;
font-size: 10px;
text-align: center;
align-items: center;
display: flex;
justify-content: center;
}


.rating-star{
font-size: 10px !important;
}
.rating-number{
font-size: 10px;
color: grey;

}
.buy{
font-size: 12px;
color: purple;
font-weight: 500;
}














.voutchers{
background-color: #fff;
border:none;
border-radius: 10px;
width: 190px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
overflow: hidden;

}
.voutcher-divider{

display: flex;

}
.voutcher-left{
width: 60%
}
.voutcher-name{
color: grey;
font-size: 9px;
font-weight: 500;
}
.voutcher-code{
color: red;
font-size: 11px;
font-weight: bold;
}
.voutcher-right{
width: 40%;	 
background-color: purple;
color: #fff;
}

.discount-percent{
font-size: 12px;
font-weight: bold;
position: relative;
top: 5px;
}
.off{
font-size: 14px;
position: relative;
bottom: 5px;
}</style>
        
        @vite(['resources/css/app.css', 'resources/js/app.js', ])

        <script src="https://cdn.tailwindcss.com"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
@livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class=" bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

            <!-- Page Content -->
            <main class="flex justify-center flex-col item-center">
                {{ $slot }}
            </main>
        </div>

        @include('components.footer')
    </body>
</html>
