var nextPartBtn = document.getElementById("btn-next");
var nextPartBtn1 = document.getElementById("btn-next1");
var nextPartBtn2 = document.getElementById("btn-next2");
var nextAwardsPartBtn = document.getElementById("btn-awards-next2");
var nextPartBtn3 = document.getElementById("btn-next3");
var nextPartBtn4 = document.getElementById("btn-next4");

var backPartBtn1 = document.getElementById("btn-back1");
var backPartBtn2 = document.getElementById("btn-back2");
var backAwardsPartBtn = document.getElementById("btn-awards-back2");
var backPartBtn3 = document.getElementById("btn-back3");
var backPartBtn4 = document.getElementById("btn-back4");
var backPartBtn5 = document.getElementById("btn-back5");


var saveBtn = document.getElementById("btn-save");

var firstModalPart = document.getElementById("first_part");
var secondModalPart = document.getElementById("second_modal_part");
var thirdModalPart = document.getElementById("third_part");
var AwardsModalPart = document.getElementById("third_awards_part");
var fourthModalPart = document.getElementById("fourth_part");
var OptionalModalPart1 = document.getElementById("optional_part1");
var OptionalModalPart2 = document.getElementById("optional_part2");

// FIRST PART
nextPartBtn.addEventListener("click", function(){
  firstModalPart.setAttribute("hidden", "hidden");
  secondModalPart.removeAttribute("hidden");
  nextPartBtn.style.display = "none";
  nextPartBtn1.style.display = "inline-flex";
  backPartBtn1.style.display = "inline-flex";
  $('#RegistryModal').html("Additional Information");
  saveBtn.style.display = "none";
});

// SECOND PART
backPartBtn1.addEventListener("click", function(){
  firstModalPart.removeAttribute("hidden");
  secondModalPart.setAttribute("hidden", "hidden");
  thirdModalPart.setAttribute("hidden", "hidden");
  nextPartBtn.style.display = "inline-flex";
  nextPartBtn1.style.display = "none";
  backPartBtn1.style.display = "none";
  $('#RegistryModal').html("House Hold Members");
  saveBtn.style.display = "none";
});

nextPartBtn1.addEventListener("click", function(){
  secondModalPart.setAttribute("hidden", "hidden");
  thirdModalPart.removeAttribute("hidden");
  nextPartBtn1.style.display = "none";
  nextPartBtn2.style.display = "inline-flex";
  backPartBtn2.style.display = "inline-flex";
  backPartBtn1.style.display = "none";
  $('#RegistryModal').html("Organizations/Affiliations (if any);");
  saveBtn.style.display = "none";
});

// THIRD PART
backPartBtn2.addEventListener("click", function(){
  secondModalPart.removeAttribute("hidden");
  thirdModalPart.setAttribute("hidden", "hidden");
  nextPartBtn1.style.display = "inline-flex";
  nextPartBtn2.style.display = "none";
  backPartBtn2.style.display = "none";
  backPartBtn1.style.display = "inline-flex";
  $('#RegistryModal').html("Additional Information");
  saveBtn.style.display = "none";
});

nextPartBtn2.addEventListener("click", function(){
  thirdModalPart.setAttribute("hidden", "hidden");
  AwardsModalPart.removeAttribute("hidden");
  nextPartBtn2.style.display = "none";
  nextAwardsPartBtn.style.display = "inline-flex";
  backAwardsPartBtn.style.display = "inline-flex";
  backPartBtn2.style.display = "none";
  $('#RegistryModal').html("Awards/Citations (if any);");
  saveBtn.style.display = "none";
});

// AWARDS PART
backAwardsPartBtn.addEventListener("click", function(){
  thirdModalPart.removeAttribute("hidden");
  AwardsModalPart.setAttribute("hidden", "hidden");
  nextPartBtn2.style.display = "inline-flex";
  nextAwardsPartBtn.style.display = "none";
  backAwardsPartBtn.style.display = "none";
  backPartBtn2.style.display = "inline-flex";
  $('#RegistryModal').html("Organizations/Affiliations (if any);");
  saveBtn.style.display = "none";
});

nextAwardsPartBtn.addEventListener("click", function(){
  AwardsModalPart.setAttribute("hidden", "hidden");
  fourthModalPart.removeAttribute("hidden");
  nextAwardsPartBtn.style.display = "none";
  nextPartBtn3.style.display = "inline-flex";
  backPartBtn3.style.display = "inline-flex";
  backAwardsPartBtn.style.display = "none";
  $('#RegistryModal').html("Particulars");
  saveBtn.style.display = "inline-flex";
});

// FOURTH PART
backPartBtn3.addEventListener("click", function(){
  AwardsModalPart.removeAttribute("hidden");
  fourthModalPart.setAttribute("hidden", "hidden");
  nextAwardsPartBtn.style.display = "inline-flex";
  nextPartBtn3.style.display = "none";
  backPartBtn3.style.display = "none";
  backAwardsPartBtn.style.display = "inline-flex";
  $('#RegistryModal').html("Awards/Citations (if any);");
  saveBtn.style.display = "none";
});

nextPartBtn3.addEventListener("click", function(){
  fourthModalPart.setAttribute("hidden", "hidden");
  OptionalModalPart1.removeAttribute("hidden");
  nextPartBtn3.style.display = "none";
  nextPartBtn4.style.display = "inline-flex";
  backPartBtn4.style.display = "inline-flex";
  backPartBtn3.style.display = "none";
  saveBtn.style.display = "inline-flex";
});

// FIFTH PART
backPartBtn4.addEventListener("click", function(){
  fourthModalPart.removeAttribute("hidden");
  OptionalModalPart1.setAttribute("hidden", "hidden");
  nextPartBtn3.style.display = "inline-flex";
  nextPartBtn4.style.display = "none";
  backPartBtn4.style.display = "none";
  backPartBtn3.style.display = "inline-flex";
  saveBtn.style.display = "inline-flex";
});

nextPartBtn4.addEventListener("click", function(){
  OptionalModalPart1.setAttribute("hidden", "hidden");
  OptionalModalPart2.removeAttribute("hidden");
  nextPartBtn4.style.display = "none";
  backPartBtn5.style.display = "inline-flex";
  backPartBtn4.style.display = "none";
  saveBtn.style.display = "inline-flex";
});

// SIXTH PART
backPartBtn5.addEventListener("click", function(){
  OptionalModalPart1.removeAttribute("hidden");
  OptionalModalPart2.setAttribute("hidden", "hidden");
  nextPartBtn4.style.display = "inline-flex";
  backPartBtn5.style.display = "none";
  backPartBtn4.style.display = "inline-flex";
  saveBtn.style.display = "inline-flex";
});