$('#summernote').summernote({
  placeholder: 'Type your note here.....',
  tabsize: 2,
  height: 200
});



$(document).ready(function() {
    $(".modal_thumbnails").click(function(){
        $("#set_user_image").prop('disabled', false);
    });




  tinymce.init({selector: 'textarea'});
});