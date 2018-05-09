(function(){
  'use strict';

  class Menu {
    constructor(settings) {
      this.nodeMenu = settings.nodeMenu;
      settings.nodeMenuButton.addEventListener('click', this.toggle.bind(this));
    }

    toggle() {
      return this.nodeMenu.classList.toggle('js-menu_activated');
    }
  }

  let nodeMenu = document.querySelector('body');
  
  new Menu({
    nodeMenu: nodeMenu,
    nodeMenuButton: nodeMenu.querySelector('.js-menu__toggle')
  });
})();