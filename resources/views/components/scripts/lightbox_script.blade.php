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
