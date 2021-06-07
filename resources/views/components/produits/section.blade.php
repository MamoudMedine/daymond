<section id="vente_flash" class="{{$class ?? ''}}">
    <div class="{{$titleClass ?? "bg-primary font-semibold py-3"}}">
        <div class="px-5 uppercase width">
            {{$title ?? "Product section"}}
        </div>
    </div>
    <div class="grid grid-cols-2 gap-3 px-3 py-5 width md:px-0 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-6 gap-y-5">
        {{$slot}}
    </div>
</section>
