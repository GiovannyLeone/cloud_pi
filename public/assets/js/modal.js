// modalChat

$(document).on('click', '.trigger', function(event) {
    event.preventDefault();
    // $('#modal').iziModal('setZindex', 99999);
    // $('#modal').iziModal('open', { zindex: 99999 });
    $('#modalChat').iziModal('open');
});


$("#modalChat").iziModal();



// modalCreatePosts


$(document).on('click', '.trigger', function(event) {
    event.preventDefault();
    // $('#modal').iziModal('setZindex', 99999);
    // $('#modal').iziModal('open', { zindex: 99999 });
    $('#modalCreatePost').iziModal('open');
});


$("#modalCreatePost").iziModal();

// modalSharePosts

$(document).on('click', '.trigger', function(event) {
    event.preventDefault();
    // $('#modal').iziModal('setZindex', 99999);
    // $('#modal').iziModal('open', { zindex: 99999 });
    $('#modalSharePost').iziModal('open');
});


$("#modalSharePost").iziModal();