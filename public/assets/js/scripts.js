function abreModal() {
  if (window.outerWidth >= 768) {

    $(document).ready(function () {
      $('#goRight').on('click', function () {
        $('#slideBox').animate({
          'marginLeft': '0'
        });
        $('.topLayer').animate({
          'marginLeft': '100%'
        });
      });
      $('#goLeft').on('click', function () {
        $('#slideBox').animate({
          'marginLeft': '50%'

        });
        $('.topLayer').animate({
          'marginLeft': '0'
        });
      });
    });
  } else {
    $(document).ready(function () {
      $('#goRight').on('click', function () {
        $('.right').addClass('hide-form')
        $('.left').removeClass('hide-form')

      })
      $('#goLeft').on('click', function () {
        $('.left').addClass('hide-form')
        $('.right').removeClass('hide-form')

      })
    })
  }
}

abreModal()



