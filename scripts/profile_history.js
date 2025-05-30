
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
