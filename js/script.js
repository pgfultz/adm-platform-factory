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


$('#input_nova_capa').change(function(e){
    if(e.target.value.length){
        let file = this.files[0];
        let reader = new FileReader();
        reader.onloadend = function(){
            $('.capa-novo-projeto').css('background-image', 'url('+reader.result+')');
        }
        if(file){
            reader.readAsDataURL(file);
        } 
    }
});

function deleteProject(id){
    let r = confirm("Tem certeza que deseja apagar esse projeto?");

    if(r){
        $.ajax({
            method: 'POST',
            url: 'deleteProject.php',
            data: { id: id},
            success: function(res){
                
            }
        });
    }
}