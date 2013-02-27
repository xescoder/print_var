<link rel="stylesheet" type="text/css" href="http://yandex.st/jquery-ui/1.10.1/themes/smoothness/jquery-ui.min.css">
<script type="text/javascript" src="http://yandex.st/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://yandex.st/jquery-ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#print_var_container').dialog({
            autoOpen: true,
            draggable: true,
            resizable: true
        });
    });
</script>
<div id="print_var_container" title="Print Var 0.1">
      <span>
          [
          <ul>
              <li><span>0</span><span> => </span><span>123</span></li>
              <li><span>1</span><span> => </span><span>"строка"</span></li>
              <li><span>1</span><span> => </span><span>[
                  <ul>
                      <li><span>234</span><span> => </span><span>false</span></li>
                      <li><span>sdfsd</span><span> => </span><span>{}</span></li>
                      <li><span>sdfsd</span><span> => </span><span>true</span></li>
                  </ul>
                  ]</span></li>
          </ul>
          ]
      </span>
</div>

