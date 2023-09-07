// generar edad segun al fecha de nacimiento
export function newAge(birth_date) {
    const today = new Date();
    const birthD = new Date(birth_date);
    let age = today.getFullYear() - birthD.getFullYear();
    const month = today.getMonth() - birthD.getMonth();

    if (month < 0 || (month === 0 && today.getDate() < birthD.getDate())) {
        age--;
    }

    return age;
}

// desplazar el panel donde se observan los datos para que no se enrede con el menu
export function toggleMenu() {
    let mediaQuery = window.matchMedia("(max-width: 1023px)");
  
    if (mediaQuery.matches) {
      let mainBtns = document.querySelectorAll(".main-btn");
      let panelDataItems = document.querySelectorAll(".panelData");
      let activeCount = 0;
      let translateY = 0;
  
      mainBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
          btn.classList.toggle("active");
  
          if (btn.classList.contains("active")) {
            activeCount++;
          } else {
            activeCount--;
          }
  
          translateY = 10 + 15 * activeCount; // Calcula el valor de translateY
  
          if (activeCount === 0) {
            panelDataItems.forEach(function (item) {
              item.classList.remove("panelDataMoving");
            });
          } else {
            panelDataItems.forEach(function (item) {
              item.style.transform = "translateY(" + translateY + "vh)";
              item.classList.add("panelDataMoving");
            });
          }
        });
      });
    }
  }
  
// desplegar datos en las tarjetas
export function setupMoreInfoBtns() {
    const moreInfoBtns = document.querySelectorAll('.moreInfo');
  
    moreInfoBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const infoDiv = btn.parentNode.querySelector('.info');
        if (infoDiv.hasAttribute('hidden')) {
          infoDiv.removeAttribute('hidden');
        } else {
          infoDiv.setAttribute('hidden', '');
        }
      });
    });
  }
  

  