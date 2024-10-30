<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    
                    <a href="{{ route('users.create') }}">
                        <x-button>
                            {{ __('Create New User') }}
                        </x-button>
                    </a>
                </div>

                
                <div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="white-space: nowrap;" id="myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400" style="white-space: nowrap;">
                            <tr>
                                <th scope="col" class="px-2 py-3">
                                    User Name
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Gender
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    User Type
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-2 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @foreach($userDetails as $details)
                                <tr class="px-2 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-2 py-4">
                                        {{ $details->first_name }}
                                    </td>
                                    <td class="px-2 py-4">
                                        {{ $details->gender }}
                                    </td>
                                    <td class="px-2 py-4">{{ $details->user_type }}</td>
                                    <td class="px-2 py-4">{{ $details->email}}</td>
                                    <td class="px-2 py-4 flex items-center space-x-2 gap-4 justify-center">
                                        <a href="#" wire:click="viewUserDetails({{ $details->id }})" class="text-green-500 hover:text-green-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>                                              
                                        </a>

                                        <a href="{{ route('users.edit', $details->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        
                                        <a href="#" wire:click="confirmDelete({{ $details->id }})" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                

            </div>
        </div>
    </div>

    @if($showDeleteModal)
    <div id="popup-modal" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="relative p-4 w-1/2 md:w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5 text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this user details?</h3>
              <button wire:click="deleteUser" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Yes, I'm sure
              </button>
              <button wire:click="$set('showDeleteModal', false)" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                No, cancel
              </button>
            </div>
          </div>
        </div>
    </div>
    @endif

   
    @if($showModal)
    <div id="view-modal" class="fixed inset-0 z-50 flex items-center justify-center h-full w-full bg-black bg-opacity-50">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        User Details
                    </h3>
                    <button type="button" wire:click="closeModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-4 h-4  ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-1 h-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div class="p-4 md:p-5 space-y-4">
                    <table class="min-w-full border border-gray-300 w-full">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border border-gray-300 px-4 py-2 text-left text-gray-600 dark:text-gray-300">Fields</th>
                                <th class="border border-gray-300 px-4 py-2 text-left text-gray-600 dark:text-gray-300">Values</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">First Name</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">
                                    {{ $selectedUserDetails ? $selectedUserDetails->userInformation->first_name : 'No user selected' }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">Last Name</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">
                                    {{ $selectedUserDetails ? $selectedUserDetails->userInformation->last_name : 'No user selected' }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">Gender</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">
                                    {{ $selectedUserDetails ? $selectedUserDetails->userInformation->gender : 'No user selected' }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">NIC ID</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">
                                    {{ $selectedUserDetails ? $selectedUserDetails->userInformation->nic_id : 'No user selected' }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">User Type</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">
                                    {{ $selectedUserDetails ? $selectedUserDetails->userInformation->user_type : 'No user selected' }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">Created</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">
                                    {{ $selectedUserDetails ? $selectedUserDetails->created_at : 'No bus available' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">Updated</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-500 dark:text-gray-400">
                                    {{ $selectedUserDetails ? $selectedUserDetails->updated_at : 'No bus available' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                
            </div>
        </div>
    </div>
    @endif
</div>
