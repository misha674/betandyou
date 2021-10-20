import $ from 'jquery'

$(document).ready(function () {
  $('[data-link]').click(function () {
    var link = $(this).data('link')
    window.open('/' + atob(link), '_self')
  })
})
