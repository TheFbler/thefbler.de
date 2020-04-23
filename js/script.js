//Get the button:
mybutton = document.getElementById("backToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function validateContactForm() {
  var formValid = true;

  var formName = $('#name').val();
  var formMail = $('#email').val();
  var formContent = $('#content').val();
  var regExMail = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$");

  if(formName == "") {
    formValid = false;
    $("#errorName").html("Pflichtfeld");
    $("#name").css('border', '#e66262 1px solid');
  }

  if(formMail == "") {
    formValid = false;
    $("#errorMail").html("Pflichtfeld");
    $("#email").css('border', '#e66262 1px solid');
  }

  if (!regExMail.test(formMail)) {
    $("#errorMail").html("Keine gültige E-Mail Adresse");
    $("#userEmail").css('border', '#e66262 1px solid');
    valid = false;
  }

  if(formContent == "") {
    formValid = false;
    $("#errorContent").html("Pflichtfeld");
    $("#content").css('border', '#e66262 1px solid');
  }

  return formValid;
}
