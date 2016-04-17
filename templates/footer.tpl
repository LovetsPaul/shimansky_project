<footer class="s_footer">
	<div class="main_footer">
		<div class="container">
			<div class="row">
				
				<div class="main_footer_wrapp col-md-12">
					<div class="col-md-8">
						<div class="s_coffee">
							<div class="h_coffee">
								<i class="fa fa-coffee"></i>
								<h2>Записаться на чашечку кофе со мной:</h2>
							</div>
							<form method="POST" action="mail.php" id="coffee_form">

								<div class="col-md-5 input_item">
								<label for="coffe_name">Ваше имя:</label>
									<input type="text" name="Имя" pattern="[A-Za-zА-Яа-я0-9]+" required maxLength="30" placeholder="Введите ваше имя..." id="coffe_name">
								</div>

								<div class="col-md-5 input_item">
									<label for="coffe_phone">Ваш телефон:</label>
									<input type="text" name="Телефон" pattern="[()0-9+-]+" title="" required aria-required="true" maxLength="19" id="coffe_phone" placeholder="+375-(**)-***-**-**">
								</div>
								<input type="hidden" name="admin_email" value="{EMAIL}">
								<input type="hidden" name="project_name" value="Записаться на чашечку кофе">
								<input type="hidden" value="Сообщение с нижней части сайта (footer)!" name="form_subject">

								<button class="button_dark">
									Отправить
									<i class="fa fa-angle-right"></i>
								</button>

							</form>
						</div>
					</div>
					<div class="col-md-4">
						<div class="main_footer_right">

							<div class="soc_cont text-right">
								<a href="{VKONTAKTE}" target="_blank"><i class="fa fa-vk"></i></a>
								<a href="{FACEBOOK}" target="_blank"><i class="fa fa-facebook-f"></i></a>
								<a href="{INSTAGRAMM}" target="_blank"><i class="fa fa-instagram"></i></a>
							</div>

							<div class="bahtiar">
								<div class="bahtiar_text text-left">Живи так – чтобы люди, столкнувшись с тобой, улыбнулись, а, общаясь с тобой, стали чуточку счастливей.</div>
								<div class="bahtiar_author_copy text-right">&copy;&nbsp;&nbsp;Бахтияр Мамедов</div>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="footer_bottom">
		<div class="container">
			<div class="row">

				<div class="footer_links">
					<div class="col-md-12">
						<div class="phone footer_link"><i class="fa fa-phone"></i><span class="span_wrapp">{PHONE}</span></div>
						<div class="mail footer_link"><i class="fa fa-envelope"></i><span class="span_wrapp"><a href="mailto:shimanskiy@gmail.com">{EMAIL}</a></span></div>
						<div class="edit_anket footer_link"><i class="fa fa-edit"></i><span class="span_wrapp"><a href="#">Заполнить анкету</a></span></div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="s_copyright">
		<div class="copy text-center"><a href="/">shimansky.by</a>&nbsp;&nbsp;&copy;&nbsp;&nbsp;2016г.</div>
	</div>
</footer>
<div id="back_to_top"></div>
</div> <!--End Wrapp Page For Mobile Menu-->

<div class="form_submit">
	<div class="submit_form_modal">
		Спасибо!<br><span>Ваше сообщение отправлено!</span>
	</div>
</div>
<div class="reviews_modal">
	<div class="submit_form_modal">
		Спасибо за Ваш отзыв!<br><span>Отзыв появится на сайте после проверки!</span>
	</div>
</div>

<div class="preloader"></div>

		<!--[if lt IE 9]>
		<script src="libs/html5shiv/es5-shim.min.js"></script>
		<script src="libs/html5shiv/html5shiv.min.js"></script>
		<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
		<![endif]-->

		<!-- Load Scripts Start -->
		<script>var scr = {"scripts":[
			{"src" : "{PATH_JS}libs.js", "async" : false},
			{"src" : "{PATH_JS}common.js", "async" : false}
			]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
		</script>
		<!-- Load Scripts End -->
</body>
</html>
