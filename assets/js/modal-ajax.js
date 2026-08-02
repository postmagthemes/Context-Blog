document.querySelectorAll('.readmore-modal').forEach((element) => {
    element.addEventListener('click', (e) => {
        e.preventDefault();
        var data = {
            postID: e.currentTarget.getAttribute('data-modal'),
            action: 'context_blog_modal_popup',
            nonce: context_object.nonce

        };
        jQuery.ajax({
            url: context_object.ajaxurl,
            data: data,
            type: 'POST',
            success: function (response) {
                if (response.success === false) {
                    alert(response.data.message); // Shows "Password required."
                    return;
                }
                jQuery("#modalPostConetentPopup .modal-header").html(response.modalHeader);
                jQuery("#modalPostConetentPopup .modal-body").html(response.modalBody);
                jQuery("#modalPostConetentPopup .modal-footer").html(response.modalFooter);
                jQuery("#modalPostConetentPopup").modal('show');
            },
            error: function () {
                alert('Something went wrong. Please try again.');
            }
        });
    });
});
