<!DOCTYPE html>
<html lang="de">
  <head>
    <title>TheFbler Fotografie</title>
    <?php echo file_get_contents("head.html") ?>
  </head>

  <body>
    <i onclick="topFunction()" id="backToTopBtn" class="fas fa-chevron-circle-up"></i>
    <div class="tilt-in-fwd-br" id="socialMedia">
      <a id="noMoreSocial" onclick="noMoreSocialMedia()" target="_blank" rel="nofollow noopener"><i class="far fa-times-circle"></i></a>
      <p>Besucht auch meine Social Media Kanäle</p>
      <a class="social2" target="_blank" rel="noopener" href="https://www.facebook.com/fabian.clasen.3"><i class="fab fa-facebook"></i></a>
      <a class="social2" target="_blank" rel="noopener" href="https://www.instagram.com/thefbler"><i class="fab fa-instagram"></i></a>
      <a class="social2" target="_blank" rel="noopener" href="https://www.linkedin.com/in/fabian-clasen-024133245/"><i class="fab fa-linkedin"></i></a><br/>
      <img id="socialImage" class="lazyload" data-src="img/avatar.jpg" alt="Portrait von Fabian" title="Fabian Clasen">
    </div>
    <!-- Header per PHP einfügen -->
    <?php echo file_get_contents("header.html"); ?>

    <!-- HOME -->
    <section id="home">
      <!-- Rounded switch -->
      <label class="switch">
        <input id="darkModeToggle" type="checkbox" onchange="toggleDarkMode(this)">
        <span class="slider round"></span>
      </label>
    </section>

    <!-- ABOUT -->

    <section id="about">
      <h3 class="centerText">ÜBER MICH</h3>
      <hr/>
      <div>
        <ul>
          <li id="portrait">
            <img class="lazyload" data-src="img/avatar.jpg" alt="Portrait von Fabian" title="Fabian Clasen">
          </li>
          <li id="vorstellung">
            <p>Servus, mein Name ist <strong>Fabian Clasen</strong>.
              <br/><br/>Ich bin

              <?php
                $datetime1 = date_create('now');
                $datetime2 = date_create('1997-03-28');
                $interval = date_diff($datetime1, $datetime2);
                echo $interval->format('%Y');
              ?>

              Jahre alt und komme aus dem wunderschönen Markt Schönberg im
              Bayerwald. Seit über fünf Jahren beschäftige ich mich mit der
              Fotografie.
              <br/><br/>
              Meine erste Kamera habe ich mir im Januar 2016 gekauft. Eine
              SONY a3000 mit Kit-Objektiv und einem manuellen Aufsteckblitz.
              Die a3000 hat mich über das Jahr hinweg auf diversen
              Veranstaltungen begleitet. Im Juni 2016 folgte meine
              SONY a57 mit Kit-Objektiv. Im Laufe der Zeit kam ein neuer
              Aufsteckblitz von Metz hinzu. Ein wichtiger Kauf fand Mitte 2018
              statt, meine erste 50mm Festbrennweite (SAL50F18). Durch dieses
              Objektiv machte ich meine ersten Erfahrungen mit Portraits. Nach
              über drei Jahren und tausenden Bildern wurde es erneut Zeit für
              ein Upgrade. Die Wahl fiel auf die SONY a6000 mit dem 16-50mm
              Kit-Objektiv und einer 50mm Vollformat Festbrennweite. Hier möchte
              ich euch einen Einblick in mein Portfolio geben.
            </p>
          </li>
      </div>
    </section>

    <section id="portfolio">
      <h3 class="centerText">PORTFOLIO</h3>
      <hr/>
      <!-- Zweites masonry um weitere Bilder nachladen zu können -->
      <div class="masonryWrapper">
        <?php
          $verzeichnis = "img/masonry";
          // Test, ob es sich um ein Verzeichnis handelt
          if (is_dir($verzeichnis)) {
            // einlesen der Verzeichnisses
            $files = scandir($verzeichnis);
            sort($files);
            foreach($files as $file) {
              if($file !== "." && $file !== "..") {
                if($file === '1_masonry') {
                  echo "<div class=\"masonry\">";
                } else {
                  echo "<div class=\"masonry loadMoreItems\">";
                }

                $verzeichnis2 = $verzeichnis . "/" . $file;
                $files2 = scandir($verzeichnis2);
                sort($files2);
                foreach($files2 as $file2) {
                  // Aktuelles Verzeichnis . und darüberliegendes .. aussortieren
                  if($file2 !== "." && $file2 !== "..") {
                    $str = substr($file2, 2);
                    $strId = substr($str, 0, strpos($str, "."));
                    echo "<div class=\"brick\">";
                    echo "<img onclick=\"getExif(this," . $strId . ")\" class=\"lazyload\" data-src=\"" . $verzeichnis2 . "/" . $file2 . "\" alt=\"" . $str . "\"/>";
                    echo "<div class=\"exifPosition\" id=\"" . $strId . "\"></div>";
                    echo "</div>";
                  }
                }
                echo "</div>";
              }
            }
          }
          ?>
      </div>
      <div class="centerText">
        <div class="sk-folding-cube">
          <div class="sk-cube1 sk-cube"></div>
          <div class="sk-cube2 sk-cube"></div>
          <div class="sk-cube4 sk-cube"></div>
          <div class="sk-cube3 sk-cube"></div>
        </div>
        <a id="loadMore" class="btn" onclick="loadMoreItems()" target="_blank" rel="nofollow noopener">Mehr laden</a>
      </div>
    </section>

    <section id="contact">
      <h3 class="centerText">KONTAKT</h3>
      <hr/>
      <?php
        if(!empty($_POST['sendMail'])) {
          if(!empty($_POST['userName'])
              && !empty($_POST['userEmail'])  && !empty($_POST['content'])) {
            $name = $_POST['userName'];
            $mail = $_POST['userEmail'];
            $message = 'Name: ' . $name . ' // ' . $_POST['content'];

            $mailHeaders = array(
                             'From' => $mail,
                             'Reply-To' => $mail,
                             'X-Mailer' => 'PHP/' . phpversion(),
                             'MIME-Version' => '1.0',
                             'Content-Type' => 'text/plain; charset=UTF-8'
                           );

            if(mail('fabian@thefbler.de',
                    'Kontaktformular: Neue Anfrage',
                    $message,
                    $mailHeaders)) {
              echo '<div id="statusMessage"><p class="successContact centerText">Ihre Anfrage wurde erfolgreich gesendet!</p></div>';
            } else {
              echo '<div id="statusMessage"><p class="errorContact centerText">Leider gab es ein Problem beim Verarbeiten Ihrer Anfrage, bitte versuchen Sie es später erneut!</p></div>';
            }
          }
        } else {
          require_once "contact.php";
        }
      ?>
    </section>

    <!-- Footer per PHP einfügen -->
    <?php require_once "footer.php"; ?>
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/mobile-menu.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="js/lazysizes.min.js" async=""></script>
    <script src="js/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/exif-js"></script>
  </body>
