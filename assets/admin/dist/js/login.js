$(document).ready(function () {
	//Login Form

	$("#authenticate_form").on("submit", (e) => {
		e.preventDefault();
		let email = $("#email");
		let password = $("#password");
		let error = 0;

		if (!email.val()) {
			email.attr("style", "border:1px solid red");
			error++;
		} else {
			email.removeAttr("style");
		}

		if (!password.val()) {
			password.attr("style", "border:1px solid red");
			error++;
		} else {
			password.removeAttr("style");
		}
		$(".alert").addClass("d-none");
		if (error != 0) {
			return false;
		} else {
			$("#login_button").attr("disabled", true);
			$("#login_button").html(
				'<i class="fas fa-spinner fa-spin"></i> Please wait...'
			);
			$.ajax({
				url: base_url + "Admin/authauthorize_user",
				type: "POST",
				data: new FormData(document.getElementById("authenticate_form")),
				cache: false,
				processData: false,
				contentType: false,
				success: (response) => {
					if (response.trim() == "unmatched") {
						$(".alert").removeClass("d-none");
						$(".alert strong").html("Invalid Userid and password");
						$("#login_button").removeAttr("disabled");
						$("#login_button").html("Sign In");
					} else if (response.trim() == "success") {
						window.location.href = base_url + "Admin/manage_banner";
					} else {
						$(".alert").removeClass("d-none");
						$(".alert strong").html(
							"Something wents wrong, please try again later"
						);
						$("#login_button").removeAttr("disabled");
						$("#login_button").html("Sign In");
					}
				},
				error: () => {
					$(".alert").removeClass("d-none");
					$(".alert strong").html(
						"Something wents wrong, please try again later"
					);
					$("#login_button").removeAttr("disabled");
					$("#login_button").html("Sign In");
				},
			});
		}
	});

	//Login Form  Ends

	//Document ready Ends
});
