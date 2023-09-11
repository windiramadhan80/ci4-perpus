<script>
    var editor_config = {
        selector: 'textarea#body',
        relative_urls: false,
        height: 500,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern responsivefilemanager",
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | fontselect | forecolor",
        toolbar2: "| responsivefilemanager | bullist numlist outdent indent | link image media | emoticons | fontsizeselect | preview | print | code | fullscreen",
        image_advtab: true,


        external_filemanager_path: "/filemanager/",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {
            "filemanager": "/filemanager/plugin.min.js"
        }


    };

    tinymce.init(editor_config);
</script>