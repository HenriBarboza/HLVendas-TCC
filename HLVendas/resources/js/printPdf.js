document.querySelector("#download-btn").addEventListener("click", () => {
  // Seleciona todos os elementos desejados da página (tabelas, títulos, parágrafos, etc.), ignorando os elementos com a classe 'not-print'
  const elementos = document.body.querySelectorAll("table, h1, h2, h3, h4, h5, h6, p, .inputWrapper");
  let conteudo = "";

  // Percorre os elementos selecionados e adiciona o conteúdo deles
  elementos.forEach(elemento => {
    // Verifica se o elemento tem a classe 'not-print' e ignora se necessário
    if (!elemento.classList.contains("not-print")) {
      if (elemento.classList.contains("inputWrapper")) {
        // Busca o valor do input
        const valor = elemento.value || "Sem resposta";

        // Busca o texto dentro do label associado
        const label = elemento.nextElementSibling; // Seleciona o próximo irmão (label)
        const customPlaceholder = label?.querySelector("p")?.innerText || "Sem título";

        // Adiciona o conteúdo no formato "placeholder - resposta"
        conteudo += `<p><b>${customPlaceholder}</b> ${valor}</p>`;
      } else {
        conteudo += elemento.outerHTML;
      }
    }
  });

  // Cria um iframe temporário para evitar alterações na página
  const iframe = document.createElement("iframe");
  iframe.style.position = "absolute";
  iframe.style.width = "0px";
  iframe.style.height = "0px";
  document.body.appendChild(iframe);

  // Acessa o conteúdo do iframe e insere o conteúdo coletado
  const iframeDoc = iframe.contentWindow.document;
  iframeDoc.open();
  iframeDoc.write(`
    <html>
      <head>
        <style>
          body {
            font-family: sans-serif;
            color: black;
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            width: 100%;
          }
          th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
          }
          h1, h2, h3, h4, h5, h6, p {
            font-weight: normal;
            margin: 10px 0;
          }
          .for-print {
            display: block
          }
        </style>
      </head>
      <body>
        ${conteudo}
      </body>
    </html>
  `);
  iframeDoc.close();

  // Chama a função para imprimir o conteúdo do iframe
  iframe.contentWindow.focus();
  iframe.contentWindow.print();

  // Remove o iframe após a impressão
  iframe.remove();
});

