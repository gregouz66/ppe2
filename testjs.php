<?php include ('inc/bdd.php'); ?>

<script language=javascript>
function changecategorie()
{
    <?php
        /*On recherche tous les types dans les catégories qui créerons les 'case'*/
        $req = $bdd->prepare("SELECT * FROM client WHERE id_client = 1");
        $req->execute();
        $result = $req->fetchAll();

        foreach($result as $row) {
          ?>
          alert('<?php echo $row[1];?>');
    <?php
        }
    ?>
}

changecategorie();
</script>
