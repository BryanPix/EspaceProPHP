 function toggleDarkMode() {
      const body = document.body;
      body.classList.toggle('dark-mode');
      
      // Save user preference in local storage
      const isDarkMode = body.classList.contains('dark-mode');
      localStorage.setItem('darkMode', isDarkMode);
    }

    // Event listener for the toggle button
    const toggleButton = document.getElementById('darkModeToggle');
    toggleButton.addEventListener('click', toggleDarkMode);

    // Check user preference from local storage and apply dark mode if set
    const savedDarkMode = localStorage.getItem('darkMode');
    if (savedDarkMode === 'true') {
      document.body.classList.add('dark-mode');
    }