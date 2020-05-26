<!DOCTYPE html>
<html lang="de">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e8ddae4d2d.js" crossorigin="anonymous"></script>
    <title>TheFbler Fotografie</title>

    <?php echo file_get_contents("head.html") ?>
  </head>

  <body>
    <!-- Header per PHP einfügen -->
    <?php echo file_get_contents("../header.html"); ?>

    <!-- HOME -->
    <section id="home">
      <div id="failureBox">
        <h1>Zefix...</h1>
        <p>do hod wos ned hi ghaud.<br/><br/>Die angeforderte Datei existiert nicht.</p>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/mobile-menu.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
  </body>
</html>
