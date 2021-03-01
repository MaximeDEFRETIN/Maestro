// On cache le message d'erreur
$('#errorCheckPseudoUnique').css('display', 'none');
// La fonction permet de vérifier que le  est unique
function checkPseudoUnique() {
    // On envoie les données, avec AJAX, directement au serveur
    $.post(
            // On inclus le controller de l'inscription pou vérifier ensuite si le pseudo entré est déjà dans la base de donnée ou non
            '../../controllers/signIn-Controller.php',
            {
                // On envoie au controller la valeur entrée dans le champ pseudo
                checkPseudo: $('#pseudo').val()
            },
            // On récupère les résultats du controller
            function (checkPseudoResult) {
                // Si on retrouve une addresse mail dans la base de donnée, alors on affiche un message d'erreur
                if (checkPseudoResult == 1) {
                    $('#errorCheckPseudoUnique').css('display', 'block');
                // Sinon rien est affiché
                } else {
                    $('#errorCheckPseudoUnique').css('display', 'none');
                }
            },
            'JSON'
            )
}

// On cache le message d'erreur
$('#errorCheckMailUnique').css('display', 'none');
// La fonction permet de vérifier que le  est unique
function checkMailUnique() {
    // On envoie les données, avec AJAX, directement au serveur
    $.post(
            // On inclus le controller de l'inscription pou vérifier ensuite si l'adresse mail entré est déjà dans la base de donnée ou non
            '../../controllers/signIn-Controller.php',
            {
                // On envoie au controller la valeur entrée dans le champs mail
                checkMail: $('#mail').val()
            },
            // On récupère les résultats du controller
            function (checkMailResult) {
                // Si on retrouve une addresse mail dans la base de donnée, alors on affiche un message d'erreur
                if (checkMailResult == 1) {
                    $('#errorCheckMailUnique').css('display', 'block');
                // Sinon rein est affiché
                } else {
                    $('#errorCheckMailUnique').css('display', 'none');
                }
            },
            'JSON'
            )
    }
    
// Après avoir appuyé sur une touche
$('#searchBar').keyup(function () {
    $.post(
            // On inclus le controller 
            '../../controllers/search-Controller.php',
            {
                // On envoie au controller la valeur entrée dans la barre de recherche
                searchBar: $('#searchBar').val()
            },
            // On récupère les résultats du controller
            function (searchResult) {
                var searchResult = $.parseJSON(searchResult);
                $('.searchList').remove();
                // On se sert de each() pour afficher les résultats
                $.each(searchResult, function (index, value) {
                    $('#results').show();
                    // On insert une div conten nt les résultats en-dessous de la barre de recherche
                    $('#results').append('<ul class="center-align"><a class="black-text" href="Partition-autres-utilisateurs-' + value.id + '">' + value.namePartition + '</a></ul>');
                })
                $(':not(#results)').click(function() {
                    console.log('LOLOL');
                    $('.searchList').remove();
                    $('#results').hide();
                });
            }
           )
});