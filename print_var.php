<link rel="stylesheet" type="text/css" href="http://yandex.st/jquery-ui/1.10.1/themes/smoothness/jquery-ui.min.css">
<style type="text/css">
    #print_var_container{
        background-color: #f4f4f4;
        padding-left: 25px;
    }

    #print_var_container ul{
        list-style-type: none;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
        padding-left: 30px;
    }

    #print_var_container .button {
        width: 15px;
        height: 15px;
        float: left;
        margin: 0;
        margin-top: 6px;
        margin-left: -15px;
    }

    #print_var_container i{
        display: block;
        margin: 4px;
        width: 0px;
        height: 0px;
        border-style: solid;
    }

    #print_var_container .open{
        border-width: 7px 4px 0 4px;
        border-color: #000 transparent transparent transparent;
    }

    #print_var_container .close{
        border-width: 4px 0 4px 7px;
        border-color: transparent transparent transparent #000;
    }
</style>

<script type="text/javascript" src="http://yandex.st/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://yandex.st/jquery-ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#print_var_container').dialog({
            autoOpen: true,
            draggable: true,
            resizable: true,
            minHeight: '20px',
            minWidth: '100px'
        });

        $('#print_var_container .button').click(function(){
            var _this = $(this).find('i');
            if(_this.hasClass('open')){
                _this.parent()
                     .parent()
                     .find('ul')
                     .slideUp('fast')
                     .parent()
                     .parent()
                     .find('i')
                     .removeClass('open')
                     .addClass('close');
            } else {
                _this.removeClass('close')
                     .addClass('open');

                _this.parent()
                     .parent()
                     .find('> span > ul')
                     .slideDown('fast');
            }
            return false;
        });
    });
</script>
<div id="print_var_container" title="Print Var 0.1">
      <span class="value">
          <div class="button"><i class="close"></i></div>
          <span class="name">params</span>
          <span class="count">[5]</span>
          <span class="value array">
            <ul style="display: none;">
                <li>
                    <span class="name">isFirst</span>
                    <span class="separator">:</span>
                    <span class="value bool">false</span>
                </li>
                <li>
                    <span class="name">name</span>
                    <span class="separator">:</span>
                    <span class="value string">123werwer</span>
                </li>
                <li>
                    <span class="name">amount</span>
                    <span class="separator">:</span>
                    <span class="value integer">345</span>
                </li>
                <li>
                    <div class="button"><i class="close"></i></div>
                    <span class="name">parent</span>
                    <span class="count">{3}</span>
                    <span class="value object">
                        <ul style="display: none;">
                            <li>
                                <span class="name">isFirst</span>
                                <span class="separator">:</span>
                                <span class="value bool">false</span>
                            </li>
                            <li>
                                <span class="name">name</span>
                                <span class="separator">:</span>
                                <span class="value string">123werwer</span>
                            </li>
                            <li>
                                <span class="name">amount</span>
                                <span class="separator">:</span>
                                <span class="value float">345</span>
                            </li>
                            <li>
                                <div class="button"><i class="close"></i></div>
                                <span class="name">GetParams</span>
                                <span class="count">(2)</span>
                                <span class="value function">
                                    <ul style="display: none;">
                                        <li>
                                            <span class="name">visible</span>
                                            <span class="separator">:</span>
                                            <span class="value bool">bool</span>
                                        </li>
                                        <li>
                                            <span class="name">data</span>
                                            <span class="separator">:</span>
                                            <span class="value string">string</span>
                                        </li>
                                    </ul>
                                </span>
                            </li>
                        </ul>
                    </span>
                </li>
            </ul>
          </span>
      </span>
</div>

