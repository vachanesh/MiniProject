$(document).ready(function(){
	// load users table
	lodeTable();
	// validate signup form on keyup and submit
	$("#users-form").validate({
		rules: {
			first_name: "required",
			last_name: "required",
			email: {
				required: true,
				email: true,
				remote: {
	        url: BASE_URL+'/users/checkEmail',
	        type: "POST",
	        data: {
            email: function() { return $("#email").val(); }
	        },
	        dataFilter: function(data){
	        	if (data != 1) {
	        		return true;
	        	}else{
	        		return false;
	        	}
	        }
		    }
			},
			telephone: {
				required: true,
				minlength: 10,
				number: true
			},
		},
		messages: {
			firstname: "Please enter your firstname",
			lastname: "Please enter your lastname",
			email: {
        email: "Please enter a valid email address",
        remote: "Email already exist."
      },
			telephone: "Please enter a valid telephone"
		}
	});

	$('#users-form').on('submit', function (e) {
    e.preventDefault();
    // check form is valid
    if ($("#users-form").valid()) {
    	$.ajax({
	      type: 'post',
	      url: BASE_URL+'users/save',
	      data: $('#users-form').serialize(),
	      success: function (res) {
	        if (res.status == 'success') {
	        	$('#users-form')[0].reset();
	        	lodeTable();
	        }
	      }
	    });
    }
  });
});

function lodeTable(){
		$('#table-rows').html('');
		$.ajax({
			type: "POST",
			url: BASE_URL+"users/getusers",
			success: function(res) {
				var html = '';
				if (res.status == 'success') {
					var i = 1;
					$.each(res.data, function( index, value ) {
					  html += '<tr>'+
								      '<th scope="row">'+i+'</th>'+
								      '<td>'+value.first_name+'</td>'+
								      '<td>'+value.last_name+'</td>'+
								      '<td>'+value.email+'</td>'+
								      '<td>'+value.telephone+'</td>'+
								      '<td>'+
								      	'<button class="btn btn-sm btn-danger" onclick="deleteUser('+value.id+')">Delete</button>'+
							      	'</td>'+
								    '</tr>';
						i++;
					});

					$('#table-rows').append(html);
				}else{
					html = '<tr>'+
						      '<td colspan="6"><center>'+res.msg+'</center></td>'+
						    '</tr>';
					$('#table-rows').append(html);
				}
			}
		});
	}

function deleteUser(id){
	if (confirm('You want to delete this record?')) {
		$.ajax({
			type: "POST",
			url: BASE_URL+"users/delete/"+id,
			success: function(res) {
				if (res.status == 'success') {
					lodeTable();
				}else{
					alert("Something get wrong");
				}
			}
		});
	}
}