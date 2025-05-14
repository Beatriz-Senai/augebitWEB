document.addEventListener('DOMContentLoaded', function() {
    const menuButtons = document.querySelectorAll('.menuBtn');
    
    menuButtons.forEach(button => {
        button.addEventListener('click', function() {
            menuButtons.forEach(btn => {
                btn.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });
});