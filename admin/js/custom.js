$( document ).ready(function() { 
    showData();
});
function AddCategory(){
    var cat_type_name=document.getElementById("cat_type_name").value;
    var cat_type_code=document.getElementById("cat_type_code").value;
    var name_error="Category Type Name is Required";
    var code_error="Category Type Code is Required";
    var successmessage="Data Insert Successfully";
    if(cat_type_name=='')
    {
        document.getElementById("name_err").innerHTML=name_error;
        document.getElementById("code_err").innerHTML=code_error;
    }
    else{    
        $.ajax({
            method:'POST',
            url:'index.php',
            data:{
                cat_name:cat_type_name,
                cat_code:cat_type_code
            },        
            success:function(data){
                document.getElementById("success").innerHTML=successmessage;
                document.getElementById("cat_type_name").value='';
                document.getElementById("cat_type_code").value='';
                showData(); 
            }
        });           
    }
}

function showData(){
    $.ajax({
        method:'POST',
        url:'show.php',              
        success:function(data){ 
            $('#show_data').html(data);
            document.getElementById("data_show").style.display="block";    
        }
    }); 
}
 