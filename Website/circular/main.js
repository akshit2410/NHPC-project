$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});

	
	// Send Data to Modal classes
	$(document).on("click", ".view", function () {
     	var myarticleid = $(this).data('id');
     	$(".modal-body #articleid").val( myarticleid );
	});
/*
	$('#myModal').on('show.bs.modal', function(e) {
	    var articleid = $(e.relatedTarget).data('articleid');
	    $(e.currentTarget).find('input[name="articleid"]').val(articleid);
	});

	$(document).on("click", ".delete", function () {
     	var myarticleid = $(this).data('id');
     	$(".modal-body #articleid").val( myarticleid );
	});
*/
});