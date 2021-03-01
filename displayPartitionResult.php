<?php
require_once 'header.php';
require_once 'controllers/displayPartitionResult-Controller.php'
?>
<div class="bacckgroundE col offset-s1 s10 marginTopMin">
    <div class="row marginTopMin">
        <?php foreach ($partitionOtherUser as $var) { ?>
            <p class="col offset-s3 s6 center"><?= $var->pseudo ?></p>
            <p class="col offset-s3 s6 center marginTopMin"><a href="<?= $var->pathPartition ?>" target="_blank"><?= $var->namePartition ?></a></p>
            <p class="col offset-s3 s6 center marginTopMin">Édité le <?= $var->datePartition ?></p>
        <?php } ?>
    </div>
    <img src="assets/img/separateur.png" class="img-responsive col s6 offset-s3" />
    <div class="col offset-s4 s4 center marginTopMin display" id="commentsUser" name="commentsUser" hidden>
        <?php foreach ($commentList as $comments) { ?>
            <p class="marginTopMin"><span class="pseudoUsersComments"><?= $comments->pseudo ?></span>, le <?= $comments->dateComment ?></p>
            <p><?= $comments->userComment ?></p>
        <?php } ?>
    </div>
    <button id="displayedComments" name="displayedComments" class="col offset-s5 s2 btn amber waves-effect waves-orange marginTopMin">Commentaires</button>
    <?php foreach ($messageComment as $value) { ?>
        <p class="marginTop col s12 center-align"><?= $value ?><p>
    <?php } ?>
    <form action="Partition-autres-utilisateurs-<?= $_GET['id']?>" method="post" class="col offset-s3 s6 marginTopMin">
        <textarea id="commentPartition" name="commentPartition" id="commentPartition" rows="5" placeholder="Le nombre de caractère est limité à 200." class="col s12 materialize-textarea" data-length="200"></textarea>
        <input type="submit" id="submitComment" name="submitComment" class="col offset-s3 s6 marginBottom btn amber waves-effect waves-orange marginTop" />
    </form>
</div>
<?php require_once 'footer.php';