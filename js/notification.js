
const notification = {
  show: function (message, type = 'info') {
    const notif = document.createElement('div');
    const notif_text = document.createElement('p');
    const timeout = document.createElement('div');

    timeout.className = `notification-timeout ${type}`;
    notif_text.className = `notification-text ${type}`;
    notif.className = `notification ${type}`;
    notif_text.innerHTML = message;
    notif.appendChild(notif_text);

    document.body.appendChild(notif);
    setTimeout(() => {
      document.body.removeChild(notif);
    }, 3000);
  }
};

// const customAlert = {
//   show: function ({ title, message }) {
//     const overlay = document.createElement('div');
//     const content = document.createElement('div');
//     const close = document.createElement('button');
//     const title = document.createElement('h3');
//     const text = document.createElement('p');
//     close.innerHTML = 'OK';
//     overlay.className = 'overlayAlert';
//     content.className = 'customAlert';
//     close.className = 'closeAlert';

//     content.appendChild(title);
//     content.appendChild(text);
//     content.appendChild(close);

//     overlay.appendChild(content);
//     document.body.appendChild(overlay);
//     close.addEventListener('click', () => {
//       document.body.removeChild(overlay);
//     }, 3000);
//   }
// };