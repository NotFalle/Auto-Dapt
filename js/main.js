

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

//Byta higlited bilden

const thumbnails = document.querySelectorAll(".moreimages");
const mainImage = document.querySelector(".selected-image img");
const selectedImage = document.querySelector(".selected-image");

thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener("click", () => {

        const newImage = thumbnail.querySelector("img").src;
        mainImage.src = newImage;

        thumbnails.forEach(item => {
            item.classList.remove("active");
        });

        thumbnail.classList.add("active");
        if (thumbnail.classList.contains("moreimages-special-white")) {
            selectedImage.style.backgroundColor = "white";
        } 
        else {
          selectedImage.style.backgroundColor = "#eaeaea";
        }
    });
});

//Meny selection

const tabs = document.querySelectorAll(".selection-choice");
const contents = document.querySelectorAll(".selection-content");

tabs.forEach(key => {
    key.addEventListener("click", () => {

        tabs.forEach(t => t.classList.remove("active"));
        contents.forEach(c => c.classList.remove("active"));

        key.classList.add("active");

        const target = document.getElementById(key.dataset.key);
        if (target) {
            target.classList.add("active");
        }
    });
});







console.log("main.js file loaded");