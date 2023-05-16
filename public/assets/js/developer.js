$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$('.select2_cust').select2({
		"language": {
			"noResults": function(){
				return "No Results Found <button onclick='showAgencyDiv()' class='btn btn-xs btn-info'>Click here to add Manually</button>";
			}
		},
		 escapeMarkup: function (markup) {
			 return markup;
		 }
	});
    function addDeleteForms() {
        $('[data-method="delete"]').append(function () {
            if (!$(this).find('form').length > 0)
                return "\n" +
            "<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
            "   <input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
            "   <input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
            "</form>\n";
            else
                return "";
        })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');
    }
    function addCancelForms() {
        $('[data-method="cancel"]').append(function () {
            if (!$(this).find('form').length > 0)
                return "\n" +
            "<form action='" + $(this).attr('href') + "' method='POST' name='cancel_item' style='display:none'>\n" +
            "   <input type='hidden' name='_method' value='POST'>\n" +
            "   <input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
            "</form>\n";
            else
                return "";
        })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');
    }
    function addSuspendForms() {
        $('[data-method="suspend"]').append(function () {
            if (!$(this).find('form').length > 0)
                return "\n" +
            "<form action='" + $(this).attr('href') + "' method='POST' name='suspend_item' style='display:none'>\n" +
            "   <input type='hidden' name='_method' value='POST'>\n" +
            "   <input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
            "</form>\n";
            else
                return "";
        })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');
    }
    $(document).ready(function(){
        addDeleteForms();
        addCancelForms();
        addSuspendForms();
        // $('.datatable').on('draw.dt', function(){alert()
        //     addDeleteForms();
        // })

        // $('.notifications-icon').click(function(){
        //     if($(this).find('.badge').html() > 0)
        //     {
        //         $.ajax({
        //             url:read_notification_url,
        //             type:'post',
        //             success: function(response)
        //             {
        //                 $('.notifications-icon').find('.badge').remove();
        //             }
        //         });
        //     }
        // })
    });
    $(document).ajaxComplete(function () {
        addDeleteForms();
		addCancelForms();
		addSuspendForms();
        // $('[data-toggle="tooltip"]').tooltip();
        // addBulkActionForms();
    });

    /**
     * Generic confirm form delete using Sweet Alert
     */
     // $('body').on('submit', 'form[name="delete_item"]', function (e) {
     //    e.preventDefault();
     //    var form = this;
     //    var link = $('a[data-method="delete"]');
     //    var cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : 'Cancel';
     //    var confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete";
     //    var confirm_color = (link.attr('data-color-button-confirm')) ? link.attr('data-color-button-confirm') : "#DD6B55";
     //    var title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Warning";
     //    var text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete this item?";
     //
     //    Swal.fire({
     //        title: title,
     //        text: text,
     //        type: "warning",
     //        showCancelButton: true,
     //        cancelButtonText: cancel,
     //        confirmButtonColor: confirm_color,
     //        confirmButtonText: confirm,
     //    })
     //    .then((result) => {
     //        if (result.value) {
     //            form.submit();
     //        }
     //    })
        // , function (confirmed) {
        //     if (confirmed)
        //         form.submit();
        // });
    // });

	$('body').on('submit', 'form[name="cancel_item"]', function (e) {
        e.preventDefault();
        var form = this;
        var link = $('a[data-method="cancel"]');
        var cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel";
        var confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete";
        var confirm_color = (link.attr('data-color-button-confirm')) ? link.attr('data-color-button-confirm') : "#DD6B55";
        var title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Warning";
        var text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete this item?";

        Swal.fire({
            title: title,
            text: text,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: cancel,
            confirmButtonColor: confirm_color,
            confirmButtonText: confirm,
        })
        .then((result) => {
            if (result.value) {
                form.submit();
            }
        })
        // , function (confirmed) {
        //     if (confirmed)
        //         form.submit();
        // });
    });

	$('body').on('submit', 'form[name="suspend_item"]', function (e) {
        e.preventDefault();
        var form = this;
        var link = $('a[data-method="suspend"]');
        var cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel";
        var confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete";
        var confirm_color = (link.attr('data-color-button-confirm')) ? link.attr('data-color-button-confirm') : "#DD6B55";
        var title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Warning";
        var text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete this item?";

        Swal.fire({
            title: title,
            text: text,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: cancel,
            confirmButtonColor: confirm_color,
            confirmButtonText: confirm,
        })
        .then((result) => {
            if (result.value) {
                form.submit();
            }
        })
        // , function (confirmed) {
        //     if (confirmed)
        //         form.submit();
        // });
    });
 });

 function closeAlert(e) {
	 $(e).parent('.alert').hide('slow');
 }
