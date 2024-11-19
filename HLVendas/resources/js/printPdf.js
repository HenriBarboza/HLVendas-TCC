document.querySelector("#download-btn").addEventListener("click", () => {
  // Seleciona todos os elementos desejados da página (tabelas, títulos, parágrafos, etc.), ignorando os elementos com a classe 'not-print'
  const elementos = document.body.querySelectorAll("table, h1, h2, h3, h4, h5, h6, p");
  let conteudo = "";

  // Percorre os elementos selecionados e adiciona o conteúdo deles
  elementos.forEach(elemento => {
    // Verifica se o elemento tem a classe 'not-print' e ignora se necessário
    if (!elemento.classList.contains("not-print")) {
      conteudo += elemento.outerHTML;
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
            padding: 7px;
            text-align: left;
          }
          h1, h2, h3, h4, h5, h6, p {
            font-weight: normal;
            margin: 10px 0;
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

