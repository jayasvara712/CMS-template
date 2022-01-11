<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/font-awesome/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/asset/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla/node_modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla/assets/css/components.css">

  <title>Proajsa</title>
</head>

<body>

  <?= $this->renderSection('content'); ?>

  <!-- footer -->
  <section class="footer">
    <div class="row">
      <div class="col text-center">
        <p>2021 All Right Reserved by Projasa.</p>
      </div>
    </div>
  </section>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= base_url(); ?>/stisla/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/stisla/node_modules/popper.js/dist/popper.min.js"></script>
  <script src="<?= base_url(); ?>/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>/stisla/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>/stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?= base_url(); ?>/stisla/node_modules/ninescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>/stisla/assets/js/scripts.js"></script>
  <script>
    $(document).ready(function() {
      price();
    });

    $('body').scrollspy({
      target: '#navbar-landingpage'
    })

    function price() {
      var x = document.getElementsByClassName('pricing-details');
      let y = '';
      for (let index = 0; index < x.length; index++) {
        y = x[index].innerHTML;
        // alert(y);
        y = y.replace(/<ul>/g, "")
          .replace(/<li>/g, "<div class=\"pricing-item\"><div class=\"pricing-item-icon\"><i class=\"fas fa-check\"></i></div><div class=\"pricing-item-label\">")
          .replace(/<\/li>/g, "</div ></div >")
          .replace(/<\/ul>/g, "");
        x[index].innerHTML = y;
      }
    }

    $("#customer-testi").owlCarousel({
      loop: true,
      center: true,
      items: 3,
      margin: 0,
      autoplay: true,
      dots: true,
      autoplayTimeout: 8500,
      smartSpeed: 450,
      nav: false,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 3
        }
      }
    });

    $("#price-list").owlCarousel({
      center: true,
      loop: false,
      margin: 10,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 2,
          nav: true
        },
        1000: {
          items: 3,
          nav: true
        }
      }
    });
  </script>
</body>

</html>