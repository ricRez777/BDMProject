//Genera las previsualizaciones
function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    var img = $('<div class=""><div class="image-container"> <figure> <img src="' + imgCodified + '" width=100 alt="Foto del usuario"> <figcaption> <i class="icon-cross"></i> </figcaption> </figure> </div></div>');
    $(img).insertAfter("#add-photo-container");
}
