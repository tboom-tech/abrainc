function MoreContent() {
	$('.content-post').removeClass('preview-content');
	$('.hide-content').hide();
}

function Video(id_video) {
    $('#frame-video').attr('src','https://www.youtube.com/embed/'+id_video+'?autoplay=1&rel=0');
    $('#modal-video').show();
}

$('.close-video').click(function () {
    $('#frame-video').attr('src',' ');
    $('.modal').hide();
})