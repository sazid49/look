<footer class="footer">
	<div class="container-fluid">
	   <div class="row">
		   <div class="col-sm-6">
			 
		   </div>
		   <div class="col-sm-6">
			   <div class="text-sm-end d-none d-sm-block">
					<strong>
					   @lang('Copyright') &copy; {{ date('Y') }}
					   <x-utils.link href="{{ env('APP_URL') }}" target="_blank" :text="__(appName())" />
				   </strong>
			   </div>
		   </div>
	   </div>
   </div>
</footer>


