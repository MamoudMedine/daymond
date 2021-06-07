<style>

    .lb_row > .lb_column {
        padding: 0 8px;
    }

    .lb_row:after {
        content: "";
        display: table;
        clear: both;
    }

    .lb_column {
        float: left;
        width: 25%;
    }

    /* The Modal (background) */
    .lb_modal {
        display: none;
        position: fixed;
        z-index: 999 !important;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .lb_modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
    }

    /* The Close Button */
    .lb_close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .lb_close:hover,
    .lb_close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .lightBoxSlideItems {
        display: none;
        height: 80% !important;
        overflow: hidden !important;
    }
    .lightBoxSlideItems img {
        position: relative;
        width: 100% !important;
        object-fit: cover;
        max-height: 500px;
    }

    .cursor {
        cursor: pointer;
    }

    /* Next & lb_previous buttons */
    .lb_prev,
    .lb_next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "lb_next button" to the right */
    .lb_next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .lb_prev:hover,
    .lb_next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .lb_img {
        margin-bottom: -4px;
    }

    .lb_caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .lb_demo {
        opacity: 0.6;
    }

    .lb_active,
    .lb_demo:hover {
        opacity: 1;
    }

    .lb_img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>




<div id="lightBoxModal" class="lb_modal">
    <span class="lb_close cursor" onclick="closeModal()">&times;</span>
    <div class="lb_modal-content">
        @if (isset($images))
            @foreach ($images as $image)
                <div class="lightBoxSlideItems">
                    <div class="numbertext">{{$loop->index+1}} / {{$images->count()}}</div>
                    <img class="lb_img" src="{{$image->src}}" style="width:100%">
                </div>
            @endforeach
        @endif


        <a class="lb_prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="lb_next" onclick="plusSlides(1)">&#10095;</a>

        <div class="lb_caption-container">
            <p id="lb_caption"></p>
        </div>
        @if (isset($images))
            @foreach ($images as $image)
                <div class="lb_column">
                    <img class="lb_img lb_demo cursor" src="{{$image->src }}" style="width:100%" onclick="currentSlide($loop->index+1)" alt="{{$image->alt ?? 'Image'.($loop->index+1)}}">
                </div>
            @endforeach
        @endif
    </div>
</div>


<script>
    function openModal() {
        document.getElementById("lightBoxModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("lightBoxModal").style.display = "none";
    }
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        console.log("slide"+ n);
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("lightBoxSlideItems");
        console.log(slides.length);
        var dots = document.getElementsByClassName("lb_demo");
        var captionText = document.getElementById("lb_caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" lb_active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " lb_active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
