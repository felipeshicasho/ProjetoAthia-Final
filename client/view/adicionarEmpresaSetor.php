<?php
require_once "../../data/funcoesBD.php";
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
                <li class="li__principal">
                    <section class="li__button">
                        <img
                            src="../assets/icon/empresa.png"
                            class="li__icon"
                            alt="Ícone da empresa" />
                        Empresa:
                    </section>
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
                </li>
                <li class="li__principal">
                    <section class="li__button">
                        <img
                            src="../assets/icon/setor.png"
                            class="li__icon"
                            alt="Ícone do setor" />
                        Setor:
                    </section>
                    <ul>
                        <li class="li__link li__menu">
                            <img
                                src="../assets/icon/add.png"
                                class="li__icon__button"
                                alt="" /><a href="adicionarSetor.php">Adicionar Setor</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                src="../assets/icon/updated.png"
                                class="li__icon__button"
                                alt="" /><a href="modificarSetor.php">Modificar Setor</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                src="../assets/icon/remove.png"
                                class="li__icon__button"
                                alt="" /><a href="removerSetor.php">Remover Setor</a>
                        </li>
                        <li class="li__link li__menu">
                            <img
                                src="../assets/icon/view.png"
                                class="li__icon__button"
                                alt="" /><a href="visualizarSetor.php">Visualizar Setor</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <section>
            <section class="forms__input">
                <h1>Adicionar Setor na Empresa</h1>
                <form action="../../data/processamento.php" method="POST" class="forms__section">
                    <label for="razaoSocial" class="forms__input">
                        <h1>Empresa</h1>
                        <select name="inputOptionEmpresa" id="razaoSocial">
                            <option value="" id="optionEmpresa">Selecione uma empresa</option> <!-- Placeholder opcional -->
                            <?php
                            $listaEmpresa = retornarEmpresa();
                            if ($listaEmpresa) {
                                while ($empresa = mysqli_fetch_assoc($listaEmpresa)) {
                                    echo "<option name='inputOptionEmpresa' value='" . $empresa['id'] . "'>" . $empresa['id'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhuma empresa encontrada</option>";
                            }
                            ?>
                        </select>
                    </label>

                    <label for="razaoSocial" class="forms__input">
                        <h1>Setor</h1>
                        <select name="inputOptionSetor" id="razaoSocial">
                            <option value="" id="optionSetor">Selecione uma empresa</option> <!-- Placeholder opcional -->
                            <?php
                            $listaSetor = retornarSetor();
                            if ($listaSetor) {
                                while ($setor = mysqli_fetch_assoc($listaSetor)) {
                                    echo "<option name='inputOptionSetor' value='" . $setor['id'] . "'>" . $setor['id'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum setor encontrado</option>";
                            }
                            ?>
                        </select>
                    </label>
                    <div>
                        <p id="textoID"></p>
                    </div>
                    <input type="submit" value="Cadastrar" class="form__button">
                </form>
                <section class="forms__input">
                    <h1>Visualizar Empresas: </h1>

                    <?php
                    $listaEmpresa = retornarEmpresa();

                    // Cabeçalho da tabela
                    echo "<table class='update__table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th class='update__th__td'>ID</th>";
                    echo "<th class='update__th__td'>Razão Social</th>";
                    echo "<th class='update__th__td'>Nome Fantasia</th>";
                    echo "<th class='update__th__td'>CNPJ</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    // Loop para cada empresa
                    while ($empresa = mysqli_fetch_assoc($listaEmpresa)) {
                        echo "<tr>";
                        echo "<td class='update__th__td'>" . $empresa["id"] . "</td>";
                        echo "<td class='update__th__td'>" . $empresa["razao_social"] . "</td>";
                        echo "<td class='update__th__td'>" . $empresa["nome_fantasia"] . "</td>";
                        echo "<td class='update__th__td'>" . $empresa["cnpj"] . "</td>";
                        echo "</tr>";
                    }


                    // Fechamento da tabela
                    echo "</tbody>";
                    echo "</table>";
                    ?>

                </section>
                <section class="forms__input">
                    <h1>Visualizar Setor: </h1>

                    <?php
                    $listaSetor = retornarSetor();

                    // Cabeçalho da tabela
                    echo "<table class='update__table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th class='update__th__td'>ID</th>";
                    echo "<th class='update__th__td'>Descrição</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    // Loop para cada empresa
                    while ($setor = mysqli_fetch_assoc($listaSetor)) {
                        echo "<tr>";
                        echo "<td class='update__th__td'>" . $setor["id"] . "</td>";
                        echo "<td class='update__th__td'>" . $setor["descricao"] . "</td>";
                        echo "</tr>";
                    }


                    // Fechamento da tabela
                    echo "</tbody>";
                    echo "</table>";
                    ?>

                </section>
            </section>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>