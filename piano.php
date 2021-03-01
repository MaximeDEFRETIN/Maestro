<?php
require_once 'header.php';
require_once 'vendor/setasign/fpdf/fpdf.php';
require_once 'controllers/pianoPartition-Controller.php';
?>
<div class="row" id="display">
    <div class="bacckgroundE marginBottomMin col offset-s1 s10">
        <div class="marginTop partitionPiano container flex">
            <div class="row">
                <div class="col s1 pitch">
                    <div class="spacingAdd col s12 flexColumn n21"></div>
                    <div class="blackLineAdd col s12 flexColumn n20"></div>
                    <div class="spacingAdd col s12 flexColumn n19"></div>
                    <div class="blackLine col s12 flexColumn n18"></div>
                    <div class="spacing col s12 flexColumn n17"></div>
                    <div class="blackLine col s12 flexColumn n16"></div>
                    <div class="spacing col s12 flexColumn n15"></div>
                    <div class="blackLine col s12 flexColumn n14"></div>
                    <div class="spacing col s12 flexColumn n13"></div>
                    <div class="blackLine col s12 flexColumn n12"></div>
                    <div class="spacing col s12 flexColumn n11"></div>
                    <div class="blackLine col s12 flexColumn n10"></div>
                    <div class="spacing col s12 flexColumn n9"></div>
                    <div class="blackLineAdd col s12 flexColumn n8"></div>
                    <div class="spacingAdd col s12 flexColumn n7"></div>
                    <div class="blackLineAdd col s12 flexColumn n6"></div>
                    <div class="spacingAdd col s12 flexColumn n5"></div>
                    <div class="blackLineAdd col s12 flexColumn n4"></div>
                    <div class="spacingAdd col s12 flexColumn n3"></div>
                    <div class="blackLineAdd col s12 flexColumn n2"></div>
                    <div class="spacingAdd col s12 flexColumn n1"></div>
                </div>
            </div>
        </div>
        <div class="instrumentPiano container flex" id="piano">
            <div class="white key" id="C3">
                <p>C3</p>
            </div>
            <div class="black key" id="C3s">
                <p>C3#</p>
            </div>
            <div class="white key" id="D3">
                <p>D3</p>
            </div>
            <div class="black key" id="D3s">
                <p>D3#</p>
            </div>
            <div class="white key" id="E3">
                <p>E3</p>
            </div>
            <div class="white key" id="F3">
                <p>F3</p>
            </div>
            <div class="black key" id="F3s">
                <p>F3#</p>
            </div>
            <div class="white key" id="G3">
                <p>G3</p>
            </div>
            <div class="black key" id="G3s">
                <p>G3#</p>
            </div>
            <div class="white key" id="A3">
                <p>A3</p>
            </div>
            <div class="black key" id="A3s">
                <p>A3#</p>
            </div>
            <div class="white key" id="B3">
                <p>B3</p>
            </div>
            <div class="white key" id="C4">
                <p>C4</p>
            </div>
            <div class="black key" id="C4s">
                <p>C4#</p>
            </div>
            <div class="white key" id="D4">
                <p>D4</p>
            </div>
            <div class="black key" id="D4s">
                <p>D4#</p>
            </div>
            <div class="white key" id="E4">
                <p>E4</p>
            </div>
            <div class="white key" id="F4">
                <p>F4</p>
            </div>
            <div class="black key" id="F4s">
                <p>F4#</p>
            </div>
            <div class="white key" id="G4">
                <p>G4</p>
            </div>
            <div class="black key" id="G4s">
                <p>G4#</p>
            </div>
            <div class="white key" id="A4">
                <p>A4</p>
            </div>
            <div class="black key" id="A4s">
                <p>A4#</p>
            </div>
            <div class="white key" id="B4">
                <p>B4</p>
            </div>
            <div class="white key" id="C5">
                <p>C5</p>
            </div>
            <div class="black key" id="C5s">
                <p>C5#</p>
            </div>
            <div class="white key" id="D5">
                <p>D5</p>
            </div>
            <div class="black key" id="D5s">
                <p>D5#</p>
            </div>
            <div class="white key" id="E5">
                <p>E5</p>
            </div>
            <div class="white key" id="F5">
                <p>F5</p>
            </div>
            <div class="black key" id="F5s">
                <p>F5#</p>
            </div>
            <div class="white key" id="G5">
                <p>G5</p>
            </div>
            <div class="black key" id="G5s">
                <p>G5#</p>
            </div>
            <div class="white key" id="A5">
                <p>A5</p>
            </div>
            <div class="black key" id="A5s">
                <p>A5#</p>
            </div>
            <div class="white key" id="B5">
                <p>B5</p>
            </div>
        </div>
        <form action="Piano" method="post" class="col s6 offset-s3 marginTop">
            <input type="hidden" name="valueMusicalNotePiano" id="valueMusicalNotePiano" value="" />
            <div class="row marginTop center-align">
                <div class="col s6 offset-s3 input-field">
                    <input type="text" id="namePartitionPiano" name="namePartitionPiano" placeholder="Nom de la partition" title="Nom de la partition"/>
                </div>
                <div class="col s6 offset-s3 marginTopMin">
                    <select id="statusPiano" name="statusPiano" class="browser-default" title="Choisi un status">
                        <option selected disabled>Choisi un status</option>
                        <option title="Terminée" name="finished" id="finished">Terminée</option>
                        <option title="En cours" name="unfinished" id="unfinished">En cours</option>
                    </select>
                </div>
                <input type="submit" class="btn amber waves-effect waves-orange col s4 offset-s4 marginTop marginBottom" id="submitPartitionPiano" name="submitPartitionPiano" title="Envoyer" />
            </div>
        </form>
    </div>
    <?php foreach ($messagePartitionPiano as $message) { ?>
       <p class="center-align marginTopMin"><?= $message ?></p>
    <?php } ?>
    <img src="assets/img/separateur.png" class="img-responsive col s6 offset-s3" />
    <div class="row center-align marginTop">
        <a class="amber waves-effect waves-orange btn modal-trigger col s6 offset-s3 marginTop" title="Tutoriel - Piano" href="#modalPiano">Tutoriel - Piano</a>
        <div id="modalPiano" class="modal">
            <div class="modal-content">
                <p>Les lignes les moins opasues représentent les lignes et les interlignes qui ne sont pas habituellement représentés sur un partittion classique.</p>
                <p>Les touches oranges correspondent aux notes C3 à B3 du piano.</p>
                <p>Les touches vertes correspondent aux notes C4 à B4 du piano.</p>
                <p>Les touches bleues correspondent aux notes C5 à B5 du piano.</p>
                <img src="assets/img/keyboard.png" class="img-responsive" alt="Tutoriel - Touches utilisables" title="Tutoriel - Touches utilisables"/>
            </div>
        </div>
      </div>
</div>
<script src="assets/js/audiosynth.js"></script>
<script src="assets/js/piano.js"></script>
<?php require_once 'footer.php';
