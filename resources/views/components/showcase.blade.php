<style>

.sc_slides {display: none}
.sc_slides img {
    widows: 100%;
    height: auto;
    object-fit: cover;
    max-height: 500px !important;
}

img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
}

/* Next & previous buttons */
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* The dots/bullets/indicators */
.sc_dot {
    height: 10px;
    width: 10px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active, .dot:hover {
    background-color: white;
    border: 3px solid #ffc000;
}
</style>
</head>
<body>



<div class="slideshow-container">
    @if (isset($images))
        @foreach ($images as $image)
            <div class="sc_slides fade">
                <div class="numbertext">{{$loop->index+1}} / {{$images->count()}}</div>
                <img src="{{$image->src ?? 'img_nature_wide.jpg'}}" style="width:100%">
                <div class="text">{{$image->alt ?? ''}}</div>
            </div>
        @endforeach
    @endif

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
    @if (isset($images))
        @foreach ($images as $image)
            <span class="sc_dot" onclick="currentSlide({{$loop->index+1}})"></span>
        @endforeach
    @endif
</div>


@if (isset($images))
    <script>
        var slideIndex = 1;
        showSlides();

        function plusSlides(n) {
            showSlide(slideIndex += n);
        }

        function currentSlide(n) {
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            var i;
            var slides = document.getElementsByClassName("sc_slides");
            var dots = document.getElementsByClassName("sc_dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }

        function showSlides() {
            var slides = document.getElementsByClassName("sc_slides");

            slideIndex++;
            if(slideIndex > slides.length){
                slideIndex = 1;
            }
            showSlide(slideIndex);

            setTimeout(showSlides, {{ env('SLIDESHOW_DURATION') ?? 2000}}); // Change image every x seconds
        }
    </script>
@endif
