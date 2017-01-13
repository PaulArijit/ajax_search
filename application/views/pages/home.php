<center>
    <h1>Enter Search Query:</h1>
    <form>
        <input type="text" id="search_field" name="search_data" onkeyup="showResult()" style="width: 500px; padding: 15px;"/>
    </form>
    
    <div id="scr-result">
        <div id="result-list"></div>
    </div>
</center>
<script type="text/javascript">
    function showResult(){
        var src_qury = $('#search_field').val();
        
        if(src_qury.length === 0){
            $('#scr-result').hide();
        }else{
            var post_data = {
                'search_data' : src_qury,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/pagescontroller/search/",
                data: post_data,
                success: function(data){
                    if(data.length > 0){
                        $('#scr-result').show();
                        $('#scr-result').css('border', '1px solid #000');                        
                        $('#result-list').html(data);
                    }
                }
            });
        }
    }
</script>