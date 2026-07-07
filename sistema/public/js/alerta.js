window.addEventListener('DOMContentLoaded', () => {
    const mensaje = document.getElementById('mensaje');

    if (mensaje) {
        setTimeout(() => {
            mensaje.style.display = 'none';
        }, 3000);
    }
});