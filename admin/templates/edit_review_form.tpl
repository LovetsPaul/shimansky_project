
<tr><td class="edit_title" colspan="2">Редактирование отзыва</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="22%"><label for="review_name">Имя:</label></td>
    <td><input type="text" name="review_name" id="review_name" value="{NAME}"></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><label for="review_edit_text">Текст отзыва:</label></td></tr>
<tr>
    <td colspan="2"><textarea name="review_edit_text" id="review_edit_text" rows="10">{TEXT}</textarea></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
    
    <td width="150" class="r_image"><img src="{PATH_UPLOADS_IMG}{IMG}" width="150" alt="shimansky.by"></td>
    <td>&lt;- <a href="edit_review.php?edit_review={ID}&del_review_img={ID}">Удалить изображение</a></td>
   
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td><button name="enter_edit_review" value="1">Изменить</button></td>
    <td><input type="hidden" name="review_item" value="{ID}"></td>
</tr>
