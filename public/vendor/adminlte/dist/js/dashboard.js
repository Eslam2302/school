$(document).ready(function () {

    // image preview
    $(".image").change(function () {
    
        if (this.files && this.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('.image-preview').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(this.files[0]);
        }
    
    }); //end of image preview

    CKEDITOR.config.language =  "{{ app()->getLocale() }}";

});//end of ready