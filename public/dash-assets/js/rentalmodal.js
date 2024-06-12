var nextPartBtn = document.getElementById("btn-next");
var nextPartBtn1 = document.getElementById("btn-next1");
var nextPartBtn2 = document.getElementById("btn-next2");
var nextPartBtn3 = document.getElementById("btn-next3");
var backPartBtn = document.getElementById("btn-back");
var backPartBtn1 = document.getElementById("btn-back1");
var backPartBtn2 = document.getElementById("btn-back2");
var backPartBtn3 = document.getElementById("btn-back3");
var saveBtn = document.getElementById("btn-save");
var firstPart = document.getElementById("first_part");
var secondPart = document.getElementById("second_part");
var thirdPart = document.getElementById("third_part");
var fourthPart = document.getElementById("fourth_part");
var lastPart = document.getElementById("last_part");

nextPartBtn.addEventListener("click", function(){
  firstPart.style.display = "none";
  secondPart.style.display = "block";
  nextPartBtn.style.display = "none";
  nextPartBtn1.style.display = "inline-flex";
  backPartBtn.style.display = "inline-flex";
  saveBtn.style.display = "none";
});

backPartBtn.addEventListener("click", function(){
  firstPart.style.display = "block";
  secondPart.style.display = "none";
  nextPartBtn.style.display = "inline-flex";
  nextPartBtn1.style.display = "none";
  backPartBtn.style.display = "none";
  saveBtn.style.display = "none";
});

nextPartBtn1.addEventListener("click", function(){
  secondPart.style.display = "none";
  thirdPart.style.display = "block";
  nextPartBtn1.style.display = "none";
  nextPartBtn2.style.display = "inline-flex";
  backPartBtn.style.display = "none";
  backPartBtn1.style.display = "inline-flex";
  saveBtn.style.display = "none";
});

backPartBtn1.addEventListener("click", function(){
  secondPart.style.display = "block";
  thirdPart.style.display = "none";
  nextPartBtn1.style.display = "inline-flex";
  nextPartBtn2.style.display = "none";
  backPartBtn.style.display = "inline-flex";
  backPartBtn1.style.display = "none";
  saveBtn.style.display = "none";
});

nextPartBtn2.addEventListener("click", function(){
  thirdPart.style.display = "none";
  fourthPart.style.display = "block";
  nextPartBtn2.style.display = "none";
  nextPartBtn3.style.display = "inline-flex";
  backPartBtn1.style.display = "none";
  backPartBtn2.style.display = "inline-flex";
  saveBtn.style.display = "none";
});

backPartBtn2.addEventListener("click", function(){
  thirdPart.style.display = "block";
  fourthPart.style.display = "none";
  nextPartBtn2.style.display = "inline-flex";
  nextPartBtn3.style.display = "none";
  backPartBtn1.style.display = "inline-flex";
  backPartBtn2.style.display = "none";
  saveBtn.style.display = "none";
});

nextPartBtn3.addEventListener("click", function(){
  fourthPart.style.display = "none";
  lastPart.style.display = "block";
  nextPartBtn3.style.display = "none";
  backPartBtn2.style.display = "none";
  backPartBtn3.style.display = "inline-flex";
  saveBtn.style.display = "inline-flex";
});

backPartBtn3.addEventListener("click", function(){
  fourthPart.style.display = "block";
  lastPart.style.display = "none";
  nextPartBtn3.style.display = "inline-flex";
  backPartBtn2.style.display = "inline-flex";
  backPartBtn3.style.display = "none";
  saveBtn.style.display = "none";
});