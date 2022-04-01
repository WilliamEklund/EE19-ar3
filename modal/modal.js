const eModal = document.querySelector('#exampleModal');
const eForm = document.querySelector('#exampleModal form');
const eLogin = document.querySelector('#showLogin');
const eStatus = document.querySelector('#status');

let loginModal = new bootstrap.Modal(
  '#exampleModal',
  {
    backdrop: "static",
    keyboard: false
  }
)
// eLogin.addEventListener('click', () => {
//   loginModal.show();
// })

eForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const postData = new FormData(eForm);
  console.log(postData);

  fetch("./login.php", {
    method: 'POST',
    body: postData
  })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      switch (data) {
        case "Fel":
          eStatus.innerHTML = "<p class=\"alert alert-warning\"role=\"alert\">Något gick fel</p>";
          break;
        case "Inloggad":
          eStatus.innerHTML = "<p class=\"alert alert-success\"role=\"alert\">Du är inloggad</p>";
          break;
        case "Fel uppgifter":
          eStatus.innerHTML = "<p class=\"alert alert-warning\"role=\"alert\">Fel lösenord eller epost-address</p>";
          break;

        default:
          eStatus.textContent = "<p class=\"alert alert-warning\"role=\"alert\">Fel. Ring support</p>";
          break;
      }


      loginModal.hide();

      eForm.reset();
    })
})


