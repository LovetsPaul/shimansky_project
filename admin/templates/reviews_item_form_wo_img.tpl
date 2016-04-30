<tr class="item wo_image">

    <td>
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td colspan="2" class="r_name"><strong>Имя:</strong>&nbsp; {NAME}</td>
            </tr>
            <tr>
                <td class="r_text text-left">{TEXT}</td>
                <td width="300" align="right" class="td_button">
                <a href="edit_review.php?edit_review={ID}">Редактировать</a><br>
                <!-- <button name="edit_review" value="{ID}">Редактировать</button><br> -->
                    <a class="r_del" href="all_reviews.php?del_review={ID}">Удалить</a>
                </td>
            </tr>
            <tr class="r_info">
                <td><strong>E-mail:</strong>&nbsp; {EMAIL}</td>
                <td class="text-right"><strong>Дата:</strong>&nbsp; {DATE}</td>
            </tr>

        </table>
    </td>
</tr>

<tr><td colspan="2" class="r_delim">&nbsp;</td></tr>