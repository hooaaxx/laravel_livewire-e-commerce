<div>
    <table class="w-full whitespace-nowrap my-4">
        <thead class="border-b border-gray-300 bg-gray-800 text-gray-100">
            <td class="p-1 rounded-tl-lg">image</td>
            <td class="p-1">Product name</td>
            <td class="p-1 rounded-tr-lg">Sum Price</td>
        </thead>
        <tbody>
            @foreach ($orderProducts as $orderProduct)
            <tr
                class="border-b border-gray-200"
            >
                <td class="p-1">
                    @if (!empty($orderProduct->orderProd->product_img))
                        <img width="150px" src="{{ url('storage/products_thumb/'. $orderProduct->orderProd->product_img) }}" />
                    @else
                        No profile image available!
                    @endif
                </td>
                <td class="p-1">
                    {{ $orderProduct->orderProd->product_name }}
                    <br>
                    x{{ $orderProduct->qty }}
                </td>
                <td class="p-1">
                    &#8369;{{ $orderProduct->price }}
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                </td>
                <td>
                </td>
                <td>
                    Shipping Fee: &#8369;50
                    <br>
                    Total: &#8369;{{ $orderProducts->sum('price') + 50 }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
