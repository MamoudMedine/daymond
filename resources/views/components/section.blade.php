<section id="vente_flash" class="{{$class ?? ''}}">
    <div class="{{$titleClass ?? "bg-primary font-semibold py-3"}}">
        <div class="width uppercase px-5">
            {{$title ?? "Section"}}
        </div>
    </div>
    <div class="width py-5 px-3 md:px-0 ">
        {{$slot}}
    </div>
</section>
