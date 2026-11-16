import './bootstrap';

document.addEventListener('click', (event) => {
    if (!(event.target instanceof Element)) {
        return;
    }

    const toggle = event.target.closest('[data-password-toggle]');

    if (!(toggle instanceof HTMLButtonElement)) {
        return;
    }

    const input = toggle.parentElement?.querySelector('[data-password-input]');

    if (!(input instanceof HTMLInputElement)) {
        return;
    }

    const showPassword = input.type === 'password';

    input.type = showPassword ? 'text' : 'password';
    toggle.textContent = showPassword ? 'Hide' : 'Show';
    toggle.setAttribute('aria-label', `${showPassword ? 'Hide' : 'Show'} ${input.name === 'password_confirmation' ? 'confirmation password' : 'password'}`);
    toggle.setAttribute('aria-pressed', String(showPassword));
});
