const tabs = () => {
    const tabNav = document.querySelectorAll('.tabs-nav li a');
    const tabContent = document.querySelectorAll('.tab-content');

    const removeContentActiveClass = (element, className) => {
        element.forEach(item => {
            item.classList.remove(className);
        });
    }

    const removeNavActiveClass = (element, className) => {
        element.forEach(item => {
            item.parentElement.classList.remove(className);
        });
    }

    tabNav.forEach((item, i) => {
        item.addEventListener('click', (event)=> {
            event.preventDefault();
            removeNavActiveClass(tabNav, 'active-nav');
            item.parentElement.classList.add('active-nav');
            item.parentElement.scrollIntoView({behavior: 'smooth', block: "end"});
            removeContentActiveClass(tabContent, 'active-content');
            tabContent[i].classList.add('active-content');
        })
    });
}

export default tabs;