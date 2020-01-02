$(document.ready(function()){
				$("button").click(function(){
					  $.ajax({
							type: 'POST',			
							url : "includes/overseer.inc.php",
							dataType: "json",					
							data: {id:empId, action:'yes'},			
							success: function (response) {
								if(response.status) {
								}			
							}
						});
					  },
					});
				});
				});
			});