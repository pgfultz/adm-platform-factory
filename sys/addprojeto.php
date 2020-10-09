<?php

require_once '../config.php';

$nome = $_POST['input_nome'];
$tecnologias = $_POST['input_tecnologias'];
$descricao = $_POST['input_descricao'];

if(isset($nome) AND isset($descricao)){ 

    if(!empty($_FILES["input_nova_capa"]["name"])){
        $extensao = strtolower(substr($_FILES['input_nova_capa']['name'], -4));//pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "../uploads/"; //define o diretorio para onde enviaremos o arquivo
        $target_file = $diretorio . $novo_nome;   

        // Allow certain file formats
        $allowTypes = array('.jpg','.png','.jpeg','.gif');
        if(in_array($extensao, $allowTypes)){
            //Verifica se o arquivo temp exite
            if(file_exists($_FILES['input_nova_capa']['tmp_name'])){
                // Upload file to server
                if(move_uploaded_file($_FILES['input_nova_capa']['tmp_name'], $target_file)){ //efetua o uploa
                    // Insert image file name into database
                    $sql = $pdo->prepare("INSERT INTO `projects` SET `name` = ?, `technologies` = ?, `descr` = ?, `logo` = ?");
                    if($sql->execute(array($nome,$tecnologias,$descricao,$novo_nome))){
                        $last_id = $pdo->lastInsertId();
                        header("location: ../portfolioedit.php?id=".$last_id);
                    }else{
                        echo "<script>
                        alert('Erro ao inserir projeto!');
                        window.location.href='../addprojeto.php';
                        </script>";
                    }
                
                }else{
                    echo "<script>
                    alert('Erro ao fazer upload!');
                    window.location.href='../portfolioedit.php?id=".$id_project."';
                    </script>";
                }
            }else{
                echo "<script>
                alert('Arquivo temp nao existe!');
                window.location.href='../portfolioedit.php?id=".$id_project."';
                </script>";
            }
        }else{
            echo "<script>
            alert('Imagem deve ser JPG, JPEG, PNG, GIF!');
            window.location.href='../portfolioedit.php?id=".$id_project."';
            </script>";
        }
    }else{
        $sql = $pdo->prepare("INSERT INTO `projects` SET `name` = ?, `technologies` = ?, `descr` = ?");
        if($sql->execute(array($nome,$tecnologias,$descricao))){
            $last_id = $pdo->lastInsertId();
            header("location: ../portfolioedit.php?id=".$last_id);
        }else{
            echo "<script>
            alert('Erro ao inserir projeto!');
            window.location.href='../addprojeto.php';
            </script>";
        }
    }

}else{
    echo "<script>
    alert('Insira um nome e uma descrição!');
    window.location.href='../addprojeto.php';
    </script>";
}

?>