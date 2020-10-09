<?php

require_once '../config.php';

$titulo = $_POST['input_titulo'];
$categoria = $_POST['input_categoria'];
$descricao = $_POST['txtArtigo'];

if(isset($titulo) AND isset($descricao)){ 

    if(!empty($_FILES["input_capa_blog"]["name"])){
        $extensao = strtolower(substr($_FILES['input_capa_blog']['name'], -4));//pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "../uploads/"; //define o diretorio para onde enviaremos o arquivo
        $target_file = $diretorio . $novo_nome;   

        // Allow certain file formats
        $allowTypes = array('.jpg','.png','.jpeg','.gif');
        if(in_array($extensao, $allowTypes)){
            //Verifica se o arquivo temp exite
            if(file_exists($_FILES['input_capa_blog']['tmp_name'])){
                // Upload file to server
                if(move_uploaded_file($_FILES['input_capa_blog']['tmp_name'], $target_file)){ //efetua o uploa
                    // Insert image file name into database
                    $sql = $pdo->prepare("INSERT INTO `blog` SET `capa` = ?, `autor` = ?, `titulo` = ?, `descricao` = ?, `categoria` = ?");
                    if($sql->execute(array($novo_nome,$_SESSION['logged_name'],$titulo,$descricao,$categoria))){
                        $last_id = $pdo->lastInsertId();
                        header("location: ../blog.php");
                    }else{
                        echo "<script>
                        alert('Erro ao inserir no banco!');
                        window.location.href='../addblog.php';
                        </script>";
                    }
                
                }else{
                    echo "<script>
                    alert('Erro ao fazer upload!');
                    window.location.href='../addblog.php';
                    </script>";
                }
            }else{
                echo "<script>
                alert('Arquivo temp nao existe!');
                window.location.href='../addblog.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('Imagem deve ser JPG, JPEG, PNG, GIF!');
            window.location.href='../addblog.php';
            </script>";
        }
    }else{
        echo "<script>
        alert('O artigo precisa ter uma foto de capa!');
        window.location.href='../addblog.php';
        </script>";
    }

}else{
    echo "<script>
    alert('Insira um nome e uma descrição!');
    window.location.href='../addblog.php';
    </script>";
}

?>