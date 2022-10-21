$(document).ready(function() {

  // Check for click events on the navbar burger icon
  $(".navbar-burger").click(function() {

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");

  });
});

document.addEventListener('DOMContentLoaded', () => {
  // 1. Display file name when select file
  let fileInputs = document.querySelectorAll('.file.has-name')
  for (let fileInput of fileInputs) {
    let input = fileInput.querySelector('.file-input')
    let name = fileInput.querySelector('.file-name')
    input.addEventListener('change', () => {
      let files = input.files
      if (files.length === 0) {
        name.innerText = 'No file selected'
      } else {
        name.innerText = files[0].name
      }
    })
  }

  // 2. Remove file name when form reset
  let forms = document.getElementsByTagName('form')
  for (let form of forms) {
    form.addEventListener('reset', () => {
      console.log('a')
      let names = form.querySelectorAll('.file-name')
      for (let name of names) {
        name.innerText = 'No file selected'
      }
    })
  }
});

// Name title

$(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            var rm_underscore = fileName.replace('_',' ');
            var rm_ext = rm_underscore.substring(0,rm_underscore.lastIndexOf('.'));
             $("input:text").val(rm_ext);
        });//from w ww  .  j  ava  2 s.c o m
    });




// Copy text

function copyLink() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the text: " + copyText.value);
} 


// // MODAL ON SELECT OPTION 1
