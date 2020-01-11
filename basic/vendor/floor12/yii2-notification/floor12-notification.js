f12notification = {
    infoListBlock: document.createElement('div'),

    notification: function (content, type) {
        f12notification.initNotificationBlock();

        timeout = 3000
        svg = '<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>'
        info_class = 'info-object-info';

        if (type == 1) {
            info_class = 'info-object-success';
            timeout = 3000;
            svg = '<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"/></svg>'

        }
        if (type == 2) {
            info_class = 'info-object-error';
            timeout = 3000;
            svg = '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"/></svg>';

        }

        const info = document.createElement('div');
        info.classList.add('info-object');
        info.classList.add(info_class);
        info.innerHTML = svg + content;
        f12notification.infoListBlock.appendChild(info);

        setTimeout(function () {
            info.classList.add('info-hidden');
        }, timeout);

        setTimeout(function () {
            info.remove();
        }, timeout * 2);
    },

    success: function (content) {
        this.notification(content, 1)
    },
    error: function (content) {
        this.notification(content, 2)
    },
    info: function (content) {
        this.notification(content, 0)
    },

    initNotificationBlock: function () {
        if (document.getElementById('info-list') == null) {
            f12notification.infoListBlock.setAttribute('id', 'info-list')
            document.body.appendChild(this.infoListBlock);
        }
    }
}

function info(content, type) {
    console.warn('Function info() is deprecated. Please, replace info() for f12notification.info(), f12notification.success() or f12notification.error().')
    return f12notification.notification(content, type);
}


// When something goes wrong, this function will try to parse error response body to recognize error text.
// After that it will show an error notification.
function processError(response) {
    if (typeof (response.responseJSON) === 'object') {
        f12notification.error(response.status + ': ' + response.responseJSON.message)
        return true;
    }

    if (response.responseText.length > 5) {

        if (response.responseText.length < 40) {
            f12notification.error(response.responseText);
            return true;
        }

        if (response.responseText.length > 40) {
            matches = response.responseText.match(/with message (.+)/);

            if (!matches)
                matches = response.responseText.match(/\): (.+)/);

            if (matches) {
                f12notification.error(response.status + ': ' + matches[1].replace("&#039;", ""));
                return true;
            }
        }
    }
    f12notification.error(response.status + ': ' + response.statusText);
}