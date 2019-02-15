//Filtres des chapitres
  $('#filter').change(function(){
    var chapter = $(this).val();
    var allChapter = $('.newsSingle');
    if(chapter === 'all'){
      allChapter.show();
    } else {
      allChapter.hide();
      allChapter.filter('.'+ chapter).show();
    }
  });


//Req AJAX pour signalement des commentaires.
$(document).ready(function(){
  $('.signal').click(function(){
    var id = $(this).attr('id');
    $.ajax({
      url: id,
      tupe: 'POST',
      success: function(response){
        $('#successModal').modal('show');
      },
      error : function (response){
        $('#failModal').modal('show');
      }
    });
  });
});
