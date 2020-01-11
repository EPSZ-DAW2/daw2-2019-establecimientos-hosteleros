restoreConfirmText = '';
restoreSuccessText = '';
backupSuccessText = '';
deleteSuccessText = '';

backup = {

    create: function (config_id) {
        $.ajax({
            url: 'http://localhost/daw2/daw2-2019-establecimientos-hosteleros/basic/web/backup/admin/backup',
            method: 'POST',
            data: {config_id: config_id},
            error: function (response) {
                processError(response);
            },
            success: function (response) {
                backup.reloadGrid();
                f12notification.success(backupSuccessText);
            }
        })
    },

    restore: function (id) {
        if (confirm(restoreConfirmText))
            $.ajax({
                url: 'http://localhost/daw2/daw2-2019-establecimientos-hosteleros/basic/web/backup/admin/restore',
                method: 'POST',
                data: {id: id},
                error: function (response) {
                    processError(response)
                },
                success: function (response) {
                    backup.reloadGrid();
                    f12notification.success(restoreSuccessText);
                }
            })
    },

    delete: function (id) {
        if (confirm(restoreConfirmText))
            $.ajax({
                url: 'http://localhost/daw2/daw2-2019-establecimientos-hosteleros/basic/web/backup/admin/delete',
                method: 'DELETE',
                data: {id: id},
                error: function (response) {
                    processError(response)
                },
                success: function (response) {
                    backup.reloadGrid();
                    f12notification.success(deleteSuccessText);
                }
            })
    },
    reloadGrid: function () {
        $.pjax.reload({container: '#items', timeout: 5000})
    }
};
