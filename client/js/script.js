// INTERAÇÃO COM A LISTA DE EMPRESA E SETOR

document.querySelectorAll(".li__principal").forEach((item) => {
  item.addEventListener("click", () => {
    // Alterna a classe "active" para exibir/esconder a sublista
    item.classList.toggle("active");
  });
});

// INPUT DE CNPJ COM PADRÃO PARA O USUÁRIO
document.querySelector("#cnpj").addEventListener("input", (e) => {
  let cnpj = e.target.value.replace(/\D/g, ""); // Remove caracteres não numéricos

  if (cnpj.length > 14) {
    cnpj = cnpj.slice(0, 14); // Limita a 14 caracteres numéricos
  }

  // Formata o CNPJ conforme o tamanho do input
  if (cnpj.length >= 3 && cnpj.length <= 5) {
    cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2");
  } else if (cnpj.length >= 6 && cnpj.length <= 8) {
    cnpj = cnpj.replace(/^(\d{2})(\d{3})(\d)/, "$1.$2.$3");
  } else if (cnpj.length >= 9 && cnpj.length <= 12) {
    cnpj = cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d)/, "$1.$2.$3/$4");
  } else if (cnpj.length >= 13) {
    cnpj = cnpj.replace(
      /^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,
      "$1.$2.$3/$4-$5"
    );
  }

  e.target.value = cnpj;
});

document.querySelector("#optionEmpresa").addEventListener("change", atualizarTexto);
document.querySelector("#optionSetor").addEventListener("change", atualizarTexto);

function atualizarTexto() {
  // Pega os valores dos selects
  let empresa = document.querySelector("#optionEmpresa").value;
  let setor = document.querySelector("#optionSetor").value;
  
  // Atualiza o conteúdo do parágrafo #textoID com os valores selecionados
  document.querySelector("#textoID").textContent = `Empresa: ${empresa} | Setor: ${setor}`;
}
