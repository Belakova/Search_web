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


$('#btnSearch').click(function(){
	$('#pic').toggle();

});

$('#btnSearch').click( function(){
	$('html,body').animate({
               scrollTop: target.offset().top
             }, 1000);
	});

});

 //var a = <?php echo json_encode($title); ?>;
