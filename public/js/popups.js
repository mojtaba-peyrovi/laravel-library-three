$(document).ready(function() {
    var fav = $('.fav-btn');
    var favpopup = $('#fav-popup');
    favpopup.hide();
    fav.hover(function(){
        favpopup.show();
        var popper = new Popper(fav,favpopup,{
            placement: 'top',
            modifiers: {
                flip: {
                    behavior: ['left','right','top','bottom']
                }
            },
            offset: {
                enabled: true,
                offset: '0,10'
            }
        });
    });
    fav.mouseleave(function(event) {
        favpopup.hide();
    });
});

$(document).ready(function() {

        var unfav = $('#unfav-btn');
        var unfavpopup = $('#unfav-popup');
        unfavpopup.hide();
        unfav.hover(function(){
            unfavpopup.show();
            var popper = new Popper(unfav,unfavpopup,{
                placement: 'top',
                modifiers: {
                    flip: {
                        behavior: ['left','right','top','bottom']
                    }
                },
                offset: {
                    enabled: true,
                    offset: '0,10'
                }
            });
        });
        unfav.mouseleave(function(event) {
            unfavpopup.hide();
        });
});
