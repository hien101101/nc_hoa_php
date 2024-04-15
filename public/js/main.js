function check_option(el){
    let divConten=el.parentElement.parentElement;
    let inputChild= divConten.querySelectorAll(".inputChild");
    if(el.checked){
        inputChild.forEach(element => {
            element.removeAttribute("disabled");
            element.classList.remove('bg-gray-200');
        });

    }else{
        console.log('123');
        inputChild.forEach(element => {
            element.setAttribute("disabled","true");
            element.classList.add('bg-gray-200');
        });
    }
}

function toast({ title = "", message = "", type = "info"}) {
    const main = document.getElementById("toast");
    if (main) {
      const toast = document.createElement("div");
        let duration = 2000;
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
  
      const icons = {
        success: "fas fa-check-circle",
        error: "fas fa-exclamation-circle"
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);
  
      toast.classList.add("toast", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }




