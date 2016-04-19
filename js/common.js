$(document).ready(function() {

	//SVG Fallback
	if (!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};

	//Menu active link
	var url = document.location.href,
		modul = url.substr(19),
		link = "li a[href="+"'"+modul+"'"+"]",
		lngth = modul.substr(16).length;

	if(modul.substr(0, 15) == "/blog/full_post" ){
		modul = modul.substr(0, 5);
		link = "li a[href="+"'"+modul+"'"+"]";
		$(link).parent().addClass("active");
	}

	$(link).parent().parent().parent().addClass("active");

	//E-mail Ajax Send
	$("#coffee_form, #add_message").submit(function() {

		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: th.serialize()
		}).done(function() {

			$(".form_submit").fadeIn('200');

			setTimeout(function() {

				$(".form_submit").slideUp();
				th.trigger("reset");

				$("body, html").animate({
					scrollTop: $("body").offset().top
				}, 1200);

			}, 2000);

		});

		return false;

	});

	$("#anketa_form").submit(function() {

		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: th.serialize()
		}).done(function() {

			$(".anketa_modal").fadeIn('200');

			setTimeout(function() {

				$(".anketa_modal").slideUp();
				th.trigger("reset");

				$("body, html").animate({
					scrollTop: $("body").offset().top
				}, 1200);

			}, 2000);

		});

		return false;

	});


	$.validator.addMethod('filesize', function(value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Размер изображения должен быть не более {0}');


	$('#add_img').change(function() {
		var f = this.files[0],
			size = f.size || f.fileSize,
			type = ((f.type).substr(6)).toString(),
			ext = ['jpg', 'jpeg', 'png', 'gif'];
		found = false;
		if (size > 2000000) {

			$(this).val('');
			$(this).remove();
			alert("Размер файла превышает 2Мб!");
			$("#add_reviews_form").append('<input type="file" name="add_img" id="add_img">');
		}

		ext.forEach(function(extention) {
			if (type == extention) found = true;
		});

		if (!found) {
			$(this).val('');
			$(this).remove();
			alert("Недопустимый формат изображения!\n\n Доступные форматы для загрузки:  jpg, jpeg, png, gif");

			$("#add_reviews_form").append('<input type="file" name="add_img" id="add_img">');
		}
	});

	$("#add_reviews_form").validate({
		rules: {
			your_name: "required",
			your_email: {
				required: true,
				email: true
			},
			your_text: "required",
			add_img: {
				required: true,
				extension: "jpg,jpeg",
				filesize: 5
			}
		},
		messages: {
			required: "Это поле обязательное для заполнения!",
			your_name: "Пожалуйста, введите ваше имя!",
			your_email: {
				required: "Введите ваш E-mail адрес!",
				email: "Ваш E-mail адрес должен быть в формате name@domain.com"
			},
			your_text: "Это поле обязательное для заполнения!"
		},
		submitHandler: function() { reviews_form_submit() }

	});

	function reviews_form_submit() {

		$("#add_reviews_form").submit(function(e) {

			var th = $(this),
				formData = new FormData($(this)[0]);

			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "/includes/add_reviews.php",
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false
			}).done(function() {

				$(".reviews_modal").fadeIn('200');

				setTimeout(function() {

					$(".reviews_modal").slideUp();
					th.trigger("reset");

					$("body, html").animate({
						scrollTop: $("body").offset().top
					}, 1200);

				}, 3000);

			});

			return false;

		});

	}
	$("img, a").on("dragstart", function(event) { event.preventDefault(); });


	//Parallax
	var bg_clients = $('.clients_slider'),
		bg_about_work = $('.about_work_bg'),
		bg_inner_page = $('.s_inner_page');

	$(window).scroll(function() {
		//Parallax Clients
		var scroll_top = $(document).scrollTop();
		bg_clients.css({
			"backgroundPosition": "0 " + (-scroll_top / 6) + 'px'
		});
		//Parallax About_Work
		bg_about_work.css({
			"backgroundPosition": "16% " + (-1000 + (scroll_top / 3)) + 'px'
		});

		bg_inner_page.css({
			"backgroundPosition": "0 " + (scroll_top / 3) + 'px'
		});

	});

	//   ---------   Sliders   ---------   //

	//Header Slider
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 0,
		nav: true,
		autoHeight: true,
		responsiveClass: true,
		navText: ["<i class='fa fa-angle-left'>", "<i class='fa fa-angle-right'>"],
		responsive: {
			0: {
				items: 1
			}
		}
	});

	//Clients Slidder
	$('.owl_clients').owlCarousel({
		loop: true,
		margin: 30,
		nav: false,
		autoplay: true,
		autoplaySpeed: 500,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 2
			},
			500: {
				items: 3
			},
			900: {
				items: 4
			},
			1170: {
				items: 4
			}
		}
	})

	//Home Reviews Slider
	$('.owl_reviews').owlCarousel({
		loop: true,
		margin: 0,
		nav: false,
		dots: true,
		autoHeight: true,
		autoplay: true,
		autoplaySpeed: 400,
		autoplayTimeout: 10000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			}
		}
	})

	$(".is_home .preloader").fadeOut(400);

	// Clone menu items from main menu
	var cont = $(".nav_container").children().clone();
	cont.appendTo($('#mobile_menu'));

	//init mobile menu script
	$("#mobile_menu").mmenu({
		extensions: ['widescreen', 'theme-dark', 'effect-menu-slide', 'pagedim-black', 'pageshadow', 'tileview'],
		counters: true,
		iconPanels: true,
		navbar: {
			title: "Меню",

		},
		offCanvas: {
			pageSelector: "#my-page",
			position: "right"
		},
		counters: true,
		columns: true
	});

	var API = $("#mobile_menu").data("mmenu");
	var opened = false;

	$(".toggle-mnu").click(function() {
		$(".toggle-mnu").toggleClass("on");

		if (opened) {
			API.close();
			opened = false;
		} else {
			API.open();
			opened = true;
		}
		return false;

	});

	$("body").bind("click", function() {
		if (opened) {
			$(".toggle-mnu").toggleClass("on");
			opened = false;
		}
	});

	$('ul.sf-menu').superfish({
		delay: 300,
		animation: { opacity: 'show', height: 'show' },
		speed: 'fast',
		autoArrows: false,
		dropShadows: true
	});

	///Start Back To Top
	$(window).scroll(function() {

		if ($(document).scrollTop() > 1100) {
			$("#back_to_top").fadeIn('slow');
		} else {
			$("#back_to_top").fadeOut('fast');
		}

	});

	/// End Back To Top

	var top_pos = $("nav.header_nav").offset().top;

	$(window).scroll(function() {

		var top_scroll = $(document).scrollTop();

		if (top_scroll > top_pos) {
			$("header nav.header_nav").addClass('fixed_menu');
		} else {
			$("header nav.header_nav").removeClass('fixed_menu');
		}

	});

	$("#back_to_top").click(function() {

		$("body, html").animate({
			scrollTop: $("body").offset().top
		}, 1200);
	});

	$('.grid-item').imagefill();
	$('#container').imagesLoaded(function() {
		// images have loaded

		$('.grid').masonry({
			columnWidth: '.grid-sizer',
			itemSelector: '.grid-item',
			percentPosition: true
		});


		var $grid = $('.grid').masonry({
			columnWidth: '.grid-sizer',
			itemSelector: '.grid-item',
			percentPosition: true
		});

	});

	$('.magnific').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	/// Set iframes "width" atribute on 100%

	$("iframe[width]").attr("width", function() {
		return $(this).attr("width").replace("", "100%");
	});
	$("iframe[height]").attr("height", function() {
		return $(this).attr("height").replace("", "300px");
	});


}); //End Document Ready Function
