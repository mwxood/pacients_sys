const header = () => {
    const userInfoHolder = document.querySelector('.user-info');
    const userMenu = document.querySelector('.user-menu');

    try {
        userInfoHolder.addEventListener('click', () => {
            userInfoHolder.classList.toggle('active-menu');
        });
    } catch(e) {}
};

export default header;