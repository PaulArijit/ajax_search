<center>
    <div style="height: 300px; width: 100%;">
        <h1> Search For Product:</h1><br/><br/>
        <label id="loading"></label>
        <div class="container">
            <form>
                <!--<input type="text" id="search_field" name="search_data" onkeyup="showResult()"/>-->
                <input type="text" id="search_field" name="search_data" autofocus=""/>
            </form>

            <div id="scr-result">
                <div id="result-list"></div>
            </div>
        </div>
    </div>
</center>
<script type="text/javascript">
    $(function () {
        var searchTerm = '';
        $('#search_field').on('input', function (e) {
            var value = $(this).val();
            searchTerm = value;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/pagescontroller/search/",
                data: {search_data: value},
                beforeSend: function () {
                    $('#loading').html('loading...');
                },
                success: function (data) {
                    var json = $.parseJSON(data);

                    var items = '';
                    items += '<ul>';
                    var len = json.length;
                    for (var i = 0; i < len; i++) {
                        items += '<li>' + json[i].name + '</li>';
                    }
                    items += '</ul>';

                    $('#result-list').html(items);
                },
                complete: function () {
                    $('#loading').html('');
                }
            });
        });
        $('#search_field').on('keyup', function (e) {        
            if (e.keyCode == 40) { // down                
                if ($('.selected').length == 0) {
                    $('#result-list li').first().addClass("selected");
                } else {
                    //console.log($('.selected').length); 
                    var selectedItem = $('.selected');
                    selectedItem.removeClass("selected");
                    //console.log($('.selected').length);
                    //console.log(selectedItem.next().length);
                    if (selectedItem.next().length == 0) {
                        $('#search_field').val(searchTerm);                        
                        //selectedItem.siblings().first().addClass("selected");
                    } else {
                        //console.log('sdfas');
                        selectedItem.next().addClass("selected");
                    }
                }




            }

            else if (e.keyCode == 38) {
                if ($('.selected').length == 0) {
                    $('#result-list li').last().addClass("selected");
                }

                var selectedItem = $('.selected');
                selectedItem.removeClass("selected");

                if (selectedItem.prev().length == 0) {
                    $('#search_field').val(searchTerm);
                    //selectedItem.siblings().last().addClass("selected");
                } else {
                    selectedItem.prev().addClass("selected");
                }
            }

            if ($('.selected').length == 1) {
                var value = $('.selected').html();
                $('#search_field').val(value);
            }
        });
        
        $('#result-list').on('mouseover', function(){
            console.log('fsdfds');
           $('#result-list li', this).addClass("selected");
        });
        
    })
</script>


<script type="text/javascript">
//    function showResult() {
//        var src_qury = $('#search_field').val();
//
//        if (src_qury.length === 0) {
//            $('#scr-result').hide();
//        } else {
//            var post_data = {
//                'search_data': src_qury,
//                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
//            };
//
//            $.ajax({
//                type: "POST",
//                url: "<?php echo base_url(); ?>index.php/pagescontroller/search/",
//                data: post_data,
//                dataType: 'json',
//                success: function (data) {
//                    console.log(data);
//                    var json = $.parseJSON(data);
//                    console.log(json);
////                    if (data.length > 0) {
////                        $('#scr-result').show();
////                        $('#scr-result').css('border', '1px solid #CCC');
////                        var jsonData = $.parseJSON(data);
////                        $.each(jsonData, function(i, value){
////                            console.log( i + ": " + value );
//////                            resData += '<ul>'
//////                            resData += '<li>'
//////                            resData += '</ul>'
////                        });
////                        //$('#result-list').html(jsonData.name);
////                    }else{
////                        $('#scr-result').show();
////                        $('#result-list').html("NO Item Found!");
////                    }
//                }
////                success: function (data) {
////                    if (data.length > 0) {
////                        $('#scr-result').show();
////                        $('#scr-result').css('border', '1px solid #CCC');
////                        var jsonData = $.parseJSON(data);
////                        $.each(jsonData, function(i, value){
////                            console.log( i + ": " + value );
//////                            resData += '<ul>'
//////                            resData += '<li>'
//////                            resData += '</ul>'
////                        });
////                        //$('#result-list').html(jsonData.name);
////                    }else{
////                        $('#scr-result').show();
////                        $('#result-list').html("NO Item Found!");
////                    }
////                }
//            });
//        }
//    }
</script>