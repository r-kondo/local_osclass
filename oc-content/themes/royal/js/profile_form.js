$(function() {
    $('#add_child').click(function() {
        //表示中の人数
        var num = $('#children_table tbody').children().length - 1;
        var add_num = num + 1;

        //追加するHTML
        var add_html = "<tr>";
            add_html += "<th>" + add_num + "人目のお子様</th>";
            add_html += "<td>";
            add_html += "<p><label>名前: <input id='child_name[" + add_num + "]' type='text' name='child_name[" + add_num + "]' class='with_txt' value=''></label></p>";
            add_html += "<p><label>生年月日: <input id='child_birthday[" + add_num + "]' type='date' name='child_birthday[" + add_num + "]' value=''></label></p>";
            add_html += "<p><label>性別: <label><input id='child_sex_boy[" + add_num + "]' name='child_sex[" + add_num + "]' value='1' type='radio'>男の子</label><label><input id='child_sex_girl[" + add_num + "]' name='child_sex[" + add_num + "]' value='2' type='radio'>女の子</label> </p>";
            add_html += "<p><label>性格: <textarea id='child_personality[" + add_num + "]' name='child_personality[" + add_num + "]'></textarea></p>";
            add_html += "</td>";
            add_html += "</tr>";
        console.log('add_html:' + add_html);
        //追加
        $('#children_table tbody tr:nth-child(' + num + ')').after(add_html);
        

    });
});
