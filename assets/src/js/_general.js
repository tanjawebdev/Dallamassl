class General {
	constructor() {
		this.testVariable = 'script working';
		this.menuToggles = [];
		this.mobileMenu = null;
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
	}

	bindEvents() {
		if (!this.mobileMenu || this.menuToggles.length === 0) {
			return;
		}

		this.menuToggles.forEach((toggle) =>
			toggle.addEventListener('click', () => this.toggleMobileMenu())
		);

		this.mobileMenu
			.querySelectorAll('a')
			.forEach((link) =>
				link.addEventListener('click', () => this.closeMobileMenu())
			);
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
