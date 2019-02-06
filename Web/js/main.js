
  $('#filter').change(function(){
    var chapter = $(this).val();
    var allChapter = $('.newsSingle');
    console.log(chapter);
    allChapter.hide();
    allChapter.filter('.'+ chapter).show();
  });
