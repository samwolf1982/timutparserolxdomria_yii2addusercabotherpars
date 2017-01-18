
$(document).on('ready', function() {
    $("#input-242").fileinput({
        initialPreview: [
            'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
            'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg'
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
             {key: 1},
             { key: 2}
        ],
        deleteUrl: "/site/file-delete",
        overwriteInitial: false,
        maxFileSize: 100,
        initialCaption: "The Moon and the Earth"
    });
});
