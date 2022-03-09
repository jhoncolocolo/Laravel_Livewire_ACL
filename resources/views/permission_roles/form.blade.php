<form>
  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    <div class="mb-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Role">Role</label>
        <select class="bg-gray-200 block w-full  text-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:border-gray-500 focus:bg-white border border-gray-200 " id="roleSelected" wire:model="roleSelected">
          <option value="null">Selected Role</option>
          @foreach ($roles as $registry)
          <option value="{{$registry['id']}}">{{$registry['Role']}}</option>
          @endforeach
        </select>
     
    </div>
    <div class="mb-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Permission">Permission</label>
        <select class="bg-gray-200 block w-full  text-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:border-gray-500 focus:bg-white border border-gray-200 " id="permissionSelected" wire:model="permissionSelected">
          <option value="null">Selected Permission</option>
          @foreach ($permissions as $registry)
          <option value="{{$registry['id']}}">{{$registry['Permission']}}</option>
          @endforeach
        </select>
     
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