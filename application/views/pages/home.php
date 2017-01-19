<center>
    <div style="height: 300px; width: 100%;">
        <h1> Search For Product:</h1><br/><br/>
        <div class="container">
            <form>
                <input type="text" id="search_field" name="search_data" onkeyup="showResult()"/>
            </form>

            <div id="scr-result">
                <div id="result-list"></div>
            </div>
        </div>
    </div>
</center>

<script type="text/javascript">
    function showResult() {
        var src_qury = $('#search_field').val();

        if (src_qury.length === 0) {
            $('#scr-result').hide();
        } else {
            var post_data = {
                'search_data': src_qury,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/pagescontroller/search/",
                data: post_data,
                dataType: 'json',
                success: function (data) {
                    if (data.length > 0) {
                        $('#scr-result').show();
                        $('#scr-result').css('border', '1px solid #CCC');
                        var jsonData = $.parseJSON(data);
                        $.each(jsonData, function(i, value){
                            console.log( i + ": " + value );
//                            resData += '<ul>'
//                            resData += '<li>'
//                            resData += '</ul>'
                        });
                        //$('#result-list').html(jsonData.name);
                    }else{
                        $('#scr-result').show();
                        $('#result-list').html("NO Item Found!");
                    }
                }
            });
        }
    }
</script>