$(document).on('change', '#form-page-type', function(){
  $(".content-gallery").stop();
  $(".content-post").stop();
  if ( $(this).val() == 3 ) {
    $(".content-gallery").slideDown(300);
    $(".content-gallery").removeClass('hidden');
    $(".content-post").slideUp(300);
  }else{
    $(".content-gallery").slideUp(300);
    $(".content-post").slideDown(300);
    $(".content-post").removeClass('hidden');
  }
});

$(document).on('focusout', '#form-title', function(){
  if ( $("#form-slug").val() == "" ){
    $("#form-slug").val(changeToSlug($(this).val()));
  }
});

$(document).on('change', "#form-avatar", function(evt){
  var file = evt.target.files[0];
  
  //Get tmp path
  var tmp = URL.createObjectURL(event.target.files[0]);
  //Get name extension
  var nameExtension = file.type;

  //Check image file
  if ( nameExtension.search('image') > -1 && file.size < (5*1024*1024) ) {
    $(this).next('label').text(file.name);
    $("#file-show").attr('src', tmp);
    $("#file-show").removeClass('hidden');
      

  }else{
    notify("Vui lòng chọn hình có dung lượng nhỏ hơn 5MB", 0);
    $(this).next('label').text("Choose file");
    $("#file-show").addClass('hidden');
    $(this).val('');
  }

});

$(document).on('change', "#form-list_img", function(evt){
  $("#list_img-show").empty();
  for (var i = 0; i < evt.target.files.length; i++) {
  
    var file = evt.target.files[i];
    
    //Get tmp path
    var tmp = URL.createObjectURL(event.target.files[i]);
    //Get name extension
    var nameExtension = file.type;
    
    
    //Check image file
    if ( nameExtension.search('image') > -1  && file.size < (5*1024*1024) ) {
      $(this).next('label').text(evt.target.files.length + " files");
      $("#list_img-show").append('<img src="'+tmp+'" />');
    }else {
      notify("Vui lòng chọn hình có dung lượng nhỏ hơn 5MB", 0);
      $(this).next('label').text("Choose file");
      $("#list_img-show").empty();
      $(this).val('');
      break;
    }
  }

});