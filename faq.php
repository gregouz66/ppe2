<?php include ('inc/incfaq/GETnumFaq.php') ?>

<!-- HEADER -->

<?php include ('inc/header.php') ?>
<!-- CSS DE LA PAGE -->
<link rel="stylesheet" href="assets/css/faq.css" />

<!-- Wrapper -->
    <div id="wrapper">

    <!-- Main -->
    <div id="main"">
  <article class="post">

    <?php
      switch ($numfaq) {
        case '1':
        include('inc/incfaq/question1.php');
        break;

        case '2':
        include('inc/incfaq/question2.php');
        break;

        case '3':
        include('inc/incfaq/question3.php');
        break;

        case '4':
        include('inc/incfaq/question4.php');
        break;

        case '5':
        include('inc/incfaq/question5.php');
        break;

        case '6':
        include('inc/incfaq/question6.php');
        break;

        default:
        include('inc/incfaq/questiondefaut.php');
        break;
      }
    ?>

  </article>
</div>

<!-- Main -->
<div id="main">
<!-- Sidebar -->
<section id="sidebar">
  <!-- Intro -->
  <section id="intro">
    <!--<a href="#" class="logo"><img src="" alt="" /></a>-->
    <header>
      <a href="faq.php"><h2 >FAQ</h2></a>
      <h3 id="h3faq"> Les questions fréquentes </h3>
        <ul><li>
          <a id="afaq" href="faq.php?numfaq=1">
            <p>La question 1</p>
          </a>
        </li>
        <li>
          <a id="afaq" href="faq.php?numfaq=2">
            <p>La question 2</p>
          </a>
        </li>
        <li>
          <a id="afaq" href="faq.php?numfaq=3">
            <p>La question 3</p>
          </a>
        </li>
        <li>
          <a id="afaq" href="faq.php?numfaq=4">
            <p>La question 4</p>
          </a>
        </li>
        <li>
          <a id="afaq" href="faq.php?numfaq=5">
            <p>La question 5</p>
          </a>
        </li>
        <li>
          <a id="afaq" href="faq.php?numfaq=6">
            <p>La question 6</p>
          </a>
        </li>
      </ul>

    </header>
  </section>
</section>


<!-- Footer -->
<?php include('inc/footer.php') ?>
