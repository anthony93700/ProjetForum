<?php 

echo'
<!DOCTYPE html>
<html>';

echo'<script>
function f(){
if (/:D/.test(document.getElementById("m").textContent)) {/*
var form = document.createElement(\'form\');
    form.setAttribute(\'action\', \'y.php\');
    form.setAttribute(\'method\', \'post\');
 
        var inputvar = document.createElement(\'input\');
        inputvar.setAttribute(\'type\', \'hidden\');
        inputvar.setAttribute(\'name\', \'n\');
        inputvar.setAttribute(\'value\', \'gggg\');
        form.appendChild(inputvar);
    
    document.body.appendChild(form);
    form.submit();*/
document.getElementById("m").innerHTML = document.getElementById("m").innerHTML.replace(/:D/,\'<img src="ange.png" alt="icone html5" />\'); 
document.getElementById("m").focus;
}

}

</script>';
  echo '<body >
    <div contenteditable="true" id="m" onkeypress="f();" tabindex="0">
      Ce texte peut être édité par l\'utilisateur.
    </div>
  </body>';

echo'
</html>';


?>
