
<script>
    $(document).ready(function(){
        const $menu = $('#navbarToggleExternalContent');
        const $content = $('.content-1');

$menu.on('show.bs.collapse', function () {
  $menu.addClass('menu-show');
  $content.addClass('offset-3');
});

$menu.on('hide.bs.collapse', function () {
  $menu.removeClass('menu-show');
  $content.removeClass('offset-3');
});

    })
 
</script>
</html>