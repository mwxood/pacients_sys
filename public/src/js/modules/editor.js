const editor = () => {
    // tinymce.init({selector:'.text-content'});

      try {
            const editor =  document.querySelectorAll('.textarea');
            editor.forEach(item => {
                  CKEDITOR.replace( item );
            });

      } catch(e)  {}
}


export default editor;