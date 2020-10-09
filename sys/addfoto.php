<?php
    if (isset($_GET['id_project'])) {
        require_once '../config.php';

        $id_project = $_GET['id_project'];

        if(!empty($_FILES["input_foto"]["name"])){
            $extensao = strtolower(substr($_FILES['input_foto']['name'], -4));//pega a extensao do arquivo
            $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
            $diretorio = "../uploads/"; //define o diretorio para onde enviaremos o arquivo
            $target_file = $diretorio . $novo_nome;   

            // Allow certain file formats
            $allowTypes = array('.jpg','.png','.jpeg','.gif');
            if(in_array($extensao, $allowTypes)){
                //Verifica se o arquivo temp exite
                if(file_exists($_FILES['input_foto']['tmp_name'])){
                    // Upload file to server
                    if(move_uploaded_file($_FILES['input_foto']['tmp_name'], $target_file)){ //efetua o uploa
                        // Insert image file name into database
                        $sql = $pdo->prepare('INSERT INTO `projects_photos` SET `project_id` = ?, `photo` = ?');
                        if($sql->execute(array($id_project, $novo_nome))){
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