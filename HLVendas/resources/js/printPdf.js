// document.querySelector("#download-btn").addEventListener("click", () => {
//   // Seleciona todos os elementos filhos do body
//   const elementos = document.body.children;
//   let conteudo = "";

//   // Percorre todos os elementos filhos do body, verificando se a tag está na lista de desejadas
//   Array.from(elementos).forEach(elemento => {
//     const tag = elemento.tagName.toLowerCase();
//     const classes = elemento.classList;

//     // Verifica se o elemento deve ser incluído
//     if (["h1", "h2", "h3", "h4", "h5", "h6", "p", "ul", "img"].includes(tag) && 
//         !classes.contains("not-print")) {
//       if (tag === "img" && classes.contains("print")) {
//         // Para imagens, adiciona a tag <img> com o src correto
//         conteudo += `<img src="${elemento.src}" alt="${elemento.alt}" style="max-width:100%;"><br>`;
//       } else {
//         // Para outros elementos, adiciona o HTML interno
//         conteudo += `<${tag}>${elemento.innerHTML}</${tag}>`;
//       }
//     }
//   });

//   // Insere o conteúdo gerado no contêiner invisível
//   const printContainer = document.querySelector("#print-content");
//   printContainer.innerHTML = conteudo;

//   // Chama a função para imprimir diretamente
//   window.print();
// });

// document.querySelector("#download-btn").addEventListener("click", () => {
//   // Seleciona todos os elementos filhos do body
//   const elementos = document.body.children;
//   let conteudo = "";

//   // Percorre todos os elementos filhos do body, verificando se são tabelas ou suas partes
//   Array.from(elementos).forEach(elemento => {
//     const tag = elemento.tagName.toLowerCase();
//     const classes = elemento.classList;

//     // Verifica se o elemento é uma tabela ou parte dela (tr, th, td)
//     if (["table", "tr", "th", "td"].includes(tag) && 
//         !classes.contains("not-print")) {

//       // Para tabelas, apenas adiciona o HTML do elemento
//       conteudo += `<${tag}>${elemento.innerHTML}</${tag}>`;
//     }
//   });

//   // Insere o conteúdo gerado no contêiner invisível
//   const printContainer = document.querySelector("#print-content");
//   printContainer.innerHTML = conteudo;

//   // Chama a função para imprimir diretamente
//   window.print();
// });

// document.querySelector("#download-btn").addEventListener("click", () => {
//   const elementos = document.body.querySelectorAll('table, tr, th, td');  // Seleciona apenas tabelas e suas partes
//   let conteudo = "";

//   elementos.forEach(elemento => {
//     const tag = elemento.tagName.toLowerCase();
    
//     // Verifica se o elemento não tem a classe 'not-print'
//     if (!elemento.classList.contains("not-print")) {
//       // Adiciona apenas o HTML interno, sem as classes ou estilos
//       const innerHTML = elemento.innerHTML;

//       // Para não incluir o CSS inline, criamos um elemento temporário
//       const tempElement = document.createElement(tag);
//       tempElement.innerHTML = innerHTML;
//       conteudo += tempElement.outerHTML; // Obtém o HTML do elemento temporário sem estilos
//     }
//   });

//   // Insere o conteúdo gerado no contêiner invisível
//   const printContainer = document.querySelector("#print-content");
//   printContainer.innerHTML = conteudo;

//   // Chama a função para imprimir diretamente
//   window.print();
// });

// document.querySelector("#download-btn").addEventListener("click", () => {
//   // Seleciona todas as tabelas na página
//   const tabelas = document.querySelectorAll("table"); 
//   let conteudo = "";

//   // Percorre todas as tabelas selecionadas e adiciona o conteúdo delas
//   tabelas.forEach(tabela => {
//     // Pega o HTML da tabela (sem estilos)
//     conteudo += tabela.outerHTML;
//   });

//   // Cria um iframe temporário para evitar que a página se altere
//   const iframe = document.createElement("iframe");
//   iframe.style.position = "absolute";
//   iframe.style.width = "0px";
//   iframe.style.height = "0px";
//   document.body.appendChild(iframe);

//   // Acessa o conteúdo do iframe e insere o conteúdo da tabela
//   const iframeDoc = iframe.contentWindow.document;
//   iframeDoc.open();
//   iframeDoc.write(`
//     <html>
//       <head>
//         <style>
//           body {
//             font-family: sans-serif;
//             color: black;
//           }
//           table {
//             border-collapse: collapse;
//             width: 100%;
//           }
//           th, td {
//             border: 1px solid black;
//             padding: 8px;
//             text-align: left;
//           }
//         </style>
//       </head>
//       <body>
//         ${conteudo}
//       </body>
//     </html>
//   `);
//   iframeDoc.close();

//   // Chama a função para imprimir o conteúdo do iframe
//   iframe.contentWindow.focus();
//   iframe.contentWindow.print();

//   // Remove o iframe após a impressão
//   iframe.remove();
// });

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
            padding: 8px;
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

