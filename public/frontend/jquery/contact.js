var PMJS = new function(){
	var send_message = function(){
		$(".contact-form").submit(function(event){
			var self = $(this);
			self.hide();
			$(".formaction-message").show();
			$(".error-message").hide();
			$(".success-message").hide();
			var name = self.children("#name").val();
			var email = self.children("#email").val();
			var message = self.children("#message").val();

			$.ajax({
				url:"inc/contact.php",
				type:"post",
				data: {name:name, email:email, message:message }
			})
			.success(function(data){
			 	switch(data.status){
			 		case 'erorr':
			 				$(".error-message").show();
			 			break;
			 		default:
			 				$(".success-message").show();
			 			break;
			 	}
			})
			.error(function(data){
			 	$(".error-message").show();
			})
			.complete(function(){
				$(".formaction-message").hide();
			 	self.show();
			});

			event.preventDefault();
		});
	};

	this.init = function(){
		$(".contact-form").validate();
		send_message();
	}
}
$(function(){
	PMJS.init();
});