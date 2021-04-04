let parentItems, i;

parentItems = document.querySelectorAll('.menu-item-has-children');

for (i = 0; i < parentItems.length; i++) {
    let subMenu = parentItems[i].querySelector('.sub-menu');
    parentItems[i].addEventListener('click', event => {
        event.stopPropagation();
        event.preventDefault();
        if ( subMenu.style.display === 'block' ) {
            subMenu.style.display = 'none';
        } else {
            subMenu.style.display = 'block';
        }
    });

}
