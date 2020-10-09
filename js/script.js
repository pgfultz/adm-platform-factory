$('#input_foto').change(function(e){
    if(e.target.value.length){
        $('#form_add_foto').submit();
    }
});

$('#input_capa').change(function(e){
    if(e.target.value.length){
        $('#form_add_capa').submit();
    }
});