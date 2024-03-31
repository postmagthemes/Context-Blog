document.querySelectorAll('.readmore-modal').forEach((element) => {
    element.addEventListener('click', (e) => {
        e.preventDefault();
        var data = {
            'postID': e.target.getAttribute('data-modal'),
            'action': 'context_blog_modal_popup',
        };
        jQuery.ajax({
            url: context_object.ajaxurl,
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                jQuery("#modalPostConetentPopup .modal-header").html(response.modalHeader);
                jQuery("#modalPostConetentPopup .modal-body").html(response.modalBody);
                jQuery("#modalPostConetentPopup .modal-footer").html(response.modalFooter);
                jQuery("#modalPostConetentPopup").modal('show');
            }
        });
    });
});