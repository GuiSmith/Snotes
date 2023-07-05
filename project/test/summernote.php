<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Summernote</title>

        <!-- include libraries(jQuery, bootstrap) -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        <!-- include summernote-pt-BR -->
        <script src="summernote-pt-BR.js"></script>

        <link rel="stylesheet" type="text/css" href = "../index.css">

    </head>
    <body>
        
        <h1>Testando Summernote</h1>

        <form class = "box-content box-page box-editor" style = "position: relative;" >

            <div class = "mb-3 text-center" >
                
                <label for = "text_title" class = "form-label text-center" >Nome</label>

                <input type = "text" name = "title" id = "text_title" class = "form-control" >

            </div>
            
            <textarea id = "summernote" name = "text" ></textarea>

            <span style = "position: absolute;right: 30px;top: 10px;" >Teste</span>

        </form>

        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });

            $('#summernote').summernote({
              height: 300,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: true                  // set focus to editable area after initializing summernote
            });

            $(document).ready(function() {
              $('#summernote').summernote({
                lang: 'pt-BR' // default: 'en-US'
              });
            });
          </script>

    </body>
</html>
