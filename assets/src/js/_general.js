class General {
	constructor() {
		this.testVariable = 'script working';
		this.menuToggles = [];
		this.mobileMenu = null;
		this.submenuItems = [];
		this.init();
	}

	init() {
		// for tests purposes only
		console.log(this.testVariable);
		this.cacheDom();
		this.bindEvents();
	}

	cacheDom() {
		this.menuToggles = Array.from(document.querySelectorAll('.menu-toggle'));
		this.mobileMenu = document.querySelector('.mobile-menu');
		this.submenuItems = Array.from(document.querySelectorAll('.menu-item-has-children'));
		this.submenuPanels = Array.from(document.querySelectorAll('.submenu-panel'));
	}

	bindEvents() {
		// Mobile menu toggles
		if (this.mobileMenu && this.menuToggles.length > 0) {
			this.menuToggles.forEach((toggle) =>
				toggle.addEventListener('click', () => this.toggleMobileMenu())
			);

			this.mobileMenu
				.querySelectorAll('a')
				.forEach((link) =>
					link.addEventListener('click', () => this.closeMobileMenu())
				);
		}

		// Submenu panel toggles
		this.submenuItems.forEach((item) => {
			const link = item.querySelector('a');
			if (link) {
				link.addEventListener('click', (e) => {
					e.preventDefault();
					this.toggleSubmenu(item);
				});
			}
		});

		// Close submenu on outside click
		document.addEventListener('click', (e) => {
			if (!e.target.closest('.menu-item-has-children') && !e.target.closest('.submenu-panel')) {
				this.closeAllSubmenus();
			}
		});

		// Close submenu on escape key
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape') {
				this.closeAllSubmenus();
				this.closeMobileMenu();
			}
		});
	}

	toggleSubmenu(item) {
		const isOpen = item.classList.contains('submenu-open');

		// Close all other submenus
		this.closeAllSubmenus();

		// Toggle this submenu
		if (!isOpen) {
			item.classList.add('submenu-open');
			document.body.classList.add('submenu-open');

			// Find and show the corresponding submenu panel
			const menuItemId = item.id.replace('menu-item-', '');
			const panel = document.querySelector(`.submenu-panel[data-parent-id="${menuItemId}"]`);
			const mainnav = document.querySelector(`.main-navigation`);
			if (panel) {
				panel.classList.add('is-open');
				mainnav.classList.add('submenu-open');
			}
		}
	}

	closeAllSubmenus() {
		this.submenuItems.forEach((item) => {
			item.classList.remove('submenu-open');
		});
		this.submenuPanels.forEach((panel) => {
			panel.classList.remove('is-open');
		});
		const mainnav = document.querySelector(`.main-navigation`);
		mainnav.classList.remove('submenu-open');
		document.body.classList.remove('submenu-open');
	}

	toggleMobileMenu() {
		const isOpen = this.mobileMenu.classList.contains('is-open');
		if (isOpen) {
			this.closeMobileMenu();
		} else {
			this.openMobileMenu();
		}
	}

	openMobileMenu() {
		this.mobileMenu.classList.add('is-open');
		document.body.classList.add('menu-open');
		this.menuToggles.forEach((toggle) =>
			toggle.setAttribute('aria-expanded', 'true')
		);
		this.mobileMenu.setAttribute('aria-hidden', 'false');
	}

	closeMobileMenu() {
		this.mobileMenu.classList.remove('is-open');
		document.body.classList.remove('menu-open');
		this.menuToggles.forEach((toggle) =>
			toggle.setAttribute('aria-expanded', 'false')
		);
		this.mobileMenu.setAttribute('aria-hidden', 'true');
	}
}

export default General;
