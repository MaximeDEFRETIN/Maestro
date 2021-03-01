<?php
require_once 'header.php';
require_once 'vendor/setasign/fpdf/fpdf.php';
require_once 'controllers/editingPartitions-Controllers.php';
?>
<div class="marginTopMin marginTop marginTop">
    <div class="row">
        <div class="bacckgroundE col offset-s1 col s10 marginBottomMin">
            <div class="row">
                <div class="partitionInstrument container flex marginTopMin">
                    <div class="row">
                        <div class="col s1 pitch">
                            <div class="blackLine col s12 flexColumn n11"></div>
                            <div class="spacing col s12 flexColumn n10"></div>
                            <div class="blackLine col s12 flexColumn n9"></div>
                            <div class="spacing col s12 flexColumn n8"></div>
                            <div class="blackLine col s12 flexColumn n7"></div>
                            <div class="spacing col s12 flexColumn n6"></div>
                            <div class="blackLine col s12 flexColumn n5"></div>
                            <div class="spacing col s12 flexColumn n4"></div>
                            <div class="blackLine col s12 flexColumn n3"></div>
                            <div class="spacing col s12 flexColumn n2"></div>
                            <div class="blackLineAdd col s12 flexColumn n1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="post">
                <div class="flex">
                    <input type="button" id="do" name="do" class="btn amber waves-effect waves-orange center" value="Do" />
                    <input type="button" id="re" name="re" class="btn amber waves-effect waves-orange center" value="Re" />
                    <input type="button" id="mi" name="mi" class="btn amber waves-effect waves-orange center" value="Mi" />
                    <input type="button" id="fa" name="fa" class="btn amber waves-effect waves-orange center" value="Fa" />
                    <input type="button" id="sol" name="sol" class="btn amber waves-effect waves-orange center" value="Sol" />
                    <input type="button" id="la" name="la" class="btn amber waves-effect waves-orange center" value="La" />
                    <input type="button" id="si" name="si" class="btn amber waves-effect waves-orange center" value="Si" />
                    <input type="button" id="do1" name="do1" class="btn amber waves-effect waves-orange center" value="Do" />
                    <input type="button" id="re1" name="re1" class="btn amber waves-effect waves-orange center" value="Re" />
                    <input type="button" id="mi1" name="mi1" class="btn amber waves-effect waves-orange center" value="Mi" />
                    <input type="button" id="fa1" name="fa1" class="btn amber waves-effect waves-orange center" value="Fa" />
                </div>
                <input type="hidden" name="valueMusicalNote" id="valueMusicalNote" value="" />
                <div class="row marginTopMin center case col s6 offset-s3">
                    <div class="col s6 offset-s3 input-field">
                        <input type="text" id="namePartition" name="namePartition" />
                        <label class="black-text">Nom de la partition</label>
                    </div>
                    <div class="col s6 offset-s3 bar">
                        <select class="browser-default" id="status" name="status">
                            <option selected disabled>Choisi un status</option>
                            <option title="Terminée" name="finished" id="finished">Terminée</option>
                            <option title="En cours" name="unfinished" id="unfinished">En cours</option>
                        </select>
                    </div>
                    <input type="submit" class="btn amber waves-effect waves-orange col s4 offset-s4 marginTop marginBottomMin" id="submitEditPartition" name="submitEditPartition" />
                </div>
            </form>
        </div>
        <?php foreach ($messagePartitionEdited as $message) { ?>
           <p class="center-align center col s6 offset-s3 marginTopMin marginBottom"><?= $message ?></p>
        <?php } ?>
        <img src="assets/img/separateur.png" class="img-responsive col s6 offset-s3" />
        <!-- Je créé mon formulaire avec la methode post et une action qui permet d'amener sur la page actuelle -->
        <form id="formPartition" method="post" enctype="multipart/form-data" class="col s10 offset-s1 marginTop marginBottom center-align">
            <!-- Je créer un bouton permettant la sélection du fichier à envoyer -->
            <input type="file" id="partitionFile" name="partitionFile" class="col offset-s1 s4" />
            <input type="submit" value="Envoyer la partition" id="submitPartition" name="submitPartition" class="col offset-s2 s4 btn amber waves-effect waves-orange"/>
        </form>
        <?php foreach ($messagePartition as $message) { ?>
           <p class="center-align center col s6 offset-s3 marginTopMin marginBottom"><?= $message ?></p>
        <?php } ?>
    </div>
</div>
<img src="assets/img/separateur.png" class="img-responsive col s6 offset-s3" />
<!--Le tutoriel permet à l'utilisateeur d'avoir des informations sur l'éditeur de partition-->
<div class="row center-align marginTopMin col s6 offset-s3">
    <a class="amber waves-effect waves-orange btn modal-trigger" href="#modalPartition">Tutoriel - Partition</a>
    <div id="modalPartition" class="modal">
        <div class="modal-content">
            <p>Pour éditer une partition, cliquez sur les notes.</p>
            <p>Lesl lignes les moins opasues représentent les lignes et les interlignes qui ne sont pas habituellement représentés sur un partittion classique.</p>
            <p>Il faut savoir que la partition sera automatiquement édité avec une clef de sol et en 4 temps.</p>
            <p>Vous pouvez également envoyer vos partition. Mais il ne doivent pas faire plus de 20 Mo.</p>
        </div>
    </div>
</div>
<?php include_once 'footer.php';