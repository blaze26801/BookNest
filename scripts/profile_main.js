    function saveUserData(e) {
      e.preventDefault();

      const imie = document.getElementById('inputImie').value;
      const nazwisko = document.getElementById('inputNazwisko').value;
      const adres = document.getElementById('inputAdres').value;

      document.getElementById('savedImie').textContent = imie || '-';
      document.getElementById('savedNazwisko').textContent = nazwisko || '-';
      document.getElementById('savedAdres').textContent = adres || '-';
    }

    const menuLinks = document.querySelectorAll('aside a');
    const sections = document.querySelectorAll('.content > div');

    menuLinks.forEach(link => {
      link.addEventListener('click', e => {
        // e.preventDefault();
        const target = document.querySelector(link.getAttribute('href'));

        sections.forEach(section => section.classList.add('hidden'));
        target.classList.remove('hidden');
      });
    });