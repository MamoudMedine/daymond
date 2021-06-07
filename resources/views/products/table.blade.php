<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Cover Url</th>
        <th>Images</th>
        <th>Condition</th>
        <th>Description</th>
        <th>Wholesale Price</th>
        <th>Old Wholesale Price</th>
        <th>Commission</th>
        <th>Min Suggestion Price</th>
        <th>Max Suggestion Price</th>
        <th>Delivery Price</th>
        <th>Abj Delivery Price</th>
        <th>Location</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
            <td>{{ $product->cover_url }}</td>
            <td>{{ $product->images }}</td>
            <td>{{ $product->condition }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->wholesale_price }}</td>
            <td>{{ $product->old_wholesale_price }}</td>
            <td>{{ $product->commission }}</td>
            <td>{{ $product->min_suggestion_price }}</td>
            <td>{{ $product->max_suggestion_price }}</td>
            <td>{{ $product->delivery_price }}</td>
            <td>{{ $product->abj_delivery_price }}</td>
            <td>{{ $product->location }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
