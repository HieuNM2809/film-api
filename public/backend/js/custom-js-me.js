const tempModal = ({ idEl, title, html, cl }) => `
<div id="${idEl}" class="modal fade ${cl}" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">${title}</h4>
            </div>
            <div class="modal-body">${html}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>`;

const tempModalSimple = ({ idEl, title, html, cl }) => `
<div id="${idEl}" class="modal fade ${cl}" role="dialog" style="z-index:9999999" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">${title}</h4>
            </div>
            <div class="modal-body">${html}</div>
        </div>
    </div>
</div>`;
function builModal(id, title, body, cl, sf, callback) {
    idEl = '#' + id;
    if ($(idEl).length > 0) {
        $(idEl + ' .modal-body').html(body);
        $(idEl).modal({ backdrop: 'static', keyboard: false });
        if (typeof callback == 'function') {
            callback();
        }
        $(idEl).on('hidden.bs.modal', (function () {
            $(this).remove();
        }));
    } else {
        const data = [{ idEl: id, title: title, html: body, cl: cl }];
        if (sf) {
            modal = data.map(tempModal).join('');
        } else {
            modal = data.map(tempModalSimple).join('');
        }

        $('body').append(modal).promise().done((function () {
            $(idEl).modal({ backdrop: 'static', keyboard: false });
            if (typeof callback == 'function') {
                callback();
            }
            $(idEl).on('hidden.bs.modal', (function () {
                $(this).remove();
            }));
        }));
    }
}
