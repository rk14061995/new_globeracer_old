<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
	  src="https://code.jquery.com/jquery-3.5.1.js"
	  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
	  crossorigin="anonymous"></script>
</head>
<body>
	<!-- <a href="http://www.strava.com/oauth/authorize?client_id=54937&response_type=code&redirect_uri=http://localhost/exchange_token&approval_prompt=force&scope=scope=read,activity:read,activity:read_all,profile:read_all">Test React</a>
	<a href="https://www.strava.com/oauth/authorize?client_id=54937&response_type=code&redirect_uri=http://localhost/exchange_token&approval_prompt=force&scope=read,activity:read,activity:read_all,profile:read_all"> Strava Orig</a>
	<a href="http://www.strava.com/oauth/authorize?client_id=54937&response_type=code&redirect_uri=http://localhost/exchange_token&approval_prompt=force&scope=read_all"> Strava</a> -->

	<a href="http://www.strava.com/oauth/authorize?client_id=54937&response_type=code&redirect_uri=<?=base_url('Login/getCode')?>&approval_prompt=force&scope=read_all,activity:read,activity:read_all,profile:read_all">Bla</a>

	
<!-- 
	{
    "token_type": "Bearer",
    "expires_at": 1602868714,
    "expires_in": 19439,
    "refresh_token": "db1fea7be6052eaca33ec457158b2426ac2787d5",
    "access_token": "f0ec276a6404ee2666bfb821745952089b79ba55",

    "refresh_token": "db1fea7be6052eaca33ec457158b2426ac2787d5",
    "access_token": "f0ec276a6404ee2666bfb821745952089b79ba55",


    
    "athlete": {
        "id": 70407796,
        "username": "vvn_city",
        "resource_state": 2,
        "firstname": "Globe",
        "lastname": "Racers",
        "city": null,
        "state": null,
        "country": null,
        "sex": null,
        "premium": false,
        "summit": false,
        "created_at": "2020-10-16T10:10:06Z",
        "updated_at": "2020-10-16T10:12:08Z",
        "badge_type_id": 0,
        "profile_medium": "https://lh4.googleusercontent.com/-WOz2V--Qw3M/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclo4ts32F_3xKZRl8Dxh6bk5t3yLA/s96-c/photo.jpg",
        "profile": "https://lh4.googleusercontent.com/-WOz2V--Qw3M/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclo4ts32F_3xKZRl8Dxh6bk5t3yLA/s96-c/photo.jpg",
        "friend": null,
        "follower": null
    }
} -->
	<div id="dat">
		
	</div>


	<!-- c44b7a21badd19364f3d3fbc61f46bef398f9d55 -->

	<!-- //Imp -->
	<!-- 6816f92097b8ce64e17f02ed97e1f9c0f67ab108 -->





	<!-- 7b6d5543cc8937c96216673ab29c519c78904776 -->
	<!-- <form id="">
		



		https://www.strava.com/oauth/authorize?client_id=17994&response_type=code&redirect_uri=https://evantik.runizen.com/pages/process_login_with_strava&approval_prompt=force&scope=read,activity:read,activity:read_all,profile:read_all


		https://www.strava.com/oauth/authorize?client_id=17994&response_type=code&redirect_uri=https://evantik.runizen.com/pages/process_login_with_strava&approval_prompt=force&scope=read,activity:read,activity:read_all,profile:read_all
	</form> -->
	<script type="text/javascript">
		// http://www.strava.com/oauth/authorize?client_id=54937&response_type=code&redirect_uri=http://localhost/exchange_token&approval_prompt=force&scope=read_all,activity:read,activity:read_all,profile:read_all
		$(document).ready(function(){
			// var bd="dbf5a38aa43b94526804f7c13ce7528add7d89f1";
			
			$.ajax({
				url:"<?=base_url('Login/')?>getCode",
				type:"get",

				success:function(response){
					console.log(response);
					$('#data').append(response);
				}
			})
		});
	</script>
</body>
</html>