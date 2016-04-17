{GET_HEADER}

<section class="s_inner_page s_contacts_sect">
	<div class="container s_page_title">
		<div class="row">

			<div class="page_title col-sm-12">
				<h1>{PAGE_NAME}</h1>
			</div>
			
		</div>
	</div>
	<div class="container">
		<div class="page_content s_contacts col-sm-12">
			
			<div class="contacts_cont">
				
				<div class="contacts_circyle">
					<div class="circyle_bg"></div>
					<div class="cont">
						<div class="phone"><i class="fa fa-phone"></i><span>{PHONE}</span></div>
						

						<div class="mail"><i class="fa fa-envelope"></i><span class="span_wrapp"><a href="mailto:shimanskiy@gmail.com">{EMAIL}</a></span></div>

						<div class="soc_cont">
							<a href="{VKONTAKTE}" target="_blank"><i class="fa fa-vk"></i></a>
							<a href="{FACEBOOK}" target="_blank"><i class="fa fa-facebook-f"></i></a>
							<a href="{INSTAGRAMM}" target="_blank"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="s_add_message_form">
		<div class="container">
			<div class="row">

				<div class="col-md-10 col-md-push-1">
					<h3>Обратная связь:</h3>
					<div class="add_message">
						<form action="mail.php" method="POST" id="add_message" name="add_message">
							<div class="col-md-6 col-sm-12">
								<label for="your_name">Ваше имя:</label>
								<input type="text" name="Имя" id="your_name" pattern="[A-Za-zА-Яа-я0-9]+" placeholder="Введите ваше имя..." required>
							</div>
							<div class="col-md-6 col-sm-12">
								<label for="your_email">Ваше e-mail:</label>
								<input type="email" name="E-mail" id="your_email" placeholder="Введите e-mail..." required>
							</div>
							<div class="col-md-12">
								<label for="your_text">Текст сообщения:</label>
								<textarea name="Сообщение" id="your_text" width="100%" max-length="2000" rows="10" placeholder="Введите текст сообщения..." required></textarea>
							</div>
							<div class="col-md-12 text-left button_wrapp">
								<input type="hidden" value="{EMAIL}" name="admin_email">
								<input type="hidden" value="Сообщение с сайта shimansky.by" name="project_name">
								<input type="hidden" value="Сообщение со страницы КОНТАКТЫ!" name="form_subject">
								<button class="button_dark">
									Отправить
									<i class="fa fa-angle-right"></i>
								</button>
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>
		
	</div>


</section>

{GET_FOOTER}