$(function () {
    $loader = $("body").data("loader"); 
    jQuery("form[name=editCategory]").validate({
        rules: {
           
            name: {
                required: true,
            },
  
 
           
        },
    });

    jQuery("form[name=addCategory]").validate({
        rules: {
            name: {
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
                data: "image_url",
                name: "image_url",
                searchable: false,
                bSortable: false,
                render: function (data, type, row) {
                    $text =
                        '<img src="' +
                        data +
                        '" class="img-thumbnails" style="width:50px">';

                    return $text;
                },
            },

             
            { data: "label", name: "lebel", bSortable: true },
            //{ data: "price", name: "price", bSortable: true },
            
            {
                data: "action",
                name: "action",
                searchable: false,
                bSortable: false,
            },
            
        ],
    });

    $("body").on("submit", "#filterData", function (e) {
        e.preventDefault();
        getFilterData();
   });
   getFilterData();
    

    function getFilterData(){
        var $this = $('#filterData'); 
        $.ajax({
            url: $this.data("action"), 
            method: "GET", 
            data:$this.serialize(),
            dataType: "JSON", 
            success: function (data) {
                $('#getFilterData').html(data.html);
            },
        });
    }


    $("body").on("click", ".changeStatus", function () {
        var $this = $(this);
        if(confirm('Do you want to change the status?')){
            $.ajax({
                url: $this.data("action"),
    
                method: "GET",
    
                dataType: "JSON",
    
                success: function (data) { 
                        notification_msg(data.message, "success");
                        window.location.reload();
                     
                },
            });
        }
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

        $("body").on('click','.openReplyForm',function(e){
           e.preventDefault();
           $this = $(this);
        
           $("body").find($this.data('target')).show();
        });

});
