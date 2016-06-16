
<tr><td class="edit_title" colspan="2">Блог / Редактирование новости</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="20%"><label for="post_title">Заголовок:</label></td>
    <td><input type="text" name="post_title" id="post_title" value="{TITLE}" maxlength="150" required title="Максимальное количество символов - 150!"></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><label for="post_descr">Краткое описание:</label></td></tr>
<tr>
    <td colspan="2"><textarea name="post_descr" id="post_descr" rows="10" required title="Поле обязательно для заполнения!">{DESCR}</textarea></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><label for="post_edit_text">Текст новости:</label></td></tr>
<tr>
    <td colspan="2"><textarea name="post_edit_text" id="post_edit_text" rows="10">{TEXT}</textarea></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>


<tr><td colspan="2">* Новость без изображения!</td></tr>

<tr><td colspan="2">&nbsp;</td></tr>

<tr><td colspan="2"><hr></td></tr>

<tr>
    <td width="25%"><label for="add_photo_post">Добавить изображение:</label></td>
    <td class="input_file_photo" id="file_container"><input type="file" name="add_photo_post" id="add_photo_post"></td>
   
</tr>

<tr><td colspan="2"><hr></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td colspan="2" class="add_photo_info">
        <strong>Информация по загрузке изображения:</strong>
    </td>
</tr>

<tr>
    <td colspan="2" class="add_photo_info">
        <span>- доступные расширения: <span>.jpg, .jpeg, .png, .gif</span></span><br>
        <span>- размер не более <span>500 кб</span>!!!</span><br>
        <span>- разрешение <span>1140px</span> x <span>500px</span>!!!</span></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td><button name="enter_edit_post" value="1">Изменить</button></td>
    <td><input type="hidden" name="post_item" value="{ID}"></td>
</tr>
