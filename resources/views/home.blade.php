
<x-app-layout>
    
 @include('components.carousel')

 <div class="bg-white shadow-md rounded-lg p-4 w-200 h-auto">
  <div class="flex items-center mb-4">
    <img src="images/Image People connect.jpg" alt="Product Image" class="w-16 h-16 rounded-full mr-4">
    <div>
      <h2 class="text-lg font-bold">Product Name</h2>
      <p class="text-gray-600">$99.99</p>
    </div>
  </div>
  <div class="mb-4">
    <p class="text-gray-600">Limited time offer: 20% off!</p>
  </div>
  <div class="text-gray-600">
    <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>
    <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Buy Now</button>
  </div>
</div>
   
</x-app-layout>