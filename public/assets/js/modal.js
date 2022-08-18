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


$("#modalCreatePost").iziModal({
    width: 1200,
    radius: 5,
    padding: 20,
    group: 'products',
    loop: true
});

// modalSharePosts

$(document).on('click', '.trigger', function(event) {
    event.preventDefault();
    // $('#modal').iziModal('setZindex', 99999);
    // $('#modal').iziModal('open', { zindex: 99999 });
    $('#modalSharePost').iziModal('open');
});


$("#modalSharePost").iziModal();