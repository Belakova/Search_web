$(function(){

	$("#cname").autocomplete({
		source: function (request, response) {
			$.post(	"search.php",request,function(data) {
					response(data);
				},
				'json'
			);
		},
		minLength: 0
	});

	$('#getDetails').click(function(){
		$.getJSON('search.php',
        {title:$('#search').val()},
		function(d){
		   $('body').append("#cname");
		   $('body').append(d.title);
		});
	});
});
 //var a = <?php echo json_encode($title); ?>;
