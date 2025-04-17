window.onload = function (e) {
  let flagInterval;
  for (let i = 1; i <= document.querySelectorAll("slider").length - 1; i++) {
    document.querySelectorAll("slider")[i].classList.add("autoSlide");
  }

  let autoSlide = 1;
  showFlags("slider");

  if (!flagInterval) {
    flagInterval = setInterval(() => {
      showFlags((autoSlide += 1));
    }, 5000);
  }

  function showFlags(n) {
    const flags_slide = document.getElementsByClassName("slider");
    if (n > flags_slide.length) {
      autoSlide = 1;
    }
    if (n < 1) {
      autoSlide = flags_slide.length;
    }
    for (let i = 0; i < flags_slide.length; i++) {
      flags_slide[i].style.display = "none";
    }

    if (flags_slide.length > 0) {
      flags_slide[autoSlide - 1].style.display = "block";
    }
  }
};
