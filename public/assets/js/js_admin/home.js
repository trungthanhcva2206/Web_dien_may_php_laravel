window.addEventListener("scroll", function() {
	var navbar = document.querySelector(".navbar");
    var search_bar = document.querySelector(".search-bar");
    var acc_btn = document.querySelector(".acc-btn");
    var hotl_btn = document.querySelector(".hotl-btn");
	if (window.scrollY > 0) {
	  navbar.classList.add("small");
      search_bar.classList.add("small");
      acc_btn.classList.add("small");
      hotl_btn.classList.add("small");
	} else {
	  navbar.classList.remove("small");
      search_bar.classList.remove("small");
      acc_btn.classList.remove("small");
      hotl_btn.classList.remove("small");
	}
  });

  
const slider = document.querySelector(".slider");
const nextBtn = document.querySelector(".next-btn");
const prevBtn = document.querySelector(".prev-btn");
const slides = document.querySelectorAll(".slide");
const slideIcons = document.querySelectorAll(".slide-icon");
const numberOfSlides = slides.length;
var slideNumber = 0;

nextBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  slideIcons.forEach((slideIcon) => {
    slideIcon.classList.remove("active");
  });

  slideNumber++;

  if(slideNumber > (numberOfSlides - 1)){
    slideNumber = 0;
  }

  slides[slideNumber].classList.add("active");
  slideIcons[slideNumber].classList.add("active");
});

prevBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  slideIcons.forEach((slideIcon) => {
    slideIcon.classList.remove("active");
  });

  slideNumber--;

  if(slideNumber < 0){
    slideNumber = numberOfSlides - 1;
  }

  slides[slideNumber].classList.add("active");
  slideIcons[slideNumber].classList.add("active");
});

var playSlider;

var repeater = () => {
  playSlider = setInterval(function(){
    slides.forEach((slide) => {
      slide.classList.remove("active");
    });
    slideIcons.forEach((slideIcon) => {
      slideIcon.classList.remove("active");
    });

    slideNumber++;

    if(slideNumber > (numberOfSlides - 1)){
      slideNumber = 0;
    }

    slides[slideNumber].classList.add("active");
    slideIcons[slideNumber].classList.add("active");
  }, 8000);
}
repeater();

slider.addEventListener("mouseover", () => {
  clearInterval(playSlider);
});

slider.addEventListener("mouseout", () => {
  repeater();
});

  