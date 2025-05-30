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
        function validatePasswords(e) 
        {
      e.preventDefault();
      const newPass = document.getElementById("newPassword").value;
      const confirmPass = document.getElementById("confirmPassword").value;
      const message = document.getElementById("message");

      if (newPass !== confirmPass) {
        message.textContent = "Hasła się nie zgadzają!";
        message.style.color = "red";
      } else {
        message.textContent = "Hasło zostało zmienione.";
        message.style.color = "green";
      }}