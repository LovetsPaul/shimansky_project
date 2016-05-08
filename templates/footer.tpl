<footer class="s_footer">
	<div class="main_footer">
		<div class="container">
			<div class="row">
				
				<div class="main_footer_wrapp col-md-12">
					<div class="col-md-8">
						<div class="s_coffee">
							<div class="h_coffee">
								<i class="fa fa-coffee"></i>
								<h2>Записаться на встречу со мной:</h2>
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
								<input type="hidden" name="project_name" value="Записаться на встречу со мной!">
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
						<div class="edit_anket footer_link"><i class="fa fa-edit"></i><span class="span_wrapp"><a href="/anketa">Заполнить анкету</a></span></div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="s_copyright">
		<div class="copy text-center"><a href="/">shimanskiy.by</a>&nbsp;&nbsp;&copy;&nbsp;&nbsp;2016г.</div>
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
<div class="anketa_modal">
	<div class="submit_form_modal">
		Спасибо!<br><span>Ваша анкета отправлена!</span>
	</div>
</div>

<div class="preloader"></div>

		<!--[if lt IE 9]>
		<script src="/libs/html5shiv/es5-shim.min.js"></script>
		<script src="/libs/html5shiv/html5shiv.min.js"></script>
		<script src="/libs/html5shiv/html5shiv-printshiv.min.js"></script>
		<![endif]-->

		<!-- Load Scripts Start -->
		<script>var scr = {"scripts":[
			{"src" : "{PATH_JS}libs.js", "async" : false},
			{"src" : "{PATH_JS}common.js", "async" : false}
			]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
		</script>
		<!-- Google Analytics -->
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-77348697-1', 'auto');ga('send', 'pageview');
		</script><!-- /Google Analytics -->
		<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter37226255 = new Ya.Metrika({ id:37226255, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/37226255" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
		<!-- Load Scripts End -->
</body>
</html>
