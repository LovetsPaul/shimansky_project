{GET_HEADER}
<section class="s_inner_page s_anketa">
	<div class="container s_page_title">
		<div class="row">

			<div class="page_title col-sm-12">
				<h1>Анкета</h1>
			</div>
			
		</div>
	</div>
	<div class="container">
		<div class="page_content bg_white col-md-12 col-sm-12"> 
			<div class="row">
				<div class="col-md-12">
					<h2 class="anketa_descr_title">Для тех пар, которые уже решили со мной работать, предлагаю заполнить анкету.</h2>
				</div>  
			</div>
		  
			<div class="anketa_form">
				<div class="row">
				   
					<div class="col-md-7 col-md-push-1">
						<form method="POST" name="anketa_form" id="anketa_form">
							<div class="col-md-12">
								<label for="event_date">Дата меропрриятия (ДД.ММ.ГГГГ):</label>
								<input type="text" name="Дата меропрриятия" id="event_date" pattern="[0-9\.]+" title="Дата в формате 12.12.2017" maxlength="10" placeholder="Дата мероприятия..." required>
							</div>
							<div class="col-md-12">
								<label for="cafe_name">Название и адрес ресторана/столовой/кафе:</label>
								<textarea name="Название и адрес ресторана" id="cafe_name" maxlength="60" rows="3" placeholder="Название и адрес ресторана/столовой/кафе..." title="Не более 60 символов!" required></textarea>
							</div>
							<div class="col-md-12">
								<label for="event_time">Время проведения мероприятия:</label>
								<input type="text" name="Время проведения мероприятия" id="event_time" maxlength="15" title="Не более 15 символов!" placeholder="Время проведения мероприятия..." required>
							</div>
							<div class="col-md-12">
								<h4 class="title_input_group">Фамилия Имя Отчество:</h4>
								<label for="gen_name">Жениха:</label>
								<input type="text" name="ФИО жениха" id="gen_name" maxlength="60"  title="Не более 60 символов!" placeholder="ФИО жениха..." required>
							</div>
							<div class="col-md-12">
								<label for="nev_name">Невесты (девичья/новая):</label>
								<input type="text" name="ФИО невесты" id="nev_name"  maxlength="60"  title="Не более 60 символов!" placeholder="ФИО невесты (девичья/новая)..." required>
							</div>
							<div class="col-md-12">
								<label for="svid_m_name">Свидетеля:</label>
								<input type="text" name="ФИО свидетеля" id="svid_m_name"  maxlength="60"  title="Не более 60 символов!" placeholder="ФИО Свидетеля...">
							</div>
							<div class="col-md-12">
								<label for="svid_w_name">Свидетельницы:</label>
								<input type="text" name="ФИО свидетельеицы" id="svid_w_name"  maxlength="60"  title="Не более 60 символов!" placeholder="ФИО Свидетельницы...">
							</div>
							 <div class="col-md-12">
								<label for="parent_m_name">Родителей жениха:</label>
								<textarea name="ФИО родителей жениха" id="parent_m_name" maxlength="100"  title="Не более 100 символов!" rows="1" placeholder="ФИО родителей жениха..." required></textarea>
							</div>
							 <div class="col-md-12">
								<label for="parent_w_name">Родителей невесты:</label>
								<textarea name="ФИО родителей невесты" id="parent_w_name" maxlength="100"  title="Не более 100 символов!" rows="1" placeholder="ФИО родителей невесты..." required></textarea>
							</div>
							<div class="col-md-12">
								<h4 class="title_input_group">Возраст:</h4>
								<label for="m_age">Жениха:</label>
								<input type="text" name="Возраст жениха" id="m_age" maxlength="2" title="Используйте для ввода цифры 0-9. Длина не должна привышать 3 символов!" pattern="[0-9]+" placeholder="Возраст жениха..." required>
							</div>
							<div class="col-md-12">
								<label for="w_age">Невесты:</label>
								<input type="text" name="Возраст невесты" id="w_age" maxlength="2" title="Используйте для ввода цифры от 0-9. Длина не должна привышать 3 символов!" pattern="[0-9]+" placeholder="Возраст невесты..." required>
							</div>
							<div class="col-md-12">
								<h4 class="title_input_group">Образование и род занятий:</h4>
								<label for="e_education">Жениха:</label>
								<textarea name="Образование и род занятий Жениха" id="e_education" maxlength="200" rows="1" placeholder="Образование и род занятий жениха..." required></textarea>
							</div>
							<div class="col-md-12">
								<label for="w_aducation">Невесты:</label>
								<textarea name="Образование и род занятий Невесты" id="w_aducation" maxlength="150" rows="1" title="Максимальное количество символов - 150 " placeholder="Образование и род занятий невесты..." required></textarea>
							</div>
							 <div class="col-md-12">
								<label for="your_email">Как познакомились:</label>
								<textarea name="Как познакомились" id="your_email" maxlength="150" rows="1" title="Максимальное количество символов - 150 " placeholder="Как познакомились..."></textarea>
							</div>
							<div class="col-md-12">
								<label for="time_vstr">Сколько встречались:</label>
								<input type="text" name="Сколько втречались" id="time_vstr" maxlength="10" title="Доступны для ввода только числа от 0-9. Не более 2 символов!" pattern="[0-9А-я]+" placeholder="Сколько встречались...">
							</div>
							 <div class="col-md-12">
								<label for="contacts">Контакты (телефоны, e-mail, skype, vk...) :</label>
								<textarea name="Контакты" id="contacts" maxlength="200" title="Введите не более 200 символов!" rows="1" placeholder="Контакты..." required></textarea>
							</div>
							<div class="col-md-12">
								<label for="guests_count">Количество гостей:</label>
								<input type="text" name="Количество гостей" id="guests_count" maxlength="3" title="Доступны для ввода только числа от 0-9. Не более 3 цифр!" pattern="[0-9]+" placeholder="Количество гостей...">
							</div>
							<div class="col-md-12">
								<h4 class="title_input_group">Опишите Ваших гостей:</h4>
								<label for="guests_age">Возраст:</label>
								<input type="text" name="Возрас гостей" id="guests_age" maxlength="3" title="Доступны для ввода только числа от 0-9. Не более 3 цифр!" pattern="[0-9]+" placeholder="Средний возраст гостей...">
							</div>
							 <div class="col-md-12">
								<label for="guests_education">Образование (ученые, врачи, военные...) :</label>
								<textarea name="Образование гостей" id="guests_education" maxlength="150" rows="1"  title="Введите не более 150 символов!" placeholder="Образование гостей..."></textarea>
							</div>
							<div class="col-md-12">
								<label for="guests_enegic">Энергичность:</label>
								<input type="text" name="Энергичность гостей" id="guests_enegic" maxlength="50"  title="Введите не более 50 символов!" placeholder="Энергичность гостей...">
							</div>
							<div class="col-md-12">
								<h4 class="title_input_group">Ваш сценарий:</h4>
								<div>
									<input type="radio" name="Сценарий" value="Базовый сценарий" id="base_scenario" checked>
									<label class="inline_label" for="base_scenario">Базовый (классический)</label>
								</div>
								<div>
									<input type="radio" name="Сценарий" value="Эксклюзивный сценарий" id="exclusive_scenario">
									<label class="inline_label" for="exclusive_scenario">Эсклюзивный (разработка сценария)</label>
								</div>
							</div>
							<div class="col-md-12">
								<h4 class="title_input_group">Аукцион (интересные лоты от жениха и невесты):</h4>
								<label for="lot_1">Лот №1:</label>
								<input type="text" name="Лот_№_1" id="lot_1" maxlength="60" title="Введите не более 60 символов!" placeholder="Лот №1..." required>
							</div>
							<div class="col-md-12">
								<label for="lot_2">Лот №2:</label>
								<input type="text" name="Лот_№_2" id="lot_2" maxlength="60" title="Введите не более 60 символов!" placeholder="Лот №2...">
							</div>
							<div class="col-md-12">
								<label for="other_lots">Другие лоты:</label>
								<textarea name="Другие лоты" id="other_lots" maxlength="60" rows="1" title="Введите не более 60 символов!" placeholder="Другие лоты..."></textarea>
							</div>
							<div class="col-md-12">
								<h4 class="title_input_group">Традиции:</h4>
								<label for="bread_salt">Встреча хлебом солью (что будете пить; бьём ли посуду):</label>
								<textarea name="Встреча хлебом солью" id="bread_salt" maxlength="90" title="Введите не более 90 символов" rows="1" placeholder="Встреча хлебом солью..."></textarea>
							</div>
							<div class="col-md-12">
								<label for="first_dance">Первый танец (название композиции):</label>
								<textarea name="Первый танец (название композиции)" id="first_dance" maxlength="50" title="Введите не более 50 символов!" rows="1" placeholder="Первый танец (название композиции)..."></textarea>
							</div>

							<div class="col-md-12">
								<table class="w100">
									<tr>
										<td><label for="w_present">Подарки от невесты родственникам жениха:</label></td>
										<td class="text-right valign_top"><input type="checkbox" class="chbx_trad" name="Подарки от невесты родственникам жениха" value="Да" id="w_present"></td>
									</tr>
									<tr>
										<td><label for="fata">Снятие фаты:</label></td>
										<td class="text-right valign_top"><input type="checkbox" class="chbx_trad" name="Снятие фаты" value="Да" id="fata"></td>
									</tr>
									<tr>
										<td><label for="family_fire">Передача семейного очага:</label></td>
										<td class="text-right valign_top"><input type="checkbox" class="chbx_trad" name="Передача семейного очага" value="Да" id="family_fire"></td>
									</tr>
									<tr>
										<td><label for="dance_wth_father">Танец невесты с отцом:</label></td>
										<td class="text-right valign_top"><input type="checkbox" class="chbx_trad" name="Танец невесты с отцом" value="Да" id="dance_wth_father"></td>
									</tr>
									<tr>
										<td><label for="sweet_table">Сладкий стол в конце вечера (вынос торта):</label></td>
										<td class="text-right valign_top"><input type="checkbox" class="chbx_trad" name="Сладкий стол в конце вечера (вынос торта)" value="Да" id="sweet_table"></td>
									</tr>
								</table>
							</div>
							<div class="col-md-12">
								<label for="other_tradition">Другие традиции:</label>
								<textarea name="Другие традиции" id="other_tradition" maxlength="100" title="Введите не более 100 символов" rows="1" placeholder="Другие традиции..."></textarea>
							</div>
							<div class="col-md-12">
								<label for="dance">Песенный репертуар (Ваши пожелания):</label>
								<textarea name="Песенный репертуар (пожелания)" id="dance" maxlength="100" rows="1"  title="Введите не более 100 символов" placeholder="Песенный репертуар..."></textarea>
							</div>
							<div class="col-md-12">
								<label for="guest_list">Список гостей:</label>
								<textarea name="Список гостей" id="guest_list" maxlength="1600" rows="6"  title="Введите не более 1600 символов" placeholder="Список гостей..."></textarea>
							</div>
							<div class="col-md-12">
								<label for="comments">Комментарии:</label>
								<textarea name="Комментарии" id="comments" maxlength="150"  title="Введите не более 150 символов" rows="5" placeholder="Ваши комментарии..."></textarea>
								<input type="hidden" value="{EMAIL}" name="admin_email">
								<input type="hidden" value="Сообщение с сайта shimanskiy.by" name="project_name">
								<input type="hidden" value="Анкета молодожёнов!" name="form_subject">
							</div>


							<div class="col-md-12 text-left button_wrapp">
								<button class="button_dark">
									Отправить анкету
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