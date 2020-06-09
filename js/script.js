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

function loadMoreItems() {
  /* Ladeanimation einblenden */
  $(".sk-folding-cube").css('display', 'block');
  $(".loadMoreItems:hidden").slice(0, 1).slideDown();
  if($(".loadMoreItems:hidden").length == 0) {
    $("#loadMore").css('display','none');
  }
}

window.onscroll = function() {
  updateScrollProgress()
};

function toggleDarkMode(obj) {
  if($(obj).is(":checked")) {
    console.log("Triggered Dark-Mode ;)");
    $(".logo").css('background', 'url(\'../img/logo_black.png\') center no-repeat');
    $("header a").css('color', 'black');
    $(".navWrapper").css('background-color', 'rgba(255,255,255,0.3)');
    $(".navigationLink").css('border-top', '1px solid black');
    $(".navigationLink").css('border-bottom', '1px solid black');
  } else {
    console.log("No more Dark-Mode :(");
  }
}

function updateScrollProgress() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("scrollProgressBar").style.width = scrolled + "%";
}

let loadItems = document.querySelector('.loadMoreItems'),
options = {
  attributes: true,
  subtree: true
},
observer = new MutationObserver(mCallback);

function mCallback(mutations) {
  for (let mutation of mutations) {
    if (mutation.type === 'attributes') {
      if(mutation.attributeName == 'class') {
        if($('.lazyload').length == 0) {
          $(".sk-folding-cube").css('display', 'none');
        }
      }
    }
  }
}

observer.observe(loadItems, options);
