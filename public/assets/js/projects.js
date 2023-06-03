	var categories = [];
	var sections = $('#stepsForm').html();
	var howManyAttachments = 1;
	var section;
	const Toast = Swal.mixin({
		toast: true,
		position: 'bottom-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		onOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	});
	function selectSection(id){
		if(id > 20 || id < 1){
			  Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بمراجعة المدخلات'
			  });
		} else {
			$('#stepsForm').animate({
				height: 'toggle'
			});
			$('#stepTitle').animate({
				height: 'toggle'
			});
			setTimeout(() => {
				$("#stepsForm").load(window.location.origin + "api/projects/department/" + id, function(){
					categories = [];
					setTimeout(() => {
						$("#stepTitle").text($("#chooseCategoriesTitle").val());
						$('#stepTitle').animate({
							height: 'toggle'
						});
					},200);
					$('#stepsForm').animate({
						height: 'toggle'
					});
					section = id;
					var body = $("html, body");
					body.stop().animate({scrollTop:$('#newProject').offset().top}, 500, 'swing');

				});
			},300);
		}
	}
	function selectCategory(id){
		if(id > 1000 || id < 1){
			  Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بمراجعة المدخلات'
			  });
		} else {
			if($("#category"+id).hasClass("active")){
				var index = categories.indexOf(id);
				categories.splice(index, 1);
				delete categories[id]
				$("#category"+id).removeClass("active");
			}else{
				categories.push(id);
				$("#category"+id).addClass("active");
			}
			$("#categoriesSelected").html(' ')
			categories.forEach(function (category){
				var categoryName = $("#categoryname"+category).text();
				$("#categoriesSelected").html($("#categoriesSelected").html() + ' <span class="badge badge-info">'+categoryName+'</span> ');
			});
			if(categories.length == 0){
				$("#categoriesSelected").html(' لا توجد ');
			}
		}
	}
	function getSections(titleAnimate = false){
		$('#stepsForm').animate({
			height: 'toggle'
		});
		if(!titleAnimate){
			$('#stepTitle').animate({
				height: 'toggle'
			});
		}
		var chooseProjectSection = $("#chooseProjectSection").val();
		setTimeout(() => {
			if(titleAnimate){
				$('#createNewProjectTitle').animate({
					height: 'toggle'
				});
			}
			setTimeout(() => {
				$("#stepTitle").text(chooseProjectSection);
				$('#stepTitle').animate({
					height: 'toggle'
				});
			},200);
			$("#stepsForm").html(sections);
			$('#stepsForm').animate({
				height: 'toggle'
			});
			var body = $("html, body");
			body.stop().animate({scrollTop:$('#newProject').offset().top}, 500, 'swing');
		},300);
	}
	function getDetails(titleAnimate = false){
		if(categories.length == 0){
			  Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بإختيار الفئات'
			  });
		}else if(isNaN(section)){
			  Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بمراجعة المدخلات'
			  });
		}else{
			if(!titleAnimate){
				$('#stepTitle').animate({
					height: 'toggle'
				});
			}
			$('#stepsForm').animate({
				height: 'toggle'
			});
			var categoriesJSON = JSON.stringify(categories);
			setTimeout(() => {
				$("#stepsForm").load(window.location.origin + "/projects/getDetails", {"sectionId": section, "categories": categoriesJSON }, function(){
					if(titleAnimate){
						$('#createNewProjectTitle').animate({
							height: 'toggle'
						});
					}
					setTimeout(() => {
						$("#stepTitle").text($("#projectDetailsTitle").val());
						$('#stepTitle').animate({
							height: 'toggle'
						});
					},200);
					$('#stepsForm').animate({
						height: 'toggle'
					});
					var body = $("html, body");
					body.stop().animate({scrollTop:$('#newProject').offset().top}, 500, 'swing');
				});
			},300);

		}
	}
	function submitProject(){
		if(categories.length == 0){
			  Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بإختيار الفئات'
			  });
		}else if(isNaN(section)){
			  Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بمراجعة المدخلات'
			  });
		}else if($("#projectName").val().length > 100){
			  Toast.fire({
				icon: 'error',
				title: 'يجب ان لا يتعدى إسم المشروع 100 حرف'
			  });
		}else if($("#projectDetails").val().length > 1536){
			  Toast.fire({
				icon: 'error',
				title: 'يجب ان لا تتعدى تفاصيل المشروع 1536 حرف'
			  });
		}else if($("#projectName").val().length < 2){
			  Toast.fire({
				icon: 'error',
				title: 'يجب أن لا يقل إسم المشروع عن حرفين'
			  });
		}else if($("#projectDetails").val().length < 50){
			  Toast.fire({
				icon: 'error',
				title: 'يجب أن لا تقل تفاصيل المشروع عن 50 حرف'
			  });
		}else{
			$('#stepsForm').animate({
				height: 'toggle'
			});
			if ($("#theAttachments").find("input[type=file]").length !== 1) {
				var theone = 0;
				$("#theAttachments")
				  .find("input[type=file]")
				  .each(function (index, field) {
					const file = field.files[0];
					if (file === undefined && theone !== 0) {
					  $(field).remove();
					  howManyAttachments = howManyAttachments - 1;
					}
					theone++;
				  });
				}

			var categoriesJSON = JSON.stringify(categories);
			var formData = new FormData(document.getElementById("projectData"));
			formData.append("token", token);
			formData.append("categories", categoriesJSON);
			formData.append("sectionId", section);
			setTimeout(() => {
				$.ajax({
					url: window.location.origin + "/projects/createNewProject",
					data: formData,
					processData: false,
					contentType: false,
					type: "post",
					beforeSend: function () {},
					success: function (response) {
						$('#createNewProjectTitle').animate({
							height: 'toggle'
						});
						$('#stepTitle').animate({
							height: 'toggle'
						});
						$('#stepsForm').animate({
							height: 'toggle'
						});
						$("#stepsForm").html(response);
						var body = $("html, body");
						body.stop().animate({scrollTop:$('#newProject').offset().top}, 500, 'swing');
					},
					error: function () {},
				  });

				// $("#stepsForm").load(window.location.origin + "/projects/createNewProject", formData, function(){
				// 	$('#createNewProjectTitle').animate({
				// 		height: 'toggle'
				// 	});
				// 	$('#stepTitle').animate({
				// 		height: 'toggle'
				// 	});
				// 	$('#stepsForm').animate({
				// 		height: 'toggle'
				// 	});
				// });
			},300);
		}
	}
	$("#projectsStatus").on("click", 'li', function() {
		var id = this.id;
		var el = $("#"+this.id);
		if(id > 1000 || id < 0){
			Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بمراجعة المدخلات'
			});
			throw 'error';
		}
		if(!el.hasClass("active")){
			$.ajax({
				url: window.location.origin + "/projects/selectStatus",
				data: "statusId="+id,
				type: "post",
				dataType: "json",
				beforeSend: function () {},
				success: function (response) {
					if(response.type == 'error'){
						Toast.fire({
							icon: response.type,
							title: response.message
						});
					}else if(response.type == 'success'){
						$('#projectsStatus li.active').removeClass('active');
						el.addClass("active");
						if(response.noProjects){
							$("#projects").html('<div class="job-post text-center" style="color: #4b3da7;"><h6>'+response.noProjects+'</h6></div>');
						}
						if(response.projects){
							$("#projects").html('');
							var projects = JSON.parse(response.projects);

							projects.forEach(function (project){
								$("#projects").html($("#projects").html() + '<a href="'+window.location.origin+'/projects/view/'+project.id+'" class="job-post"><div class="row"><div class="col-xl-5 col-lg-5"><div class="job-title"><h5>'+project.name+'</h5><span class="job-id">'+project.categories+'</span></div></div><div class="col-xl-3 col-lg-3"><div class="job-category"><span>'+project.section+'</span></div><div class="job-title"><span class="job-id">'+project.status+'</span></div></div><div class="col-xl-4 col-lg-4"><div class="job-location"><i class="bx bx-alarm-add"></i><span>'+project.createdAt+'</span></div><div class="job-location"><i class="bx bx-alarm"></i><span>'+project.updatedAt+'</span></div></div></div></a>');
							});
						}
					}

				},
				error: function () {},
			});
		}
	});
	function selectProjectsStatus(id){
		if(id > 1000 || id < 1){
			  Toast.fire({
				icon: 'error',
				title: 'من فضلك قم بمراجعة المدخلات'
			  });
		} else {
			if($("#category"+id).hasClass("active")){
				var index = categories.indexOf(id);
				categories.splice(index, 1);
				delete categories[id]
				$("#category"+id).removeClass("active");
			}else{
				categories.push(id);
				$("#category"+id).addClass("active");
			}
			$("#categoriesSelected").html(' ')
			categories.forEach(function (category){
				var categoryName = $("#categoryname"+category).text();
				$("#categoriesSelected").html($("#categoriesSelected").html() + ' <span class="badge badge-info">'+categoryName+'</span> ');
			});
			if(categories.length == 0){
				$("#categoriesSelected").html(' لا توجد ');
			}
		}
	}
	function projectCreated(id,message){
		Toast.fire({
			title: message,
			onBeforeOpen: () => {
				Swal.showLoading();
			},
		});
		setTimeout(() => {
			window.location = window.location.origin + "/projects/view/"+id
		},3000);
	}


	function attachmentAdd() {
		if (howManyAttachments > 2) {
		  Toast.fire({
			icon: "error",
			title: "يسمح لك فقط بإرفاق 3 مرفقات",
		  });
		} else {
		  $("#theAttachments").append(
			'<input type="file" name="attachments[]" id="inputAttachments" class="form-control">'
		  );
		  howManyAttachments++;
		}
	}
	/*--------------------------------------------------------*/

	// Change Color Links Faq Control
	var myProjectsSticky = new hcSticky('aside', {
		stickTo: '.vacan-posts',
		top: 100,
		responsive: {
			991: {
				disable: true
			}
		}
	});

