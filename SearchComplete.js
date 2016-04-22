$(function(){

	$("#cname").autocomplete({
		source: function (request, response) {
			$.post(	"search.php",request,function(data) {
					response(data.slice(0,4));
				},

				'json'
			);
		},
		minLength: 0
	});

$('#advanced').click(	function(){
	$('#myfilter').toggle();
});

$('#allModules').click(	function(){
	$('.bigger').toggle();
});

$('.bigger').click(function(){
	$(this).parent().children('#moreModule').toggle();
});


});
