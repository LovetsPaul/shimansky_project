{GET_HEADER}

<section class="s_inner_page s_reviews_sect">
	<div class="container s_page_title">
		<div class="row">

			<div class="page_title col-sm-12">
				<h1>{PAGE_NAME}</h1>
			</div>
			
		</div>
	</div>
	<div class="container">
		<div class="page_content bg_white reviews_wrapp col-sm-12">
			{REVIEWS}
		</div>
	</div>

	<div class="s_add_review_form">
		<div class="container">
			<div class="row">

				<div class="col-md-10 col-md-push-1">
					<h3>Оставить отзыв о моей работе:</h3>
					<div class="add_review_form_wrapp">
						<form method="POST" id="add_reviews_form" name="add_reviews_form" enctype="multipart/form-data">
							<div class="col-md-6 col-sm-12">
								<label for="your_name">Ваше имя:</label>
								<input type="text" name="your_name" id="your_name" pattern="[A-Za-zА-Яа-я0-9]+" placeholder="Введите ваше имя..." required>
							</div>
							<div class="col-md-6 col-sm-12">
								<label for="your_email">Ваше e-mail:</label>
								<input type="email" name="your_email" id="your_email" placeholder="Введите e-mail..." required>
							</div>
							<div class="col-md-12 col-sm-12">
								<label for="your_text">Текст отзыва:</label>
								<textarea name="your_text" id="your_text"  maxlength="300" rows="10" placeholder="Напишите текст отзыва..." required></textarea>
							</div>
							<div class="col-md-12 col-sm-12">
								<label for="add_img">Загрузить изображение</label>
								<!-- <input type="hidden" name="MAX_FILE_SIZE" value="2097152"> -->
								<input type="file" name="add_img" id="add_img">
							</div>
							<div class="col-md-12 col-sm-12 text-left button_wrapp">
								<button class="button_dark">
									Добавить отзыв
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