$(document).ready(function() {
    
    //start table
    var listSuperusers = [];
    var role = lymphUser.superuserRole;
    
    $.ajax({
        'type': 'GET',
        url: '../camicroscope/api/Data/getLymphocyteSuperusers.php?lymph_superuser=' + role,
        success: function(response) {
            var data = JSON.parse(response);
            console.log("Fetched data users length: " + data.length);
            if (data.length > 0) {
                for ( var i = 0; i < data.length; i++ ) {
                    console.log(data[i].email);
                    listSuperusers.push(data[i].email);
                }
                var lenSuperuserData = listSuperusers.length
                $("#divTable").append("<table id=\"superusersTable\" class=\"table table-hover\"></table>");
                $("#superusersTable").append("<thead id=\"superusersThead\"></thead>");
                $("#superusersThead").append("<tr><th width=\"80%\">User's Email</th><th width=\"20%\">Action - Remove</th></tr>");
                $("#superusersTable").append("<tbody id=\"superusersTbody\"></tbody>");

                for ( var i = 0; i < lenSuperuserData; i++ ) {
                    $("#superusersTbody").append("<tr><td>" + listSuperusers[i] + "</td><td><input id=" + listSuperusers[i] + " type='submit'  value='Remove' class='btn btn-md btn-block btn-danger' data-toggle='tooltip' title='Remove this Lymphocyte App Superuser'></td></tr>");
                }
    
                $("input").click(function(e){
                    var idClicked = e.target.id;
                    var value = document.getElementById(idClicked).value;

                    if (value === 'Remove') {
                        $.ajax({
                            'type': 'DELETE',
                             url: '../camicroscope/api/Data/lymphocyteSuperusers.php?email='+ idClicked + '&role=' + role,
                             success: function (res, err) {
                                 //console.log("response: ");
                                 console.log(res);
                                 console.log(err);
                                 console.log('successfully deleted');
                                 //document.getElementById('msgRemove').innerHTML = msgUserRemoved;
                                 //alert('deleted');
                             }
                        });
                    }       
                });
            }             
				
        },  //end success
        error: function(response) {
            console.log("error on delete: " + response);
            document.getElementById("msgAssign").innerHTML = msgFormError;
        }
    });
    //end table
    
    var msgEnterEmail = 'Please enter the gmail address.';
    var msgNotValidEmail = 'The value is not a valid email address.';
    var msgSuperuserExists = 'This lymphocyte superuser already exists.';
    var msgSuperuserNotExists = "This lymphocyte superuser does not exist.";
    var msgSessionNotEstablished = 'Error on post.  Your session could not be established.  Please login to QuIP to meet access policy requirements. ';
    var msgFormError = 'Form Error';
    var msgResponseNoData = 'No data';
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    //var role = lymphUser.superuserRole;
        
    $('#submitButtonAssign').click(function() {
            
        var email = document.getElementById("emailAssign").value;
        email = email.trim().toLowerCase();
            
        var superuserData = {
            'email': email,
            'role': lymphUser.superuserRole
        };
            
        if (email === "") {
            document.getElementById("msgAssign").innerHTML = msgEnterEmail;
            return false;
        }
        
        if(!(email).match(emailPattern)) {
            document.getElementById("msgAssign").innerHTML = msgNotValidEmail;
            return false;
        } 
            
        $.ajax({
            'type': 'GET',
            url: '../camicroscope/api/Data/lymphocyteSuperusers.php?email=' + email + '&role=' + role,
            success: function(response) {
                var msgConfirmAssign = 'Are you sure you want to assign ' + email + ' as a Lymphocyte App superuser?';
                var msgUserAssigned  = 'User ' + email + ' was assigned rights as a Lymphocyte App superuser';
                        
                if (response.trim().toLowerCase() !== msgResponseNoData.toLowerCase()) {
                    var data = JSON.parse(response);
                    console.log("Fetched data users length: " + data.length);
                    if (data.length === 0 ) {
                        bootbox.confirm(msgConfirmAssign, function (confirmed) {
                            //console.log('superuserData: ' + superuserData.email)
                            if (confirmed) {
                                $.ajax({
                                    'type': 'POST',
                                    url: '../camicroscope/api/Data/lymphocyteSuperusers.php',
                                    data: superuserData,
                                    success: function (res, err) {
                                        //console.log("response: ");
                                        console.log(res);
                                        console.log(err);
                                        console.log('successfully posted');
                                        document.getElementById('msgAssign').innerHTML = msgUserAssigned;
                                        window.location.reload();
                                    }
                                });
                            }else{
                                document.getElementById("msgAssign").innerHTML = "";
                            }
                         });
                    } else {
                        document.getElementById("msgAssign").innerHTML = msgSuperuserExists;
                    }
                } else {
                    document.getElementById("msgAssign").innerHTML = msgSessionNotEstablished;
                }
            },  //end success
            error: function(response) {
                console.log("error on post: " + response);
                document.getElementById("msgAssign").innerHTML = msgFormError;
            }
        });
		
        return false;
    });  // end 'submitButtonAssign' click
                 
    // start remove superuser
    $('#submitButtonRemove').click(function() {
            
        var email = document.getElementById("emailRemove").value;
        email = email.trim().toLowerCase();
            
        if (email === "") {
            document.getElementById("msgRemove").innerHTML = msgEnterEmail;
            return false;
        }
        
        if(!(email).match(emailPattern)) {
            document.getElementById("msgRemove").innerHTML = msgNotValidEmail;
            return false;
        } 
            
        $.ajax({
            'type': 'GET',
            url: '../camicroscope/api/Data/lymphocyteSuperusers.php?email=' + email + '&role=' + role,
            success: function(response) {
                var msgConfirmRemove = 'Are you sure you want to remove ' + email + ' as a Lymphocyte App superuser?';
                var msgUserRemoved  = 'User ' + email + ' was successfully removed as a Lymphocyte App superuser.';
                         
                if (response.trim().toLowerCase() !== msgResponseNoData.toLowerCase()) {
                    var data = JSON.parse(response);
                    console.log("Fetched data users length: " + data.length);
                    if (data.length !== 0) {
                        bootbox.confirm(msgConfirmRemove, function (confirmed) {
                            //console.log('superuserData: ' + superuserData.email)
                            if (confirmed) {
                                $.ajax({
                                    'type': 'DELETE',
                                    url: '../camicroscope/api/Data/lymphocyteSuperusers.php?email='+ email + '&role=' + role,
                                    success: function (res, err) {
                                        //console.log("response: ");
                                        console.log(res);
                                        console.log(err);
                                        console.log('successfully deleted');
                                        document.getElementById('msgRemove').innerHTML = msgUserRemoved;
                                    }
                                });
                            }else {
                                document.getElementById("msgAssign").innerHTML = "";
                            }
                        });
					} else if (data.length === 0) {
						document.getElementById("msgRemove").innerHTML = msgSuperuserNotExists;          
					} else {
						return false;
					}
                             
				} else {
					document.getElementById("msgRemove").innerHTML = msgSessionNotEstablished;
				}
			},  //end success
			error: function(response) {
				console.log("error on delete: " + response);
				document.getElementById("msgAssign").innerHTML = msgFormError;
			}
		});
          
        return false;
	});  // end remove superuser
    
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'bottom'
    });
});  //end ready

$('.closeall').click(function(){
  $('.panel-collapse.in')
    .collapse('hide');
});

$('.openall').click(function(){
  $('.panel-collapse:not(".in")')
    .collapse('show');
});
    
