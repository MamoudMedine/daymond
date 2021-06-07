<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $product->title }}</p>
</div>

<!-- Cover Url Field -->
<div class="col-sm-12">
    {!! Form::label('cover_url', 'Cover Url:') !!}
    <p>{{ $product->cover_url }}</p>
</div>

<!-- Images Field -->
<div class="col-sm-12">
    {!! Form::label('images', 'Images:') !!}
    <p>{{ $product->images }}</p>
</div>

<!-- Condition Field -->
<div class="col-sm-12">
    {!! Form::label('condition', 'Condition:') !!}
    <p>{{ $product->condition }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Wholesale Price Field -->
<div class="col-sm-12">
    {!! Form::label('wholesale_price', 'Wholesale Price:') !!}
    <p>{{ $product->wholesale_price }}</p>
</div>

<!-- Old Wholesale Price Field -->
<div class="col-sm-12">
    {!! Form::label('old_wholesale_price', 'Old Wholesale Price:') !!}
    <p>{{ $product->old_wholesale_price }}</p>
</div>

<!-- Commission Field -->
<div class="col-sm-12">
    {!! Form::label('commission', 'Commission:') !!}
    <p>{{ $product->commission }}</p>
</div>

<!-- Min Suggestion Price Field -->
<div class="col-sm-12">
    {!! Form::label('min_suggestion_price', 'Min Suggestion Price:') !!}
    <p>{{ $product->min_suggestion_price }}</p>
</div>

<!-- Max Suggestion Price Field -->
<div class="col-sm-12">
    {!! Form::label('max_suggestion_price', 'Max Suggestion Price:') !!}
    <p>{{ $product->max_suggestion_price }}</p>
</div>

<!-- Delivery Price Field -->
<div class="col-sm-12">
    {!! Form::label('delivery_price', 'Delivery Price:') !!}
    <p>{{ $product->delivery_price }}</p>
</div>

<!-- Abj Delivery Price Field -->
<div class="col-sm-12">
    {!! Form::label('abj_delivery_price', 'Abj Delivery Price:') !!}
    <p>{{ $product->abj_delivery_price }}</p>
</div>

<!-- Location Field -->
<div class="col-sm-12">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $product->location }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

