<form>
  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    <div class="mb-4">
     
          <label for="name_en" class="block text-gray-700 text-sm font-bold mb-2">Name_en:</label>
          <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name_en" wire:model="name_en">
    </div>
    <div class="mb-4">
     
          <label for="name_es" class="block text-gray-700 text-sm font-bold mb-2">Name_es:</label>
          <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name_es" wire:model="name_es">
    </div>
    <div class="mb-4">
     
          <label for="meaning_name_en" class="block text-gray-700 text-sm font-bold mb-2">Meaning_name_en:</label>
          <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="meaning_name_en" wire:model="meaning_name_en">
    </div>
    <div class="mb-4">
     
          <label for="meaning_name_es" class="block text-gray-700 text-sm font-bold mb-2">Meaning_name_es:</label>
          <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="meaning_name_es" wire:model="meaning_name_es">
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        <button wire:click.prevent="{{$event}}()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">{{$title}}</button>
      </span>

      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancel</button>
      </span>
    </div>
  </div>
</form>