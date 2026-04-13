// auth-panel.js

document.body.insertAdjacentHTML('beforeend', `
  <div class="auth-overlay" id="authOverlay"></div>
  <div class="auth-panel" id="authPanel">
    <div class="auth-panel-header">
      <a class="auth-panel-logo" href="index.html">LIORENNE</a>
      <button class="auth-panel-close" id="authClose">Close</button>
    </div>
    <div class="auth-tabs">
      <button class="auth-tab active" data-tab="login">Login</button>
      <button class="auth-tab" data-tab="register">Register</button>
    </div>
    <div class="auth-panel-body">

      <form class="auth-form active" data-form="login" novalidate>
        <div class="auth-field">
          <label for="loginEmail">Email</label>
          <input type="email" id="loginEmail" placeholder="your@email.com" />
        </div>
        <div class="auth-field">
          <label for="loginPassword">Password</label>
          <input type="password" id="loginPassword" placeholder="••••••••" />
        </div>
        <a href="#" class="auth-forgot">Forgot password?</a>
        <button type="submit" class="auth-submit">Continue</button>
        <div class="auth-divider"><span>Or continue with</span></div>
        <div class="auth-socials">
          <a href="#" class="auth-social-btn" aria-label="Google">
            <svg viewBox="0 0 24 24" width="22" height="22">
              <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
              <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
              <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
              <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
          </a>
          <a href="#" class="auth-social-btn" aria-label="Apple">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
              <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
            </svg>
          </a>
          <a href="#" class="auth-social-btn" aria-label="Facebook">
            <svg viewBox="0 0 24 24" width="22" height="22">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
            </svg>
          </a>
        </div>
      </form>

      <form class="auth-form" data-form="register" novalidate>
        <div class="auth-row">
          <div class="auth-field">
            <label for="regFirst">First Name</label>
            <input type="text" id="regFirst" placeholder="John" />
          </div>
          <div class="auth-field">
            <label for="regLast">Last Name</label>
            <input type="text" id="regLast" placeholder="Smith" />
          </div>
        </div>
        <div class="auth-field">
          <label for="regEmail">Email</label>
          <input type="email" id="regEmail" placeholder="your@email.com" />
        </div>
        <div class="auth-field">
          <label for="regPassword">Password</label>
          <input type="password" id="regPassword" placeholder="••••••••" />
        </div>
        <div class="auth-field">
          <label for="regConfirm">Confirm Password</label>
          <input type="password" id="regConfirm" placeholder="••••••••" />
        </div>
        <button type="submit" class="auth-submit">Create Account</button>
        <div class="auth-divider"><span>Or continue with</span></div>
        <div class="auth-socials">
          <a href="#" class="auth-social-btn" aria-label="Google">
            <svg viewBox="0 0 24 24" width="22" height="22">
              <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
              <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
              <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
              <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
          </a>
          <a href="#" class="auth-social-btn" aria-label="Apple">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
              <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
            </svg>
          </a>
          <a href="#" class="auth-social-btn" aria-label="Facebook">
            <svg viewBox="0 0 24 24" width="22" height="22">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
            </svg>
          </a>
        </div>
      </form>

    </div>
  </div>
`);

// ─── EVENTS ────────────────────────────────
const authPanel   = document.getElementById('authPanel');
const authOverlay = document.getElementById('authOverlay');
const authClose   = document.getElementById('authClose');
const accountBtn  = document.getElementById('accountBtn');

function openAuth()  {
    authPanel.classList.add('open');
    authOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeAuth() {
    authPanel.classList.remove('open');
    authOverlay.classList.remove('open');
    document.body.style.overflow = '';
}

if (accountBtn) {
    accountBtn.addEventListener('click', (e) => {
        e.preventDefault();
        openAuth();
    });
}

authClose.addEventListener('click', closeAuth);
authOverlay.addEventListener('click', closeAuth);

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeAuth();
});

// ─── TABS ──────────────────────────────────
document.querySelectorAll('.auth-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        const target = tab.dataset.tab;
        document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.auth-form').forEach(f => f.classList.remove('active'));
        tab.classList.add('active');
        document.querySelector(`.auth-form[data-form="${target}"]`).classList.add('active');
    });
});