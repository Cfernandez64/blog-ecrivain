
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
