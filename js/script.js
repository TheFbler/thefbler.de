window.onload=getExif;

// Get the button:
mybutton = document.getElementById("backToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

// Exif Daten für übergebenes Bild auslesen
function getExif(img) {
  EXIF.getData(img, function() {
        var iso = EXIF.getTag(this, "BrightnessValue");
        var blende = EXIF.getTag(this, "FNumber");
        var belzeit = EXIF.getTag(this, "ExposureTime");
        var brennw = EXIF.getTag(this, "FocalLength");
        console.log("ISO: " + iso +
                    "\nBlende: " + blende +
                    "\nBelichtungszeit: " + belzeit) + "s" +
                    "\nBrennweite: " + brennw + "mm")
    });
}

// Activate dark mode automatically
$(document).ready(function() {
  if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    $("#darkModeToggle").prop("checked", true);
    toggleDarkMode($("#darkModeToggle"));
  } /*else {
    $.ajax({
      url: "https://api.sunrise-sunset.org/json?lat=48.8516044&lng=13.34991355",
      type: "GET",
      success: function(result) {
        var now = moment();
        var sunset = moment.utc(result.results.sunset, "hh:mm:ss a");
        var sunrise = moment.utc(result.results.sunrise, "hh:mm:ss a");

        if(now > sunrise && now < sunset) { //no dark mode
          $("#darkModeToggle").prop("checked", false);
        } else if (now < sunrise || now > sunset) {//dark mode
          $("#darkModeToggle").prop("checked", true);
        }

        toggleDarkMode($("#darkModeToggle"));
      },
      error: function(error) {
        console.log(error);
      }
    });
  }*/
});

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
    /*$(".logo").css('background', 'url(\'../thefbler/img/logo_black.png\') center no-repeat');
    $("header a").css('color', 'black');
    $(".navWrapper").css('background-color', 'rgba(255,255,255,0.3)');
    $(".navigationLink").css('border-top', '1px solid black');
    $(".navigationLink").css('border-bottom', '1px solid black');*/
    $("body").css("background-color", "#282c33")
    $("section:nth-child(odd)").css("background-color", "#494c52");
    $("#vorstellung").css("color", "white");
    $("section h3").css("color", "white");
    $("form label").css("color", "white");
    $("body").css("background-color", "#282c33")
  } else {
    console.log("No more Dark-Mode :(");
    $("body").css("background-color", "white");
    $("section:nth-child(odd)").css("background-color", "#ebeef2");
    $("#vorstellung").css("color", "black");
    $("section h3").css("color", "black");
    $("form label").css("color", "black");
  }
}

function updateScrollProgress() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("scrollProgressBar").style.width = scrolled + "%";
}

let loadItems = document.querySelector('.masonryWrapper'),
options = {
  attributes: true,
  subtree: true
},
observer = new MutationObserver(mCallback);

function mCallback(mutations) {
  for (let mutation of mutations) {
    if (mutation.type === 'attributes') {
      if(mutation.attributeName === 'class') {
        if($('.lazyload').length === $(".loadMoreItems:hidden").length * 9
          || $('.lazyload').length === 0) {
          $(".sk-folding-cube").css('display', 'none');
        }
      }
    }
  }
}

observer.observe(loadItems, options);
