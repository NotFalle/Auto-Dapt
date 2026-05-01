

function openNav() {
  document.getElementById("sidenav").style.width = "20rem";
  document.body.classList.add('no-scroll');
  document.documentElement.classList.add('sidebar-open'); 
}

function closeNav() {
  document.getElementById("sidenav").style.width = "0rem";
  document.body.classList.remove('no-scroll');
  document.documentElement.classList.remove('sidebar-open'); 
}








console.log("main.js file loaded");