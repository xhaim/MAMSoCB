var clickableDiv1 = document.getElementById("dash-nav");
var clickableDiv2 = document.getElementById("masterlist-nav");
var clickableDiv3 = document.getElementById("assoiations-nav");
var clickableDiv4 = document.getElementById("farmers-visit-nav");
var clickableDiv5 = document.getElementById("hvc-nav");
var clickableDiv6 = document.getElementById("inland-fishery-nav");
var clickableDiv7 = document.getElementById("ricecorn-nav");
var clickableDiv8 = document.getElementById("livestock-nav");
var targetDiv1 = document.getElementById("dashboard_cont");
var targetDiv2 = document.getElementById("masterlist_cont");



clickableDiv1.addEventListener("click", function() {
  if (targetDiv1.style.display === "none") {
        targetDiv1.style.display = "inline-flex";
        targetDiv1.style.flexDirection = "column";
        targetDiv2.style.display = "none";
        
  } else {
        targetDiv1.style.display = "inline-flex";
        targetDiv1.style.flexDirection = "column";
        targetDiv2.style.display = "none";     
  }
});

clickableDiv2.addEventListener("click", function() {
    if (targetDiv2.style.display === "none") {
        targetDiv1.style.display = "none";
        targetDiv2.style.display = "inline-flex";
        targetDiv2.style.flexDirection = "column";
      
    } else {
        targetDiv1.style.display = "inline-flex";
        targetDiv1.style.flexDirection = "column";
        targetDiv2.style.display = "none";
    }
  });

 