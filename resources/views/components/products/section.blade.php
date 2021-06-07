<section id="vente_flash" class="{{$class ?? ''}}">
    <div class="{{$titleClass ?? "bg-primary font-semibold py-3"}}">
        <div class="width uppercase px-5">
            {{$title ?? "Product section"}}
        </div>
    </div>
    <div class="width py-5 px-3 md:px-0 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-6 gap-3 gap-y-5">
        {{$slot}}
    </div>
</section>
