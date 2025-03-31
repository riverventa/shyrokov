// ---------------- preloader -------------------- //
paceOptions = {
    ajax: true,
    document: true,
    eventLag: false
  };
  
  // Когда загрузка завершена
  Pace.on('done', function () {
    // Убираем полоску загрузки плавно
    $('.p').delay(500).animate({ top: '30%', opacity: '0' }, 500); // 0.5 сек
    $('#preloader').delay(1000).animate({ top: '-100%' }, 1000); // 1 сек
  
    // Дополнительные анимации (по желанию)
    TweenMax.from(".title", 2, {
      delay: 1.8,
      y: 10,
      opacity: 0,
      ease: Expo.easeInOut
    });
  });
  
  // Убираем прелоадер через 2 секунды
  window.addEventListener("load", function () {
    setTimeout(function () {
      document.getElementById("preloader").classList.add("hidden");
      // Останавливаем анимацию полоски загрузки сразу после загрузки
      document.querySelector('.pace').style.display = 'none'; 
    }, 2000); // Прелоадер исчезает через 2 секунды
  });
  
  // ---------------- Анимация скролла -------------------- //
  
  const scrollers = document.querySelectorAll(".scroller");
  
  if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    addAnimation();
  }
  
  function addAnimation() {
    scrollers.forEach((scroller) => {
      scroller.setAttribute("data-animated", true);
      const scrollerInner = scroller.querySelector(".scroller__inner");
      const scrollerContent = Array.from(scrollerInner.children);
  
      scrollerContent.forEach((item) => {
        const duplicatedItem = item.cloneNode(true);
        duplicatedItem.setAttribute("aria-hidden", true);
        scrollerInner.appendChild(duplicatedItem);
      });
    });
  }
  
  // ---------------- Поворот иконки -------------------- //
  
  function rotateIcon(iconId) {
    const icon = document.getElementById(iconId);
    icon.classList.toggle('rotated');
  }
  