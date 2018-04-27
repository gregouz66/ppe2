<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php if(isset($_SESSION['id_utilisateur']) OR isset($_SESSION['id_client'])) { ?>
          <h3 class="modal-title" id="exampleModalLabel">Votre espace membre</h3>
        <?php } else { ?>
          <h3 class="modal-title" id="exampleModalLabel">Rejoignez-nous !</h3>
        <?php } ?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <?php if(isset($_SESSION['id_utilisateur']) OR isset($_SESSION['id_client'])) { ?>
        <a href="profil.php"><button class="">Mon compte</button></a>
        <a href="logout.php" class=""><button class="">Déconnexion</button></a>
      <?php } else { ?>
        <a href="connexion.php"><button class="">Connexion</button></a>
        <a href="inscription.php"><button class="">inscription</button></a>
      <?php } ?>

      </div>
    </form>
    </div>
  </div>
</div>
