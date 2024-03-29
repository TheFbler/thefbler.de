window.onload=getExif;

verweildauer = false;

// Get the button:
mybutton = document.getElementById("backToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

// Exif Daten für übergebenes Bild auslesen
function getExif(img,divid) {
  EXIF.getData(img, function() {
        // Alle div Container leeren
        $(".exifPosition").html("");
        $(".exifPosition").css('background-color', 'transparent');
        // EXIF Daten auslesen
        var marke = EXIF.getTag(this, "Make")
        var model = EXIF.getTag(this, "Model");
        var iso = EXIF.getTag(this, "ISOSpeedRatings");
        var blende = EXIF.getTag(this, "FNumber");
        var belzeit = EXIF.getTag(this, "ExposureTime");
        var brennw = EXIF.getTag(this, "FocalLength");
        // Ausgabe der Informationen
        console.log("Kamera: " + marke + " " + model +
                    "\nISO: " + iso +
                    "\nBlende: " + blende +
                    "\nBelichtungszeit: " + getExposureTime(belzeit).display + "s" +
                    "\nBrennweite: " + brennw + "mm");
        $(divid).html("Kamera: " + marke + " " + model +
                    "<br/>ISO: " + iso +
                    "<br/>Blende: " + blende +
                    "<br/>Belichtungszeit: " + getExposureTime(belzeit).display + "s" +
                    "<br/>Brennweite: " + brennw + "mm");
        $(divid).css('background-color', 'rgba(255,255,255,0.5)');
    });
}

function gcd(a, b) {
	return (b) ? gcd(b, a % b) : a;
}

var getExposureTime = function (_decimal) {
  if(_decimal < 1) {// Belichtungszeit Werte über 1 nicht berechnen
  	var top		= _decimal.toString().replace(/\d+[.]/, '');
  	var bottom	= Math.pow(10, top.length);
  	if (_decimal > 1) {
  		top	= +top + Math.floor(_decimal) * bottom;
  	}
  	var x = gcd(top, bottom);
  	return {
  		top		: (top / x),
  		bottom	: (bottom / x),
  		display	: (top / x) + '/' + (bottom / x)
  	};
  } else {
    return {
      top		: _decimal,
  		bottom	: _decimal,
      display : _decimal
    };
  }
};

// Einblenden des Social Media Banners nach 1,5 Minuten (90000)
setTimeout(function(){$("#socialMedia").css('display','block');}, 90000/*2000*/)

//Wenn die Verweildauer größer 5 Sekunden (5000) ist Flag setzen
setTimeout(function(){verweildauer = true;}, 5000)

function noMoreSocialMedia() {
  /*$("#socialMedia").css('display','none');*/
  $("#socialMedia").addClass('fade-out-br');
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
  var datenschutz = $('#datenschutzCheckbox');
  var spamschutz = $('#spamschutz').val();
  var regExMail = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$");

  if(formName == "" || checkForSpamMarks(formName)) {
    formValid = false;
    $("#errorName").html("Pflichtfeld");
    $("#name").css('border', '#e66262 1px solid');
  } else {
    $("#errorName").html("");
    $("#name").css('border', 'revert');
  }

  if(formMail == "" || checkForSpamMarks(formContent)) {
    formValid = false;
    $("#errorMail").html("Pflichtfeld");
    $("#email").css('border', '#e66262 1px solid');
  } else {
    $("#errorMail").html("");
    $("#email").css('border', 'revert');
  }

  if (!regExMail.test(formMail)) {
    $("#errorMail").html("Keine gültige E-Mail Adresse");
    $("#userEmail").css('border', '#e66262 1px solid');
    valid = false;
  } else {
    $("#errorMail").html("");
    $("#userEmail").css('border', 'revert');
  }

  if(formContent == "" || checkForSpamMarks(formContent)) {
    formValid = false;
    $("#errorContent").html("Pflichtfeld");
    $("#content").css('border', '#e66262 1px solid');
  } else {
    $("#errorContent").html("");
    $("#content").css('border', 'revert');
  }

  if(!datenschutz.is(':checked')) {
    formValid = false;
    $("#errorDatenschutz").html("Bitte beachten Sie die Datenschutzerklärung");
  } else {
    $("#errorDatenschutz").html("");
  }

  if(spamschutz !== "2") {
    formValid = false;
    $("#errorSpamschutz").html("Bitte beachten Sie die Aufgabe zum Spamschutz");
    $("#spamschutz").css('border', '#e66262 1px solid');
  } else {
    $("#errorSpamschutz").html("");
    $("#spamschutz").css('border', 'revert');
  }

  if(!verweildauer) {
    formValid = false;
    console.log("ERROR: Die Verweildauer auf der Website ist zu kurz um eine Anfrage zu senden.");
  }

  return formValid;
}

// Gibt true zurück wenn ein Check anschlaegt
function checkForSpamMarks(toCheck) {
  var spam = false;

  // diverse bekannte Patterns
  const cryto = new RegExp('.*Cryto.*', 'i');
  const crypto = new RegExp('.*Crypto.*', 'i');
  const crypta = new RegExp('.*Crypta.*', 'i');
  const telegram = new RegExp('.*Telegram.*', 'i');

  spam = cryto.test(toCheck) || crypto.test(toCheck) || crypta.test(toCheck) ||
         telegram.test(toCheck);

  return spam;
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
    $("#contact").css("color", "white");
    $("#successContact").css("color", "white");
    $("section h3").css("color", "white");
    $("section a").css("color", "white");
    $("form label").css("color", "white");
    $("section a").css("color", "white");
    $("body").css("background-color", "#282c33")
  } else {
    console.log("No more Dark-Mode :(");
    $("body").css("background-color", "white");
    $("section:nth-child(odd)").css("background-color", "#ebeef2");
    $("#vorstellung").css("color", "black");
    $("#contact").css("color", "black");
    $("#successContact").css("color", "white");
    $("section h3").css("color", "black");
    $("section a").css("color", "black");
    $("form label").css("color", "black");
    $("section a").css("color", "black");
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

// Gesamtanzahl der Bilder - der noch nicht sichtbaren ergibt die Anzahl
// der Bilder welche geladen sein müssen bevor die Ladeanimation verschwinden
// kann (Da auch das Bild in Über lazyloaded wird und das erste masonry nicht
// die Klasse loadMoreItems besitzt muss noch 10 abgezogen werden)
function mCallback(mutations) {
  for (let mutation of mutations) {
    if (mutation.type === 'attributes') {
      if(mutation.attributeName === 'class') {
        if($('.lazyloaded').length - 10 ==
            ($('.loadMoreItems').children('div').length
            - $('.loadMoreItems:hidden').children('div').length)) {
          $(".sk-folding-cube").css('display', 'none');
        }
      }
    }
  }
}

observer.observe(loadItems, options);
