const body = document.body;
const desktopToggle = document.querySelector('.brand-area .sidebar-toggle');
const mobileToggle = document.querySelector('.mobile-menu');
const backdrop = document.querySelector('.sidebar-backdrop');

function isMobile() {
    return window.matchMedia('(max-width: 820px)').matches;
}

function setExpandedState() {
    const desktopExpanded = !body.classList.contains('sidebar-collapsed');
    const mobileExpanded = body.classList.contains('sidebar-open');

    desktopToggle.setAttribute('aria-expanded', String(isMobile() ? mobileExpanded : desktopExpanded));
    mobileToggle.setAttribute('aria-expanded', String(mobileExpanded));
}

function toggleSidebar() {
    if (isMobile()) {
        body.classList.toggle('sidebar-open');
    } else {
        body.classList.toggle('sidebar-collapsed');
    }

    setExpandedState();
}

desktopToggle.addEventListener('click', toggleSidebar);
mobileToggle.addEventListener('click', toggleSidebar);
backdrop.addEventListener('click', () => {
    body.classList.remove('sidebar-open');
    setExpandedState();
});

window.addEventListener('resize', () => {
    if (!isMobile()) {
        body.classList.remove('sidebar-open');
    }

    setExpandedState();
});

setExpandedState();
