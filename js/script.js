$('#input_foto').change(function(e){
    if(e.target.value.length){
        $('#form_add_foto').submit();
    }
});