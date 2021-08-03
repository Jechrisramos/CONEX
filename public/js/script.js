// WYSIWYG Text Editor #explanationTxt
tinymce.init({
    selector:'textarea#explanationTxt',
    plugins: "lists, link, image, media",
    toolbar:"bold italic backcolor forecolor | link removeformat",
    setup: (editor) => {
        // Apply the focus effect
        editor.on("init", () => {
          editor.getContainer().style.transition =
            "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
        });
        editor.on("focus", () => {
          (editor.getContainer().style.boxShadow =
            "0 0 0 .2rem rgba(0, 123, 255, .25)"),
            (editor.getContainer().style.borderColor = "#80bdff");
        });
        editor.on("blur", () => {
          (editor.getContainer().style.boxShadow = ""),
            (editor.getContainer().style.borderColor = "");
        });
      },
});

// Add New Ticket Form: --Hide HC Checkbox if plantype is either Build Starter or Build Standard
let planType = document.getElementById('planType');
let HCCheckbox = document.getElementById('HCcheckbox');
planType.addEventListener("change", function(){
    if(planType.value == 1 || planType.value == 2 ){
        HCCheckbox.style.display = 'none';
        HCCheckbox.checked = false;
    }else{
        HCCheckbox.style.display = 'block';
    }
});

// Script for tab panel of tickets
let tab1 = document.getElementById('tab1');
let tab2 = document.getElementById('tab2');
let tab3 = document.getElementById('tab3');

let informationTab = document.getElementById('informationTab');
let remarksTab = document.getElementById('remarksTab');
let graphsTab = document.getElementById('graphsTab');

tab1.addEventListener("click", function(){
    tab1.classList.add("active");
    tab2.classList.remove("active");
    tab3.classList.remove("active");

    informationTab.classList.add("active");
    remarksTab.classList.remove("active");
    graphsTab.classList.remove("active");
});

tab2.addEventListener("click", function(){
    tab1.classList.remove("active");
    tab2.classList.add("active");
    tab3.classList.remove("active");
    
    informationTab.classList.remove("active");
    remarksTab.classList.add("active");
    graphsTab.classList.remove("active");
});

tab3.addEventListener("click", function(){
    tab1.classList.remove("active");
    tab2.classList.remove("active");
    tab3.classList.add("active");

    informationTab.classList.remove("active");
    remarksTab.classList.remove("active");
    graphsTab.classList.add("active");
});

/* ---- script for image lightbox effect ---- */
const closeGalleryModal = document.getElementById('closeGalleryModal');
const imgContent = document.getElementById('imgContent');

let imgs = document.querySelectorAll('img.attachment');
   
for (let i = 0; i < imgs.length; i++){
    imgs[i].addEventListener("click", function(){
        galleryModal.style.display = 'block';

        let img = document.createElement("img");
        img.setAttribute("class", "attachmentImgs");
        img.setAttribute("src", imgs[i].src);
        imgContent.appendChild(img);

        let photoTitle = document.createElement("p");
        photoTitle.setAttribute("class", "photoTitle");
        let photoTitleText = document.createTextNode(imgs[i].src);
        photoTitle.appendChild(photoTitleText);
        imgContent.appendChild(photoTitle);
        console.log(imgs[i].innerHTML);
    });
}

closeGalleryModal.addEventListener("click", function(){ 
    galleryModal.style.display = 'none';
    location.reload();
});


