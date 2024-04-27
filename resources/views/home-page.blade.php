<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Near-by Mart</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<script src="https://cdn.tailwindcss.com"></script>
@livewireStyles
</head>
<body class="bg-gradient-to-r from-blue-200  to-purple-200 w-full h-full">
<livewire:navbar/>
<section class="py-6 dark:bg-gray-100 dark:text-gray-900 ">
	<div class="container mx-auto flex flex-col justify-center p-4 space-y-8 md:p-10 lg:space-y-0 lg:space-x-12 lg:justify-between lg:flex-row">
		<div class="flex flex-col space-y-4 text-center lg:text-left">
			<h1 class="text-5xl font-bold leading-none">Nearby Mart</h1>
			<p class="text-lg"> Find what you need, when you need it</p>
		</div>
		<div class="flex flex-row items-center self-center justify-center flex-shrink-0 shadow-md lg:justify-center">
			<div class="flex flex-row justify-center">
				<input type="text" placeholder="Iphone 15 pro max" class="w-3/5 p-3 rounded-l-lg sm:w-2/3">
				<button type="button" class="w-2/5 p-3 font-semibold rounded-r-lg sm:w-1/3 dark:bg-violet-600 dark:text-gray-50">Search</button>
			</div>
		</div>
	</div>
</section>
 
</body>
</html>