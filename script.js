const dropArea = document.querySelector(".drag-area"),
dragText = dropArea.querySelector("header"),
button = dropArea.querySelector("#Imagen"),
input = dropArea.querySelector("input"),
skip = dropArea.querySelector("#skipstep"),
cmts = dropArea.querySelector("#comments"),
bupd = dropArea.querySelector("#button_upload"),
area = dropArea.querySelector("#formdrop");
let file; 

button.onclick = ()=>{
  input.click();
}

input.addEventListener("change", function(){
  file = this.files[0];
  dropArea.classList.add("highlight");
  area.classList.add("oculto");
  showFile();
});

dropArea.addEventListener("dragover",(event)=>{
  event.preventDefault();
  dropArea.classList.add("highlight");
  area.classList.add("oculto");
  dragText.textContent = "Drop file here to attach";
  
});

dropArea.addEventListener("dragleave", ()=>{
  dropArea.classList.remove("highlight");
  area.classList.remove("oculto");
  dragText.textContent = "";
});

dropArea.addEventListener("drop", (event)=>{
  event.preventDefault();
  dragText.textContent = "";
  file = event.dataTransfer.files[0];
  document.getElementById('file-name').value = file.name;
  showFile();
});

function showFile()
{
    dropArea.classList.remove("highlight");
    area.classList.remove("oculto");
    cmts.classList.remove("oculto");
    bupd.classList.remove("oculto");
    dragText.textContent = "";
}
