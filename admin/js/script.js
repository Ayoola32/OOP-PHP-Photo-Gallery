$('#summernote').summernote({
  placeholder: 'Type your note here.....',
  tabsize: 2,
  height: 200
});

$(document).ready(function() {
    var user_id;
    var user_href;
    var user_href_splitted;

    var image_name; 
    var image_src;
    var image_href_splitted;
    var photo_id;

    $(".modal_thumbnails").click(function(){
      $("#set_user_image").prop('disabled', false);
      user_href          = $("#user_id").prop("href");
      user_href_splitted = user_href.split("=");
      user_id            = user_href_splitted[user_href_splitted.length - 1];

      image_src           = $(this).prop("src");
      image_href_splitted = image_src.split("/");
      image_name          = image_href_splitted[image_href_splitted.length - 1];


      
      $photo_id = $(this).attr("src");
      $.ajax({
        url: "includes/ajax_code.php",
        data: {photo_id: user_id},
        type: "POST",
        success: function(data){
          if (!data.error) {
            $("#modal_sidebar").html(data);
          }
        }
      })
    });


    
    $("#set_user_image").click(function(){
        $.ajax({
          url: "includes/ajax_code.php",
          data: {image_name: image_name, user_id: user_id},
          type: "POST",
          success: function(data){
            if (!data.error) {
              location.reload(true);
            }
          }
        });
    });

    tinymce.init({selector: 'textarea'});
});
