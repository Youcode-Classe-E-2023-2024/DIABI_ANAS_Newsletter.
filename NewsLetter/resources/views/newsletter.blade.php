
<x-admin-layout class="flex items-center justify-center dark:bg-gray-700">


    <form class=" m-auto max-w-sm" action="/subscribe" method="post">
       @csrf
        <div class="flex items-center border-b border-teal-500 py-2">
          <div class="inputBox">
            <input type="email" id="email" name="email"/>
                <span for="email" > Email </span>

            </div>
         
          <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-2 px-2 rounded" type="submit">
            Subscribe
          </button>
         
          
        </div>
      </form>


</x-admin-layout>
