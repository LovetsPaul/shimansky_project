<tr class="item">
    <td>
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="r_name" colspan="3"><strong>Имя:</strong>&nbsp; {NAME}</td>
            </tr>
            <tr>
                <td width="150" class="r_image"><img src="{PATH_UPLOADS_IMG}{IMG}" width="150" alt="shimansky.by"></td>
                <td class="r_text">{TEXT}</td>

                <td width="300" align="right" class="td_button">
                <a href="edit_review.php?edit_review={ID}">Редактировать</a><br>
                <!-- <button name="edit_review" value="{ID}">Редактировать</button><br> -->
                <a class="r_del" href="all_reviews.php?del_review={ID}">Удалить</a>
                </td>
            </tr>
            <tr class="r_info">
                <td colspan="3">
                    <table colpadding="0" collspacing="0" border="0" width="100%" class="inner_table">
                        <td><strong>E-mail:</strong>&nbsp; {EMAIL}</td>
                        <td class="text-right"><strong>Дата:</strong>&nbsp; {DATE}</td>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr><td colspan="2" class="r_delim">&nbsp;</td></tr>