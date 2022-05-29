$(document).ready(function () {

	//* Add Banner 

	$('#add_banner_form').on('submit', (e) => {
		e.preventDefault();
		const banner = $("#choose_banner").val();
		if (!banner) {
			$('#choose_banner_error').html("This field is required");
			return false;
		} else {
			$('#choose_banner_error').html('');
		}
		$("#upload_banner_button").attr("disabled", true);
		$("#upload_banner_button").html(
			'<i class="fas fa-spinner fa-spin"></i> Please wait...'
		);

		$(".close").attr("disabled", true);
		$("#close-button").attr("disabled", true);

		$.ajax({
			url: base_url + "Admin/upload_banner",
			type: "POST",
			data: new FormData(document.getElementById("add_banner_form")),
			cache: false,
			processData: false,
			contentType: false,
			success: (response) => {
				if (response.trim() == "success") {
					swal(
						{
							title: "Success",
							text: "Banner uploaded successfully",
							type: "success",
						},
						function () {
							location.reload();
						}
					);
				} else {
					swal(
						{
							title: "Error",
							text: "something wents wrong, please try again later!",
							type: "error",
						},
						function () {
							location.reload();
						}
					);
				}
			},
			error: () => {
				swal(
					{
						title: "Error",
						text: "something wents wrong, please try again later!",
						type: "error",
					},
					function () {
						location.reload();
					}
				);
			},
		});


	});

	//* Add Banner Ends


	//* Banner Listing
	var banenrListing = $("#banner_listing").DataTable({
		lengthMenu: [
			[50, 100, 250, 500, 10000],
			[50, 100, 250, 500, "All"],
		],
		processing: true,
		serverSide: true,
		language: {
			emptyTable:
				'<img src="' +
				base_url +
				'assets/admin/images/no-data/no_data_found.png" width="200px" height="200px">',
		},
		order: [[0, "DESC"]],
		searching: false,
		scrollX: true,
		paging: true,
		// dom: "Blfrtip",
		// buttons: [
		// 	{
		// 		extend: "excelHtml5",
		// 		text: '<i class="fas fa-file-excel"></i>',
		// 		filename: "Package Type List",
		// 		titleAttr: "Excel",
		// 		exportOptions: {
		// 			columns: [0, 2],
		// 		},
		// 	},
		// ],
		ajax: {
			url: base_url + "Admin/show_all_banners",
			data: {
				csrf_test_name: csrf_hash,
			},
			dataSrc: "records",
			type: "POST",
			error: function () {
				$(".banner_listing-error").html("");
				$("#banner_listing").append(
					'<tbody class="banner_listing-error"><tr><th colspan="12">No data found in the server</th></tr></tbody>'
				);
				$("#banner_listing_processing").css("display", "none");
			},
		},
		columns: [
			{
				data: "id",
				bSortable: false,
				bSort: false,
			},
			{
				data: "action",
				bSortable: false,
				bSort: false,
			},
			{
				data: "banner_image",
				bSortable: false,
				bSort: false,
			},
			{
				data: "status",
				bSortable: false,
				bSort: false,
			},
			{
				data: "upload_by",
				bSortable: false,
				bSort: false,
			}
		],
	});

	//* Banner Listing Ends


	//* Add Gallery Image

	$('#add_gallery_form').on('submit', (e) => {
		e.preventDefault();
		const banner = $("#choose_gallery_image").val();
		if (!banner) {
			$('#choose_gallery_image_error').html("This field is required");
			return false;
		} else {
			$('#choose_gallery_image_error').html('');
		}
		$("#upload_gallery_button").attr("disabled", true);
		$("#upload_gallery_button").html(
			'<i class="fas fa-spinner fa-spin"></i> Please wait...'
		);

		$(".close").attr("disabled", true);
		$("#close-button").attr("disabled", true);

		$.ajax({
			url: base_url + "Admin/add_gallery_form_data",
			type: "POST",
			data: new FormData(document.getElementById("add_gallery_form")),
			cache: false,
			processData: false,
			contentType: false,
			success: (response) => {
				if (response.trim() == "success") {
					swal(
						{
							title: "Success",
							text: "Image uploaded successfully",
							type: "success",
						},
						function () {
							location.reload();
						}
					);
				} else {
					swal(
						{
							title: "Error",
							text: "something wents wrong, please try again later!",
							type: "error",
						},
						function () {
							location.reload();
						}
					);
				}
			},
			error: () => {
				swal(
					{
						title: "Error",
						text: "something wents wrong, please try again later!",
						type: "error",
					},
					function () {
						location.reload();
					}
				);
			},
		});


	});

	//* Add Gallery Image Ends



	//* Banner Listing
	$("#gallery_listing").DataTable({
		lengthMenu: [
			[50, 100, 250, 500, 10000],
			[50, 100, 250, 500, "All"],
		],
		processing: true,
		serverSide: true,
		language: {
			emptyTable:
				'<img src="' +
				base_url +
				'assets/admin/images/no-data/no_data_found.png" width="200px" height="200px">',
		},
		order: [[0, "DESC"]],
		searching: false,
		scrollX: true,
		paging: true,
		// dom: "Blfrtip",
		// buttons: [
		// 	{
		// 		extend: "excelHtml5",
		// 		text: '<i class="fas fa-file-excel"></i>',
		// 		filename: "Package Type List",
		// 		titleAttr: "Excel",
		// 		exportOptions: {
		// 			columns: [0, 2],
		// 		},
		// 	},
		// ],
		ajax: {
			url: base_url + "Admin/show_all_gallery_images",
			data: {
				csrf_test_name: csrf_hash,
			},
			dataSrc: "records",
			type: "POST",
			error: function () {
				$(".gallery_listing-error").html("");
				$("#gallery_listing").append(
					'<tbody class="gallery_listing-error"><tr><th colspan="12">No data found in the server</th></tr></tbody>'
				);
				$("#gallery_listing_processing").css("display", "none");
			},
		},
		columns: [
			{
				data: "id",
				bSortable: false,
				bSort: false,
			},
			{
				data: "action",
				bSortable: false,
				bSort: false,
			},
			{
				data: "image",
				bSortable: false,
				bSort: false,
			},
			{
				data: "title",
				bSortable: false,
				bSort: false,
			},
			{
				data: "upload_by",
				bSortable: false,
				bSort: false,
			}
		],
	});

	//* Banner Listing Ends



	//* Booking List
	var booking_enq_list = $("#booking_enq_list").DataTable({
		lengthMenu: [
			[50, 100, 250, 500, 10000],
			[50, 100, 250, 500, "All"],
		],
		processing: true,
		serverSide: true,
		language: {
			emptyTable:
				'<img src="' +
				base_url +
				'assets/admin/images/no-data/no_data_found.png" width="200px" height="200px">',
		},
		order: [[0, "DESC"]],
		searching: true,
		scrollX: true,
		paging: true,
		dom: "Blfrtip",
		buttons: [
			{
				extend: "excelHtml5",
				text: '<i class="fas fa-file-excel"></i>',
				filename: "Booking List",
				titleAttr: "Excel",
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26],
				},
			},
		],
		ajax: {
			url: base_url + "Admin/show_all_booking",
			data: {
				csrf_test_name: csrf_hash,
			},
			dataSrc: "records",
			type: "POST",
			error: function () {
				$(".booking_enq_list-error").html("");
				$("#booking_enq_list").append(
					'<tbody class="booking_enq_list-error"><tr><th colspan="12">No data found in the server</th></tr></tbody>'
				);
				$("#booking_enq_list_processing").css("display", "none");
			},
		},
		columns: [
			{
				data: "id",
				bSortable: false,
				bSort: false,
			},
			{
				data: "date_of_booking",
				bSortable: false,
				bSort: false,
			},
			{
				data: "returning_new",
				bSortable: false,
				bSort: false,
			},
			{
				data: "first_name",
				bSortable: false,
				bSort: false,
			},
			{
				data: "last_name",
				bSortable: false,
				bSort: false,
			},
			{
				data: "street_address",
				bSortable: false,
				bSort: false,
			},
			{
				data: "address_line_2",
				bSortable: false,
				bSort: false,
			},
			{
				data: "city",
				bSortable: false,
				bSort: false,
			},
			{
				data: "state",
				bSortable: false,
				bSort: false,
			},
			{
				data: "contact_number",
				bSortable: false,
				bSort: false,
			},
			{
				data: "email",
				bSortable: false,
				bSort: false,
			},
			{
				data: "drop_off_date",
				bSortable: false,
				bSort: false,
			},
			{
				data: "drop_off_eta",
				bSortable: false,
				bSort: false,
			},
			{
				data: "pick_up_date",
				bSortable: false,
				bSort: false,
			},
			{
				data: "collection_io_eta",
				bSortable: false,
				bSort: false,
			},
			{
				data: "animal_booking_for",
				bSortable: false,
				bSort: false,
			},
			{
				data: "animal_name",
				bSortable: false,
				bSort: false,
			},
			{
				data: "is_animal_desexed",
				bSortable: false,
				bSort: false,
			},
			{
				data: "animal_vaccine_requirement",
				bSortable: false,
				bSort: false,
			},
			{
				data: "animal_age",
				bSortable: false,
				bSort: false,
			},
			{
				data: "animal_dob",
				bSortable: false,
				bSort: false,
			},
			{
				data: "animal_gender",
				bSortable: false,
				bSort: false,
			},
			{
				data: "animal_breed",
				bSortable: false,
				bSort: false,
			},
			{
				data: "current_vet_clinic",
				bSortable: false,
				bSort: false,
			},
			{
				data: "medication_required",
				bSortable: false,
				bSort: false,
			},
			{
				data: "behaviour_issue",
				bSortable: false,
				bSort: false,
			},
			{
				data: "accomodation",
				bSortable: false,
				bSort: false,
			}
		],
	});

	$(".booking_date_report").on("keyup blur change", function () {
		var i = $(".booking_date_report").attr("id"); // getting column index
		var v1 = $(this).val(); // getting search input value
		booking_enq_list.columns(i).search(v1).draw();
	});

	//* Booking List Ends


	//!Document Ready Ends
});


//*Delete Banner

const deleteBanner = (id, imageName) => {
	swal(
		{
			title: "Are you sure?",
			text: "You want to delete this banner",
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Yes",
			animation: "slide-from-top",
			confirmButtonColor: "#967ADC",
			showLoaderOnConfirm: true,
		},
		function () {
			setTimeout(function () {
				$.ajax({
					url: base_url + "Admin/delete_banner",
					type: "POST",
					data: {
						id: id,
						imageName: imageName,
						csrf_test_name: csrf_hash,
					},
					success: (response) => {
						if (response.trim() == "success") {
							swal(
								{
									title: "Success",
									text: "Banner deleted successfully",
									type: "success",
								},
								function () {
									location.reload();
								}
							);
						} else {
							swal(
								{
									title: "Error",
									text: "something wents wrong, please try again later!",
									type: "error",
								},
								function () {
									location.reload();
								}
							);
						}
					},
					error: () => {
						swal(
							{
								title: "Error",
								text: "something wents wrong, please try again later!",
								type: "error",
							},
							function () {
								location.reload();
							}
						);
					},
				});
			}, 1500);
		}
	);
};

//* Delete Banner Ends


//* Activate Banner 
const activate_banner = (id) => {
	swal(
		{
			title: "Are you sure?",
			text: "You want to activate this banner",
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Yes",
			animation: "slide-from-top",
			confirmButtonColor: "#967ADC",
			showLoaderOnConfirm: true,
		},
		function () {
			setTimeout(function () {
				$.ajax({
					url: base_url + "Admin/activate_banner",
					type: "POST",
					data: {
						id: id,
						csrf_test_name: csrf_hash,
					},
					success: (response) => {
						if (response.trim() == "success") {
							swal(
								{
									title: "Success",
									text: "Banner activated successfully",
									type: "success",
								},
								function () {
									location.reload();
								}
							);
						} else {
							swal(
								{
									title: "Error",
									text: "something wents wrong, please try again later!",
									type: "error",
								},
								function () {
									location.reload();
								}
							);
						}
					},
					error: () => {
						swal(
							{
								title: "Error",
								text: "something wents wrong, please try again later!",
								type: "error",
							},
							function () {
								location.reload();
							}
						);
					},
				});
			}, 1500);
		}
	);
};
//* Activate Banner Ends


//* Delete Gallery Image

const deleteGalleryImage = (id, imageName) => {
	swal(
		{
			title: "Are you sure?",
			text: "You want to delete this image",
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Yes",
			animation: "slide-from-top",
			confirmButtonColor: "#967ADC",
			showLoaderOnConfirm: true,
		},
		function () {
			setTimeout(function () {
				$.ajax({
					url: base_url + "Admin/delete_gallery_image",
					type: "POST",
					data: {
						id: id,
						imageName: imageName,
						csrf_test_name: csrf_hash,
					},
					success: (response) => {
						if (response.trim() == "success") {
							swal(
								{
									title: "Success",
									text: "Image deleted successfully",
									type: "success",
								},
								function () {
									location.reload();
								}
							);
						} else {
							swal(
								{
									title: "Error",
									text: "something wents wrong, please try again later!",
									type: "error",
								},
								function () {
									location.reload();
								}
							);
						}
					},
					error: () => {
						swal(
							{
								title: "Error",
								text: "something wents wrong, please try again later!",
								type: "error",
							},
							function () {
								location.reload();
							}
						);
					},
				});
			}, 1500);
		}
	);
};

//* Delete Gallery Image Ends
