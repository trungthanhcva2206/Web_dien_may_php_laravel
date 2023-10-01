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