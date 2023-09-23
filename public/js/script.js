// Dark mode switcher //

// icons
const sunIcon = document.querySelector(".happy-light")
const moonIcon = document.querySelector(".happy-dark")

// theme vars
const userTheme = localStorage.getItem("theme");
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

// icon toggle
const iconToggle = () => {
  moonIcon.classList.toggle("display-none");
  sunIcon.classList.toggle("display-none");
}

// initial theme check
const themeCheck = () => {
  if (userTheme === "dark" || (!userTheme && systemTheme)) {
    document.documentElement.classList.add("dark");
    moonIcon.classList.add("display-none");
    return;
  }
  sunIcon.classList.add("display-none");
}

// manual theme switch
const themeSwitch = () => {
  if (document.documentElement.classList.contains("dark")) {
    document.documentElement.classList.remove("dark");
    localStorage.setItem("theme", "light");
    iconToggle();
    return;
  }
  document.documentElement.classList.add("dark");
  localStorage.setItem("theme", "dark");
  iconToggle();
}


// call theme switch on clicking button
sunIcon.addEventListener("click", () => {
  themeSwitch();
})
moonIcon.addEventListener("click", () => {
  themeSwitch();
})
// invoke theme check on initial load
themeCheck();

// end dark and light //




//============= header ============//

function opennav() {
  document.querySelector(".nav-item").classList.toggle("opennav");
  document.querySelector(".overlay").classList.toggle("show");
}
function removenav() {
  document.querySelector(".nav-item").classList.remove("opennav");
  document.querySelector(".overlay").classList.remove("show");

}
function submenu() {
  document.querySelector(".sub-menu-item").classList.toggle("show-subMenu");
}

//============= END header ============//


//============= Popup ============//

var popupBox = document.querySelector(".popup1");
var popupBox2 = document.querySelector(".popup2");
var popupBox3 = document.querySelector(".popup3");
var popupBox4 = document.querySelector(".popup4");
var popupBox5 = document.querySelector(".popup5");
var popupBox6 = document.querySelector(".popup6");

function popup1(){
  popupBox.classList.add("openPopup");
}
function popup2(){
  popupBox2.classList.add("openPopup");
}
function popup3(){
  popupBox3.classList.add("openPopup");
}
function popup4(){
  popupBox4.classList.add("openPopup");
}
function popup5(){
  popupBox5.classList.add("openPopup");
}
function popup6(){
  popupBox6.classList.add("openPopup");
}

function closeP(){
  popupBox.classList.remove("openPopup");
  popupBox2.classList.remove("openPopup");
  popupBox3.classList.remove("openPopup");
  popupBox4.classList.remove("openPopup");
  popupBox5.classList.remove("openPopup");
  popupBox6.classList.remove("openPopup");
  getStart.classList.remove("openPopup");
}

//============= END Popup ============//


var getStart = document.querySelector(".getstart");
function getstart(){
  getStart.classList.add("openPopup");
}
