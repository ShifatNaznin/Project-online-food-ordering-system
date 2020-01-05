<!DOCTYPE html>

<html>

    <body>
        <select id="drp1">
            <option value="none" selected>None</option>
            <option value="cash">Cash</option>
            <option value="credit card">Credit card</option>
        </select>
        
        
        
        <script>
            var drp1=document.getElementById('drp1');
            drp1.addEventListener('change',ajaxfn);
            
            function ajaxfn(){
                if(drp1.value=="none"){
                    
                }else{
                    var ajaxreq=new XMLHttpRequest();
                    ajaxreq.open("GET",'ajaxserveoo.php?value='+drp1.value);
                    
                    ajaxreq.onreadystatechange=function (){
if(this.readyState===XMLHttpRequest.DONE && this.status==200){
    var drp2=document.getElementById('drp2');
    drp2.innerHTML=ajaxreq.responseText;
}
                    };
                    
                    ajaxreq.send();
                }
            }
        </script>
    </body>
    
</html>