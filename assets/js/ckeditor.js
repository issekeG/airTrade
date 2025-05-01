// assets/app.js
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.ckeditor').forEach(element => {
        ClassicEditor
            .create(element)
            .catch(error => {
                console.error(error);
            });
    });
    $('.select-element').select2({
        width: 'resolve',
        placeholder: function(){
            return $(this).attr('placeholder');
        }
    });
});
