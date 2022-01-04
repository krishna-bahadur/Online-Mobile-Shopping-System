<script type="text/javascript">
	var alpha=/^[a-zA-Z\s]+$/;
	var nbr=/^[0-9]+$/;
    var pattern=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

    function validation(){
    var username = document.getElementById('username');
    if(!username.value){
        alert('Name cannot be empty');
        username.focus();
        return false;
    }
    var password = document.getElementById('password');
    if(!password.value){
        alert('password cannot be empty');
        password.focus();
        return false;
    }
    return true;
    }

	function validate() {
    var name = document.getElementById('name');
    if(!name.value){
        alert('Name cannot be empty');
        name.focus();
        return false;
    }
    if(!name.value.match(alpha)){
    	alert('Name conatins only alphabets');
        name.focus();
        return false;
    }

    var address = document.getElementById('address');
    if(!address.value){
        alert('Address cannot be empty');
        name.focus();
        return false;
    }
    if(!address.value.match(alpha)){
    	alert('Address conatins only alphabets');
        name.focus();
        return false;
    }


    var email = document.getElementById('email');
    if(!email.value){
        alert('Email cannot be empty');
        email.focus();
        return false;
    }

    if(!email.value.match(pattern)){
        alert('Please specify your correct Email!');
        email.focus();
        return false;
    }

    var mobile = document.getElementById('mobile');
    if(!mobile.value){
        alert('Mobile no cannot be empty.');
        mobile.focus();
        return false;
    }
    var usernam = document.getElementById('usernam');
    if(!usernam.value){
        alert('Username cannot be empty');
        usernam.focus();
        return false;
    }
    var pass = document.getElementById('pass');
    if(!pass.value){
        alert('Password cannot be empty');
        pass.focus();
        return false;
    }

    
    return true;
}

function addpost(){
    var title = document.getElementById('title');
    if(!title.value){
        alert('Title cannot be empty');
        return false;
    }

    var price = document.getElementById('price');
    if(!price.value){
        alert('Price cannot be empty');
        return false;
    }
    if(price.value < 0){
        alert("price cannot be negetive");
        return false;
    }

    var img = document.getElementById('file');
    if(!img.value){
        alert('Image cannot be empty');
        return false;
    }
    var spe = document.getElementById('specification');
    if(!spe.value){
        alert('Specification cannot be empty');
        return false;
    }
     var brand = document.getElementById('brand');
    if(!brand.value){
        alert('Brand cannot be empty');
        return false;
    }
   return true;
}
function updatepost(){
    var title = document.getElementById('title');
    if(!title.value){
        alert('Title cannot be empty');
        return false;
    }

    var price = document.getElementById('price');
    if(!price.value){
        alert('Price cannot be empty');
        return false;
    }
    if(price.value < 0 || price.value == 0){
        alert("price cannot be 0 or negetive");
        return false;
    }s

    var img = document.getElementById('file');
    if(!img.value){
        alert('Image cannot be empty');
        return false;
    }
    var spe = document.getElementById('specification');
    if(!spe.value){
        alert('Specification cannot be empty');
        return false;
    }
     var brand = document.getElementById('brand');
    if(!brand.value){
        alert('Brand cannot be empty');
        return false;
    }
   return true;

}
function addbrand(){
    var addbrand = document.getElementByName('brand_name');
    if(!addbrand.value){
        alert('Cannot be empty');
        return false;
    }
   return true;
}
function editbrand(){
     var editbrand = document.getElementById('editbrand');
    if(editbrand.value==0){
        alert('Cannot be empty');
        return false;
    }
   return true;
}
    //mycart.php//
     var gt=0;
     var iprice = document.getElementsByClassName('iprice');
     var iquantity = document.getElementsByClassName('iquantity');
     var itotal = document.getElementsByClassName('itotal');
     var gtotal = document.getElementById('gtotal');

         function SubTotal()
         {
            gt=0;
                for(i=0;i<iprice.length;i++)
                {
                    itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                    gt=gt+(iprice[i].value)*(iquantity[i].value);
                }
               gtotal.innerText=gt;
               document.getElementById('pay').value =gt;
               document.getElementById('pay1').value =gt;
               document.getElementById('pay2').value =gt;

               


     }
SubTotal();
</script>