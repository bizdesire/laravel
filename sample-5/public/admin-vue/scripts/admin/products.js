$(function () {
    $loader = $("body").data("loader");

    jQuery("form[name=editCategory]").validate({
        rules: {
           
            name: {
                required: true,
            },
 
            price: {
                required: true,
                number: true,
            }, 
            price: {
                required: true,
                number: true,
            },
 
           
        },
    });

    jQuery("form[name=addCategory]").validate({
        rules: {
            name: {
                required: true,
            },
 
            price: {
                required: true,
                number: true,
            }, 
           
            image: {
                required: true,
            },
 
        },
    });

    var dataTable = $("#example2").DataTable({
        processing: true,

        serverSide: true,

        pageLength: 100,

        //searching:false,

        fnDrawCallback: function (oSettings) {
            if (
                oSettings._iDisplayLength == -1 ||
                oSettings._iDisplayLength > oSettings.fnRecordsDisplay()
            ) {
                jQuery(oSettings.nTableWrapper)
                    .find(".dataTables_paginate")
                    .hide();
            } else {
                jQuery(oSettings.nTableWrapper)
                    .find(".dataTables_paginate")
                    .show();
            }

            $dataTables_filter = $("body").find(".dataTables_filter");

            $search = $dataTables_filter.find("input[type='search']");

            $search.attr("id", "searchBox");

            $search.attr("class", "form-control");

            $search
                .closest("label")
                .addClass("f-c-with-icon")
                .append('<span class="material-icons">search</span>');

            $dataTables_length = $("body").find(".dataTables_length");

            $dataTables_length.addClass("entries-count");

            $dataTables_length.find("select").addClass("form-control");
        },

        language: {
            sLengthMenu: "<div class='table-options d-flex flex-wrap'>_MENU_",

            search: "_INPUT_", // Removes the 'Search' field label

            searchPlaceholder: "Search", // Placeholder for the search box
        },

        oLanguage: {
            sProcessing:
                "<div id='loader' class='table-loader'><img src='" +
                $loader +
                "'></div>",
        },

        ajax: $("#example2").data("action"),

        //"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">',

        columns: [
            {
                data: "img_url",
                name: "img_url",
                searchable: false,
                bSortable: false,
                render: function (data, type, row) {
                    $text =
                        '<img src="' +
                        data +
                        '" class="img-thumbnails" style="width:120px">';

                    return $text;
                },
            },

             
            { data: "name", name: "name", bSortable: true },
            { data: "price", name: "price", bSortable: true },
            
            {
                data: "action",
                name: "action",
                searchable: false,
                bSortable: false,
            },
            
        ],
    });

    $("body").on("change", ".changeStatusToggle", function () {
        var $this = $(this);

        $.ajax({
            url: $this.data("action"),

            method: "GET",

            dataType: "JSON",

            success: function (data) {
                if (data.status == 1) {
                    notification_msg(data.message, "success");

                    dataTable.draw();
                } else {
                    notification_msg(data.message);
                }
            },
        });
    });

    

    $("body").on('click','.removeRank',function(e){
        e.preventDefault();
        $(this).closest( "li" ).remove();
        rankCount();
    });

    $("body").on('click','.addMore',function(e){
       e.preventDefault();
       $text = `<li>
        <div class="form-group d-inline-flex">
            <input type="number" placeholder="Enter Ranking Prize Amount"  name="rankcount[]" id="rankcount" value=""/> 
            <button type="button" class="btn btn-danger removeRank"><span class="material-icons">delete</span></button>
        </div>
        </li>`;
       $("#rankingContainer").append($text);
       rankCount();
    });
    rankCount();

    function rankCount(){ 
        $("#RankingTotal").text($("#rankingContainer li").length);
    }


});
