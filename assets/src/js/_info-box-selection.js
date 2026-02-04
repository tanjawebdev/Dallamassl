class InfoBoxSelection {
    constructor() {
        this.init();
    }

    init() {
        const selections = document.querySelectorAll('.info-box-selection');

        selections.forEach((selection) => {
            const buttons = selection.querySelectorAll('.info-box-btn');
            const panels = selection.querySelectorAll('.info-box-panel');

            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                    const categoryIndex = button.dataset.category;

                    // Remove active class from all buttons and panels
                    buttons.forEach((btn) => btn.classList.remove('active'));
                    panels.forEach((panel) => panel.classList.remove('active'));

                    // Add active class to clicked button and corresponding panel
                    button.classList.add('active');
                    const activePanel = selection.querySelector(`.info-box-panel[data-category="${categoryIndex}"]`);
                    if (activePanel) {
                        activePanel.classList.add('active');
                    }
                });
            });
        });
    }
}

export default InfoBoxSelection;
