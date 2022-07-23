<div>
    {{-- <div class="bg-white rounded-lg px-8 py-6 overflow-x-scroll custom-scrollbar">
        <h4 class="text-xl font-semibold">Recent transactions</h4>
        <table class="w-full my-8 whitespace-nowrap">
            <thead class="border-b border-gray-300 bg-secondary text-gray-100 font-bold">
                <td class="py-2 pl-2 rounded-tl-lg">
                    Order ID
                </td>
                <td class="py-2 pl-2">
                    Customer Name
                </td>
                <td class="py-2 pl-2">
                    Price
                </td>
                <td class="py-2 pl-2">
                    Status
                </td>
                <td class="py-2 pl-2">
                    Date
                </td>
                <td class="py-2 pl-2 rounded-tr-lg">
                    View Details
                </td>
            </thead>
            <tbody class="text-sm">
                <tr class="bg-gray-100 hover:bg-primary hover:bg-opacity-20 transition duration-200">
                    <td class="py-3 pl-2">
                        #OR7546
                    </td>
                    <td class="py-3 pl-2 capitalize">
                        Harold Hobbs
                    </td>
                    <td class="py-3 pl-2">
                        $ 123.00
                    </td>
                    <td class="py-3 pl-2">
                        <span class="bg-green-500 px-1.5 py-0.5 rounded-lg text-gray-100">Paid</span>
                    </td>
                    <td class="py-3 pl-2">
                        Sep 30, 2021
                    </td>
                    <td class="py-3 pl-2">
                        <a href="#" class="bg-primary hover:bg-opacity-90 px-2 py-1 mr-2 text-gray-100 rounded-lg">View Details</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}
    <div x-data="{ 'openTransact': false }" @keydown.escape="openTransact = false">
    
        {{-- USER MODAL --}}
    
        <!-- start:: Basic Sign In Modal -->
        <div 
            x-show="openTransact"
            x-transition.opacity
            x-transition:enter.duration.100ms
            x-transition:leave.duration.300ms
            x-cloak
            class="fixed top-0 left-0 z-50 bg-black bg-opacity-70 h-screen w-full flex items-center justify-center"
        >
            <div 
                @click.away="openTransact = false" 
                class="relative w-5/6 md:w-3/4 lg:w-2/3 xl:w-1/2 bg-white p-10 rounded-lg shadow-xl"
            >
                <span 
                    @click="openTransact = false"
                    class="absolute right-2 top-1 text-xl cursor-pointer hover:text-gray-600"
                    title="Close"
                >
                    &#x2715
                </span>
                @if ($action == 'status')
                    <!-- start::Text And Image Select -->
                    <div 
                        x-data="{ selected: {{ $status->status }} }"
                        class="flex flex-col"
                    >
                        <label for="text_and_image_select">Order Status {{ $status->status }} {{ $selectStatus }}</label>
                        <select
                            x-model="selected"
                            name="text_and_image_select"
                            id="text_and_image_select"
                            wire:model="selectStatus"
                            class="mt-2 py-1 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300"
                            :class="selected == 1 ? 'border-blue-500 focus:border-blue-500' 
                                : selected == 2 ? 'border-red-600 focus:border-red-600' 
                                : selected == 3 ? 'border-green-600 focus:border-green-600' 
                                : selected == 0 ? ''"
                        >
                            <option value="0">Processing</option>
                            <option value="1">Preparing to Ship</option>
                            <option value="2">Shipped</option>
                            <option value="3">Delivered</option>
                        </select>

                        <button 
                            class="w-full bg-blue-500 hover:bg-blue-500 text-gray-100 py-2 rounded-lg transition duration-100"
                            wire:click="updateStatus"
                            x-on:close-modal.window="openTransact = false"
                        >
                            Save
                        </button>
                    </div>
                    <!-- end::Text And Image Select  -->
                @else
                    @livewire('show-order-products')
                @endif
                
            </div>
        </div>
        <!-- end:: Basic Sign In Modal -->
        
        {{-- USER TABLE --}}
        <div class="w-full overflow-x-auto">
            <div class="flex flex-col mt-8">
                <!-- start::Advance Table Manage Icons -->
                <div class="bg-white rounded-lg px-8 py-6 overflow-x-scroll custom-scrollbar mb-12">
                    <h4 class="text-xl font-semibold">Recent transactions</h4>
                    <!-- start:: Basic Sign In Modal -->
                    {{ $OrderId }}
                    <!-- end:: Basic Sign In Modal -->
                    
                    <div class="mt-4 flex items-left justify-left space-x-4">
                        <form class="relative flex items-center">
                            <input 
                                type="search"
                                wire:model="searchTerm"
                                name="input_search_without_btn" 
                                id="input_search_without_btn" 
                                class="flex-1 py-0.5 pl-10 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300" 
                                placeholder="Search..."
                            >
                            <span class="absolute left-2 bg-transparent flex items-center justify-center" @click="show = !show">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                        </form>
                    </div>
    
                    <table class="w-full my-8 whitespace-nowrap">
                        <thead class="bg-secondary text-gray-100 font-bold">
                            <td class="py-2 pl-2">
                                Order ID
                            </td>
                            <td class="py-2 pl-2">
                                Customer Name
                            </td>
                            <td class="py-2 pl-2">
                                Email
                            </td>
                            <td class="py-2 pl-2">
                                address
                            </td>
                            <td class="py-2 pl-2">
                                Status
                            </td>
                            <td class="py-2 pl-2">
                                Date
                            </td>
                            <td class="py-2 pl-2">
                                View Details
                            </td>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($orders as $product)
                            <tr class="bg-gray-100 hover:bg-primary hover:bg-opacity-20 transition duration-200">
                                <td class="py-3 pl-2">
                                    {{ $product->tracking_no }}
                                </td>
                                <td class="py-3 pl-2">
                                    {{ $product->name }}
                                </td>
                                <td class="py-3 pl-2 capitalize">
                                    {{ $product->email }}
                                    
                                </td>
                                <td class="py-3 pl-2 capitalize">
                                    {{ $product->address }}
                                    <br>
                                    {{ $product->city }}, {{ $product->state }}
                                </td>
                                <td class="py-3 pl-2 capitalize">
                                    <button
                                        wire:click="selectOrder({{ $product->id }}, 'status')"
                                        @click="openTransact = true"
                                    >
                                        @if ($product->status == 0)
                                            <span class="bg-yellow-200 text-yellow-600 px-2 py-1 text-sm rounded">
                                                Processing
                                            </span>
                                        @elseif($product->status == 1)
                                            <span class="bg-blue-200 text-blue-600 px-2 py-1 text-sm rounded">
                                                Preparing to ship
                                            </span>
                                        @elseif($product->status == 2)
                                            <span class="bg-primary bg-opacity-20 text-primary px-2 py-1 text-sm rounded">
                                                Shipped
                                            </span>
                                        @elseif($product->status == 3)
                                            <span class="bg-green-200 text-green-600 px-2 py-1 text-sm rounded">
                                                Delivered
                                            </span>
                                        @endif
                                    </button>
                                </td>
                                <td class="py-3 pl-2 capitalize">
                                    {{-- {{ $product->created_at->format('jS F Y g:i A') }} --}}
                                    {{ date("d M Y g:i A", strtotime($product->created_at)); }}
                                </td>
                                <td class="py-3 pl-2 items-center space-x-2">
                                    <button
                                        wire:click="selectOrder({{ $product->id }}, 'view')"
                                        @click="openTransact = true"
                                    >
                                        <svg class="h-4 w-4 text-red-500 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                    {{-- <button
                                        wire:click="selectProduct({{ $product->id }}, 'delete')"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
                <!-- end::Advance Table Manage Icons -->
            </div>
        </div>
    </div>
</div>
