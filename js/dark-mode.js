const darkModePref = localStorage.getItem('darkMode');
if (darkModePref === 'enabled') {
    enableDarkMode();
}

function enableDarkMode() {
    document.body.classList.add('dark-mode');
    localStorage.setItem('darkMode', 'enabled');
}

function disableDarkMode() {
    document.body.classList.remove('dark-mode');
    localStorage.setItem('darkMode', null);
}

document.getElementById('darkModeToggle').addEventListener('click', () => {
    const darkModePref = localStorage.getItem('darkMode');
    if (darkModePref !== 'enabled') {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});
