$(function () {
    $('#action').click(function () {
        $('#actionUser').slideToggle(1350);
    });
    $('#displayedComments').click(function () {
        $('#commentsUser').show();
    });
    $('#displayedComments').dblclick(function () {
        $('#commentsUser').hide();
    });
    
    $('.modal').modal();
    $('textarea').characterCounter();
    $('select').material_select();
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.fixed-action-btn');
  var instances = M.FloatingActionButton.init(elems, {
    direction: 'top'
  });
});