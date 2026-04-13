// auth-panel.js - FINÁLNA VERZIA

document.body.insertAdjacentHTML('beforeend', `
<div class="auth-overlay" id="authOverlay"></div>
<div class="auth-panel" id="authPanel">
  <div class="auth-panel-header">
    <a class="auth-panel-logo" href="/">LIORENNE</a>
    <button class="auth-panel-close" id="authClose">×</button>
  </div>
  <div class="auth-tabs">
    <button class="auth-tab active" data-tab="login">Prihlásenie</button>
    <button class="auth-tab" data-tab="register">Registrácia</button>
  </div>
  <div class="auth-messages" id="authMessages"></div>
  <div class="auth-panel-body">
    
    <form class="auth-form active" data-form="login" method="POST">
      <input type="hidden" name="_token" />
      <div class="auth-field">
        <label for="loginEmail">Email</label>
        <input type="email" name="email" id="loginEmail" required />
      </div>
      <div class="auth-field">
        <label for="loginPassword">Heslo</label>
        <input type="password" name="password" id="loginPassword" required />
      </div>
      <button type="submit" class="auth-submit">Prihlásiť sa</button>
    </form>

    <form class="auth-form" data-form="register" method="POST">
      <input type="hidden" name="_token" />
      <div class="auth-field">
        <label for="regName">Meno</label>
        <input type="text" name="name" id="regName" required />
      </div>
      <div class="auth-field">
        <label for="regEmail">Email</label>
        <input type="email" name="email" id="regEmail" required />
      </div>
      <div class="auth-field">
        <label for="regPassword">Heslo</label>
        <input type="password" name="password" id="regPassword" minlength="8" required />
      </div>
      <div class="auth-field">
        <label for="regConfirm">Potvrdenie hesla</label>
        <input type="password" name="password_confirmation" id="regConfirm" required />
      </div>
      <button type="submit" class="auth-submit">Vytvoriť účet</button>
    </form>
  </div>
</div>
`);

const authPanel = document.getElementById('authPanel');
const authOverlay = document.getElementById('authOverlay');
const authClose = document.getElementById('authClose');
const accountBtn = document.getElementById('accountBtn');
const authMessages = document.getElementById('authMessages');

// CSRF token
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

if (!csrfToken) {
  console.error('CSRF token missing!');
}

// Event listeners...
if (accountBtn) accountBtn.onclick = (e) => { e.preventDefault(); authPanel.classList.add('open'); authOverlay.classList.add('open'); document.body.style.overflow = 'hidden'; };
authClose.onclick = () => { authPanel.classList.remove('open'); authOverlay.classList.remove('open'); document.body.style.overflow = ''; authMessages.innerHTML = ''; };
authOverlay.onclick = authClose.onclick;

// Tabs
document.querySelectorAll('.auth-tab').forEach(tab => {
  tab.onclick = () => {
    const target = tab.dataset.tab;
    document.querySelectorAll('.auth-tab, .auth-form').forEach(el => el.classList.remove('active'));
    tab.classList.add('active');
    document.querySelector(`[data-form="${target}"]`).classList.add('active');
    authMessages.innerHTML = '';
  };
});

// FORM SUBMIT - Hlavná logika
document.querySelectorAll('.auth-form').forEach(form => {
  form.onsubmit = async (e) => {
    e.preventDefault();
    
    const formData = new FormData(form);
    const submitBtn = form.querySelector('.auth-submit');
    const originalText = submitBtn.textContent;
    
    formData.set('_token', csrfToken);
    
    submitBtn.textContent = 'Načítavam...';
    submitBtn.disabled = true;
    authMessages.innerHTML = '';
    
    try {
      // SPRÁVNA ROUTE podla formulára
      const url = form.dataset.form === 'register' ? '/register' : '/login';
      
      const response = await fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': csrfToken,
          'Accept': 'application/json',
        }
      });
      
      if (response.redirected) {
        window.location.href = response.url;
        return;
      }
      
      const data = await response.json();
      
      if (response.ok) {
        authMessages.innerHTML = `<div class="success">Úspech!</div>`;
        setTimeout(() => window.location.reload(), 1000);
      } else {
        let errors = data.message || 'Chyba';
        if (data.errors) {
          errors = Object.values(data.errors).flat().join('<br>');
        }
        authMessages.innerHTML = `<div class="error">${errors}</div>`;
      }
      
    } catch (error) {
      authMessages.innerHTML = `<div class="error">Server error</div>`;
    } finally {
      submitBtn.textContent = originalText;
      submitBtn.disabled = false;
    }
  };
});