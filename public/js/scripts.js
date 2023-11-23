document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.navbar a');

    links.forEach((link) => {
        link.addEventListener('click', function (event) {
            links.forEach((l) => l.classList.remove('active'));
            link.classList.add('active');
        });
    });
});
