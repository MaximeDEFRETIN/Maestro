$(function(){
    //On initialise $number pour attribuer un id à chaque colonne
    $number = 1;
    //On attribut $number à la colonne
    $('div[class="col s1 pitch"]').attr('id', $number);

    //QUand on clique sur une note
    $('#do').click(function (){
        //On clone la colonne, on incrémente l'id de la colonne cloné et on l'insert après la colonne précédente
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        //On insert l'image représentant la note dans la colonne précédente
        $('#'+$number+' .n1').append('<img src="assets/img/note.png" />');
        //On incrémente $number 
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'do,');
    });
    
    $('#re').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n2').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 're,');
    });
    $('#mi').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n3').append('<img src="assets/img/note.png" />');
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'mi,');
        $number+=1;
    });
    $('#fa').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n4').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'fa,');
    });
    $('#sol').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n5').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'sol,');
    });
    $('#la').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n6').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'la,');
    });
    $('#si').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n7').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'si,');
    });
    $('#do1').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n8').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'do1,');
    });
    $('#re1').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n9').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 're1,');
    });
    $('#mi1').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n10').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'mi1,');
    });
    $('#fa1').click(function (){
        $('#'+$number).clone().attr('id', $number+1).insertAfter('#'+$number);
        $('#'+$number+' .n11').append('<img src="assets/img/note.png" />');
        $number+=1;
       $('#valueMusicalNote').val($('#valueMusicalNote').val() + 'fa1,');
    });
    
    $('.modal').modal();
});
