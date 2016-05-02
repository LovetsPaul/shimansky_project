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
<tr><td colspan="2"><label for="post_edit_text">Текст новост:</label></td></tr>
<tr>
    <td colspan="2"><textarea name="post_edit_text" id="post_edit_text" rows="10">{TEXT}</textarea></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
    
    <td width="150" class="r_image"><img src="{PATH_UPLOADS_IMG}{IMG}" width="150" alt="shimansky.by"></td>
    <td>&lt;- <a href="edit_post.php?edit_post={ID}&del_post_img={ID}">Удалить изображение</a></td>
   
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td><button name="enter_edit_post" value="1">Изменить</button></td>
    <td><input type="hidden" name="post_item" value="{ID}"></td>
</tr>
