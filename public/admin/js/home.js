
var checkUpdateConfig = 1;
$(document).on('click','#update-config', function(){
if (checkUpdateConfig == 1){
  checkUpdateConfig = 0;

  var title = $("input[name='title']").val();
  var description = $("textarea[name='description']").val();
  var link = $(this).attr('link');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: link,
    type: 'post',
    data: {'title':title,'description':description}
  })
  .done(function(data) {
    if ( data == 1 ){
      notify('Cập nhật thành công', 1);
    }else{
      notify('Cập nhật thất bại', 0);
    }
    checkUpdateConfig = 1;
    console.log(data);
  })
  .fail(function() {
    notify('Cập nhật thất bại', 0);
  });   
}

});


$(document).on('change', '.start_date_select', function(){
    var option = $(this).find('option:selected').attr('value');
    $(this).parents(".start_date_container").find('.start_date_total').text(option);
});

$(document).ready(function(){
    $(".start_date_select").trigger('change');
});


var checkUpdateTour = 1;
$(document).on('click', '.start_date_button', function(){
    if(checkUpdateTour == 1){
        checkUpdateTour = 0;
        var link  = $(this).attr('link');
        var option = $(this).parents(".start_date_container").find(".start_date_select option:selected");
        var value = $(this).parents(".start_date_container").find(".start_date_input").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: link,
            type: 'POST',
            data: {
                start_date_text: $(option).text(),
                start_date_val: value
            },
        })
        .done(function(result) {
            if (result == 1) {
                notify('Cập nhật thành công', 1);
                $(option).parents(".start_date_container").find('.start_date_total').text(value);
                $(option).attr('value', value);
                $(option).parents(".start_date_container").find('.start_date_input').val('');
            }else{
                notify('Cập nhật thất bại', 0);
            }
        })
        .fail(function() {
            notify('Cập nhật thất bại', 0);
        })
        .always(function() {
            checkUpdateTour = 1;
        });
        
    }
});