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
                success: function (data) {
                    if (data.length > 0) {
                        $('#scr-result').show();
                        $('#scr-result').css('border', '1px solid #CCC');
                        $('#result-list').html(data);
                    }
                }
            });
        }
    }

    $(document).ready(function () {
        var currentSelection = 0;
        $(document).keypress(function (e) {
            switch (e.keyCode) {
                // User pressed "up" arrow
                case 38:
                    navigate('up');
                    break;
                    // User pressed "down" arrow
                case 40:
                    navigate('down');
                    break;
            }
            for (var i = 0; i < $("#result-list ul li").length; i++) {
                $("#result-list ul li").eq(i).data("number", i);
            }
            $("#result-list ul li").hover(
                    function () {
                        currentSelection = $(this).data("number");
                        setSelected(currentSelection);
                    }, function () {
                $("#result-list ul li").removeClass("selected");
            }
            );
        });
    });
    function navigate(direction) {
        // Check if any of the menu items is selected
        if ($("#result-list ul li .selected").length == 0) {
            currentSelection = -1;
        }

        if (direction == 'up' && currentSelection != -1) {
            if (currentSelection != 0) {
                currentSelection--;
            }
        } else if (direction == 'down') {
            if (currentSelection != $("#result-list ul li").length - 1) {
                currentSelection++;
            }
        }
        setSelected(currentSelection);
    }

    function setSelected(menuitem) {
        $("#result-list ul li").removeClass("selected");
        $("#result-list ul li").eq(menuitem).addClass("selected");
    }
</script>