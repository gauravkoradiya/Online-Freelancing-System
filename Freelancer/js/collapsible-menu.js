$(document).ready(function () {
    var handleCollapsibleMenu = function (e, menu, transition) {
        if (transition == 'accordion') {
            var expanded = e.parent().parent().find('> li > a.expanded').not(e);
            expanded.removeClass('expanded').addClass('collapsed').find('+ ul').slideUp('medium');

            e.find('+ ul').slideToggle('medium');
        }
        else if (transition == 'slide') {
            if (e.hasClass('collapsed')) {
                menu.slideUp('medium');
            }
            else {
                menu.slideDown('medium');
            }
        }
        else if (transition == 'fade') {
            if (e.hasClass('collapsed')) {
                menu.fadeOut('normal');
            }
            else {
                menu.fadeIn('normal');
            }
        }
        else {
            var speed = transition == 'grow' || transition == 'shrink' ? 'normal' : null;

            if (e.hasClass('collapsed')) {
                menu.hide(speed);
            }
            else {
                menu.show(speed);
            }
        }
    };

    $('.collapsible-menu').on('click', '> li > a', function () {
        var self = $(this);
        var menu = self.parent().parent();
        var transition = menu.data('collapsible-menu').toLowerCase();
        var el = self.find('+ ul');

        self.toggleClass('expanded').toggleClass('collapsed');

        handleCollapsibleMenu(self, el, transition);
    });

    $('.collapsible-menu a.expanded').toggleClass('expanded').toggleClass('collapsed').click();
});