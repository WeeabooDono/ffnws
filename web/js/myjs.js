$(document).ready(function(){
    $('.progress-value > span').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 1500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
    $("table").addClass("table table-striped");
    $("thead").addClass("thead-dark");
    $("table a").addClass("btn btn-primary");
});
