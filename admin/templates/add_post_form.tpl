<tr><td class="edit_title" colspan="2">Блог / Добавить новость</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="23%"><label for="post_title">Заголовок записи:</label></td>
    <td><input type="text" name="post_title" id="post_title" required maxlength="120" placeholder="Заголовок новости..." value="{TITLE}" title="Поле обязательно для заполнения. Максимальное количество символов для ввода - 120!"></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr  align="left">
    <td width="23%"><label for="post_descr">Краткое описание:</label></td>
    <td>
        <textarea name="post_descr" id="post_descr" minlength="10" maxlength="255" rows="10" placeholder="Краткое описание..." required title="Поле обязательно для заполнения">{DESCR}</textarea>
    </td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>

<tr  align="left">
    <td colspan="2"><label for="full_text_post">Полный текст новости:</label></td>
</tr>
<tr>
    <td colspan="2">
        <textarea name="full_text_post" id="full_text_post" minlength="10" maxlength="255" required title="Поле обязательно для заполнения">{TEXT}
        </textarea>
    </td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
    <td><label for="add_photo_post"></label>Изображение новости:</td>
    <td class="input_file_photo" id="file_container"><input type="file" name="add_photo_post" id="add_photo_post"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td colspan="2"><hr></td>
</tr>

<tr>
    <td colspan="2" class="add_photo_info">
        <strong>Информация по загрузке изображения:</strong>
    </td>
</tr>
<tr>
    <td colspan="2" class="add_photo_info">
        <span>- доступные расширения: <span>.jpg, .jpeg, .png, .gif</span></span><br>
        <span>- размер не более <span>500 кб</span>!!!</span><br>
        <span>- разрешение <span>1440px</span> x <span>500px</span>!!!</span></td>
</tr>
<tr>
    <td colspan="2"><hr></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td><button name="enter_add_post" value="1">Добавить новость</button></td>
</tr>