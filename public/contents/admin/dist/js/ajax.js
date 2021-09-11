$(function() {

	function getSubcategory(){
		var id = $("#maincategory").val();
		var url = '/admin/subcategories/' + id;
		//console.log(url);

		$.ajax({
			type: 'GET',
			url: url,
			cache: false,
            dataType: 'html',
            success:function(data){
               $("#subcategory").html(data);
               //console.log(data);
            },
		});
	}

	$(document).on("change", "#maincategory", function() {
		var id = $(this).val();
		var url = '/admin/subcategories/' + id;
		//console.log(url);

		$.ajax({
			type: 'GET',
			url: url,
			cache: false,
            dataType: 'html',
            success:function(data){
               return getSubcategory();
               //console.log(data);
            },
		});
	});
});