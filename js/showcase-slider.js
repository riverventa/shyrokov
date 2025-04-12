$(document).ready(function(){
    $(".showcase-slider").slick({
      infinite: true,
      slidesToShow: 4, // Показываем 4 изображения
      slidesToScroll: 1,
      arrows: true,
      centerMode: false,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3, // Для экрана среднего размера
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2, // Для мобильных устройств
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1, // Один слайд на мобильных
          }
        }
      ]
    });
  });
  