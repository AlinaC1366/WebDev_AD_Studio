
document.addEventListener('DOMContentLoaded', () => {
  const lista = document.getElementById('lista-comenzi');
  let comenzi = JSON.parse(localStorage.getItem('cosServicii')) || [];

  function salveazaComenzi() {
    localStorage.setItem('cosServicii', JSON.stringify(comenzi));
    afiseazaComenzi();
  }

  function stergeItem(index) {
    comenzi.splice(index, 1);
    salveazaComenzi();
  }

  function schimbaCantitatea(index, schimbare) {
    comenzi[index].cantitate += schimbare;
    if (comenzi[index].cantitate < 1) comenzi[index].cantitate = 1;
    salveazaComenzi();
  }

  function afiseazaComenzi() {
    lista.innerHTML = '';
    if (comenzi.length === 0) {
      lista.innerHTML = '<p>Nu ai comenzi adăugate încă.</p>';
      return;
    }

    comenzi.forEach((item, index) => {
      const total = parseInt(item.optiune) * item.cantitate;
      const card = document.createElement('div');
      card.className = 'serviciu';
      card.innerHTML = `
        <h3>${item.serviciu}</h3>
        <p><strong>Opțiune:</strong> ${item.optiune} lei</p>
        <div class="cantitate-controls">
          <button onclick="schimbaCantitatea(${index}, -1)">−</button>
          <span>${item.cantitate}</span>
          <button onclick="schimbaCantitatea(${index}, 1)">+</button>
          <button onclick="stergeItem(${index})">🗑️</button>
        </div>
        <p><strong>Total:</strong> ${total} lei</p>
      `;
      lista.appendChild(card);
    });

    const actions = document.createElement('div');
    actions.style.marginTop = '2rem';
    actions.innerHTML = `
      <button id="trimite" class="adauga">Trimite Comanda</button>
      <button id="goleste" class="detalii">Șterge Coșul</button>
    `;
    lista.appendChild(actions);

    document.getElementById('goleste').addEventListener('click', () => {
      localStorage.removeItem('cosServicii');
      location.reload();
    });

    document.getElementById('trimite').addEventListener('click', async () => {
      const payload = comenzi.map(item => ({
        serviciu: item.serviciu,
        optiune: item.optiune,
        cantitate: item.cantitate,
        total: parseInt(item.optiune) * item.cantitate
      }));

      const response = await fetch('../backend/salveaza_comanda.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ comenzi: payload })
      });

      const result = await response.json();
      if (result.success) {
        alert('Comanda a fost trimisă!');
        localStorage.removeItem('cosServicii');
        location.reload();
      } else {
        alert('Eroare: ' + result.message);
      }
    });
  }

  // Expunem funcții pentru onclick din HTML dinamic
  window.schimbaCantitatea = schimbaCantitatea;
  window.stergeItem = stergeItem;

  afiseazaComenzi();
});
