document.addEventListener('DOMContentLoaded', () => {
  // Seleciona todas as notificações
  const notifications = document.querySelectorAll(".notification");

  // Para cada notificação, mostra e oculta de acordo com o tempo
  notifications.forEach((notification) => {
      // Mostra a notificação com transição
      setTimeout(() => {
          notification.classList.add("opacity-100"); // Aparece
      }, 700);

      // Esconde a notificação após 5 segundos
      setTimeout(() => {
          notification.classList.remove("opacity-100"); // Desaparece
          setTimeout(() => {
              notification.style.display = "none"; // Remove do DOM após a transição
          }, 500); // Tempo da transição (500ms)
      }, 5000); // Tempo de exibição (5 segundos)
  });
});
