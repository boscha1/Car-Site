	<!-- FOOTER -->
	<div style="height: 20vh; width: 100vw; padding-top: 20%">
		<div id="center" class="card-footer text-muted" style="height: 10vh; width: 100vw;text-align: center;">
		  Car Site
		</div>
	</div>
	<script src="jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script>
		$(document).on('click','.btn-car-delete',function(){
			var el=$(this);
			$.get('cars/delete.php?id='+$(this).attr('data-id'), function(data, status){
				console.log(data);
				el.parents('tr').remove();
			});
		});
		
		$(document).on('click','.btn-seller-delete',function(){
			var el=$(this);
			$.get('sellers/delete.php?id='+$(this).attr('data-id'), function(data, status){
				console.log(data);
				//el.parents('tr').remove();
				window.location.href = "index.php";
			});
		});
		
		$(document).on('submit', '#car-modify', function(e){
			e.preventDefault();
			$.post("cars/modify.php",{ID:$('#car-modify input[name=ID]').val(),make:$('#car-modify input[name=make]').val(),
			model:$('#car-modify input[name=model]').val(),year:$('#car-modify input[name=year]').val(),miles:$('#car-modify input[name=miles]').val(),
			price:$('#car-modify input[name=price]').val(),state:$('#car-modify select[name=state]').val()}).done(function( data ) {
				alert(" Data loaded: " + data);
			});
		});
		
		$(document).on('submit', '#seller-modify', function(e){
			e.preventDefault();
			$.post("sellers/modify.php",{ID:$('#seller-modify input[name=ID]').val(),first_name:$('#seller-modify input[name=first_name]').val(),
			last_name:$('#seller-modify input[name=last_name]').val(),email:$('#seller-modify input[name=email]').val()}).done(function( data ) {
				alert(" Data loaded: " + data);
			});
		});
		/*
		$(document).on('submit', '#car-create', function(e){
			e.preventDefault();
			$.post("cars/create.php",{ID:$('#car-create input[name=ID]').val(),make:$('#car-create input[name=make]').val(),
			model:$('#car-create input[name=model]').val(),year:$('#car-create input[name=year]').val(),miles:$('#car-create input[name=miles]').val(),
			price:$('#car-create input[name=price]').val()}).done(function( data ) {
				alert(" Data loaded: " + data);
			});
		});
		
		$(document).on('submit', '#seller-create', function(e){
			e.preventDefault();
			$.post("sellers/create.php",{ID:$('#seller-create input[name=ID]').val(),make:$('#seller-create input[name=make]').val(),
			model:$('#seller-create input[name=model]').val(),year:$('#seller-create input[name=year]').val(),miles:$('#seller-create input[name=miles]').val(),
			price:$('#seller-create input[name=price]').val()}).done(function( data ) {
				alert(" Data loaded: " + data);
			});
		});
		*/
	</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body> 
</html>