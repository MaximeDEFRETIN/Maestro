$(function () {
    $number = 1;
    $('div[class="col s1 pitch"]').attr('id', $number);
    $stop = true;
    /*Piano*/
    $(document).keydown(function (e) {
        if ($stop == true) {
            switch (e.which) {
                //a
                case 65:
                    var piano = Synth.createInstrument('piano');
                    piano.play('C', 3, 1);
                    $('#C3').animate({
                        height: '190px', },
                            200,
                            );
                    $('#C3').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n1').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'C3,');
                            }
                            );
                    break;
                    //z
                case 90:
                    var piano = Synth.createInstrument('piano');
                    piano.play('C', 3, 1.5, 1);
                    $('#C3s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#C3s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n2').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'C3s,');
                            }
                            );
                    break;
                    //e
                case 69:
                    var piano = Synth.createInstrument('piano');
                    piano.play('D', 3, 1);
                    $('#D3').animate({
                        height: '190px', },
                            200,
                            );
                    $('#D3').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n2').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'D3,');
                            }
                            );
                    break;
                    //r
                case 82:
                    var piano = Synth.createInstrument('piano');
                    piano.play('D', 3, 1.5, 1);
                    $('#D3s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#D3s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n3').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'D3s,');
                            }
                            );
                    break;
                    //t
                case 84:
                    var piano = Synth.createInstrument('piano');
                    piano.play('E', 3, 1);
                    $('#E3').animate({
                        height: '190px', },
                            200,
                            );
                    $('#E3').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n3').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'E3,');
                            }
                            );
                    break;
                    //y
                case 89:
                    var piano = Synth.createInstrument('piano');
                    piano.play('F', 3, 1);
                    $('#F3').animate({
                        height: '190px', },
                            200,
                            );
                    $('#F3').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n4').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'F3,');
                            }
                            );
                    break;
                    //u
                case 85:
                    var piano = Synth.createInstrument('piano');
                    piano.play('F', 3, 1.5, 1);
                    $('#F3s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#F3s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n5').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'F3s,');
                            }
                            );
                    break;
                    //i
                case 73:
                    var piano = Synth.createInstrument('piano');
                    piano.play('G', 3, 1);
                    $('#G3').animate({
                        height: '190px', },
                            200,
                            );
                    $('#G3').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n5').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'G3,');
                            }
                            );
                    break;

                    //o
                case 79:
                    var piano = Synth.createInstrument('piano');
                    piano.play('G', 3, 1.5, 1);
                    $('#G3s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#G3s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n6').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'G3s,');
                            }
                            );
                    break;
                    //p
                case 80:
                    var piano = Synth.createInstrument('piano');
                    piano.play('A', 3, 1);
                    $('#A3').animate({
                        height: '190px', },
                            200,
                            );
                    $('#A3').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n6').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'A3,');
                            }
                            );
                    break;
                    //$
                case 164:
                    var piano = Synth.createInstrument('piano');
                    piano.play('A', 3, 1.5, 1);
                    $('#A3s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#A3s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n7').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'A3s,');
                            }
                            );
                    break;
                    //entrée
                case 13:
                    var piano = Synth.createInstrument('piano');
                    piano.play('B', 3, 1);
                    $('#B3').animate({
                        height: '190px', },
                            200,
                            );
                    $('#B3').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n7').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'B3,');
                            }
                            );
                    break;

                    //q
                case 81:
                    var piano = Synth.createInstrument('piano');
                    piano.play('C', 4, 1);
                    $('#C4').animate({
                        height: '190px', },
                            200,
                            );
                    $('#C4').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n8').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'C4,');
                            }
                            );
                    break;
                    //s
                case 83:
                    var piano = Synth.createInstrument('piano');
                    piano.play('C', 4, 1.5, 1);
                    $('#C4s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#C4s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n9').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'C4s,');
                            }
                            );
                    break;
                    //d
                case 68:
                    var piano = Synth.createInstrument('piano');
                    piano.play('D', 4, 1);
                    $('#D4').animate({
                        height: '190px', },
                            200,
                            );
                    $('#D4').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n9').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'D4,');
                            }
                            );
                    break;
                    //f
                case 70:
                    var piano = Synth.createInstrument('piano');
                    piano.play('D', 4, 1.5, 1);
                    $('#D4s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#D4s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n10').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'D4s,');
                            },
                            );
                    break;
                    //g
                case 71:
                    var piano = Synth.createInstrument('piano');
                    piano.play('E', 4, 1);
                    $('#E4').animate({
                        height: '190px', },
                            200,
                            );
                    $('#E4').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n10').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'E4,');
                            },
                            );
                    break;
                    //h
                case 72:
                    var piano = Synth.createInstrument('piano');
                    piano.play('F', 4, 1);
                    $('#F4').animate({
                        height: '190px', },
                            200,
                            );
                    $('#F4').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n11').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'F4,');
                            },
                            );
                    break;
                    //j
                case 74:
                    var piano = Synth.createInstrument('piano');
                    piano.play('F', 4, 1.5, 1);
                    $('#F4s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#F4s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n12').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'F4s,');
                            }
                            );
                    break;
                    //k
                case 75:
                    var piano = Synth.createInstrument('piano');
                    piano.play('G', 4, 1);
                    $('#G4').animate({
                        height: '190px', },
                            200,
                            );
                    $('#G4').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n12').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'G4,');
                            }
                            );
                    break;
                    //l
                case 76:
                    var piano = Synth.createInstrument('piano');
                    piano.play('G', 4, 1.5, 1);
                    $('#G4s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#G4s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n13').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'G4s,');
                            }
                            );
                    break;
                    //m
                case 77:
                    var piano = Synth.createInstrument('piano');
                    piano.play('A', 4, 1);
                    $('#A4').animate({
                        height: '190px', },
                            200,
                            );
                    $('#A4').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n13').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'A4,');
                            }
                            );
                    break;
                    //ù
                case 165:
                    var piano = Synth.createInstrument('piano');
                    piano.play('A', 4, 1.5, 1);
                    $('#A4s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#A4s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n14').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'A4s,');
                            }
                            );
                    break;
                    //*
                case 170:
                    var piano = Synth.createInstrument('piano');
                    piano.play('B', 4, 1);
                    $('#B4').animate({
                        height: '190px', },
                            200,
                            );
                    $('#B4').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n14').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'B4,');
                            }
                            );
                    break;

                    //<
                case 60:
                    var piano = Synth.createInstrument('piano');
                    piano.play('C', 5, 1);
                    $('#C5').animate({
                        height: '190px', },
                            200,
                            );
                    $('#C5').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n15').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'C5,');
                            }
                            );
                    break;
                    //w
                case 87:
                    var piano = Synth.createInstrument('piano');
                    piano.play('C', 5, 1.5, 1);
                    $('#C5s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#C5s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n16').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'C5s,');
                            }
                            );
                    break;
                    //x
                case 88:
                    var piano = Synth.createInstrument('piano');
                    piano.play('D', 5, 1);
                    $('#D5').animate({
                        height: '190px', },
                            200,
                            );
                    $('#D5').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n16').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'D5,');
                            }
                            );
                    break;
                    //c
                case 67:
                    var piano = Synth.createInstrument('piano');
                    piano.play('D', 5, 1.5, 1);
                    $('#D5s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#D5s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n17').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'D5s,');
                            }
                            );
                    break;
                    //v
                case 86:
                    var piano = Synth.createInstrument('piano');
                    piano.play('E', 5, 1);
                    $('#E5').animate({
                        height: '190px', },
                            200,
                            );
                    $('#E5').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n17').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'E5,');
                            }
                            );
                    break;
                    //b
                case 66:
                    var piano = Synth.createInstrument('piano');
                    piano.play('F', 5, 1);
                    $('#F5').animate({
                        height: '190px', },
                            200,
                            );
                    $('#F5').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n18').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'F5,');
                            }
                            );
                    break;
                    //n
                case 78:
                    var piano = Synth.createInstrument('piano');
                    piano.play('F', 5, 1.5, 1);
                    $('#F5s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#F5s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n19').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'F5s,');
                            }
                            );
                    break;
                    //,
                case 188:
                    var piano = Synth.createInstrument('piano');
                    piano.play('G', 5, 1);
                    $('#G5').animate({
                        height: '190px', },
                            200,
                            );
                    $('#G5').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n19').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'G5,');
                            }
                            );

                    break;
                    //;
                case 59:
                    var piano = Synth.createInstrument('piano');
                    piano.play('G', 5, 1.5, 1);
                    $('#G5s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#G5s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n20').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'G5s,');
                            }
                            );
                    break;
                    //:
                case 58:
                    var piano = Synth.createInstrument('piano');
                    piano.play('A', 5, 1);
                    $('#A5').animate({
                        height: '190px', },
                            200,
                            );
                    $('#A5').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n20').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'A5,');
                            }
                            );
                    break;
                    //!
                case 161:
                    var piano = Synth.createInstrument('piano');
                    piano.play('A', 5, 1.5, 1);
                    $('#A5s').animate({
                        height: '140px', },
                            200,
                            );
                    $('#A5s').animate({
                        height: '150px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n21').append('<img src="assets/img/noteD.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'A5s,');
                            }
                            );
                    break;
                    //shift
                case 16:
                    var piano = Synth.createInstrument('piano');
                    piano.play('B', 5, 1);
                    $('#B5').animate({
                        height: '190px', },
                            200,
                            );
                    $('#B5').animate({
                        height: '200px', },
                            200,
                            function (){
                                $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
                                $('#'+$number+' .n21').append('<img src="assets/img/note.png" />');
                                $number+=1;
                                $('#valueMusicalNotePiano').val($('#valueMusicalNotePiano').val() + 'B5,');
                            }
                            );
                    break;
            }
        };
    });
    if ($('#namePartitionPiano').focusin(function () {
            $stop = false;
        }));
    if ($('#namePartitionPiano').focusout(function () {
            $stop = true;
        }));
    if ($('#searchBar').focusin(function () {
            $stop = false;
        }));
    if ($('#searchBar').focusout(function () {
            $stop = true;
        }));
    
        $widthWindow = $(window).width();
    if ($widthWindow < 961) {
        $stop = false;
        $('#display').remove();
        $('body').append('<div class="row imgBgk marginTopMax"><p class="col s6 offset-s3 center-align">Ton écran est trop petit. Je te conseille de te servir du piano sur tablette ou sur un ordinateur.</p></div>');
    }
});
