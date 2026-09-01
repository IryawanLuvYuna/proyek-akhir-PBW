// Toast Notification System
class ToastManager {
  constructor() {
    this.container = null;
    this.init();
  }

  init() {
    // Create toast container if it doesn't exist
    if (!document.querySelector('.toast-container')) {
      this.container = document.createElement('div');
      this.container.className = 'toast-container';
      document.body.appendChild(this.container);
    } else {
      this.container = document.querySelector('.toast-container');
    }
  }

  show(message, type = 'info', duration = 4000) {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;

    // Icon based on type
    let icon = 'ℹ️';
    if (type === 'success') icon = '✅';
    if (type === 'error') icon = '❌';

    toast.innerHTML = `
      <span class="toast-icon">${icon}</span>
      <span class="toast-content">${message}</span>
      <button class="toast-close" onclick="this.parentElement.remove()">×</button>
    `;

    this.container.appendChild(toast);

    // Auto dismiss after duration
    setTimeout(() => {
      this.dismiss(toast);
    }, duration);
  }

  dismiss(toast) {
    if (toast && toast.parentNode) {
      toast.classList.add('toast-dismissing');
      toast.addEventListener('animationend', () => {
        if (toast.parentNode) {
          toast.remove();
        }
      });
    }
  }
}

// Initialize toast manager
const toastManager = new ToastManager();

// Function to show toast from PHP session (via meta tag)
function showToastFromSession() {
  const toastData = document.querySelector('meta[name="toast-data"]');
  if (toastData) {
    try {
      const content = toastData.getAttribute('content');
      console.log('Toast data found:', content);
      const data = JSON.parse(content);
      console.log('Parsed toast data:', data);
      if (data.message && data.type) {
        toastManager.show(data.message, data.type, data.duration || 4000);
      }
    } catch (e) {
      console.error('Error parsing toast data:', e);
    }
  } else {
    console.log('No toast data meta tag found');
  }
}

// Show toast when DOM is ready
document.addEventListener('DOMContentLoaded', showToastFromSession);
