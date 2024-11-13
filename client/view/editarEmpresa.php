<?php
require_once "../../data/funcoesBD.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $empresa = mysqli_fetch_assoc(retornarEmpresaPorId($id));
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ATHIA Projeto</title>
    <link rel="stylesheet" href="../css/index.css" />
</head>

<body>
    <nav>
        <section class="nav__main">
            <section class="nav__img">
                <img
                    src="../assets/icon/empresa.png"
                    class="img__sigame"
                    alt="Logo do sistema" />
            </section>

            <section>
                <h1>Gerenciamento de Empresas</h1>
                <h1>Candidato: Felipe Shicasho de Toledo</h1>
            </section>

            <h1><a href="login.html"> - SAIR - </a></h1>
        </section>
    </nav>

    <main>
        <aside>
        <ul>
                        <li class="li__link li__menu">
                            <img
                                class="li__icon__button"
                                src="../assets/icon/add.png"
                                alt="" /><a href="adicionarEmpresa.php">Adicionar Empresa</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                class="li__icon__button"
                                src="../assets/icon/add.png"
                                alt="" /><a href="adicionarEmpresaSetor.php">Adicionar Setor na Empresa</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                class="li__icon__button"
                                src="../assets/icon/updated.png"
                                alt="" /><a href="modificarEmpresa.php">Modificar Empresa</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                class="li__icon__button"
                                src="../assets/icon/remove.png"
                                alt="" /><a href="removerEmpresa.php">Remover Empresa</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                class="li__icon__button"
                                src="../assets/icon/remove.png"
                                alt="" /><a href="removerEmpresaSetor.php">Remover Setor da Empresa</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                class="li__icon__button"
                                src="../assets/icon/view.png"
                                alt="" /><a href="visualizarEmpresa.php">Visualizar Empresa</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                class="li__icon__button"
                                src="../assets/icon/view.png"
                                alt="" />
                            <a href="visualizarEmpresaSetor.php">Visualizar Setores da Empresa</a>
                        </li>
                    </ul>
        </aside>
        <section>
            <section class="forms__input">
                <h1>Editar empresa // ID = <?php echo $empresa['id']; ?></h1>
                <form action="../../data/processamento.php" method="POST" class="forms__section">
                    <input type="hidden" name="id" value="<?php echo $empresa['id']; ?>">

                    <label for="razaoSocial" class="forms__input">
                        <?php echo $empresa['razao_social']; ?>
                        <input type="text" placeholder="Nova razão social" name="razao_social" class="form__text" />
                    </label>

                    <label for="nome_fantasia" class="forms__input">
                    <?php echo $empresa['nome_fantasia']; ?>
                        <input type="text" placeholder="Novo nome fantasia" name="nome_fantasia" class="form__text" />
                    </label>

                    <label for="cnpj" class="forms__input">
                    <?php echo $empresa['cnpj']; ?>
                        <input type="text" placeholder="Novo CNPJ" name="cnpj" class="form__text" id="cnpj" />
                    </label>

                    <button type="submit" name="acao" value="modificar" class="form__button">Salvar Alterações</button>

                </form>
            </section>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>