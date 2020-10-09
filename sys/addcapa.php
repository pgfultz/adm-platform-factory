<?php
    if (isset($_GET['id_project'])) {
        require_once '../config.php';

        $id_project = $_GET['id_project'];
        $photo_name = $_GET['photo_name'];
        $photo_path = '../uploads/'.$photo_name;

        if(!empty($_FILES["input_capa"]["name"])){
            $extensao = strtolower(substr($_FILES['input_capa']['name'], -4));//pega a extensao do arquivo
            $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
            $diretorio = "../uploads/"; //define o diretorio para onde enviaremos o arquivo
            $target_file = $diretorio . $novo_nome;   

            // Allow certain file formats
            $allowTypes = array('.jpg','.png','.jpeg','.gif');
            if(in_array($extensao, $allowTypes)){
                //Verifica se o arquivo temp exite
                if(file_exists($_FILES['input_capa']['tmp_name'])){
                    // Upload file to server
                    if(move_uploaded_file($_FILES['input_capa']['tmp_name'], $target_file)){ //efetua o uploa

                        //Apagar foto antiga do servidor
                        if(file_exists($photo_path)){
                            unlink($photo_path);
                        }

                        // Insert image file name into database
                        $sql = $pdo->prepare('UPDATE `projects` SET `logo` = ? WHERE `id` = ?');
                        if($sql->execute(array($novo_nome, $id_project))){
                            header("location: ../portfolioedit.php?id=".$id_project);
                        }else{
                            echo "<script>
                            alert('Erro ao inserir no banco!');
                            window.location.href='../portfolioedit.php?id=".$id_project."';
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
            echo "<script>
            alert('Selecione uma imagem!');
            window.location.href='../portfolioedit.php?id=".$id_project."';
            </script>";
        }

    }else{
        echo "<script>
        alert('Ocorreu um erro!');
        window.location.href='../portfolioedit.php?id=".$id_project."';
        </script>";
    }
?>