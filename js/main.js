// Affiche le sous-menu

// Storage du li parent
let parentItem = document.querySelectorAll('.menu-item-has-children');

// Boucle pour chaque li
for ( i = 0; i < parentItem.length; i++ ) {
    // Storage de la balise a du li parent
    let parentItemLink = parentItem[i].querySelector('a');
    // Storage du sous-menu
    let subMenu = parentItem[i].querySelector('.sub-menu');

    // Evènement clic uniquement sur la balise a
    parentItemLink.addEventListener('click', event => {

        event.preventDefault();

        if ( subMenu.style.display === 'block' ) {
            subMenu.style.display = 'none'
        } else {
            subMenu.style.display = 'block'
        }

    })
}
