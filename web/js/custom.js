// ajoute le toggler sur la sidebar
$('.page-sidebar-menu').prepend('<li class="sidebar-toggler-wrapper"><div class="sidebar-toggler hidden-phone" style="margin-bottom:5px; margin-top:5px;"></div></li>');

// sidebar_collapse
$(function () {
  $('.sidebar-toggler').on('click', function() {
    window.setTimeout(function () {
      $.cookie('sidebar', $('body').hasClass('page-sidebar-closed') + 0, { expire: 365, path: '/' });
    }, 500);
  });
});

// edit active navbar
$(function (){  
  var pathname = window.location.pathname;
  if  (pathname) {
    $('nav li a, #subnav li a').each(function() { 
      var href = $(this).attr('href');
      if (href)
      {
        var n = pathname.search(href);
        if (n != -1)
          $(this).parent().addClass("active");
      }
    })
  }
});