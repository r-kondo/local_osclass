$(document).ready(function(){
    $(".opt_delete_account a").click(function(){
        $("#dialog-delete-account").dialog('open');
    });

    $("#dialog-delete-account").dialog({
        autoOpen: false,
        modal: true,
        buttons: [
            {
                text: azzurro.langs.delete,
                click: function() {
                    window.location = azzurro.base_url + '?page=user&action=delete&id=' + azzurro.user.id  + '&secret=' + azzurro.user.secret;
                }
            },
            {
                text: azzurro.langs.cancel,
                click: function() {
                    $(this).dialog("close");
                }
            }
        ]
    });
});
