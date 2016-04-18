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

	$('#btnSearch').click(function(){
		$.getJSON('search.php',
        {title:$('#cname').val()},
		function(d){
		//   $('body').append("#cname");
		  // $('body').append(d.title);
			 $('body').append("Hello");

		});
	});

$('#advanced').click(	function(){
	$('#myfilter').toggle();
});


});
 //var a = <?php echo json_encode($title); ?>;
