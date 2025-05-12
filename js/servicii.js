
document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.adauga');
  const toast = document.getElementById('toast');
  const cartCount = document.getElementById('cart-count');

  function showToast(message) {
    toast.textContent = message;
    toast.classList.remove('hidden');
    setTimeout(() => toast.classList.add('hidden'), 3000);
  }

  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cosServicii')) || [];
    cartCount.textContent = `(${cart.length})`;
  }

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      const serviciu = btn.dataset.nume;
      const id = btn.dataset.id;
      const container = btn.closest('.serviciu');
      const optiune = container.querySelector('select').value;
      const cantitate = parseInt(container.querySelector('input[type=number]').value, 10);

      const item = { id, serviciu, optiune, cantitate };
      const cart = JSON.parse(localStorage.getItem('cosServicii')) || [];
      cart.push(item);
      localStorage.setItem('cosServicii', JSON.stringify(cart));

      showToast('Serviciu adăugat! Vezi coșul pentru finalizare.');
      updateCartCount();
    });
  });

  updateCartCount();
});
