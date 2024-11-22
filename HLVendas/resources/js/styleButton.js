document.addEventListener('DOMContentLoaded', () => {
    const menuLinks = document.querySelectorAll('.menuDesktop .lista .text a');
    const activeLink = localStorage.getItem('activeLink');
    const currentPage = window.location.pathname;  // Obtém o caminho atual da URL
    
    // Remove a classe active de todos os itens ao carregar a página
    document.querySelectorAll('.menuDesktop .lista .text i').forEach(icon => {
      icon.classList.remove('active');
    });
  
    // Verifica se a página é a inicial (ou outra página onde você não quer nenhum item selecionado)
    if (currentPage === '/' || currentPage === '/index.html' || !activeLink) {
      // Se for a página inicial ou não houver link ativo salvo, não faz nada
      localStorage.removeItem('activeLink');  // Limpa o link ativo no localStorage
    } else {
      // Se há um link ativo salvo, aplica a classe active ao ícone correspondente
      const activeLinkElement = document.querySelector(`.menuDesktop .lista .text a[href="${activeLink}"] i`);
      if (activeLinkElement) {
          activeLinkElement.classList.add('active');
      }
    }
  
    // Adiciona o evento de clique para marcar o link ativo
    menuLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            document.querySelectorAll('.menuDesktop .lista .text i').forEach(icon => icon.classList.remove('active'));
  
            const icon = link.querySelector('i');
            if (icon) {
                icon.classList.add('active');
            }
  
            // Salva o link clicado no localStorage
            localStorage.setItem('activeLink', link.getAttribute('href'));
        });
    });
  });