var ddup = {
  // (A) ON PAGE LOAD
  hzone: null, // HTML upload zone
  hstat: null, // HTML upload status
  hform: null, // HTML upload form
  init : function () {
    // (A1) GET HTML ELEMENTS
    ddup.hzone = document.getElementById("upzone");
    ddup.hstat = document.getElementById("upstat");
    ddup.hform = document.getElementById("upform");
    
    // (A2) DRAG-DROP SUPPORTED
    if (window.File && window.FileReader && window.FileList && window.Blob) {
      // HIGHLIGHT DROPZONE ON FILE HOVER
      ddup.hzone.addEventListener("dragenter", function (e) {
        e.preventDefault();
        e.stopPropagation();
        ddup.hzone.classList.add('highlight');
      });
      ddup.hzone.addEventListener("dragleave", function (e) {
        e.preventDefault();
        e.stopPropagation();
        ddup.hzone.classList.remove('highlight');
      });
      
      // DROP TO UPLOAD FILE
      ddup.hzone.addEventListener("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();
      });
      ddup.hzone.addEventListener("drop", function (e) {
        e.preventDefault();
        e.stopPropagation();
        ddup.hzone.classList.remove('highlight');
        ddup.queue(e.dataTransfer.files);
      });
    }

    // (A3) DRAG-DROP UPLOAD NOT SUPPORTED
    else {
      ddup.hzone.style.display = "none";
      ddup.hform.style.display = "block";
    }
  },
  
  // (B) UPLOAD QUEUE + HANDLER
  // NOTE: AJAX IS ASYNCHRONOUS
  // A QUEUE IS REQUIRED TO STOP SERVER FLOOD
  upqueue : [], // upload queue
  uplock : false, // currently uploading a file
  queue : function (files) {
    // FILE LIST INTO QUEUE
    for (let f of files) {
      // OPTIONAL - SHOW UPLOAD STATUS
      ddup.hstat.innerHTML += `<div>${f.name} - Added to queue</div>`;
      // ADD TO QUEUE
      ddup.upqueue.push(f); 
    }
    // GO!
    ddup.go();
  },
  
  // (C) AJAX UPLOAD
  go : function () { if (!ddup.uplock && ddup.upqueue.length!=0) {
    // (C1) QUEUE STATUS UPDATE
    ddup.uplock = true;

    // (C2) PLUCK OUT FIRST FILE IN QUEUE
    let thisfile = ddup.upqueue[0];
    ddup.upqueue.shift();

    // OPTIONAL - SHOW UPLOAD STATUS
    ddup.hstat.innerHTML += `<div>${thisfile.name} - Upload started</div>`;

    // (C3) UPLOAD DATA
    let data = new FormData();
    data.append('upfile', thisfile);
    // ADD MORE POST DATA IF YOU WANT
    // data.append("KEY", "VALUE");
    
    // (C4) AJAX REQUEST
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "dd-upload.php");
    xhr.onload = function () {
      // OPTIONAL - SHOW UPLOAD STATUS
      ddup.hstat.innerHTML += `<div>${thisfile.name} - ${this.response}</div>`;
      // NEXT BETTER PLAYER!
      ddup.uplock = false;
      ddup.go();
    };
    xhr.onerror = function(evt){
      // OPTIONAL - SHOW UPLOAD STATUS
      ddup.hstat.innerHTML += `<div>${thisfile.name} - AJAX ERROR</div>`;
      // NEXT BETTER PLAYER!
      ddup.uplock = false;
      ddup.go();
    };
    xhr.send(data);
  }}
};
window.addEventListener("DOMContentLoaded", ddup.init);