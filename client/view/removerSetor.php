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

                // Loop para cada Setor
                while ($setor = mysqli_fetch_assoc($listaSetor)) {
                    echo "<tr>";
                    echo "<td class='update__th__td'>" . $setor["id"] . "</td>";
                    echo "<td class='update__th__td'>" . $setor["descricao"] . "</td>";
                    echo "<td class='update__th__td__remove'>
                              <a href='../../data/processamento.php?acao=deletarSetor&id=" . $setor["id"] . "'>
                                  <img src='../assets/icon/remove.png' class='li__icon__button' alt='Deletar'>
                              </a>
                          </td>";
                    echo "</tr>";
                }
                

                // Fechamento da tabela
                echo "</tbody>";
                echo "</table>";
                ?>

            </section>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>