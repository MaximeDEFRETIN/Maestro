<?php
require_once 'header.php';
require_once 'controllers/profil-Controller.php';
?>
<div class="row marginTopMin marginBottomMin">
    <form class="col s6 offset-s3">
        <div id="searchPartition">
            <input type="search" class="input-field" placeholder="Recherche" name="searchBar" id="searchBar" />
        </div>
    </form>
    <div id="results" class="black-text col s6 offset-s3 amber lighten-5" hidden></div>
</div>
<span class="separateur col offset-s2 s8 marginTopMin marginBottomMin"></span>
<div class="marginTopMin col s12 center-align marginBottomMin">
    <a href="Partitions" class="col s3 black-text" title="Éditeur de partition">Éditer une partition ?</a>
    <a href="Metronome" class="col s3 black-text" title="Métronome">Besoin d'un métronome ?</a>
    <a href="Piano" class="col s3 black-text" alt="Piano" title="Piano">Jouer du piano ?</a>
    <a href="Batterie" class="col s3 black-text" title="Batterie" >Jouer de la batterie ?</a>
</div>
<div class="col offset-s1 s10 bacckgroundE">
    <table class="marginTopMin marginBottomMin striped centered responsive-table display col s12">
        <thead>
            <caption>Tes partitions ...</caption>
        </thead>
        <tbody>
            <?php foreach ($partitionList as $partition) { ?>
                <tr>
                    <td><a href="<?= $partition->pathPartition ?>" target="_blank"><?= $partition->namePartition ?></a></td>
                    <td><?= $partition->datePartition ?></td>
                    <td><a href="profil.php?del=<?= $partition->pathPartition ?>" class="amber btn-flat waves-effect waves-orange centered">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table class="centered striped responsive-table display col s12 marginBottomMin">
        <thead>
            <caption>Les commentaires des autres ...</caption>
        </thead>
        <tbody>
            <?php foreach ($commentsUsersList as $comments) { ?>
                <tr>
                    <td><p class="pseudoUsersComments marginTop"><?= $comments->pseudo ?></p></td>
                    <td><p class="namePartitionComments"><?= $comments->namePartition ?></p></td>
                    <td><p><?= $comments->userComment ?></p></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once 'footer.php';