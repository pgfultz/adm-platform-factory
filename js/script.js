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

$('#input_capa_blog').change(function(e){
    if(e.target.value.length){
        let file = this.files[0];
        let reader = new FileReader();
        reader.onloadend = function(){
            $('.capa-blog').css('background-image', 'url('+reader.result+')');
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
            type: 'POST',
            url: 'sys/deleteproject.php',
            data: { id: id},
            dataType: 'JSON',
            success: function(res){
                if(res.success){
                    alert('Projeto excluido com sucesso. A página vai reiniciar!');
                    window.location.reload();
                }else{
                    alert(res.message);
                }
            },
            error: function(){
                alert('Ocorreu um erro de requisição!');
            }
        });
    }
}

function excluirArtigo(id){
    let r = confirm("Tem certeza que deseja apagar esse projeto?");

    if(r){
        
        $.ajax({
            type: 'POST',
            url: 'sys/deleteartigo.php',
            data: { id: id},
            dataType: 'JSON',
            success: function(res){
                if(res.success){
                    alert('Artigo excluido com sucesso. A página vai reiniciar!');
                    window.location.reload();
                }else{
                    alert(res.message);
                }
            },
            error: function(){
                alert('Ocorreu um erro de requisição!');
            }
        });
    }
}