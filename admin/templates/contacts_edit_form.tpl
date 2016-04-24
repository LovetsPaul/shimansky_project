
<tr><td class="edit_title" colspan="2">Контакты</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="22%"><label for="contacts_title">Заголовок страницы (title):</label></td>
    <td><input type="text" name="contacts_title" id="contacts_title" value="{TITLE_VALUE}" maxlength="100"  title="Не более 100 символов!" required title="Поле обязательно для заполнения"></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="22%"><label for="contacts_phone">Телефон:</label></td>
    <td><input type="text" name="contacts_phone" id="contacts_phone" pattern="[()0-9+-]+" maxlength="40" value="{PHONE}" placeholder="+375-(**)-***-**-**" required title="Номер телефона"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="22%"><label for="contacts_email">E-mail:</label></td>
    <td><input type="email" name="contacts_email" id="contacts_email" type="email" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" maxlength="40" value="{EMAIL}" required title="E-mail"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="22%"><label for="contacts_vkontakte">вКонтакте:</label></td>
    <td><input type="text" name="contacts_vkontakte" id="contacts_vkontakte" maxlength="40" value="{VKONTAKTE}" required title="вКонтакте"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="22%"><label for="contacts_facebook">Facebook:</label></td>
    <td><input type="text" name="contacts_facebook" id="contacts_facebook" maxlength="40" value="{FACEBOOK}" required title="Facebook"></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr  align="left">
    <td width="22%"><label for="contacts_instagram">Instagram</label></td>
    <td><input type="text" name="contacts_instagram" id="contacts_instagram" maxlength="40" value="{INSTAGRAM}" required title="Instagram"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>

<tr class="delimiter"><td colspan="2">SEO:</td></tr>

<tr><td colspan="2">&nbsp;</td></tr>

<tr  align="left">
    <td width="22%"><label for="contacts_keywords" class="keywords">Ключевые слова:<br><span>(через запятую, не более 30)</span></label></td>
    <td><input type="text" name="contacts_keywords" id="contacts_keywords" value="{KEYWORDS_VALUE}" maxlength="200"  title="Не более 200 символов!"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>

<tr>
    <td><label for="about_descr">Описание страницы:</label></td>
    <td colspan="2"><textarea name="contacts_descr" id="contacts_descr" rows="5" maxlength="250" title="Не более 250 символов!">{DESCR_VALUE}</textarea></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td><button name="enter_contacts" value="1">Изменить</button></td>
</tr>
